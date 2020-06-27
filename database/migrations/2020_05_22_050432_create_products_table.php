<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('model');
            $table->string('SKU');
            $table->string('principalImage');
            $table->integer('stock');
            $table->integer('standardPrice');
            $table->integer('currentPrice')->nullable();
            $table->integer('offerPrice')->nullable();
            $table->dateTime('expirationOfferPrice')->nullable();
            $table->text('description');
            $table->integer('qualification')->nullable();
            $table->string('URL');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
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
