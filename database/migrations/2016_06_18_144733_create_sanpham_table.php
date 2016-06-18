<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_san_pham',4)->unique();
            $table->string('ten_san_pham')->nullable();
            $table->string('gia_tien')->nullable();
            $table->string('don_vi_tinh',10)->nullable();
            $table->integer('so_luong_ton')->default(0);
            $table->integer('ma_loai');
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
        Schema::drop('sanpham');
    }
}
