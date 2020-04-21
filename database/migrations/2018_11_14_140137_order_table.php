<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('orders', function (Blueprint $table) {
                $table->increments('order_id')->autoIncrement();
                $table->integer('order_ids')->unsigned()->nullable();
                $table->string('order_customer_name');
                $table->integer('order_car_parts')->unsigned()->nullable();
                $table->foreign('order_car_parts')->references('id')->on('car_parts')->onDelete('cascade');
                $table->integer('order_status')->unsigned()->nullable();
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
        Schema::dropIfExists('orders');
    }
}
