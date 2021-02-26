<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            // $table->foreignId('sale_id');
            // $table->foreignId('customer_id');
            $table->foreignId('categories_id')->default(1);
            $table->string('amzon_id');
            $table->text('name');
            $table->text('brand_name');
            $table->string('selling_price');
            $table->string('quantity');
            $table->string('model_number');
            $table->text('description');
            $table->text('specification');
            $table->text('technical_details');
            $table->string('weight');
            $table->string('dimensions');
            $table->text('images');
            $table->string('sku');
            $table->text('url');
            $table->string('stock');
            $table->text('detail');
            $table->string('color');
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
