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
        Schema::table('model_image', function (Blueprint $table) {
            $table->unsignedInteger('model_id')->after('id');
            $table->foreign('model_id')
                  ->references('id')->on('product_model')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('model_image', function (Blueprint $table) {
            //
        });
    }
};
