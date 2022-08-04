<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ho_ten');
            $table->integer('cmnd')->unique();
            $table->date('ngay_sinh');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->bigInteger('quyen_id')->unsigned();
            $table->foreign('quyen_id')->references('id')->on('quyens')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
