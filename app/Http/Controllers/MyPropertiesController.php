<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyMaster;
use App\Models\ResidentialProperty;
use Illuminate\Support\Facades\DB;


class MyPropertiesController extends Controller
{
    public function showMyProperties()
    {

        $allPropertyDetails = PropertyMaster::join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('client_master_id', '=', session('user')['id'])
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            ->where('property_categories.flag', 1)
            ->get(['property_masters.id', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.expected_price', 'property_masters.locality', 'property_categories.property_category_name', 'property_masters.cover_image']);
        // echo $allPropertyDetails;
        // exit;
        return view('front.my_properties', compact('allPropertyDetails'));
    }

    public function destroyMyProperties($id)
    {
        $data = DB::table('property_masters')
            ->leftJoin('residential_properties', 'property_masters.id', '=', 'residential_properties.property_master_id')
            ->where('property_masters.id', $id);
        DB::table('residential_properties')->where('property_master_id', $id)->delete();
        $data->delete();
        return redirect()->back();
    }
}
