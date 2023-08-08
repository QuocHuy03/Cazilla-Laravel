<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orders_id');
            $table->string('orders_random', 200);
            $table->string('product_id', 200);
            $table->string('product_name', 200);
            $table->string('product_img', 200);
            $table->text('product_qty');
            $table->text('product_price');
            $table->foreign('orders_id')->references('id')->on('order')->onDelete('cascade');
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
        Schema::dropIfExists('products_order');
    }
}
