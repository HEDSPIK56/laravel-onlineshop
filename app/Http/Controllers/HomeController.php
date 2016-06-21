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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cau1 = SanPham::where('gia_tien', '>', '100')->get();
        //var_dump($cau1);
        //die;
        return view('pages/home');
    }

}
