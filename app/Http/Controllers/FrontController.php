<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalProperty;
use App\Models\City;
use App\Models\CommercialProperty;
use App\Models\IndustrialProperty;
use App\Models\Inquiry;
use App\Models\PropertyAmenities;
use App\Models\PropertyCategory;
use App\Models\PropertyMaster;
use App\Models\PropertyMasterPlanImage;
use App\Models\PropertySiteViewImage;
use App\Models\PropertyType;
use App\Models\ResidentialProperty;
use App\Models\Taluka;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $properties = PropertyMaster::where('flag', 1)->get();
        $city = City::where('flag', 1)->get(['id', 'city']);
        $taluka = Taluka::where('flag', 1)->get(['id', 'taluka']);
        $propertyType = PropertyType::where('flag', 1)->get(['id', 'property_type']);
        return view('front.index', compact('properties', 'city', 'propertyType', 'taluka'));
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
            $properties_details = PropertyMaster::findOrFail($id);
            $allDetails = ResidentialProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::where('property_amenities.property_master_id', $id)
                ->join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')->get();
            $client_data = User::where('client_master.id', $owner)
                ->join('cities', 'cities.id', '=', 'client_master.city_id')
                ->join('states', 'states.id', '=', 'client_master.state_id')
                ->where('client_master.flag', 1)
                ->select('client_master.*', 'cities.city', 'states.state')
                ->first();
            $master_plan_images = PropertyMasterPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $site_view_images = PropertySiteViewImage::where('property_master_id', $id)->where('flag', 1)->get();
            // $types = $type;
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type'));
        } elseif ($type == 2) {

            $properties_details = PropertyMaster::findOrFail($id);
            $allDetails = CommercialProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::where('property_amenities.property_master_id', $id)
                ->join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')->get();
            $client_data = User::where('client_master.id', $owner)
                ->join('cities', 'cities.id', '=', 'client_master.city_id')
                ->join('states', 'states.id', '=', 'client_master.state_id')
                ->where('client_master.flag', 1)
                ->select('client_master.*', 'cities.city', 'states.state')
                ->first();
            $master_plan_images = PropertyMasterPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $site_view_images = PropertySiteViewImage::where('property_master_id', $id)->where('flag', 1)->get();
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type'));
        } elseif ($type == 3) {

            $properties_details = PropertyMaster::findOrFail($id);
            $allDetails = IndustrialProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::where('property_amenities.property_master_id', $id)
                ->join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')->get();
            $client_data = User::where('client_master.id', $owner)
                ->join('cities', 'cities.id', '=', 'client_master.city_id')
                ->join('states', 'states.id', '=', 'client_master.state_id')
                ->where('client_master.flag', 1)
                ->select('client_master.*', 'cities.city', 'states.state')
                ->first();
            $master_plan_images = PropertyMasterPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $site_view_images = PropertySiteViewImage::where('property_master_id', $id)->where('flag', 1)->get();
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type'));
        } elseif ($type == 4) {

            $properties_details = PropertyMaster::findOrFail($id);
            $allDetails = AgriculturalProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::where('property_amenities.property_master_id', $id)
                ->join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')->get();
            $client_data = User::where('client_master.id', $owner)
                ->join('cities', 'cities.id', '=', 'client_master.city_id')
                ->join('states', 'states.id', '=', 'client_master.state_id')
                ->where('client_master.flag', 1)
                ->select('client_master.*', 'cities.city', 'states.state')
                ->first();
            $master_plan_images = PropertyMasterPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $site_view_images = PropertySiteViewImage::where('property_master_id', $id)->where('flag', 1)->get();
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type'));
        }
    }
    public function propertyResultSearch(Request $request, $type = null, $city = null)
    {
        $category_id = $request->property_type_id;
        $city_id = $request->city_id;
        $taluka_id = $request->taluka_id;
        // $min_price = $request->min_price_id;
        // $max_price = $request->max_price_id;

        // echo $min_price . "</br>". $max_price; exit;

        if ($category_id && $city_id && $taluka_id == null) {

            $property_master = PropertyMaster::where('property_category_id', $category_id)->pluck('id')->first();
            $commercial_property = CommercialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $industrial_property = IndustrialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $agriculture_property = AgriculturalProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

            if ($commercial_property == $property_master) {
                $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
            } elseif ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } else {
                $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            }
        }
        // elseif ($category_id && $city_id ) {

        //     $property_master = PropertyMaster::where('city_id', $city_id)->pluck('id')->first();
        //     $commercial_property = CommercialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
        //     $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
        //     $industrial_property = IndustrialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
        //     $agriculture_property = AgriculturalProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

        //     if ($commercial_property == $property_master) {
        //         $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
        //             ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
        //             ->where('property_masters.flag', 1)
        //             ->where('commercial_properties.flag', 1)
        //             ->where('property_masters.city_id', $city_id)
        //             // ->where('property_category_id', $category_id)
        //             ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
        //     } elseif ($residential_property == $property_master) {
        //         $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
        //             ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
        //             ->where('property_masters.flag', 1)
        //             ->where('residential_properties.flag', 1)
        //             ->where('property_masters.city_id', $city_id)
        //             // ->where('property_category_id', $category_id)
        //             ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
        //     } elseif ($industrial_property == $property_master) {
        //         $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
        //             ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
        //             ->where('property_masters.flag', 1)
        //             ->where('industrial_properties.flag', 1)
        //             ->where('property_masters.city_id', $city_id)
        //             // ->where('property_category_id', $category_id)
        //             ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
        //     } elseif ($industrial_property == $property_master) {
        //         $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
        //             ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
        //             ->where('property_masters.flag', 1)
        //             ->where('industrial_properties.flag', 1)
        //             ->where('property_masters.city_id', $city_id)
        //             // ->where('property_category_id', $category_id)
        //             ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
        //     } else {
        //         $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
        //             ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
        //             ->where('property_masters.flag', 1)
        //             ->where('agricultural_properties.flag', 1)
        //             ->where('property_masters.city_id', $city_id)
        //             // ->where('property_category_id', $category_id)
        //             ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
        //     }
        // }
        else {

            $property_master = PropertyMaster::where('property_category_id', $category_id)->where('city_id', $city_id)->pluck('id')->first();
            $commercial_property = CommercialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $industrial_property = IndustrialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $agriculture_property = AgriculturalProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

            if ($commercial_property == $property_master) {
                $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
            } elseif ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } else {
                $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            }
        }
        $count = PropertyMaster::where('flag', 1)->count();
        // echo $resultSearch;
        // exit;
        return view('front.property-result', compact('resultSearch', 'count', 'category_id', 'city_id', 'taluka_id'));
    }

    public function inquiryDetails(Request $request)
    {

        $inquirydata = new Inquiry();
        $inquirydata->client_master_id = $request->client_master_id;
        // $client_name = User::where('id', $request->client_master_id)->pluck('name')->first();
        $inquirydata->property_master_id = $request->property_master_id;
        $propertis_name = PropertyMaster::where('id', $request->property_master_id)->pluck('name_of_project')->first();
        $inquirydata->inqury_type = $propertis_name . ' Property Inquiry By ' . session('user')['name'];
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
            ->get(['inquiries.name', 'inquiries.contact', 'inquiries.email', 'property_masters.name_of_project']);

        // echo $InquiryList;
        // exit;
        return view('front.inquiry_property_list', compact('InquiryList'));
    }

}
