<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CommercialProperty;
use App\Models\Inquiry;
use App\Models\PropertyAmenities;
use App\Models\PropertyCategory;
use App\Models\PropertyMaster;
use App\Models\ResidentialProperty;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.cover_image', 'property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.client_master_id']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
        return view('front.index', compact('properties', 'city', 'propertyType'));
    }

    public function buy()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.client_master_id']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
        return view('front.buy', compact('properties', 'city', 'propertyType'));
    }
    public function rent()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.client_master_id']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
        return view('front.rent', compact('properties', 'city', 'propertyType'));
    }

    public function pg()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.client_master_id']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
        // $propertyType = PropertyCategory::join('property_types', 'property_types.id', '=', 'property_categories.property_type_id')
        //     ->where('property_types.property_type', '=', 'PG/Hostel')
        //     ->where('property_types.flag', 1)
        //     ->where('property_categories.flag', 1)
        //     ->get(['property_categories.id', 'property_categories.property_category_name']);
        //     echo $propertyType; exit;
        return view('front.pg', compact('properties', 'city', 'propertyType'));
    }
    public function land()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.client_master_id']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
        return view('front.land', compact('properties', 'city', 'propertyType'));
    }
    public function commercial()
    {
        $properties = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
            // ->join('commercial_properties','commercial_properties.property_master_id', '=', 'property_masters.id')->join('industrial_properties','industrial_properties.property_master_id', '=', 'property_masters.id')

            ->where('property_masters.flag', 1)
            ->where('residential_properties.flag', 1)
            ->get(['property_masters.expected_price', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.client_master_id']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $propertyType = PropertyCategory::where('flag', 1)->get(['id', 'property_category_name']);
        return view('front.commercial', compact('properties', 'city', 'propertyType'));
    }


    public function propertydetails(Request $request, $id, $type, $name, $owner)
    {
        if ($type == 1) {
            $propertis_details = PropertyMaster::findOrFail($id);
            $allDetails = ResidentialProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::where('property_amenities.property_master_id', $id)
                ->join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')->get();
            $client_data = User::where('client_master.id', $owner)
                ->join('cities', 'cities.id', '=', 'client_master.city_id')
                ->join('states', 'states.id', '=', 'client_master.state_id')
                ->where('client_master.flag', 1)
                ->select('client_master.*', 'cities.city', 'states.state')
                ->first();
            // echo '<pre>';
            // print_r($client_data);
            // echo '</pre>';exit;
            return view('front.property-details', compact('propertis_details', 'allDetails', 'amenities', 'client_data'));
        } elseif ($type == 2) {

            $propertis_details = PropertyMaster::findOrFail($id);
            $allDetails = CommercialProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::where('property_amenities.property_master_id', $id)
                ->join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')->get();
            $client_data = User::where('client_master.id', $owner)
                ->join('cities', 'cities.id', '=', 'client_master.city_id')
                ->join('states', 'states.id', '=', 'client_master.state_id')
                ->where('client_master.flag', 1)
                ->select('client_master.*', 'cities.city', 'states.state')
                ->first();
            return view('front.property-details', compact('propertis_details', 'allDetails', 'amenities', 'client_data'));
        }
    }
    public function propertyResultSearch(Request $request, $type = null, $city = null)
    {
        $category_id = $request->property_type_id;
        $city_id = $request->city_id;

        if ($category_id && $city_id == null) {
            $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                ->where('property_masters.flag', 1)
                ->where('residential_properties.flag', 1)
                // ->where('city_id', $city_id)
                ->where('property_category_id', $category_id)
                ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
        } elseif ($category_id == null && $city_id) {
            $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                ->where('property_masters.flag', 1)
                ->where('residential_properties.flag', 1)
                ->where('city_id', $city_id)
                // ->where('property_category_id', $category_id)
                ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
        } else {
            $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                ->where('property_masters.flag', 1)
                ->where('residential_properties.flag', 1)
                ->where('city_id', $city_id)
                ->where('property_category_id', $category_id)
                ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
        }
        $count = PropertyMaster::where('flag', 1)->count();
        // echo $resultSearch;
        // exit;
        return view('front.property-result', compact('resultSearch', 'count', 'category_id', 'city_id'));
    }

    public function inquiryDetails(Request $request)
    {

        $inquirydata = new Inquiry();
        $inquirydata->client_master_id = $request->client_master_id;
        // $client_name = User::where('id', $request->client_master_id)->pluck('name')->first();
        $inquirydata->property_master_id = $request->property_master_id;
        $propertis_name = PropertyMaster::where('id', $request->property_master_id)->pluck('name_of_project')->first();
        $name = session('user')['name'];
        $inquirydata->inqury_type = $propertis_name . ' Property Inquiry By ' . $name;
        $inquirydata->name = $request->name;
        $inquirydata->contact = $request->contact_no;
        $inquirydata->email = $request->email;
        $saveData = $inquirydata->save();

        if ($saveData) {
            toastr()->success('Message Send Successfully !');
        } else {
            toastr()->error('Something went Wrong !');
        }

        return redirect()->back();
    }

    public function showInquiryList()
    {
        $InquiryList = Inquiry::join('client_master', 'client_master.id', '=', 'inquiries.client_master_id')
            ->join('property_masters', 'property_masters.id', '=', 'inquiries.property_master_id')
            ->where('inquiries.client_master_id', '=', session('user')['id'])
            ->where('inquiries.flag', 1)
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            ->get(['inquiries.name', 'inquiries.contact', 'inquiries.email', 'property_masters.name_of_project',]);

        // echo $InquiryList;
        // exit;
        return view('front.inquiry_property_list', compact('InquiryList'));
    }
}
