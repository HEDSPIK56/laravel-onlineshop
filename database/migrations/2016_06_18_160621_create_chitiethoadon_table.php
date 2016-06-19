<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitiethoadonTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('chitiethoadon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_hoa_don', 10);
            $table->string('ma_san_pham', 10);
            $table->integer('so_luong')->default(0);
            $table->string('don_gia');
            $table->timestamps();
            /**
             * Foreign key
             */
            $table->foreign('ma_hoa_don')->references('ma_hoa_don')->on('hoadon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('chitiethoadon');
    }

}
