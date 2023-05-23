<?php

use App\Models\City;
use App\Models\PropertyCategory;

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
