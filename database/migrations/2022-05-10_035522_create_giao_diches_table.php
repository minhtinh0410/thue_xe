<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaoDichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_dichs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('xe_bien_so', 15);
            $table->foreign('xe_bien_so')->references('bien_so')->on('xes')->onDelete('cascade');
            $table->integer('user_cmnd');
            $table->foreign('user_cmnd')->references('cmnd')->on('users')->onDelete('cascade');
            $table->date('ngay_nhan_xe');
            $table->date('ngay_tra_xe');
            $table->integer('thanh_tien');
            $table->boolean('tinh_trang')->default(false);
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
        Schema::dropIfExists('giao_dichs');
    }
}
