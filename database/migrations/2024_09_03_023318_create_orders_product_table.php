<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders_product', function (Blueprint $table) {
            $table->id('orders_product_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('payment_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_product');
    }
};
