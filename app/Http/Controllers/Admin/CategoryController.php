<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

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

    public function new(Request $request)
    {
        $categories = $this->service->findByParentIdIsNull();

        $category = $this->service->findByCode($request->get('parent_code'));
        $categoryId = $category ? $category->id : NULL;

        return view('admin.categories-new', [
            'categoryId' => $categoryId,
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $rules = [
            'code' => 'required|string|unique:categories',
            'name' => 'required|string'
        ];
        if ($request->get('parent_id'))
            data_set($rules, 'parent_id', 'exists:categories,id');

        $request->validate($rules);

        $dataCategory = $request->only([
            'parent_id', 'code', 'name'
        ]);

        $this->service->createCategory($dataCategory);

        return redirect()
            ->route('admin.categories')
            ->with('success', "Category successfully registered!");
    }
}
