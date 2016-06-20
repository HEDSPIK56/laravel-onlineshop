<?php

use Illuminate\Database\Seeder;
use App\SanPham;

class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sanPhams = array(
            array(
                'ma_san_pham'  => 'SP01',
                'ten_san_pham' => 'Bột Giặt ÔMÔ',
                'gia_tien'     => '30',
                'don_vi_tinh'  => 'Túi',
                'so_luong_ton' => 70,
                'ma_loai'      => 'A'
            ),
            array(
                'ma_san_pham'  => 'SP02',
                'ten_san_pham' => 'Bột Giặt Tide',
                'gia_tien'     => '25',
                'don_vi_tinh'  => 'Túi',
                'so_luong_ton' => 200,
                'ma_loai'      => 'A'
            ),
            array(
                'ma_san_pham'  => 'SP03',
                'ten_san_pham' => 'Đèn Bàn Rạng Đông',
                'gia_tien'     => '100',
                'don_vi_tinh'  => 'cái',
                'so_luong_ton' => 90,
                'ma_loai'      => 'C'
            ),
            array(
                'ma_san_pham'  => 'SP04',
                'ten_san_pham' => 'Nồi cơm điện SHARP 3041',
                'gia_tien'     => '2500',
                'don_vi_tinh'  => 'Cái',
                'so_luong_ton' => 10,
                'ma_loai'      => 'B'
            ),
            array(
                'ma_san_pham'  => 'SP05',
                'ten_san_pham' => 'Bàn chải đánh răng PS',
                'gia_tien'     => '12',
                'don_vi_tinh'  => 'Cái',
                'so_luong_ton' => 12,
                'ma_loai'      => 'A'
            ),
            array(
                'ma_san_pham'  => 'SP06',
                'ten_san_pham' => 'Nồi cơm điện PANASONIC 2097',
                'gia_tien'     => '2000',
                'don_vi_tinh'  => 'Cái',
                'so_luong_ton' => 8,
                'ma_loai'      => 'B'
            ),
            array(
                'ma_san_pham'  => 'SP07',
                'ten_san_pham' => 'Bàn chải đánh răng Colgate',
                'gia_tien'     => '16',
                'don_vi_tinh'  => 'Cái',
                'so_luong_ton' => 100,
                'ma_loai'      => 'A'
            ),
        );

        DB::table('sanpham')->delete();
        foreach ($sanPhams as $sp) {
            SanPham::create($sp);
        }
    }
}
