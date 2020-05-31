<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_homes', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->string('imageFull');
            $table->string('imageMobile');
            $table->boolean('visible')->default(true);
            $table->string('URL')->nullable();
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
        Schema::dropIfExists('carousel_homes');
    }
}
