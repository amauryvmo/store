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

    public function findByParentIdIsNull()
    {
        return $this->model->whereNull('parent_id')->get();
    }

    public function findAll()
    {
        return $this->model->all();
    }
}
