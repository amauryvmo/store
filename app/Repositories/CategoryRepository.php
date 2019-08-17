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

    public function findAll()
    {
        return $this->model->all();
    }
}
