<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
    'name'=> $faker->randomElement([
    'Beverages',
    'Vitamins',
    'Cereals',
    'Food ready to go',
    'Snacks',
    'Baby food',
    'Fruits',
    'Vegetables',
    ]),
      'icon'=>$faker-> imageUrl($width = 640, $height = 480),
    ];
});
