<?php

namespace App\Http\Controllers;

use App\Carwash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceivablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function carwash()
    {
        $data = DB::table('carwash')
                            ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                                        seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                            ->where('paid','0')
                            ->where('dateOfService', '<=', now())
                            ->get();
        
        $overallTotal = 0;
        foreach ($data as $key => $value) {
            $newDate = date("F d, Y", strtotime($data[$key]->dateOfService));
            $now = time();
			$orig_date = strtotime($newDate);
			$datediff = $now - $orig_date;
            $aging = round($datediff / (60 * 60 * 24));
            $data[$key]->aging = $aging;
        
            $overallTotal += $data[$key]->totalAmount;
        }
        return view('receivables.carwash', compact('data', 'overallTotal'));
    }

    public function updatePaidCarwash(Request $request)
    {
        $row_id = $request->input('row_id');
        DB::table('carwash')->where('id', $row_id)
                            ->update(['paid' => '1']);
    }

    public function shop()
    {
        $data = DB::table('shop')->where('paid','0')
                            ->where('date_', '<=', now())
                            ->get();
        
        $overallTotal = 0;
        foreach ($data as $key => $value) {
            $newDate = date("F d, Y", strtotime($data[$key]->date_));
            $now = time();
			$orig_date = strtotime($newDate);
			$datediff = $now - $orig_date;
            $aging = round($datediff / (60 * 60 * 24));
            $data[$key]->aging = $aging;
        
            $overallTotal += $data[$key]->service_amount_;
        }

        return view('receivables.shop', compact('data', 'overallTotal'));
    }

    public function updatePaidShop(Request $request)
    {
        $row_id = $request->input('row_id');
        DB::table('shop')->where('id', $row_id)
                            ->update(['paid' => '1']);
    }
}
