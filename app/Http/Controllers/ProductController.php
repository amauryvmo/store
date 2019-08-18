<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new ProductService();
    }

    public function product($id) {

        $categoryService = new CategoryService();
        $categories = $categoryService->findAllCascading();

        $product = $this->service->find($id);

        return view('product', [
            'categories' => $categories,
            'product' => $product
        ]);
    }
}
