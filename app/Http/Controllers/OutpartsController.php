<?php

namespace App\Http\Controllers;

use App\Outparts;
use Illuminate\Http\Request;

class OutpartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showOutworks()
    {
        $outparts = Outparts::all();
        return view('others.outparts', compact('outparts'));
    }

    public function saveOutparts(Request $request)
    {
        // dd($request->all());
        $request->validate([
                'out_date' => 'required',
                'supplier' => 'required|required_if:sel_supplier, "Others"',
                'description' => 'required',
                'quantity' => 'required',
                'amount' => 'required',
            ]
        );
        $data = $request->all();
        Outparts::create($data);

        return redirect()->back()->with('message', 'Successfully saved');
    }

    public function updateOutparts(Request $request)
    {
        $data = $request->all();
        
        $outparts = Outparts::find($data['edit_id']);

        if(!is_null($outparts)){
            Outparts::where('id', '=', $data['edit_id'])
                    ->update([
                        'out_date' => $data['out_date'],
                        'supplier' => $data['supplier'],
                        'description' => $data['description'],
                        'quantity' => $data['quantity'],
                        'amount' => $data['amount']
                    ]);
            return redirect()->back()->with('message', 'Succesfully updated!');
        }else{
            return redirect()->back()->with('message', 'Error updating!');
        }
    }

    public function deleteOutparts(Request $request)
    {
        $row_id = $request->input('row_id');
        Outparts::destroy($row_id);
    }
}