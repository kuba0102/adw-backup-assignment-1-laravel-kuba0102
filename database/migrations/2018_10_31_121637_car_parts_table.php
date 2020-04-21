<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_parts', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->integer('part_id')->unsigned()->nullable();
            $table->foreign('part_id')->references('part_id')->on('parts')->onDelete('cascade');
            $table->integer('vehicle_id')->unsigned()->nullable();
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicle_makes')->onDelete('cascade');
            $table->integer('price')->unsigned()->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('car_parts');
    }
}
