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
        Schema::table('comment', function (Blueprint $table) {
            
                       $table->unsignedInteger('model_id')->after('content');
                        $table->foreign('model_id')
                              ->references('id')->on('product_model')
                              ->onDelete('cascade');
                              $table->unsignedInteger('user_id')->after('id');
            $table->foreign('user_id')
                  ->references('id')->on('user')
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
        Schema::table('comment', function (Blueprint $table) {
            //
        });
    }
};
