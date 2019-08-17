<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->findAllCascading();

        return view('home', [
            'categories' => $categories
        ]);
    }
}
