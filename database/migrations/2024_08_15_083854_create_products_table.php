<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id'); // Creates an auto-incrementing id column named 'product_id'
            $table->string('img'); // To store the image path or URL
            $table->string('name'); // To store the product name
            $table->decimal('price', 8, 2); // To store the product price, with up to 8 digits in total and 2 decimal places
            $table->longText('description');
            $table->string('category'); // To store the product category
            $table->timestamps(); // Creates 'created_at' and 'updated_at' columns
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
