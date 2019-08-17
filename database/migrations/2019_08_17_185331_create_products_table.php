<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['bundle', 'simple']);
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->float('price');
            $table->string('image')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('show_only')->default(false);
            $table->timestamps();
        });

        Schema::create('product_items', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_product_id');
            $table->foreign('parent_product_id')->references('id')->on('products');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
    }
}
