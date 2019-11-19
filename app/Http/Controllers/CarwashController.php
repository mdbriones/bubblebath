<?php

namespace App\Http\Controllers;

use App\Carwash;
use App\Http\Requests\CustomerValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarwashController extends Controller
{
    public function showService()
    {
        return view('carwash.clientCarwash');
    }

    public function store(CustomerValidation $request)
    {
        // $user = Auth::user();
        $data = $request->toArray();
        if(Carwash::create($data)){
            return redirect()->route('carwash.information')->with('message', 'Succesfully saved!');
        }
    }

    public function showCarwashHistory()
    {
        return view('carwash.clientHistory');
    }

    public function showRecord(Request $request)
    {
        $plateNumber = $request->input('txtPlate');
        $records = Carwash::where('plateNumber', $plateNumber)->get();
        
        return view('carwash.clientHistory', compact('plateNumber', 'records'));
    }
}
