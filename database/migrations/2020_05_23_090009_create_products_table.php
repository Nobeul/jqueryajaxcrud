<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('item_id');
            $table->string('hsn')->nullable();
            $table->bigInteger('item_type_id')->unsigned();
            $table->foreign('item_type_id')->references('id')->on('item_types')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->nullable();
            $table->bigInteger('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units')->nullable();
            $table->bigInteger('tax_type_id')->unsigned();
            $table->foreign('tax_type_id')->references('id')->on('taxes')->nullable();
            $table->string('description')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('retail_price')->nullable();
            $table->string('quantity');
            $table->string('item_image')->nullable();
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
}
