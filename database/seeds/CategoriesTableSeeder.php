<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = collect([
            [
                'code' => '00001',
                'name' => 'Kits',
                'active' => true
            ],
            [
                'code' => '00002',
                'name' => 'Office',
                'active' => true,
                'categories' => collect([
                    [
                        'code' => '00003',
                        'name' => 'Apoio de Leitura',
                        'active' => true
                    ],
                    [
                        'code' => '00004',
                        'name' => 'Calculadora',
                        'active' => true
                    ]
                ])
            ]
        ]);

        $categories->each(function ($category) {

            if (! $categoryCreated = \App\Category::where('code', data_get($category, 'code'))->first()) {

                $categoryData = array_only($category, ['code', 'name', 'active']);

                if (! $categoryCreated = \App\Category::create($categoryData))
                    return;
            }

            if ($categories = data_get($category, 'categories')) {

                $categories->each(function ($category) use($categoryCreated) {

                    if (! \App\Category::where('code', data_get($category, 'code'))->exists()) {

                        data_set($category, 'parent_id', $categoryCreated->id);
                        $categoryData = array_only($category, ['code', 'name', 'active', 'parent_id']);
                        \App\Category::create($categoryData);
                    }
                });
            }
        });
    }
}
