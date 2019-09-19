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

    public function create(Product $product)
    {
        return $this->model->create($product->toArray());
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findOneBySKU($sku)
    {
        return $this->model->where('sku', $sku)->first();
    }

    public function findAll()
    {
        return $this->model->all();
    }
}
