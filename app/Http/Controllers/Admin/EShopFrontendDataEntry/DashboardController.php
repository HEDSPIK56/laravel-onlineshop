<?php

namespace App\Http\Controllers\Admin\EShopFrontendDataEntry;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth', ['only' => 'logged']);
    }

    public function index()
    {
        return view('dashboard.index');
    }

}
