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

    public function findAllCascading()
    {
        $categoriesWhereParentIdIsNull = $this->findByParentIdIsNull();
        $categoriesWhereParentIdIsNull = $categoriesWhereParentIdIsNull->map(function ($category) {
            $category->categories;
            return $category;
        });
        return $categoriesWhereParentIdIsNull;
    }

    public function findByParentIdIsNull()
    {
        return $this->repository->findByParentIdIsNull();
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}
