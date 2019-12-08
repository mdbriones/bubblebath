<?php

namespace App\Http\Controllers;

use App\Stocks;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showEncodeStocks()
    {
        $stocks = Stocks::all();
        return view('others.encodeStocks', compact('stocks'));
    }

    public function saveStocks(Request $request)
    {
        $request->validate([
                'stocks_date' => 'required',
                'reference' => 'required',
                'supplier' => 'required',
                'description' => 'required',
                'quantity' => 'required',
                'amount' => 'required',
            ]
        );
        $data = $request->all();
        Stocks::create($data);

        return redirect()->back()->with('message', 'Successfully saved');
    }

    public function updateStocks(Request $request)
    {
        $data = $request->all();
        $stocks = Stocks::find($data['edit_id']);

        if(!is_null($stocks)){
            Stocks::where('id', '=', $data['edit_id'])
                    ->update([
                        'stocks_date' => $data['stocks_date'],
                        'supplier' => $data['supplier'],
                        'reference' => $data['reference'],
                        'description' => $data['description'],
                        'quantity' => $data['quantity'],
                        'amount' => $data['amount']
                    ]);
            return redirect()->back()->with('message', 'Succesfully updated!');
        }else{
            return redirect()->back()->with('message', 'Error updating!');
        }
       
        
    }

    public function deleteStocks(Request $request)
    {
        $row_id = $request->input('row_id');
        Stocks::destroy($row_id);
    }
}
