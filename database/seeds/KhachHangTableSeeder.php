<?php

use Illuminate\Database\Seeder;
use App\KhachHang;

class KhachHangTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khachHangs = array (
            array (
                'ma_khach_hang' => 'KH01',
                'ho_ten' => 'Nguyễn Thanh Tùng',
                'dia_chi' => 'Hồ Chí Minh',
                'so_dien_thoai' => '9-0991-2233',
                'nam_sinh' => '1984',
                'gioi_tinh' => '1'
            ),
            array (
                'ma_khach_hang' => 'KH02',
                'ho_ten' => 'Lê Nhật Nam',
                'dia_chi' => 'Hồ Chí Minh',
                'so_dien_thoai' => '9-1234-2134',
                'nam_sinh' => '1972',
                'gioi_tinh' => '0'
            ),
            array (
                'ma_khach_hang' => 'KH03',
                'ho_ten' => 'Nguyễn Thị Thanh',
                'dia_chi' => 'Cà Mau',
                'so_dien_thoai' => '9-2222-3333',
                'nam_sinh' => '1981',
                'gioi_tinh' => '0'
            ),
            array (
                'ma_khach_hang' => 'KH04',
                'ho_ten' => 'Lê Thị Lan',
                'dia_chi' => 'Bình Dương',
                'so_dien_thoai' => '9-1111-1111',
                'nam_sinh' => '1984',
                'gioi_tinh' => '0'
            ),
            array (
                'ma_khach_hang' => 'KH05',
                'ho_ten' => 'Trần Minh Quang',
                'dia_chi' => 'Đồng Nai',
                'so_dien_thoai' => '9-2222-5555',
                'nam_sinh' => '1984',
                'gioi_tinh' => '1'
            ),
            array (
                'ma_khach_hang' => 'KH06',
                'ho_ten' => 'Lê Văn Hải',
                'dia_chi' => 'Hồ Chí Minh',
                'so_dien_thoai' => '9-1234-4321',
                'nam_sinh' => '1970',
                'gioi_tinh' => '1'
            ),
            array (
                'ma_khach_hang' => 'KH07',
                'ho_ten' => 'Dương Văn Hai',
                'dia_chi' => 'Đồng Nai',
                'so_dien_thoai' => '9-1111-0000',
                'nam_sinh' => '1988',
                'gioi_tinh' => '1'
            ),
        );

        DB::table('khachhang')->delete();
        foreach ($khachHangs as $kh)
        {
            KhachHang::create($kh);
        }
    }

}
