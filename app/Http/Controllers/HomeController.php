<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\SanPham;
use App\Services\Scraper;

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
        //$cau3 = SanPham::min('gia_tien');
        //var_dump($cau3);
        //die;
        //die;
        return view('pages.home.index');
    }

    public function create()
    {
        return view("pages.home.create");
    }

    public function read(Request $request)
    {
        $searchDate      = $request->get('search_date', date('d-m-Y'));
        $url             = "http://ketqua.net/xo-so-mien-nam.php?ngay=" . $searchDate . "";
        $scraper         = new Scraper();
        $pageHtmlContent = $scraper->curl($url);
        $subHtmlContent  = $scraper->getValueByTagName($pageHtmlContent, '<table class="table table-condensed table-bordered table-kq-hover kqcenter kqbackground table-kq-bold-border" style="text-align:center;" id="region_table">', '</table>');
        $data            = trim($subHtmlContent); //htmlentities(trim($subHtmlContent));
        if ($request->ajax())
        {
            echo $data;
            die;
        }
        else
        {
            return view("pages.home.read")->with('data');
            ;
        }
    }

}
