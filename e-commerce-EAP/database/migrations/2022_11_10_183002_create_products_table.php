<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->text('description');
            $table->integer('stock');
            $table->string('barcode')->unique();
            $table->integer('price');
            $table->string('photo');
            $table->foreignId('category_id')->references('id')->on('categories')
            ->onUpdate('restrict')
            ->onDelete('cascade');
            $table->foreignId('subcategory_id')->references('id')->on('sub_categories')
            ->onUpdate('restrict')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
