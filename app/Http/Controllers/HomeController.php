<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\SanPham;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$cau1 = SanPham::where('gia_tien', '>', '100')->get();
        //$cau2 = LoaiSanPham::where('ten_loai', '=', 'Đồ dùng')->first();
        //var_dump($cau2->sanPhams()->first());
        $cau3 = SanPham::min('gia_tien');
        //var_dump($cau3);
        //die;
        //die;
        return view('pages/home');
    }

}
