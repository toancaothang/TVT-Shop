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
        Schema::create('product_model', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model_name');
            $table->string('opera_sys');
            $table->string('screen');
            $table->string('cpu');
            $table->string('gpu');
            $table->integer('front_camera');
            $table->integer('back_camera');
            $table->string('sim');
            $table->string('pin');
            $table->integer('ram');
             $table->string('image');  
            $table->text('description');
            $table->integer('total_rated');
           $table->integer('status')->default(0);
           $table->softDeletes();
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
        Schema::dropIfExists('product_model');
    }
};
