<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        return view('pages.carts.index', compact('carts'));
    }
}
