<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Stocks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('carwashInformation');
    }

    public function adminHome()
    {
        return view('home');
    }
}
