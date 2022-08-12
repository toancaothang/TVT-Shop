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
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',20)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name');   
            $table->string('avatar')->nullable();    
            $table->date('birth');
            $table->text('address');
            $table->integer('phone_number');
            $table->integer('status')->default(0);
            $table->integer('gender');
            $table->integer('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->default(Null);
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
        Schema::dropIfExists('admin');
    }
};
