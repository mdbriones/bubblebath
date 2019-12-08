<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showShop()
    {
        return view('shop.clientShop');
    }

    public function store(Request $request)
    {
        if(count($request->desc) > 0){
            foreach($request->desc as $key => $value){
                $data2[] = array(
                                'name_' => $request->customerName,
                                'plateNumber_' => $request->plateNumber,
                                'make_model_' => $request->model,
                                'date_' => $request->dateOfService,
                                'email_' => $request->email,
                                'terms_' => $request->terms,
                                'service_description_' => $request->desc[$key],
                                'service_amount_' => $request->txtAmt[$key]
                            );
                Shop::create($data2[$key]);
            }
            return redirect()->back()->with('message', 'Save successfully!');
        }
    }

    public function showShopHistory()
    {
        return view('shop.shopHistory');
    }

    public function showShopRecord(Request $request)
    {
        $plateNumber = $request->input('txtPlate');
        $records = Shop::where('plateNumber_', $plateNumber)->get();
        
        $client_name = $records[0]->name_;
        $make_model = $records[0]->make_model_;
        $email = $records[0]->email_;

        return view('shop.shopHistory', compact('plateNumber', 'records' ,'client_name', 'make_model', 'email'));
    }
}
