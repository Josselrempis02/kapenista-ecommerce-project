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
        Schema::table('category', function (Blueprint $table) {
            $table->string('title'); // Add title column
            $table->text('description')->nullable(); // Add description column (nullable)
            $table->string('keywords')->nullable(); // Add keywords column (nullable)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'keywords']); // Drop the added columns
        });
    }
};
