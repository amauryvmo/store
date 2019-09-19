<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Product;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->service = new ProductService();
    }

    public function index()
    {
        $products = $this->service->findAll();

        return view('admin.products', [
            'products' => $products
        ]);
    }

    public function product($sku)
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->findAll();
        $product = $this->service->findOneBySKU($sku);
        $productCategoriesPluckedInIds = $product->categories->pluck('id');

        // $product->categories->pluck('id')->contains(16)

        return view('admin.product', [
            'product' => $product,
            'productCategoriesPluckedInIds' => $productCategoriesPluckedInIds,
            'categories' => $categories
        ]);
    }

    public function new(Request $request)
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->findAll();

        return view('admin.products-new', [
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $productTypes = collect([Product::TYPE_BUNDLE, Product::TYPE_SIMPLE]);
        $productTypesImploded = $productTypes->implode(',');

        $request->validate([
            'type'  => "required|in:{$productTypesImploded}",
            'sku'   => 'required|string|unique:products',
            'name'  => 'required|string',
            'image' => 'string',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'active' => 'required|boolean',
            'show_only' => 'required|boolean',
            'categories.*' => 'integer|exists:categories,id'
        ]);

        $dataProduct = $request->only([
            'type', 'sku', 'name', 'price', 'active', 'show_only', 'image'
        ]);
        $categories = $request->get('categories', []);

        $this->service->createProduct($dataProduct, $categories);

        return redirect()
            ->route('admin.products')
            ->with('success', "Product successfully registered!");
    }

    public function update(Request $request, $sku)
    {
        $product = $this->service->findOneBySKU($sku);

        $rules = [
            'name'  => 'required|string',
            'image' => 'string',
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'active' => 'required|boolean',
            'show_only' => 'required|boolean',
            'categories.*' => 'integer|exists:categories,id'
        ];
        data_set($rules, 'sku', (
            $request->get('sku') == $product->sku ? 'required|string' : 'required|string|unique:products'
        ));
        $request->validate($rules);

        $dataProduct = $request->only([
            'sku', 'name', 'price', 'active', 'show_only', 'image'
        ]);
        $categories = $request->get('categories', []);
        $product = $this->service->updateProduct($product, $dataProduct, $categories);

        return redirect()
            ->route('admin.products.sku', $product->sku)
            ->with('success', "Product successfully edited!");
    }
}
