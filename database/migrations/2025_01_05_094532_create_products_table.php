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
            $table->id();
            $table->string('productname');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('subcategory');
            $table->float('cost');
            $table->float('price');
            $table->string('attachment_id')->nullable();
            $table->timestamps();
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('subcategory')->references('id')->on('categories');
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
