<?php

namespace App\Services;

use App\Category;
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

    public function createCategory(array $dataCategory)
    {
        $category = new Category();
        $category->fill($dataCategory);
        return $this->create($category);
    }

    public function create(Category $category)
    {
        return $this->repository->create($category);
    }

    public function findByCode($code)
    {
        return $this->repository->findByCode($code);
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
