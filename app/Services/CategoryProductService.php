<?php

namespace App\Services;

use App\Category;
use App\CategoryProduct;
use App\Product;
use App\Repositories\CategoryProductRepository;

class CategoryProductService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new CategoryProductRepository();
    }

    public function associateCategoryProduct(Category $category, Product $product)
    {
        if ($categoryProduct = $this->findOneByCategoryAndProduct($category, $product)) {
            return $this->update($categoryProduct, ['active', true]);
        }
        $categoryProduct = new CategoryProduct;
        $categoryProduct->fill([
            'category_id' => $category->id,
            'product_id'  => $product->id
        ]);
        return $this->create($categoryProduct);
    }

    public function create(CategoryProduct $categoryProduct)
    {
        return $this->repository->create($categoryProduct);
    }

    public function findOneByCategoryAndProduct(Category $category, Product $product)
    {
        return $this->repository->findOneByCategoryAndProduct($category, $product);
    }

    public function update(CategoryProduct $categoryProduct, $data)
    {
        return $this->repository->update($categoryProduct, $data);
    }
}
