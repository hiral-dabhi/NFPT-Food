<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\RestaurantMaster;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front.home');
    }
}
