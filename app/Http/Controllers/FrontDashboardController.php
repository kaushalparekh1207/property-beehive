<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscription;

class FrontDashboardController extends Controller
{
    public function dashboard()
    {
        return view('front.dashboard');
    }
    public function price()
    {
        $packages = Subscription::where('flag', 1)->get();
        return view('front.our_packages', compact('packages'));
    }
}