<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgricultureProperty;
use App\Models\Amenities;
use App\Models\City;
use App\Models\NonAgricultureProperty;
use App\Models\PropertyMaster;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.property_listing');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenities::where('flag', 1)->get();
        $states = State::where('flag', 1)->get();
        $cities = City::where('flag', 1)->get();
        $agriculturePropertyData = AgricultureProperty::where('flag', 1)->get(['id', 'a_property_name']);
        $nonAgriculturePropertyData = NonAgricultureProperty::where('flag', 1)->distinct()->get(['id', 'na_property_type']);
        return view('admin.property_add', compact('agriculturePropertyData', 'nonAgriculturePropertyData', 'states', 'cities', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Fetch Property Data
     */
    public function fetchProperty(Request $request)
    {
        $property_id = $request->property_id;
        if ($property_id == 1) {
            $data['property_type'] = DB::table('agriculture_properties')->where("flag", 1)->distinct()->get(['id', 'a_property_name']);
            return response()->json($data);
        } else {
            $data['property_type'] = DB::table('non_agriculture_property_types')->where("flag", 1)->get(['id', 'na_property_type']);
            return response()->json($data);
        }
    }
}
