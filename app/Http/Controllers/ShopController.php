<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showShop()
    {
        return view('shop.clientShop');
    }

    public function store(Request $request)
    {
        if(count($request->desc) > 0){
            foreach($request->desc as $key => $value){
                $data2[] = array(
                    'description' => $request->desc[$key],
                    'amount' => $request->txtAmt[$key]
                );
            }
        }
        dd($data2);
    }
}
