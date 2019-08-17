<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;

class CategoryController extends Controller
{
    public function category($code)
    {
        $categoryService = new CategoryService();
        $category = $categoryService->findByCode($code);
        $categories = $categoryService->findAllCascading();
        $products = $category->products;

        return view('home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
