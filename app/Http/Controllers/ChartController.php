<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getChartData()
    {
        $data1 = array();
        $data2 = array();
        $returnedArray = array();
        for($mo = 1; $mo <= 12; $mo++){
            if ($mo < 9) 
                $month = "0" + $mo;
            else 
               $month = $mo;

            $chartData = DB::table('carwash')
                ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                            seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                ->where('paid','1')
                ->whereMonth('dateOfService', '=', $month)
                ->whereYear('dateOfService', '=', Carbon::parse(now())->format("Y"))
                ->get();

            $total = 0;
            foreach ($chartData as $key => $value) {
                $total += $chartData[$key]->totalAmount;
            }
            array_push($data1, $total);

            $chartDataShop = DB::table('shop')
                            ->where('paid','1')
                            ->whereMonth('date_', '=', $month)
                            ->whereYear('date_', '=', Carbon::parse(now())->format("Y"))
                            ->take(5)
                            ->get();
            $total1 = 0;
            foreach($chartDataShop as $key=>$value){
                $total1 += $chartDataShop[$key]->service_amount_;
            }
            array_push($data2, $total1);
        }
        $returnedArray = [$data1, $data2];
        return $returnedArray;
    }

    public function getReceivablesCarwash()
    {
        $chartData = DB::table('carwash')
                ->selectRaw('*, (bodyWash + handWax + engineWash + armorAll + orbitalWax + underWash + asphaltRemoval +
                            seatCover + leatherConditioning + interior + exterior + glassDetail + engineDetail + full) as totalAmount')
                ->where('paid','0')
                ->take(5)
                ->get();
        return $chartData;
    }

    public function getReceivablesShop()
    {
        $chartData = DB::table('shop')->where('paid','0')
                            ->where('date_', '<=', now())
                            ->take(5)
                            ->get();
        foreach ($chartData as $key => $value) {
            $newDate = date("F d, Y", strtotime($chartData[$key]->date_));
            $now = time();
			$orig_date = strtotime($newDate);
			$datediff = $now - $orig_date;
            $aging = round($datediff / (60 * 60 * 24));
            $chartData[$key]->aging = $aging;
        }

        return $chartData;
    }

    public function getTodayEmployees()
    {
        $am_data = DB::table('schedules')->where('schedule_time', 'am')->where('schedule_date', Carbon::parse(now())->format("Y-m-d"))->get();

        $pm_data = DB::table('schedules')->where('schedule_time', 'pm')->where('schedule_date', Carbon::parse(now())->format("Y-m-d"))->get();

        $returnedData = array();
        $returnedData[0] = $am_data;
        $returnedData[1] = $pm_data;

        return $returnedData;
    }
}
