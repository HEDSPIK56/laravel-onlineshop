<?php

use Illuminate\Database\Seeder;
use App\HoaDon;
use App\ChiTietHoaDon;

class HoaDonTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoaDons = array (
            array (
                'ma_hoa_don' => 'HD01',
                'ngay_lap' => '2011-03-20',
                'ma_khach_hang' => 'KH01'
            ),
            array (
                'ma_hoa_don' => 'HD02',
                'ngay_lap' => '2011-02-15',
                'ma_khach_hang' => 'KH02'
            ),
            array (
                'ma_hoa_don' => 'HD03',
                'ngay_lap' => '2011-01-18',
                'ma_khach_hang' => 'KH05'
            ),
            array (
                'ma_hoa_don' => 'HD04',
                'ngay_lap' => '2010-09-16',
                'ma_khach_hang' => 'KH01'
            ),
            array (
                'ma_hoa_don' => 'HD05',
                'ngay_lap' => '2011-02-27',
                'ma_khach_hang' => 'KH02'
            ),
        );


        DB::table('hoadon')->delete();

        foreach ($hoaDons as $hd)
        {
            HoaDon::create($hd);
        }
    }

}
