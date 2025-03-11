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
            $table->string('sku', 50);
            $table->string('img', 255);
            $table->string('name', 255);
            $table->string('description', 255);
            $table->double('price');
            $table->integer('id_bh')->nullable(TRUE);
            $table->integer('quantity');
            $table->integer('status');
            $table->integer('promotion_id')->nullable(TRUE);
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
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
