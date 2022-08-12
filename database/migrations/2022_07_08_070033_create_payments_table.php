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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('p_transaction_id')->nullable();
            $table->integer('p_user_id')->nullable();
            $table->float('p_money')->nullable()->comment('số tiền thanh toán');
            $table->string('p_note')->nullable()->comment('Nội Dung Thanh Toán');
            $table->string('p_vnp_response_code',225)->nullable()->comment('Mã Phản Hồi');
            $table->string('p_code_vnpay',225)->nullable()->comment('Mã Giao Dịch Vnpay');
            $table->string('p_code_bank',255)->nullable()->comment('Mã Ngân Hàng');
            $table->dateTime('p_time')->nullable()->comment('Thời gian chuyển khoản');
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
        Schema::dropIfExists('payments');
    }
};
