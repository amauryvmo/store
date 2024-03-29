<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $categoryService = new CategoryService();
        $productService = new ProductService();

        $categories = $categoryService->findAllCascading();
        $products = $productService->findAll();

        return view('home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
