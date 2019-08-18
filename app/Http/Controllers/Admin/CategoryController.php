<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->service = new CategoryService();
    }

    public function index()
    {
        $categories = $this->service->findAllCascading();

        return view('admin.categories', [
            'categories' => $categories
        ]);
    }

    public function category($code)
    {
        $category = $this->service->findByCode($code);

        $categories = $category->categories;

        return view('admin.category', [
            'category' => $category,
            'categories' => $categories
        ]);
    }
}
