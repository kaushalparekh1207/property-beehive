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
use App\Models\PropertyType;
use App\Models\ResidentialProperty;
use App\Models\PropertyBathroomImage;
use App\Models\PropertyBedroomImage;
use App\Models\PropertyFloorPlanImage;
use App\Models\PropertyMasterPlanImage;
use App\Models\PropertySiteViewImage;
use App\Models\PropertyLivingRoomImage;
use App\Models\PropertyKitchenImage;
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

    public function propertydetails(Request $request, $id, $type, $name, $owner)
    {
        if ($type == 1) {
            $properties_details = PropertyMaster::findOrFail($id);
            $allDetails = ResidentialProperty::where('property_master_id', $id)->first();
            $amenities = PropertyAmenities::join('amenities', 'amenities.id', '=', 'property_amenities.amenities_id')
                ->where('property_amenities.property_master_id', $id)
                ->get();
            $client_data = User::where('client_master.id', $owner)
                ->join('cities', 'cities.id', '=', 'client_master.city_id')
                ->join('states', 'states.id', '=', 'client_master.state_id')
                ->where('client_master.flag', 1)
                ->select('client_master.*', 'cities.city', 'states.state')
                ->first();
            $master_plan_images = PropertyMasterPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $site_view_images = PropertySiteViewImage::where('property_master_id', $id)->where('flag', 1)->get();
            $floor_plan_images = PropertyFloorPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $living_room_images = PropertyLivingRoomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bedroom_images = PropertyBedroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bathroom_images = PropertyBathroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $kitchen_images = PropertyKitchenImage::where('property_master_id', $id)->where('flag', 1)->get();
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type', 'floor_plan_images', 'living_room_images', 'bedroom_images', 'bathroom_images', 'kitchen_images'));
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
            $floor_plan_images = PropertyFloorPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $living_room_images = PropertyLivingRoomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bedroom_images = PropertyBedroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bathroom_images = PropertyBathroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $kitchen_images = PropertyKitchenImage::where('property_master_id', $id)->where('flag', 1)->get();
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type', 'floor_plan_images', 'living_room_images', 'bedroom_images', 'bathroom_images', 'kitchen_images'));
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
            $floor_plan_images = PropertyFloorPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $living_room_images = PropertyLivingRoomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bedroom_images = PropertyBedroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bathroom_images = PropertyBathroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $kitchen_images = PropertyKitchenImage::where('property_master_id', $id)->where('flag', 1)->get();
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type', 'floor_plan_images', 'living_room_images', 'bedroom_images', 'bathroom_images', 'kitchen_images'));
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
            $floor_plan_images = PropertyFloorPlanImage::where('property_master_id', $id)->where('flag', 1)->get();
            $living_room_images = PropertyLivingRoomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bedroom_images = PropertyBedroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $bathroom_images = PropertyBathroomImage::where('property_master_id', $id)->where('flag', 1)->get();
            $kitchen_images = PropertyKitchenImage::where('property_master_id', $id)->where('flag', 1)->get();
            return view('front.property-details', compact('properties_details', 'allDetails', 'amenities', 'client_data', 'master_plan_images', 'site_view_images', 'type', 'floor_plan_images', 'living_room_images', 'bedroom_images', 'bathroom_images', 'kitchen_images'));
        }
    }

    public function propertyResultSearch(Request $request, $type = null, $city = null)
    {
        $city_id = $request->city_id;
        $taluka_id = $request->taluka_id;
        $type_id = $request->property_type_id;
        $category_id = $request->property_category_id;

        if ($type_id && $city_id && $taluka_id == null && $category_id == null)
        {

            $property_master = PropertyMaster::where('property_type_id',$type_id)->where('city_id', $city_id)->get();
            // echo $property_master;
            foreach($property_master as $property){
                // echo 'Property Mastre :->'.$property->id. '</br>';
                $commercial_property = CommercialProperty::where('property_master_id', $property->id)->get();
                $residential_property = ResidentialProperty::where('property_master_id', $property->id)->get();
                $industrial_property = IndustrialProperty::where('property_master_id', $property->id)->get();
                $agriculture_property = AgriculturalProperty::where('property_master_id', $property->id)->get();
                // echo $residential_property;
                foreach($residential_property as $residential){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($residential->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                            ->where('property_masters.flag', 1)
                            ->where('residential_properties.flag', 1)
                            ->where('property_masters.city_id', $city_id)
                            ->where('property_masters.property_type_id',$type_id)
                            ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
                    }
                }
                foreach($commercial_property as $commercialy){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($commercialy->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($agriculture_property as $agriculture){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($agriculture->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
            }
        }
        elseif ($type_id && $city_id && $taluka_id && $category_id == null)
        {

            $property_master = PropertyMaster::where('property_type_id',$type_id)->where('city_id', $city_id)->where('taluka_id',$taluka_id)->get();
            // echo $property_master;
            foreach($property_master as $property){
                // echo 'Property Mastre :->'.$property->id. '</br>';
                $commercial_property = CommercialProperty::where('property_master_id', $property->id)->get();
                $residential_property = ResidentialProperty::where('property_master_id', $property->id)->get();
                $industrial_property = IndustrialProperty::where('property_master_id', $property->id)->get();
                $agriculture_property = AgriculturalProperty::where('property_master_id', $property->id)->get();
                // echo $residential_property;
                foreach($residential_property as $residential){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($residential->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                            ->where('property_masters.flag', 1)
                            ->where('residential_properties.flag', 1)
                            ->where('property_masters.city_id', $city_id)
                            ->where('property_masters.taluka_id', $taluka_id)
                            ->where('property_masters.property_type_id',$type_id)
                            ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
                    }
                }
                foreach($commercial_property as $commercialy){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($commercialy->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($agriculture_property as $agriculture){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($agriculture->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
            }
        }
        elseif ($type_id && $city_id && $taluka_id == null && $category_id)
        {

            $property_master = PropertyMaster::where('property_type_id',$type_id)->where('city_id', $city_id)->where('property_category_id', $category_id)->get();
            // echo $property_master;
            foreach($property_master as $property){
                // echo 'Property Mastre :->'.$property->id. '</br>';
                $commercial_property = CommercialProperty::where('property_master_id', $property->id)->get();
                $residential_property = ResidentialProperty::where('property_master_id', $property->id)->get();
                $industrial_property = IndustrialProperty::where('property_master_id', $property->id)->get();
                $agriculture_property = AgriculturalProperty::where('property_master_id', $property->id)->get();
                // echo $residential_property;
                foreach($residential_property as $residential){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($residential->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                            ->where('property_masters.flag', 1)
                            ->where('residential_properties.flag', 1)
                            ->where('property_masters.city_id', $city_id)
                            ->where('property_masters.property_category_id', $category_id)
                            ->where('property_masters.property_type_id',$type_id)
                            ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
                    }
                }
                foreach($commercial_property as $commercialy){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($commercialy->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($agriculture_property as $agriculture){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($agriculture->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
            }
        }
        else
        {
            $property_master = PropertyMaster::where('property_type_id',$type_id)->where('city_id', $city_id)->where('property_category_id', $category_id)->where('taluka_id',$taluka_id)->get();
            // echo $property_master . "</br>"; exit;
            foreach($property_master as $property){
                // echo 'Property Mastre :->'.$property->id. '</br>';
                $commercial_property = CommercialProperty::where('property_master_id', $property->id)->get();
                $residential_property = ResidentialProperty::where('property_master_id', $property->id)->get();
                $industrial_property = IndustrialProperty::where('property_master_id', $property->id)->get();
                $agriculture_property = AgriculturalProperty::where('property_master_id', $property->id)->get();
                // echo $residential_property;
                foreach($residential_property as $residential){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($residential->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                            ->where('property_masters.flag', 1)
                            ->where('residential_properties.flag', 1)
                            ->where('property_masters.city_id', $city_id)
                            ->where('property_masters.taluka_id', $taluka_id)
                            ->where('property_masters.property_category_id', $category_id)
                            ->where('property_masters.property_type_id',$type_id)
                            ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
                    }
                }
                foreach($commercial_property as $commercialy){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($commercialy->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($industrial_property as $industrial){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($industrial->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
                foreach($agriculture_property as $agriculture){
                    // echo 'Residential :->'.$residential->property_master_id. "<br/>";
                    if ($agriculture->property_master_id == $property->id) {
                        $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->where('property_masters.property_type_id',$type_id)
                    ->get(['property_masters.cover_image','property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
                    }
                }
            }
        }

        // echo $resultSearch;
        // exit;
        $count = PropertyMaster::where('flag', 1)->count();
        return view('front.property-result', compact('resultSearch', 'count', 'type_id', 'city_id', 'taluka_id', 'category_id'));
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
