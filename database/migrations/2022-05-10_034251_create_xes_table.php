<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ten_xe');
            $table->string('bien_so', 15)->unique();
            $table->string('hinh');
            $table->text('mo_ta')->nullable();
            $table->integer('gia_thue');
            $table->bigInteger('loaixe_id')->unsigned();
            $table->foreign('loaixe_id')->references('id')->on('loai_xes')->onDelete('cascade');
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
        Schema::dropIfExists('xes');
    }
}
