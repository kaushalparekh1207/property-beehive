<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalProperty;
use App\Models\City;
use App\Models\CommercialProperty;
use App\Models\IndustrialProperty;
use App\Models\PropertyMaster;
use App\Models\PropertyType;
use App\Models\ResidentialProperty;
use App\Models\Taluka;
use Illuminate\Http\Request;

class RentPropertyController extends Controller
{
    public function rent()
    {
        $properties = PropertyMaster::where('flag', 1)->where('property_status', 'Rent/Lease')->get();
        $city = City::where('flag', 1)->get(['id', 'city']);
        $taluka = Taluka::where('flag', 1)->get(['id', 'taluka']);
        $propertyType = PropertyType::where('flag', 1)->get(['id', 'property_type']);
        return view('front.rent', compact('properties', 'city', 'propertyType', 'taluka'));
    }

    public function searchRentProperty(Request $request)
    {
        $rent = $request->rent;
        $city_id = $request->city_id;
        $taluka_id = $request->taluka_id;
        $type_id = $request->property_type_id;
        $category_id = $request->property_category_id;

        // echo $rent . "<br/>" . $city_id . "<br/>" . $taluka_id . "<br/>" . $type_id . "<br/>" . $category_id;
        // exit;

        if ($city_id && $taluka_id == null && $type_id && $category_id) {

            $property_master = PropertyMaster::where('property_type_id', $type_id)->pluck('id')->first();
            $commercial_property = CommercialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $industrial_property = IndustrialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $agriculture_property = AgriculturalProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

            if ($commercial_property == $property_master) {
                $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
            } elseif ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } else {
                $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            }

        } elseif ($city_id && $taluka_id && $type_id && $category_id == null) {
            $property_master = PropertyMaster::where('property_type_id', $type_id)->pluck('id')->first();
            $commercial_property = CommercialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $industrial_property = IndustrialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $agriculture_property = AgriculturalProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

            if ($commercial_property == $property_master) {
                $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
            } elseif ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } else {
                $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            }

        } elseif ($city_id && $taluka_id == null && $type_id && $category_id == null) {
            $property_master = PropertyMaster::where('property_type_id', $type_id)->pluck('id')->first();
            $commercial_property = CommercialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $industrial_property = IndustrialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $agriculture_property = AgriculturalProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

            if ($commercial_property == $property_master) {
                $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
            } elseif ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } else {
                $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            }

        } else {

            $property_master = PropertyMaster::where('property_type_id', $type_id)->where('city_id', $city_id)->pluck('id')->first();
            $commercial_property = CommercialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $residential_property = ResidentialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $industrial_property = IndustrialProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();
            $agriculture_property = AgriculturalProperty::where('property_master_id', $property_master)->pluck('property_master_id')->first();

            if ($commercial_property == $property_master) {
                $resultSearch = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id', $type_id)                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.furnished_status', 'commercial_properties.carpet_area', 'commercial_properties.property_master_id', 'commercial_properties.age', 'property_masters.client_master_id']);
            } elseif ($residential_property == $property_master) {
                $resultSearch = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id']);
            } elseif ($industrial_property == $property_master) {
                $resultSearch = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            } else {
                $resultSearch = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_masters.property_status', $rent)
                    ->where('property_masters.city_id', $city_id)
                    ->where('property_masters.taluka_id', $taluka_id)
                    ->where('property_masters.property_type_id', $type_id)
                    ->where('property_masters.property_category_id', $category_id)
                    ->get(['property_masters.expected_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.client_master_id']);
            }

        }

        // echo $resultSearch; exit;
        $count = PropertyMaster::where('flag', 1)->count();

        return view('front.property-result', compact('resultSearch', 'count', 'category_id', 'city_id'));
    }

    public function furnishedHomes(){
        $properties = PropertyMaster::where('flag', 1)->where('property_status', '=', 'Rent/Lease')->get();
        return view('front.rent_furnished_homes', compact('properties'));
    }

    public function showFurnishedHomes(Request $request){
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        $totalRecords = PropertyMaster::select('count(*) as allcount')
            ->join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('property_status', '=', 'Rent/Lease')
            // ->where('property_masters.name_of_project','like', '%'. $searchValue . '%')
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            ->where('property_categories.flag', 1)
            ->count();

        $totalRecordswithFilter = PropertyMaster::select('count(*) as allcount')
            ->join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('property_status', '=', 'Rent/Lease')
            ->where('client_master.flag', 1)
            // ->where('property_masters.name_of_project','like', '%'. $searchValue . '%')
            ->where('property_masters.flag', 1)
            ->where('property_categories.flag', 1)
            ->count();

        // Fetch records
        $records = PropertyMaster::join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('property_status', '=', 'Rent/Lease')
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            // ->where('property_masters.name_of_project','like', '%'. $searchValue . '%')
            ->where('property_categories.flag', 1)
            ->select('property_masters.display_price','property_masters.id', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.locality', 'property_categories.property_category_name', 'property_masters.cover_image', 'property_masters.property_type_id','property_masters.client_master_id')
            ->get();

        $data_arr = array();
        foreach ($records as $record) {

            if ($record->cover_image == null || $record->cover_image == '') {
                $path = asset('storage/property/no-photo.png');
            } else {
                $path = asset('storage/property/banner_image/' . $record->cover_image);
            }

            $residential_property = ResidentialProperty::where('flag', 1)
            ->where('furnished_status', '=', 'Fully Furnished')
            ->get();
            foreach($residential_property as $residential){
                if($record->id == $residential->property_master_id) {

                    $data_arr[] = array(
                        "show" => '<div id="cell" class="row gx-3 gy-4">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="veshm-list-prty">
                                    <div class="veshm-list-prty-figure1">
                                        <div class="veshm-list-img-slide">
                                            <div class="veshm-list-click">
                                                <div>
                                                    <a
                                                        href="'.route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"><img
                                                            src="'. $path .'"
                                                            class="img-fluid mx-auto"
                                                            alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="veshm-list-prty-caption">
                                        <div class="veshm-list-kygf">
                                            <div class="veshm-list-kygf-flex">
                                            <div class="veshm-type fr-sale"><span>For
                                            '. $record->property_status .'</span></div>
                                                <h5 class="rlhc-title-name verified">
                                                    <a
                                                        href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'">'.$record->name_of_project.'</a>
                                                </h5>
                                                <div class="vesh-aget-rates">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <span class="resy-98">322 Reviews</span>
                                                </div>
                                            </div>
                                            <div class="veshm-list-head-flex">
                                                <button class="btn btn-like active"
                                                    type="button"><i
                                                        class="fa-solid fa-heart-circle-check"></i></button>
                                            </div>
                                        </div>
                                        <div class="veshm-list-middle">
                                            <div class="veshm-list-icons">
                                                <ul>

                                                    <li>

                                                    </li>
                                                    <li>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="veshm-list-footers" style="margin-top: 2%">
                                            <div class="veshm-list-ftr786">
                                                <div class="rlhc-price">
                                                    <h4 class="rlhc-price-name theme-cl">
                                                        ₹'.$record->display_price.'
                                                            <span class="monthly">/Onwards</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="veshm-list-ftr1707">
                                                <a href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"
                                                    class="btn btn-md btn-primary font--medium">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
                    );
                }
            }

            $commercial_property = CommercialProperty::where('flag', 1)
            ->where('furnished_status', '=', 'Fully Furnished')
            ->get();
            foreach($commercial_property as $commercial){
                if($record->id == $commercial->property_master_id) {

                    $data_arr[] = array(
                        "show" => '<div id="cell" class="row gx-3 gy-4">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="veshm-list-prty">
                                    <div class="veshm-list-prty-figure1">
                                        <div class="veshm-list-img-slide">
                                            <div class="veshm-list-click">
                                                <div>
                                                    <a
                                                        href="'.route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"><img
                                                            src="'. $path .'"
                                                            class="img-fluid mx-auto"
                                                            alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="veshm-list-prty-caption">
                                        <div class="veshm-list-kygf">
                                            <div class="veshm-list-kygf-flex">
                                            <div class="veshm-type fr-sale"><span>For
                                            '. $record->property_status .'</span></div>
                                                <h5 class="rlhc-title-name verified">
                                                    <a
                                                        href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'">'.$record->name_of_project.'</a>
                                                </h5>
                                                <div class="vesh-aget-rates">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <span class="resy-98">322 Reviews</span>
                                                </div>
                                            </div>
                                            <div class="veshm-list-head-flex">
                                                <button class="btn btn-like active"
                                                    type="button"><i
                                                        class="fa-solid fa-heart-circle-check"></i></button>
                                            </div>
                                        </div>
                                        <div class="veshm-list-middle">
                                            <div class="veshm-list-icons">
                                                <ul>

                                                    <li>

                                                    </li>
                                                    <li>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="veshm-list-footers" style="margin-top: 2%">
                                            <div class="veshm-list-ftr786">
                                                <div class="rlhc-price">
                                                    <h4 class="rlhc-price-name theme-cl">
                                                        ₹'.$record->display_price.'
                                                            <span class="monthly">/Onwards</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="veshm-list-ftr1707">
                                                <a href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"
                                                    class="btn btn-md btn-primary font--medium">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
                    );
                }
            }

            $industrial_property = IndustrialProperty::where('flag', 1)
                ->where('furnished_status', '=', 'Fully Furnished')
                ->get();
            foreach($industrial_property as $industrial){
                if($record->id == $industrial->property_master_id) {

                    $data_arr[] = array(
                        "show" => '<div id="cell" class="row gx-3 gy-4">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="veshm-list-prty">
                                    <div class="veshm-list-prty-figure1">
                                        <div class="veshm-list-img-slide">
                                            <div class="veshm-list-click">
                                                <div>
                                                    <a
                                                        href="'.route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"><img
                                                            src="'. $path .'"
                                                            class="img-fluid mx-auto"
                                                            alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="veshm-list-prty-caption">
                                        <div class="veshm-list-kygf">
                                            <div class="veshm-list-kygf-flex">
                                            <div class="veshm-type fr-sale"><span>For
                                            '. $record->property_status .'</span></div>
                                                <h5 class="rlhc-title-name verified">
                                                    <a
                                                        href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'">'.$record->name_of_project.'</a>
                                                </h5>
                                                <div class="vesh-aget-rates">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <span class="resy-98">322 Reviews</span>
                                                </div>
                                            </div>
                                            <div class="veshm-list-head-flex">
                                                <button class="btn btn-like active"
                                                    type="button"><i
                                                        class="fa-solid fa-heart-circle-check"></i></button>
                                            </div>
                                        </div>
                                        <div class="veshm-list-middle">
                                            <div class="veshm-list-icons">
                                                <ul>

                                                    <li>

                                                    </li>
                                                    <li>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="veshm-list-footers" style="margin-top: 2%">
                                            <div class="veshm-list-ftr786">
                                                <div class="rlhc-price">
                                                    <h4 class="rlhc-price-name theme-cl">
                                                        ₹'.$record->display_price.'
                                                            <span class="monthly">/Onwards</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="veshm-list-ftr1707">
                                                <a href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"
                                                    class="btn btn-md btn-primary font--medium">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
                    );
                }
            }

            $agriculture_property = AgriculturalProperty::where('flag', 1)
            ->where('furnished_status', '=', 'Fully Furnished')
            ->get();
            foreach($agriculture_property as $agriculture){
                if($record->id == $agriculture->property_master_id) {

                    $data_arr[] = array(
                        "show" => '<div id="cell" class="row gx-3 gy-4">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="veshm-list-prty">
                                    <div class="veshm-list-prty-figure1">
                                        <div class="veshm-list-img-slide">
                                            <div class="veshm-list-click">
                                                <div>
                                                    <a
                                                        href="'.route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"><img
                                                            src="'. $path .'"
                                                            class="img-fluid mx-auto"
                                                            alt=""
                                                            style="width: 500px; height: 300px;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="veshm-list-prty-caption">
                                        <div class="veshm-list-kygf">
                                            <div class="veshm-list-kygf-flex">
                                            <div class="veshm-type fr-sale"><span>For
                                            '. $record->property_status .'</span></div>
                                                <h5 class="rlhc-title-name verified">
                                                    <a
                                                        href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'">'.$record->name_of_project.'</a>
                                                </h5>
                                                <div class="vesh-aget-rates">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <span class="resy-98">322 Reviews</span>
                                                </div>
                                            </div>
                                            <div class="veshm-list-head-flex">
                                                <button class="btn btn-like active"
                                                    type="button"><i
                                                        class="fa-solid fa-heart-circle-check"></i></button>
                                            </div>
                                        </div>
                                        <div class="veshm-list-middle">
                                            <div class="veshm-list-icons">
                                                <ul>

                                                    <li>

                                                    </li>
                                                    <li>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="veshm-list-footers" style="margin-top: 2%">
                                            <div class="veshm-list-ftr786">
                                                <div class="rlhc-price">
                                                    <h4 class="rlhc-price-name theme-cl">
                                                        ₹'.$record->display_price.'
                                                            <span class="monthly">/Onwards</span>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="veshm-list-ftr1707">
                                                <a href="'. route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]).'"
                                                    class="btn btn-md btn-primary font--medium">View
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>',
                    );
                }
            }

        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr,
        );

        echo json_encode($response);
        exit;

    }
}
