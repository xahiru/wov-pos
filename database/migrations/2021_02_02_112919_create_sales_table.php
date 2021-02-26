<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            // $table->foreignId('customer_id');
            $table->float('grand_total', 8, 2);
            $table->float('quantity', 8, 2);
            $table->float('tax', 8, 2);
            $table->float('discount', 8, 2);
            $table->float('subtotal', 8, 2);
            $table->string('payment_method')->default('cash');
            $table->dateTime('date');
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
        Schema::dropIfExists('sales');
    }
}
