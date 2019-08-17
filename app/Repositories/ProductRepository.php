<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function findAll()
    {
        return $this->model->all();
    }
}
