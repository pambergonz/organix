<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('products', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('name');
         $table->decimal('price');
         $table->integer('stock');
         $table->string('description');
         $table->string('image');
         $table->string('rating');
         $table->unsignedBigInteger('user_id')->nullable();
         $table->foreign('user_id')->references('id')->on('users');
         $table->softDeletes();
         $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
