<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'name'=>$faker->word(),
      'price'=>$faker->randomNumber(5),
      'stock'=>$faker->numberBetween(1-999999),
      'description'=>$faker->sentence($nbWords = 4, $variableNbWords = true),
      'rating'=>$faker->numberBetween(1-5), 
      'image'=>$faker->imageUrl($width = 640, $height = 480),
    ];
});
