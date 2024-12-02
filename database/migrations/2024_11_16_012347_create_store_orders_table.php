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
        Schema::create('store_orders', function (Blueprint $table) {
           
            $table->id(); // Primary key
            $table->string('name'); // Name of the person placing the order
            $table->string('email')->unique(); // Email address
            $table->string('phone'); // Phone number
            $table->string('store_name_ar')->nullable(); // Store name in Arabic
            $table->string('store_name_en')->nullable(); // Store name in English
            $table->unsignedBigInteger('categoryStore_id')->nullable();

            $table->foreign('categoryStore_id')
                  ->references('id')
                  ->on('category_stores') ->onDelete('set null'); // If parent is deleted, set null in child
                 

            $table->enum('status', ['pending', 'completed'])->default('pending')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_orders');
    }
};
