<?php

use App\Models\City;
use App\Models\PropertyCategory;
use App\Models\PropertyMaster;

function city()
{
    $city = City::where('flag', 1)->get(['id', 'city']);
    return $city;
}

function propertyType()
{
    $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
    return $propertyType;
}

function footer(){
    $property_id = PropertyMaster::latest()->first()->id;
    $allDetails = PropertyMaster::where('id', $property_id)->where('flag', '1')->get();
    return $allDetails;
}

