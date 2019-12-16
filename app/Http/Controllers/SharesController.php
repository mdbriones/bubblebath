<?php

namespace App\Http\Controllers;

use App\Carwash;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SharesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showShares()
    {
        $dateNow = Carbon::now()->format("F d, Y");
        return view('others.shares', compact('dateNow'));
    }

    public function getShares(Request $request)
    {
        $format = $request->input('format');
        $day = $request->input('day');
        $month = $request->input('month');
        $quarter = $request->input('quarter');
        $year = $request->input('year');

        if($format == 'd'){
            $format_text = "Date : " . Carbon::parse($day)->format("F d, Y");
            $carData = DB::table('carwash')
                ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                            seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                ->where('paid','1')
                ->where('dateOfService', '=', $day)
                ->get();

            $total = 0;
            foreach ($carData as $key => $value) {
                $total += $carData[$key]->totalAmount;
            }
        }
        
        if($format == 'mo'){
            $dateObj   = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');

            $format_text = $monthName . " (" . $year . ")";
            $carData = DB::table('carwash')
                ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                            seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                ->where('paid','1')
                ->whereMonth('dateOfService', '=', $month)
                ->whereYear('dateOfService', '=', $year)
                ->get();

            $total = 0;
            foreach ($carData as $key => $value) {
                $total += $carData[$key]->totalAmount;
            }
        }

        if($format == 'qtr'){
            
            if($quarter == '1'){
                $format_text = "1st Quarter". " (" . $year . ")";
                $carData = DB::table('carwash')
                    ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                                seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                    ->where(function ($query){
                        $query->whereMonth('dateOfService', '=', '01')
                            ->orWhereMonth('dateOfService', '=', '02')
                            ->orWhereMonth('dateOfService', '=', '03');    
                            })
                    ->where('paid','1')
                    ->whereYear('dateOfService', '=', $year)
                    ->get();

                $total = 0;
                foreach ($carData as $key => $value) {
                    $total += $carData[$key]->totalAmount;
                }
            }else if($quarter == '2'){
                $format_text = "2nd Quarter". " (" . $year . ")";
                $carData = DB::table('carwash')
                    ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                                seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                    ->where(function ($query){
                        $query->whereMonth('dateOfService', '=', '04')
                            ->orWhereMonth('dateOfService', '=', '05')
                            ->orWhereMonth('dateOfService', '=', '06');    
                            })
                    ->where('paid','1')
                    ->whereYear('dateOfService', '=', $year)
                    ->get();

                $total = 0;
                foreach ($carData as $key => $value) {
                    $total += $carData[$key]->totalAmount;
                }
            }else if($quarter == '3'){
                $format_text = "3rd Quarter". " (" . $year . ")";
                $carData = DB::table('carwash')
                    ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                                seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                    ->where(function ($query){
                        $query->whereMonth('dateOfService', '=', '07')
                            ->orWhereMonth('dateOfService', '=', '08')
                            ->orWhereMonth('dateOfService', '=', '09');    
                            })
                    ->where('paid','1')
                    ->whereYear('dateOfService', '=', $year)
                    ->get();

                $total = 0;
                foreach ($carData as $key => $value) {
                    $total += $carData[$key]->totalAmount;
                }
            }else if($quarter == '4'){
                $format_text = "4th Quarter". " (" . $year . ")";
                $carData = DB::table('carwash')
                    ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                                seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                    ->where(function ($query){
                        $query->whereMonth('dateOfService', '=', '10')
                            ->orWhereMonth('dateOfService', '=', '11')
                            ->orWhereMonth('dateOfService', '=', '12');    
                            })
                    ->where('paid','1')
                    ->whereYear('dateOfService', '=', $year)
                    ->get();

                $total = 0;
                foreach ($carData as $key => $value) {
                    $total += $carData[$key]->totalAmount;
                }
            }
        }

        if($format == 'yr'){
            $format_text = "Year : ". $year;
            $carData = DB::table('carwash')
                    ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                                seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                    ->where('paid','1')
                    ->whereYear('dateOfService', '=', $year)
                    ->get();

                $total = 0;
                foreach ($carData as $key => $value) {
                    $total += $carData[$key]->totalAmount;
                }
        }

        $totalIncome = $total;

        $totalIncomeOwner = $totalIncome * (0.70);
        $totalIncomeEmployee = $totalIncome * (0.30);
        

        return view('others.shares', compact('format_text', 'ownerAm',
                                             'empAm', 'ownerPm', 
                                             'empPm', 'totalIncomeOwner', 
                                             'totalIncomeEmployee', 'totalIncome'));
    }
}