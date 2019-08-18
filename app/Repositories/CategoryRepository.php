<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Category();
    }

    public function create(Category $category)
    {
        return $this->model->create($category->toArray());
    }

    public function findByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }

    public function findByParentIdIsNull()
    {
        return $this->model->whereNull('parent_id')->get();
    }

    public function findAll()
    {
        return $this->model->all();
    }
}
