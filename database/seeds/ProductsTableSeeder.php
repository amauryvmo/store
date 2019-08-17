<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    private $products;

    public function __construct()
    {
        $this->products = collect([]);
    }

    private function prepareProduct(
        string $type,
        string $sku,
        string $name,
        string $shortDescription,
        string $description,
        string $price,
        string $image = null,
        bool $showOnly = false
    )
    {
        return [
            'type' => $type,
            'sku'  => $sku,
            'name' => $name,
            'short_description' => $shortDescription,
            'description' => $description,
            'price' => $price,
            'image' => $image,
            'show_only' => $showOnly
        ];
    }
    private function addProductToList(array $product)
    {
        $this->products->push($product);
    }

    private function createProcutsBasedOnList()
    {
        $this->products->each(function ($product) {

            if (! $productCreated = \App\Product::where('sku', data_get($product, 'sku'))->first()) {

                $productData = array_only($product, [
                    'type',
                    'sku',
                    'name',
                    'short_description',
                    'description',
                    'price',
                    'image',
                    'show_only'
                ]);
                if (! $productCreated = \App\Product::create($productData))
                    return;
            }

            if ($productItems = data_get($product, 'product_items')) {

                $productItems->each(function ($productItem) use ($productCreated) {

                    if ($product = \App\Product::where('sku', data_get($productItem, 'sku'))->first()) {
                        \App\ProductItem::create([
                            'parent_product_id' => $productCreated->id,
                            'product_id' => $product->id
                        ]);
                    }
                });
            }
        });
    }

    public function run()
    {
        $products = collect([]);

        $productSimple1 = $this->prepareProduct(
            \App\Product::TYPE_SIMPLE,
            'S_00001',
            'Product simple S_00001',
            'Short Description',
            'Description',
            12
        );
        $this->addProductToList($productSimple1);

        $productSimple2 = $this->prepareProduct(
            \App\Product::TYPE_SIMPLE,
            'S_00002',
            'Product simple S_00002',
            'Short Description',
            'Description',
            12
        );
        $this->addProductToList($productSimple2);

        $productSimple3 = $this->prepareProduct(
            \App\Product::TYPE_SIMPLE,
            'S_00003',
            'Product simple S_00003',
            'Short Description',
            'Description',
            12
        );
        $this->addProductToList($productSimple3);

        $product = $this->prepareProduct(
            \App\Product::TYPE_BUNDLE,
            'B_00001',
            'Product bundle B_00001',
            'Short Description',
            'Description',
            12,
            null,
            true
        );
        $productItems = collect([
            $productSimple1, $productSimple2, $productSimple3
        ]);
        data_set($product, 'product_items', $productItems);
        $this->addProductToList($product);

        $this->createProcutsBasedOnList();
    }
}
