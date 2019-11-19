<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showShop()
    {
        return view('shop.clientShop');
    }
}
