<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalProperty;
use App\Models\AgricultureProperty;
use App\Models\City;
use App\Models\CommercialProperty;
use App\Models\IndustrialProperty;
use App\Models\PropertyMaster;
use App\Models\PropertyType;
use App\Models\ResidentialProperty;
use App\Models\Taluka;
use Illuminate\Http\Request;

class PGPropertyController extends Controller
{
    public function pg()
    {
        $properties = PropertyMaster::where('flag', 1)->where('property_status', 'PG/Hostel')->get();
        $city = City::where('flag', 1)->get(['id', 'city']);
        $taluka = Taluka::where('flag', 1)->get(['id', 'taluka']);
        $propertyType = PropertyType::where('flag', 1)->where('id',1)->get(['id', 'property_type']);
        return view('front.pg', compact('properties', 'city', 'propertyType', 'taluka'));
    }

    public function searchPGProperty(Request $request)
    {
        $pg = $request->pg;
        $city_id = $request->city_id;
        $taluka_id = $request->taluka_id;
        $type_id = $request->property_type_id;
        $category_id = $request->property_category_id;

        // echo $pg . "<br/>" . $city_id . "<br/>" . $taluka_id . "<br/>" . $type_id . "<br/>" . $category_id;
        // exit;

        if ($city_id && $taluka_id == null && $type_id && $category_id) {

            $property_master = PropertyMaster::where('property_type_id', $type_id)->pluck('id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
             if ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.property_status', $pg)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            }

        } elseif ($city_id && $taluka_id && $type_id && $category_id == null) {
            $property_master = PropertyMaster::where('property_type_id', $type_id)->pluck('id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

             if ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.property_status', $pg)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            }

        }
        else {

            $property_master = PropertyMaster::where('property_type_id', $type_id)->where('city_id', $city_id)->pluck('id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

            if ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.property_status', $pg)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            }

        }

        // echo $resultSearch; exit;
        $count = PropertyMaster::where('flag', 1)->count();

        return view('front.property-result', compact('resultSearch', 'count', 'category_id', 'city_id'));
    }
}
