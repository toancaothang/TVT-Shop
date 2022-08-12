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
        Schema::table('bill_input_details', function (Blueprint $table) {
            $table->unsignedInteger('product_id')->after('id');
            $table->foreign('product_id')
                  ->references('id')->on('product')
                  ->onDelete('cascade');    
            $table->unsignedInteger('bill_input_id')->after('id');
            $table->foreign('bill_input_id')
                  ->references('id')->on('bill_input')
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
        Schema::table('bill_input_details', function (Blueprint $table) {
            //
        });
    }
};
