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
        $productService = new ProductService();
        $products = $productService->findAll();

        return view('admin.products', [
            'products' => $products
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
            'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'active' => 'required|boolean',
            'show_only' => 'required|boolean'
        ]);

        $dataProduct = $request->only([
            'type', 'sku', 'name', 'price', 'active', 'show_only'
        ]);

        $this->service->createProduct($dataProduct);

        return redirect()
            ->route('admin.products')
            ->with('success', "Product successfully registered!");
    }
}
