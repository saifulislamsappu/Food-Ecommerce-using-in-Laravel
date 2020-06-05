<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('food_name');
            $table->string('image');
            $table->string('protein');
            $table->string('fat');
            $table->string('carbohydrate');
            $table->string('KCal');
            $table->string('Price');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('medical_id')->unsigned();
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('medical_id')->references('id')->on('medical')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('food');
        
    }
}
