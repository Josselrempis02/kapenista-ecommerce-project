<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Add the new column 'category_id'
            $table->unsignedBigInteger('category_id')->nullable(); // Adjust based on your needs
        });

        // Copy data from 'category' to 'category_id'
        DB::statement('UPDATE products SET category_id = category');

        Schema::table('products', function (Blueprint $table) {
            // Now drop the old 'category' column
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Add back the 'category' column
            $table->string('category')->nullable();

            // Copy data back from 'category_id' to 'category'
            DB::statement('UPDATE products SET category = category_id');

            // Drop the 'category_id' column
            $table->dropColumn('category_id');
        });
    }
};
