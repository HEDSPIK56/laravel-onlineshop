<?php

use Illuminate\Database\Seeder;
use App\LoaiSanPham;

class LoaiSanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loaiSanPhams = array(
            array(
                'ma_loai'  => 'A',
                'ten_loai' => "Đồ Dùng"
            ),
            array(
                'ma_loai'  => 'B',
                'ten_loai' => "Nồi Cơm Điện"
            ),
            array(
                'ma_loai'  => 'C',
                'ten_loai' => "Đèn Điện"
            ),
        );

        // Delete table
        DB::table('loaisanpham')->delete();
        foreach ($loaiSanPhams as $lsPham) {
            LoaiSanPham::create($lsPham);
        }
    }
}
