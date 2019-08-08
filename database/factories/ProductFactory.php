<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->unique()->word),
        'category_id' => function () {
            $category = App\Category::inRandomOrder()->first();
            if ($category) return $category->id;
            return factory(App\Category::class)->create()->id;
        }
    ];
});
