<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}
