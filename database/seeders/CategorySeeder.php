<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(config('seeder.categories'));

        $categories->each(function($category) {
            $categoryObject = Category::create([
                'name' => $category['name'],
                'sort' => $category['sort']
            ]);
            $products = collect($category['products']);

            $products->each(function($product) use($categoryObject) {
                $productObject = $categoryObject->products()->create([
                    'name' => $product['name']
                ]);

                $productOptions = collect($product['options']);
                $productOptions->each(function($productOption) use($productObject) {
                    $option = Option::query()->where('name', $productOption)->first();
                    $productObject->options()->attach($option->id);
                });
            });
        });
    }
}
