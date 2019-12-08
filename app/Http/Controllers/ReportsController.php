<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function carwash()
    {
        return view('reports.report_carwash');
    }

    public function showCarwashReport(Request $request)
    {
        $format = $request->input('format');
        $day = $request->input('day');
        $month = $request->input('month');
        $quarter = $request->input('quarter');
        $year = $request->input('year');

        if($format == 'd'){
            $data = DB::table('carwash')->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval + seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                        ->where(function ($query) use ($day){
                            $query->where('dateOfService', $day);
                        })->get();
        }
        
        if($format == 'mo'){
            $data = DB::table('carwash')->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + 
                        asphaltRemoval + seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                        ->where(function ($query) use ($month, $year){
                            $query->whereMonth('dateOfService', '=', $month)
                            ->whereYear('dateOfService', '=', $year);
                        })->get();
        }

        if($format == 'qtr'){
            if($quarter == '1'){
                $data = DB::table('carwash')->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + 
                            asphaltRemoval + seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                            ->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '01')
                                ->orWhereMonth('dateOfService', '=', '02')
                                ->orWhereMonth('dateOfService', '=', '03')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }else if($quarter == '2'){
                $data = DB::table('carwash')->selectRaw('*,(bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + 
                            asphaltRemoval + seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                            ->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '03')
                                ->orWhereMonth('dateOfService', '=', '05')
                                ->orWhereMonth('dateOfService', '=', '06')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }else if($quarter == '3'){
                $data = DB::table('carwash')->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + 
                            asphaltRemoval + seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                            ->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '07')
                                ->orWhereMonth('dateOfService', '=', '08')
                                ->orWhereMonth('dateOfService', '=', '09')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }else if($quarter == '4'){
                $data = DB::table('carwash')->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + 
                            asphaltRemoval + seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                            ->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '10')
                                ->orWhereMonth('dateOfService', '=', '11')
                                ->orWhereMonth('dateOfService', '=', '12')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }
            
        }

        if($format == 'yr'){
            $data = DB::table('carwash')->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + 
                        asphaltRemoval + seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                        ->where(function ($query) use ($year){
                            $query->whereYear('dateOfService', '=', $year);
                        })->get();
        }

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

        $records = $data;
                            
        return view('reports.report_carwash', compact('records'));
    }

    public function shop()
    {
        return view('reports.report_shop');
    }

    public function showShopReport(Request $request)
    {
        $format = $request->input('format');
        $day = $request->input('day');
        $month = $request->input('month');
        $quarter = $request->input('quarter');
        $year = $request->input('year');

        if($format == 'd'){
            $data = DB::table('shop')->where(function ($query) use ($day){
                            $query->where('date_', $day);
                        })->get();
        }
        
        if($format == 'mo'){
            $data = DB::table('shop')->where(function ($query) use ($month, $year){
                            $query->whereMonth('date_', '=', $month)
                            ->whereYear('date_', '=', $year);
                        })->get();
        }

        if($format == 'qtr'){
            if($quarter == '1'){
                $data = DB::table('shop')->where(function ($query) use ($year){
                                $query->whereMonth('date_', '=', '01')
                                ->orWhereMonth('date_', '=', '02')
                                ->orWhereMonth('date_', '=', '03')
                                ->whereYear('date_', '=', $year);
                            })->get();
            }else if($quarter == '2'){
                $data = DB::table('shop')->where(function ($query) use ($year){
                                $query->whereMonth('date_', '=', '03')
                                ->orWhereMonth('date_', '=', '05')
                                ->orWhereMonth('date_', '=', '06')
                                ->whereYear('date_', '=', $year);
                            })->get();
            }else if($quarter == '3'){
                $data = DB::table('shop')->where(function ($query) use ($year){
                                $query->whereMonth('date_', '=', '07')
                                ->orWhereMonth('date_', '=', '08')
                                ->orWhereMonth('date_', '=', '09')
                                ->whereYear('date_', '=', $year);
                            })->get();
            }else if($quarter == '4'){
                $data = DB::table('shop')->where(function ($query) use ($year){
                                $query->whereMonth('date_', '=', '10')
                                ->orWhereMonth('date_', '=', '11')
                                ->orWhereMonth('date_', '=', '12')
                                ->whereYear('date_', '=', $year);
                            })->get();
            }
            
        }

        if($format == 'yr'){
            $data = DB::table('shop')->where(function ($query) use ($year){
                            $query->whereYear('date_', '=', $year);
                        })->get();
        }

        $records = $data;
        return view('reports.report_shop', compact('records'));
    }
}
