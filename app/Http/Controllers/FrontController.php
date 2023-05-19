<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\PropertyAmenities;
use App\Models\PropertyCategory;
use App\Models\PropertyMaster;
use App\Models\ResidentialProperty;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
        // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.id', 'property_masters.property_type_id']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
        return view('front.index', compact('properties', 'city', 'propertyType'));

    }

    public function propertydetails(Request $request, $id, $type, $name)
    {
        if ($type == 1) {

            $propertis_details = PropertyMaster::findOrFail($id);

            // $allResidentialDetails = ResidentialProperty::join('property_masters', 'property_masters.id', '=', 'residential_properties.property_master_id')->select('property_masters.*', 'residential_properties.*')->where('property_masters.flag', 1)->where('property_masters.property_type_id', '=', 1)->get();

            $allResidentialDetails = ResidentialProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::where('property_amenities.property_master_id', $id)
                ->join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')->get();

            // ->where('residential_properties.property_master_id', '=', $id)
            // ->where('property_masters.flag', 1)
            // ->where('residential_properties.flag', 1)
            // ->get(['residential_properties.*', 'property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms']);
            // echo '<pre>';
            // print_r($amenities);
            // echo '</pre>';exit;
            return view('front.property-details', compact('propertis_details', 'allResidentialDetails', 'amenities'));
        }
    }
    public function propertyResultSearch(Request $request, $type = null, $city = null)
    {
        $category_id = $request->property_type_id;
        $city_id = $request->city_id;

        if ($category_id && $city_id == null) {
            $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                ->where('property_masters.flag', 1)
                ->where('residential_properties.flag', 1)
            // ->where('city_id', $city_id)
                ->where('property_category_id', $category_id)
                ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area']);
        } elseif ($category_id == null && $city_id) {
            $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                ->where('property_masters.flag', 1)
                ->where('residential_properties.flag', 1)
                ->where('city_id', $city_id)
            // ->where('property_category_id', $category_id)
                ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area']);
        } else {
            $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                ->where('property_masters.flag', 1)
                ->where('residential_properties.flag', 1)
                ->where('city_id', $city_id)
                ->where('property_category_id', $category_id)
                ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area']);
        }
        $count = PropertyMaster::where('flag', 1)->count();
        // echo $resultSearch;
        // exit;
        return view('front.property-result', compact('resultSearch', 'count'));
    }
}
