<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyMaster;
use App\Models\ResidentialProperty;


class MyPropertiesController extends Controller
{
    public function showMyProperties()
    {

        $allPropertyDetails = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            ->join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('client_master_id', '=', session('user')['id'])
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->where('property_categories.flag', 1)
            ->get(['property_masters.name_of_project', 'property_masters.property_status', 'property_masters.expected_price', 'property_masters.locality', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_categories.property_category_name', 'property_masters.cover_image']);
        // echo $allPropertyDetails;
        // exit;
        return view('front.my_properties', compact('allPropertyDetails'));
    }
}
