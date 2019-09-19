<?php

namespace App\Repositories;

use App\Category;
use App\CategoryProduct;
use App\Product;

class CategoryProductRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoryProduct();
    }

    public function create(CategoryProduct $categoryProduct)
    {
        return $this->model->create($categoryProduct->toArray());
    }

    public function findOneByCategoryAndProduct(Category $category, Product $product)
    {
        return $this->model
            ->where('category_id', $category->id)
            ->where('product_id', $product->id)
            ->first();
    }

    public function update(CategoryProduct $categoryProduct, $data)
    {
        return $this->model->where('id', $categoryProduct->id)->update($data);
    }

    public function deleteByProduct(Product $product)
    {
        return $this->model->where('product_id', $product->id)->delete();
    }
}
