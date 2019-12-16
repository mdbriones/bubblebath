<?php

namespace App\Http\Controllers;

use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showToday()
    {
        $date_ = date("Y-m-d");
        
        return view('schedule.today', compact('date_'));
    }

    public function viewToday()
    {
        $date_ = date("Y-m-d");
        $schedules = Schedule::where('schedule_date', $date_)->get();

        return view('schedule.viewToday', compact('date_', 'schedules'));
    }

    public function storeGroup(Request $request)
    {
        $data = $request->all();
        $request->validate([
                    'schedule_date' => [
                        'required',
                        Rule::unique('schedules')->where(function ($query) use($data) {
                            $query->where('schedule_date', $data['schedule_date']);
                        })
                    ],
                    'worker.*' => 'required'
                    
                ],
                [
                    'worker.*.required' => 'Please enter the correct Name.'
                ]
            );
        $date_ = Carbon::parse(now())->format('Y-m-d');
        $data['schedule_date'] = $date_;

        foreach ($data['worker'] as $key => $value) {
            $data['name'] = $value;
            Schedule::create($data);
        }
        return redirect()->route('schedule.today')->with('message', 'Succesfully saved!');
    }

    public function getTodaySched(Request $request)
    {
        $date_ = $request->input('dateNow');

        // $morning = Schedule::where('schedule_date', $date_)->where('schedule_time', 'am')->first();
        // $afternoon = Schedule::where('schedule_date', $date_)->where('schedule_time', 'pm')->first();

        // if($morning != null)
            $data = Schedule::where('schedule_date', $date_)->get();
        // else
        //     $data_am = "null";

        // if($afternoon != null)
        //     $data_pm = Schedule::where('schedule_date', $date_)->where('schedule_time', 'pm')->get();
        // else
        //     $data_pm = "null";
        
        return view('schedule.today', compact('data', 'date_'));
    }

    public function viewEditTodaySched(Request $request)
    {
        $date_ = Carbon::parse(now())->format("Y-m-d");
        $dataView = Schedule::where('schedule_date', $date_)->get();

        return view('schedule.editToday', compact('dataView', 'date_'));
    }

    public function getWorkersToday(Request $request)
    {
        $time = $request->input('schedTime');
        $date_ = Carbon::parse(now())->format('Y-m-d');

        if($time == 'am'){
            $am_people = Schedule::where('schedule_date', $date_)->where('schedule_time', 'am')->get();
            return $am_people;
        }else if($time == 'pm'){
            $pm_people = Schedule::where('schedule_date', $date_)->where('schedule_time', 'pm')->get();
            return $pm_people;
        }
    }

    public function updateGroup(Request $request)
    {
        $data = $request->all();
        $record = Schedule::find($data['edit_id']);
        $record->name = $request->edit_name;
        $record->save();
        
        $date_ = $record->schedule_date;

        return redirect()->route('viewEditTodaySched')->with('message', 'Succesfully updated!');
    }

    public function deleteWorker(Request $request)
    {
        $row_id = $request->input('row_id');
        Schedule::destroy($row_id);
    }

    public function additionalWorker(Request $request)
    {
        $request['schedule_date'] = Carbon::parse(now())->format("Y-m-d");
        $data = $request->all();
        $data['name'] = $request['addedName'];
        
        Schedule::create($data);
    }

    public function viewPast()
    {
        $date_ = date("Y-m-d");
        return view('schedule.viewPastSched', compact('date_'));
    }

    public function getPastSched(Request $request)
    {
        $format = $request->input('format');
        $day = $request->input('day');
        $month = $request->input('month');
        $quarter = $request->input('quarter');
        $year = $request->input('year');

        if($format == 'd'){
            $carData = DB::table('carwash')->where(function ($query) use ($day){
                $query->where('dateOfService', '=', $day);
            })->get();
        }
        
        // edit pa to lahat pababa
        if($format == 'mo'){
            $carData = DB::table('carwash')->where(function ($query) use ($month, $year){
                            $query->whereMonth('dateOfService', '=', $month)
                            ->whereYear('dateOfService', '=', $year);
                        })->get();
                        // dd($data);
        }

        if($format == 'qtr'){
            if($quarter == '1'){
                $carData = DB::table('carwash')->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '01')
                                ->orWhereMonth('dateOfService', '=', '02')
                                ->orWhereMonth('dateOfService', '=', '03')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }else if($quarter == '2'){
                $carData = DB::table('carwash')->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '03')
                                ->orWhereMonth('dateOfService', '=', '05')
                                ->orWhereMonth('dateOfService', '=', '06')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }else if($quarter == '3'){
                $carData = DB::table('carwash')->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '07')
                                ->orWhereMonth('dateOfService', '=', '08')
                                ->orWhereMonth('dateOfService', '=', '09')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }else if($quarter == '4'){
                $carData = DB::table('carwash')->where(function ($query) use ($year){
                                $query->whereMonth('dateOfService', '=', '10')
                                ->orWhereMonth('dateOfService', '=', '11')
                                ->orWhereMonth('dateOfService', '=', '12')
                                ->whereYear('dateOfService', '=', $year);
                            })->get();
            }
            
        }

        if($format == 'yr'){
            $carData = DB::table('carwash')->where(function ($query) use ($year){
                            $query->whereYear('dateOfService', '=', $year);
                        })->get();
        }

        $records = $carData;
        return view('schedule.viewPastSched', compact('records'));
    }

}
