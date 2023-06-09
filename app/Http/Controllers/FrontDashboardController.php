<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontDashboardController extends Controller
{
    public function dashboard()
    {
        return view('front.dashboard');
    }
    public function price()
    {
        return view('front.our_packages');
    }
}
