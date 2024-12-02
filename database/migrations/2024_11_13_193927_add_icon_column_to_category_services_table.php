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
        Schema::table('category_services', function (Blueprint $table) {
            $table->string('icon'); // Replace 'column_name' with the column after which you want to add 'icon'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_services', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
};
