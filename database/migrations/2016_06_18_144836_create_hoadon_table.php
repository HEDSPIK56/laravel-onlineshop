<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('ma_hoa_don', 10)->unique();
            $table->date('ngay_lap')->nullable();
            $table->string('ma_khach_hang', 10)->nullable();
            $table->timestamps();

            /**
             * Foreign key
             */
            //$table->foreign('ma_khach_hang')->references('ma_khach_hang')->on('khachhang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hoadon');
    }

}
