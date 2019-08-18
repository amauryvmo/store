<?php

namespace App\Services;

use App\Category;
use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductService
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function createProduct(array $dataProduct, array $categoriesIds)
    {
        $product = new Product();
        $product->fill($dataProduct);

        DB::beginTransaction();

        if (! $createdProduct = $this->create($product)) {
            DB::rollBack();
            return null;
        }

        if (empty($categoriesIds)) {
            DB::commit();
            return $createdProduct;
        }

        $categoryService = new CategoryService;
        $categoryProductService = new CategoryProductService;

        foreach ($categoriesIds as $categoryId) {
            $category = $categoryService->find($categoryId);
            if (! $categoryProductService->associateCategoryProduct($category, $createdProduct)) {
                DB::rollBack();
                return null;
            }
        }

        DB::commit();
        $createdProduct->refresh();
        return $createdProduct;
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
