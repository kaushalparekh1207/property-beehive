<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PropertyMaster;
use App\Models\City;

class FrontController extends Controller
{
    public function index()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        return view('front.index', compact('properties', 'city'));
    }
}
