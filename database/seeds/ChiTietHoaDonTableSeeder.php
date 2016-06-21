<?php

use Illuminate\Database\Seeder;
use App\ChiTietHoaDon;

class ChiTietHoaDonTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chiTietHDs = array (
            array (
                'ma_hoa_don' => 'HD01',
                'ma_san_pham' => 'SP01',
                'so_luong' => '2',
                'don_gia' => '30'
            ),
            array (
                'ma_hoa_don' => 'HD01',
                'ma_san_pham' => 'SP02',
                'so_luong' => '2',
                'don_gia' => '25'
            ),
            array (
                'ma_hoa_don' => 'HD02',
                'ma_san_pham' => 'SP01',
                'so_luong' => '3',
                'don_gia' => '30'
            ),
            array (
                'ma_hoa_don' => 'HD03',
                'ma_san_pham' => 'SP02',
                'so_luong' => '3',
                'don_gia' => '25'
            ),
            array (
                'ma_hoa_don' => 'HD03',
                'ma_san_pham' => 'SP03',
                'so_luong' => '1',
                'don_gia' => '90'
            ),
            array (
                'ma_hoa_don' => 'HD03',
                'ma_san_pham' => 'SP01',
                'so_luong' => '3',
                'don_gia' => '90'
            ),
            array (
                'ma_hoa_don' => 'HD04',
                'ma_san_pham' => 'SP04',
                'so_luong' => '1',
                'don_gia' => '2400'
            ),
            array (
                'ma_hoa_don' => 'HD05',
                'ma_san_pham' => 'SP06',
                'so_luong' => '1',
                'don_gia' => '2000'
            ),
            array (
                'ma_hoa_don' => 'HD05',
                'ma_san_pham' => 'SP01',
                'so_luong' => '5',
                'don_gia' => '30'
            ),
        );

        DB::table('chitiethoadon')->delete();
        foreach ($chiTietHDs as $cthd)
        {
            ChiTietHoaDon::create($cthd);
        }
    }

}
