<?php

namespace App\Services;

use App\Category;
use App\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function createProduct(array $dataProduct)
    {
        $product = new Product();
        $product->fill($dataProduct);
        return $this->create($product);
    }

    public function create(Product $product)
    {
        return $this->repository->create($product);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}
