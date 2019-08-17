<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new CategoryRepository();
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}
