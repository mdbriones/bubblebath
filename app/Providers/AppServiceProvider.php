<?php

namespace App\Providers;

use App\Schedule;
use App\Stocks;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $notification = 0;
        $setSchedule = 0;
        $noSched = Schedule::where('schedule_date', Carbon::parse(now())->format("Y-m-d"))->first();

        if ($noSched == null){
            $notification += 1;
            $setSchedule = 1;
        }

        $criticalStocks = new Stocks();
        $checkStocks = Stocks::where('quantity', '<', 10)->count();
        // dd($checkStocks);
        if($checkStocks > 0){
            $notification += $checkStocks;
            $criticalStocks = Stocks::where('quantity', '<', 10)->get();
        }

        // dd($setSchedule, $checkStocks);

        View::share('notification', $notification);
        View::share('checkStocks', $checkStocks);
        View::share('criticalStocks', $criticalStocks);
        View::share('setSchedule', $setSchedule);

    }
}
