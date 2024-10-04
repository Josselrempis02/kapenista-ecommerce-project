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
        Schema::table('products', function (Blueprint $table) {
            // Drop the existing 'category' column
            $table->dropColumn('category');

            // Add the new 'category_id' column
            $table->unsignedBigInteger('category_id')->after('description'); // Ensure the correct position

            // Optionally, add foreign key constraint (if categories table exists)
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the foreign key constraint if it exists
            $table->dropForeign(['category_id']);

            // Drop the 'category_id' column
            $table->dropColumn('category_id');

            // Re-add the old 'category' column
            $table->string('category')->after('description');
        });
    }
};
