<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::Product);
        $products = factory(App\Product::class,50)->create();
        $users = factory(App\User::class,50)->create();
        $categories = factory(App\Category::class,20)->create();

        foreach ($products as $product)
        {
          $product->user()->associate($users->random(1)->first()->id);
          $product->save();

          $product->categories()->sync($categories->random(2));
          $product->save();
        }


    }
}
