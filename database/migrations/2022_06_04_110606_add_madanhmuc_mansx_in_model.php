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
        Schema::table('product_model', function (Blueprint $table) {
            $table->unsignedInteger('category_id')->after('model_name');
            $table->foreign('category_id')
                  ->references('id')->on('product_category')
                  ->onDelete('cascade');
                  $table->unsignedInteger('branch_id')->after('model_name');
                  $table->foreign('branch_id')
                        ->references('id')->on('branch')
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
        Schema::table('product_model', function (Blueprint $table) {
            //
        });
    }
};
