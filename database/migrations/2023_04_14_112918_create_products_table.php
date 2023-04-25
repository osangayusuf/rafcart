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
            $table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->integer('price');
            $table->string('logo')->nullable();
            $table->string('brand');
            $table->string('description');
            $table->string('materials');
            $table->integer('weight');
            $table->string('size_xs');
            $table->string('size_s');
            $table->string('size_m');
            $table->string('size_l');
            $table->string('size_xl');
            $table->string('sku');
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
