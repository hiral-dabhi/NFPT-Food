<?php

namespace App\Http\Controllers;

use App\Models\RestaurantMaster;
use App\Models\User;
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
        $restaurantCount = RestaurantMaster::count();
        $driverCount = User::role('DeliveryDriver')->count();
        return view('dashboard',compact('restaurantCount','driverCount'));
    }
}
