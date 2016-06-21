<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LoaiSanPhamTableSeeder::class);
        $this->call(SanPhamTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(HoaDonTableSeeder::class);
        $this->call(ChiTietHoaDonTableSeeder::class);
    }

}
