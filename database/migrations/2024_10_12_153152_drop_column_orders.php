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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('payment_intent_id')->nullable();; // Replace with the actual column name
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('apartment')->nullable(); // Add the column type and name back
        });
    }
};
