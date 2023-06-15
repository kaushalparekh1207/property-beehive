<?php

use App\Models\City;
use App\Models\PropertyCategory;
use App\Models\PropertyMaster;
use App\Models\Taluka;

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

function taluka()
{
    $taluka = Taluka::where('flag', 1)->get(['id', 'taluka']);
    return $taluka;
}

function footer(){
    $allDetails = PropertyMaster::where('flag', 1)->orderBy('id', 'DESC')->limit(2)->get();
    return $allDetails;
}

