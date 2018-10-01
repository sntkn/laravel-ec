<?php

use Faker\Generator as Faker;
use App\Models\Category;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $name = $faker->word();
    return [
        'name' => $name,
        'alias' => $name,
        'title' => $faker->paragraph(),
        'description' => $faker->text(),
        'price' => $faker->numberBetween(600, 4000),
        'category_id' => $faker->numberBetween(1, Category::count()),
    ];
});
