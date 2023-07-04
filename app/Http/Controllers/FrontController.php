<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalProperty;
use App\Models\City;
use App\Models\CommercialProperty;
use App\Models\IndustrialProperty;
use App\Models\Inquiry;
use App\Models\PropertyAmenities;
use App\Models\PropertyBathroomImage;
use App\Models\PropertyBedroomImage;
use App\Models\PropertyFloorPlanImage;
use App\Models\PropertyKitchenImage;
use App\Models\PropertyLivingRoomImage;
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
        $properties = PropertyMaster::where('flag', 1)->limit(10)->get(['id', 'property_status', 'cover_image', 'property_type_id', 'name_of_project', 'client_master_id', 'display_price', 'locality']);
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

    public function propertyResultSearch(Request $request)
    {
        $city_id = $request->city_id;
        $taluka_id = $request->taluka_id;
        $type_id = $request->property_type_id;
        $category_id = $request->property_category_id;
        $custom_filter = $request->custom_filter;
        $budget = $request->budget;

        return view('front.property-result', compact('type_id', 'city_id', 'taluka_id', 'category_id', 'custom_filter', 'budget'));
    }

    public function propertyResultSearchList(Request $request)
    {

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
        // echo $searchValue;exit;

        // Custom Filter
        $custom_filter = $request->get('custom_filter');
        $type_id = $request->get('type_id');
        $category_id = $request->get('category_id');
        $city_id = $request->get('city_id');
        $taluka_id = $request->get('taluka_id');
        $budget = $request->get('budget');
        if ($budget) {
            $budget_explode = explode('|', $budget);
            $min_budget = $budget_explode[0];
            $max_budget = $budget_explode[1];
        }

        $searchByCity = $request->get('searchByCity');
        $searchByTaluka = $request->get('searchByTaluka');
        $searchByType = $request->get('searchByType');
        $searchByCategory = $request->get('searchByCategory');
        $searchByBudget = $request->get('searchByBudget');
        if ($searchByBudget) {
            $searchByBudgetExplode = explode('|', $searchByBudget);
            $searchByMinBudget = $searchByBudgetExplode[0];
            $searchByMaxBudget = $searchByBudgetExplode[1];
        }

        // BHK Filter
        $bhkFilter = $request->get('bhkFilter');

        // echo $searchByType . '<br>' . $searchByCategory . '<br>' . $searchByCity . '<br>' . $searchByTaluka . '<br>' . $searchByBudget;exit;
        // echo $custom_filter;exit;

        if ($searchByCity || $searchByTaluka || $searchByType || $searchByCategory || $searchByBudget || $bhkFilter) {
            $custom_filter = 'no';
            $type_id = null;
        }

        if ($type_id == 1 || $searchByType == 1) {

            if ($custom_filter == 'yes') {

                // Total Count
                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1);

                if ($type_id) {
                    $totalCount->where('property_masters.property_type_id', $type_id);
                }if ($city_id) {
                    $totalCount->where('property_masters.city_id', $city_id);
                }if ($taluka_id) {
                    $totalCount->where('property_masters.taluka_id', $taluka_id);
                }if ($category_id) {
                    $totalCount->where('property_masters.property_category_id', $category_id);
                }if ($budget) {
                    $totalCount->whereBetween('property_masters.expected_price', [$min_budget, $max_budget]);
                }
                $totalRecords = $totalCount->count();

                // Total Filter Count
                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1);

                if ($type_id) {
                    $totalFilterCount->where('property_masters.property_type_id', $type_id);
                }if ($city_id) {
                    $totalFilterCount->where('property_masters.city_id', $city_id);
                }if ($taluka_id) {
                    $totalFilterCount->where('property_masters.taluka_id', $taluka_id);
                }if ($category_id) {
                    $totalFilterCount->where('property_masters.property_category_id', $category_id);
                }if ($budget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', [$min_budget, $max_budget]);
                }
                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1);

                if ($type_id) {
                    $totalFilterCount->where('property_masters.property_type_id', $type_id);
                }if ($city_id) {
                    $totalFilterCount->where('property_masters.city_id', $city_id);
                }if ($taluka_id) {
                    $totalFilterCount->where('property_masters.taluka_id', $taluka_id);
                }if ($category_id) {
                    $totalFilterCount->where('property_masters.property_category_id', $category_id);
                }if ($budget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', [$min_budget, $max_budget]);
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id', 'property_masters.locality', 'residential_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
                }

                $response = array(
                    "draw" => intval($draw),
                    "iTotalRecords" => $totalRecords,
                    "iTotalDisplayRecords" => $totalRecordswithFilter,
                    "aaData" => $data_arr,
                );

                echo json_encode($response);
                exit;

            } else {

                // Database Filter Found
                // Total Count
                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1);

                if ($searchByType) {
                    $totalCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecords = $totalCount->count();

                // Total Filter Count
                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1);

                if ($searchByType) {
                    $totalFilterCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalFilterCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalFilterCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalFilterCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1);

                if ($searchByType) {
                    $data->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $data->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $data->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $data->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $data->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }
                if ($bhkFilter) {
                    $data->where('residential_properties.total_bedrooms', $bhkFilter);
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'residential_properties.total_bedrooms', 'residential_properties.total_bathrooms', 'residential_properties.carpet_area', 'property_masters.client_master_id', 'property_masters.locality', 'residential_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
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
        } elseif ($type_id == 2 || $searchByType == 2) {
            // Commercial Property Category
            if ($custom_filter == 'yes') {

                // Total Count
                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1);

                if ($type_id) {
                    $totalCount->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $totalCount->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $totalCount->where('property_masters.taluka_id', $taluka_id);
                }
                if ($category_id) {
                    $totalCount->where('property_masters.property_category_id', $city_id);
                }
                if ($budget) {
                    $totalCount->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $totalRecords = $totalCount->count();

                // Total Filter Records

                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1);

                if ($type_id) {
                    $totalFilterCount->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $totalFilterCount->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $totalFilterCount->where('property_masters.taluka_id', $type_id);
                }
                if ($category_id) {
                    $totalFilterCount->where('property_masters.property_category_id', $category_id);
                }
                if ($budget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records

                $data = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1);

                if ($type_id) {
                    $data->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $data->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $data->where('property_masters.taluka_id', $type_id);
                }
                if ($category_id) {
                    $data->where('property_masters.property_category_id', $category_id);
                }
                if ($budget) {
                    $data->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.carpet_area', 'property_masters.client_master_id', 'property_masters.locality', 'commercial_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
                }

                $response = array(
                    "draw" => intval($draw),
                    "iTotalRecords" => $totalRecords,
                    "iTotalDisplayRecords" => $totalRecordswithFilter,
                    "aaData" => $data_arr,
                );

                echo json_encode($response);
                exit;

            } else {

                // Database Filter Found
                // Total Counts

                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1);

                if ($searchByType) {
                    $totalCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecords = $totalCount->count();

                // Total Filter Records
                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1);

                if ($searchByType) {
                    $totalFilterCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalFilterCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalFilterCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalFilterCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('commercial_properties', 'commercial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('commercial_properties.flag', 1);

                if ($searchByType) {
                    $data->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $data->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $data->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $data->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $data->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'commercial_properties.carpet_area', 'property_masters.client_master_id', 'property_masters.locality', 'commercial_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
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

        } elseif ($type_id == 3 || $searchByType == 3) {
            // Commercial Property Category
            if ($custom_filter == 'yes') {
                // Total Count
                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1);

                if ($type_id) {
                    $totalCount->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $totalCount->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $totalCount->where('property_masters.taluka_id', $taluka_id);
                }
                if ($category_id) {
                    $totalCount->where('property_masters.property_category_id', $city_id);
                }
                if ($budget) {
                    $totalCount->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $totalRecords = $totalCount->count();

                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1);

                if ($type_id) {
                    $totalFilterCount->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $totalFilterCount->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $totalFilterCount->where('property_masters.taluka_id', $type_id);
                }
                if ($category_id) {
                    $totalFilterCount->where('property_masters.property_category_id', $category_id);
                }
                if ($budget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1);

                if ($type_id) {
                    $data->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $data->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $data->where('property_masters.taluka_id', $type_id);
                }
                if ($category_id) {
                    $data->where('property_masters.property_category_id', $category_id);
                }
                if ($budget) {
                    $data->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'industrial_properties.carpet_area', 'property_masters.client_master_id', 'property_masters.locality', 'industrial_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
                }

                $response = array(
                    "draw" => intval($draw),
                    "iTotalRecords" => $totalRecords,
                    "iTotalDisplayRecords" => $totalRecordswithFilter,
                    "aaData" => $data_arr,
                );

                echo json_encode($response);
                exit;

            } else {

                // Database Filter Found
                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1);

                if ($searchByType) {
                    $totalCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecords = $totalCount->count();

                // Total Filter Records
                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1);

                if ($searchByType) {
                    $totalFilterCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalFilterCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalFilterCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalFilterCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('industrial_properties', 'industrial_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('industrial_properties.flag', 1);

                if ($searchByType) {
                    $data->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $data->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $data->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $data->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $data->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'industrial_properties.carpet_area', 'property_masters.client_master_id', 'property_masters.locality', 'industrial_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
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

        } else {
            // Commercial Property Category
            if ($custom_filter == 'yes') {

                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1);

                if ($type_id) {
                    $totalCount->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $totalCount->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $totalCount->where('property_masters.taluka_id', $taluka_id);
                }
                if ($category_id) {
                    $totalCount->where('property_masters.property_category_id', $city_id);
                }
                if ($budget) {
                    $totalCount->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $totalRecords = $totalCount->count();

                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1);

                if ($type_id) {
                    $totalFilterCount->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $totalFilterCount->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $totalFilterCount->where('property_masters.taluka_id', $type_id);
                }
                if ($category_id) {
                    $totalFilterCount->where('property_masters.property_category_id', $category_id);
                }
                if ($budget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1);

                if ($type_id) {
                    $data->where('property_masters.property_type_id', $type_id);
                }
                if ($city_id) {
                    $data->where('property_masters.city_id', $city_id);
                }
                if ($taluka_id) {
                    $data->where('property_masters.taluka_id', $type_id);
                }
                if ($category_id) {
                    $data->where('property_masters.property_category_id', $category_id);
                }
                if ($budget) {
                    $data->whereBetween('property_masters.expected_price', array($min_budget, $max_budget));
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'agricultural_properties.plot_area', 'property_masters.client_master_id', 'property_masters.locality', 'agricultural_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
                }

                $response = array(
                    "draw" => intval($draw),
                    "iTotalRecords" => $totalRecords,
                    "iTotalDisplayRecords" => $totalRecordswithFilter,
                    "aaData" => $data_arr,
                );

                echo json_encode($response);
                exit;

            } else {

                // Database Filter Found
                // Database Filter Found
                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1);

                if ($searchByType) {
                    $totalCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecords = $totalCount->count();

                // Total Filter Records
                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1);

                if ($searchByType) {
                    $totalFilterCount->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $totalFilterCount->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $totalFilterCount->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $totalFilterCount->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $totalFilterCount->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1);

                if ($searchByType) {
                    $data->where('property_masters.property_type_id', $searchByType);
                }
                if ($searchByCity) {
                    $data->where('property_masters.city_id', $searchByCity);
                }
                if ($searchByTaluka) {
                    $data->where('property_masters.taluka_id', $searchByTaluka);
                }
                if ($searchByCategory) {
                    $data->where('property_masters.property_category_id', $searchByCategory);
                }
                if ($searchByBudget) {
                    $data->whereBetween('property_masters.expected_price', [$searchByMinBudget, $searchByMaxBudget]);
                }

                $records = $data->skip($start)
                    ->take($rowperpage)
                    ->get(['property_masters.cover_image', 'property_masters.display_price', 'property_masters.id', 'property_masters.property_type_id', 'property_masters.address', 'property_masters.name_of_project', 'property_masters.property_status', 'agricultural_properties.plot_area', 'property_masters.client_master_id', 'property_masters.locality', 'agricultural_properties.descr', 'property_masters.expected_price']);

                $data_arr = array();
                foreach ($records as $record) {
                    $id = $record->id;
                    $types = $record->property_type_id;
                    if ($record->cover_image == null || $record->cover_image == '') {
                        $path = asset('storage/property/no-photo.png');
                    } else {
                        $path = asset('storage/property/banner_image/' . $record->cover_image);
                    }
                    $property_price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", $record->display_price);
                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->property_status == 'Sale') {
                        $color = 'style="color: #dc3545;"';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $color = 'style="color: #003e70;"';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $color = 'style="color: #009245;"';
                    }

                    if ($record->cover_image == null) {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/no-photo.png') . '" class="img-fluid mx-auto" alt="" style="width: 500px; height: 300px;"></a>';
                    } else {
                        $image = '<a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"><img src="' . asset('storage/property/banner_image/' . $record->cover_image) . '" class="img-fluid mx-auto" alt=""style="width: 500px; height: 300px;"></a>';
                    }

                    if ($record->property_status == 'Sale') {
                        $property_status = '<div class="veshm-type fr-sale"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'Rent/Lease') {
                        $property_status = '<div class="veshm-type"><span>For
                ' . $record->property_status . '</span></div>';
                    } elseif ($record->property_status == 'PG/Hostel') {
                        $property_status = '<div class="veshm-type fr-pg"><span>For
                ' . $record->property_status . '</span></div>';
                    }

                    if (strlen($record->descr) > 300) {
                        $descr = substr($record->descr, 0, 300) . '(...)';
                    } else {
                        $descr = $record->descr;
                    }

                    $data_arr[] = array(
                        "show" => '<div id="list" class="row gx-3 gy-4">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="veshm-list-prty">
                            <div class="veshm-list-prty-figure1">
                                <div class="veshm-list-img-slide">
                                    <div class="veshm-list-click">
                                    <div>' . $image . '</div>
                                    </div>
                                </div>
                            </div>
                            <div class="veshm-list-prty-caption">
                                <div class="veshm-list-kygf">
                                    <div class="veshm-list-kygf-flex">
                                    ' . $property_status . '

                                        <h5 class="rlhc-title-name verified"><a
                                                href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                                class="prt-link-detail">' . $record->name_of_project . '</a>
                                        </h5>
                                        <div class="vesh-aget-rates">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <span class="resy-98">322 Reviews</span>
                                        </div>
                                        <div class="rlhc-prt-location"><img src="' . url('/') . '/front/assets/img/pin.svg" width="16" class="me-1" alt="">' . $record->locality . '</div>
                                    </div>
                                    <div class="veshm-list-head-flex">
                                        <button class="btn btn-like active" type="button"><i
                                                class="fa-solid fa-heart-circle-check" style="color:white;"
                                                title="Add to Wishlist"></i></button>
                                    </div>
                                </div>
                                <div class="veshm-list-middle">
                                    <div class="veshm-list-icons">
                                        <ul>
                                            <li style="font-weight:bold;">' . $descr . '
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="veshm-list-footers">
                                    <div class="veshm-list-ftr786">
                                        <div class="rlhc-price">
                                            <h4 class="rlhc-price-name theme-cl">
                                            ₹' . $record->display_price . '
                                            <span class="monthly">Onwards/-</span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="veshm-list-ftr1707">
                                        <a href="' . route('propertydetails', [$record->id, $record->property_type_id, $record->name_of_project, $record->client_master_id]) . '"
                                            class="btn btn-md btn-primary font--medium">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>',
                    );
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

    }

    public function inquiryDetails(Request $request)
    {

        $inquirydata = new Inquiry();
        $inquirydata->client_master_id = $request->client_master_id;
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

    // public function insertDummmyPropertyData()
    // {
    //     $db = mysqli_connect("localhost", "root", "", "property_beehive");
    //     for($i=0;$i<10;$i++){
    //         $ps = 'Sale'[$i];
    //         $ptypeid = 'Sale'[$i];
    //         $cmid = 'Sale'[$i];
    //         $pcid = 'Sale'[$i];
    //         $stateid = 'Sale'[$i];
    //         $cityid = 'Sale'[$i];
    //         $taluka_id = 'Sale'[$i];
    //         $name_of_project = 'Test'[$i];
    //         $locality = 'India'[$i];

    //         $sql_query = "INSERT INTO `property_masters` (`id`, `property_status`, `property_type_id`, `client_master_id`, `property_category_id`, `state_id`, `city_id`, `taluka_id`, `name_of_project`, `locality`, `landmark`, `latitude`, `longitude`, `address`, `expected_price`, `display_price`, `booking_amount`, `rera_registration_number`, `cover_image`, `flag`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
    //         (8, 'Sale', 1, 1, 3, 1, 25, 180, '2BHK Flat', 'Swastik Cross Roads', NULL, NULL, NULL, 'Swastik Cross Roads', 3575000, '35.75 Lacs', 10000, NULL, '64904b7479079_istockphoto-585292106-612x612.jpg', 1, NULL, NULL, '2023-06-19 06:59:54', '2023-06-23 11:22:26')";
    //     }

    // }

}
