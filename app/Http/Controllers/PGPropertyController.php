<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\City;
use App\Models\PGImage;
use App\Models\PGProperty;
use App\Models\PGRoomDetails;
use App\Models\PropertyMaster;
use App\Models\PropertyType;
use App\Models\State;
use App\Models\Taluka;
use Illuminate\Http\Request;

class PGPropertyController extends Controller
{
    public function pg()
    {
        $properties = PropertyMaster::where('flag', 1)->where('property_status', 'PG/Hostel')->limit(10)->get(['id', 'property_status', 'cover_image', 'property_type_id', 'name_of_project', 'client_master_id', 'display_price', 'locality']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $taluka = Taluka::where('flag', 1)->get(['id', 'taluka']);
        $propertyType = PropertyType::where('flag', 1)->where('id', 1)->get(['id', 'property_type']);
        return view('front.pg', compact('properties', 'city', 'propertyType', 'taluka'));
    }

    public function searchPGProperty(Request $request)
    {
        $city_id = $request->city_id;
        $taluka_id = $request->taluka_id;
        $type_id = $request->property_type_id;
        $category_id = $request->property_category_id;
        $custom_filter = $request->custom_filter;
        $budget = $request->budget;
        $amenities = Amenities::where('flag', 1)->get(['id', 'amenities']);

        return view('front.pg-property-result', compact('type_id', 'city_id', 'taluka_id', 'category_id', 'custom_filter', 'budget', 'amenities'));
    }

    public function pgPropertyResultSearchList(Request $request)
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

        // More Filters
        $bhkFilter = $request->get('bhkFilter');
        if ($bhkFilter) {
            $selectedBhkFilter = "'" . implode("', '", $bhkFilter) . "'";
        }
        $bathRoomFilter = $request->get('bathRoomFilter');
        $furnishedStatusFilter = $request->get('furnishedStatusFilter');
        if ($furnishedStatusFilter) {
            $selectedFurnishedStatus = "'" . implode("', '", $furnishedStatusFilter) . "'";
        }
        $possessionStatusFilter = $request->get('possessionStatusFilter');

        $sortByFilter = $request->get('sortByFilter');

        if ($searchByCity || $searchByTaluka || $searchByType || $searchByCategory || $searchByBudget || $bhkFilter || $furnishedStatusFilter || $bathRoomFilter || $possessionStatusFilter || $sortByFilter) {
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
                    ->where('residential_properties.flag', 1)
                    ->where('property_status', 'PG/Hostel');

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
                    ->where('residential_properties.flag', 1)
                    ->where('property_status', 'PG/Hostel');

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
                    ->where('residential_properties.flag', 1)
                    ->where('property_status', 'PG/Hostel');

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
                    ->where('residential_properties.flag', 1)
                    ->where('property_status', 'PG/Hostel');

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
                if ($bathRoomFilter) {
                    $totalCount->where('residential_properties.total_bathrooms', $bathRoomFilter);
                }
                if ($bhkFilter) {
                    $totalCount->whereRaw("residential_properties.total_bedrooms IN($selectedBhkFilter)");
                }
                if ($furnishedStatusFilter) {
                    $totalCount->whereRaw("residential_properties.furnished_status IN($selectedFurnishedStatus)");
                }
                if ($possessionStatusFilter) {
                    $totalCount->where('residential_properties.possession_status', $possessionStatusFilter);
                }
                if ($sortByFilter && $sortByFilter == 1) {
                    $totalCount->where('property_masters.expected_price', '<', '5000000');
                }
                if ($sortByFilter && $sortByFilter == 2) {
                    $totalCount->where('property_masters.expected_price', '>', '5000000');
                }

                $totalRecords = $totalCount->count();

                // Total Filter Count
                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_status', 'PG/Hostel');

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
                if ($bathRoomFilter) {
                    $totalFilterCount->where('residential_properties.total_bathrooms', $bathRoomFilter);
                }
                if ($bhkFilter) {
                    $totalFilterCount->whereRaw("residential_properties.total_bedrooms IN($selectedBhkFilter)");
                }
                if ($furnishedStatusFilter) {
                    $totalFilterCount->whereRaw("residential_properties.furnished_status IN($selectedFurnishedStatus)");
                }
                if ($possessionStatusFilter) {
                    $totalFilterCount->where('residential_properties.possession_status', $possessionStatusFilter);
                }
                if ($sortByFilter && $sortByFilter == 1) {
                    $totalFilterCount->where('property_masters.expected_price', '<', '5000000');
                }
                if ($sortByFilter && $sortByFilter == 2) {
                    $totalFilterCount->where('property_masters.expected_price', '>', '5000000');
                }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('residential_properties', 'residential_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('residential_properties.flag', 1)
                    ->where('property_status', 'PG/Hostel');

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
                if ($bathRoomFilter) {
                    $data->where('residential_properties.total_bathrooms', $bathRoomFilter);
                }
                if ($bhkFilter) {
                    $data->whereRaw("residential_properties.total_bedrooms IN($selectedBhkFilter)");
                }
                if ($furnishedStatusFilter) {
                    $data->whereRaw("residential_properties.furnished_status IN($selectedFurnishedStatus)");
                }
                if ($possessionStatusFilter) {
                    $data->where('residential_properties.possession_status', $possessionStatusFilter);
                }
                if ($sortByFilter && $sortByFilter == 1) {
                    $data->where('property_masters.expected_price', '<', '5000000');
                }
                if ($sortByFilter && $sortByFilter == 2) {
                    $data->where('property_masters.expected_price', '>', '5000000');
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
        }

    }

    public function addPGPropertyDetails()
    {
        $amenities = Amenities::where('flag', 1)->get();
        $propertyTypes = PropertyType::where('flag', 1)->get();
        $states = State::where('flag', 1)->get();
        $cities = City::where('flag', 1)->get();
        $taluka = Taluka::where('flag', 1)->get();
        return view('front.post_pg_property', compact('propertyTypes', 'states', 'cities', 'amenities', 'taluka'));
    }

    public function pgpropertyDataInsertAjax(Request $request)
    {
        $propertyMasterModel = new PropertyMaster();
        $propertyMasterModel->client_master_id = session('user')['id'];
        $propertyMasterModel->property_status = 'PG/Hostel';
        $propertyMasterModel->property_type_id = 5;
        $propertyMasterModel->property_category_id = 0;
        $propertyMasterModel->state_id = $request->state_id;
        $propertyMasterModel->city_id = $request->city_id;
        $propertyMasterModel->taluka_id = $request->taluka_id;
        $propertyMasterModel->locality = $request->locality;
        $propertyMasterModel->name_of_project = $request->pg_name;
        $propertyMasterModel->address = $request->address;
        $propertyMasterModel->expected_price = 0;
        $propertyMasterModel->display_price = 0;

        $savePropertyMasterData = $propertyMasterModel->save();
        $lastInsertedPropertyMasterId = $propertyMasterModel->id;
        if ($savePropertyMasterData) {

            // PG Property Insert //
            $pgPropertyModel = new PGProperty();
            $pgPropertyModel->property_master_id = $lastInsertedPropertyMasterId;
            $pgPropertyModel->pg_name = $request->pg_name;
            $pgPropertyModel->total_beds = $request->total_beds;

            $pg_for = implode(",", $request->pg_for);
            $pgPropertyModel->pg_for = $pg_for;

            $best_suited_for = implode(",", $request->best_suited_for);
            $pgPropertyModel->best_suited_for = $best_suited_for;

            $pgPropertyModel->meals_available = $request->meals_available;

            if ($request->meals_offering) {
                $meals_offering = implode(",", $request->meals_offering);
            } else {
                $meals_offering = null;
            }
            $pgPropertyModel->meals_offering = $meals_offering;

            if ($request->meals_speciality) {
                $meals_speciality = implode(",", $request->meals_speciality);
            } else {
                $meals_speciality = null;
            }
            $pgPropertyModel->meals_speciality = $meals_speciality;

            $pgPropertyModel->notice_period = $request->notice_period;
            $pgPropertyModel->lock_in_period = $request->lock_in_period;

            $common_areas = implode(",", $request->common_areas);
            $pgPropertyModel->common_areas = $common_areas;

            $pgPropertyModel->non_veg_allowed = $request->non_veg_allowed;
            $pgPropertyModel->opposite_sex_allowed = $request->opposite_sex_allowed;
            $pgPropertyModel->any_time_allowed = $request->any_time_allowed;
            $pgPropertyModel->visitors_allowed = $request->visitors_allowed;
            $pgPropertyModel->guardian_allowed = $request->guardian_allowed;
            $pgPropertyModel->drinking_allowed = $request->drinking_allowed;
            $pgPropertyModel->smoking_allowed = $request->smoking_allowed;

            $pgPropertyModel->onetime_move_in_charges = $request->onetime_move_in_charges;
            $pgPropertyModel->meal_charges_per_month = $request->meal_charges_per_month;
            $pgPropertyModel->electricity_charges_per_month = $request->electricity_charges_per_month;
            $pgPropertyModel->additional_information = $request->additional_information;

            $saveData = $pgPropertyModel->save();
            $lastInsertedTypeId = $pgPropertyModel->id;
            $request->session()->put('pg_property_id', $lastInsertedPropertyMasterId);

        }

        echo 'suceess';
    }

    public function PGroomDetailsInsertAjax(Request $request)
    {
        /* Private Room */
        $pr_rent = $request->pr_rent;
        $pr_security_deposit = $request->pr_security_deposit;
        $pr_total_beds = $request->pr_total_beds;
        $pr_facilities_arr = $request->pr_facilities_arr;
        if ($pr_facilities_arr) {
            $pr_facilities = implode("','", $pr_facilities_arr);
        } else {
            $pr_facilities = null;
        }

        /* Double Sharing */
        $ds_rent = $request->ds_rent;
        $ds_security_deposit = $request->ds_security_deposit;
        $ds_facilities_arr = $request->ds_facilities_arr;
        $ds_total_beds = $request->ds_total_beds;
        if ($ds_facilities_arr) {
            $ds_facilities = implode("','", $ds_facilities_arr);
        } else {
            $ds_facilities = null;
        }

        /* Triple Sharing */
        $ts_rent = $request->ts_rent;
        $ts_security_deposit = $request->ts_security_deposit;
        $ts_total_beds = $request->ts_total_beds;
        $ts_facilities_arr = $request->ts_facilities_arr;
        if ($ts_facilities_arr) {
            $ts_facilities = implode("','", $ts_facilities_arr);
        } else {
            $ts_facilities = null;
        }

        /* 3+ Sharing */
        $ms_rent = $request->ms_rent;
        $ms_security_deposit = $request->ms_security_deposit;
        $ms_total_beds = $request->ms_total_beds;
        $ms_facilities_arr = $request->ms_facilities_arr;
        if ($ms_facilities_arr) {
            $ms_facilities = implode("','", $ms_facilities_arr);
        } else {
            $ms_facilities = null;
        }

        $last_pg_id = session('pg_property_id');

        /* Private Room */
        if ($pr_rent || $pr_security_deposit) {
            $roomModel = new PGRoomDetails();
            $roomModel->pg_id = $last_pg_id;
            $roomModel->room_type = 'Private Room';
            $roomModel->total_beds_in_room = $pr_total_beds;
            $roomModel->rent = $pr_rent;
            $roomModel->security_deposit = $pr_security_deposit;
            $roomModel->facilities = $pr_facilities;
            $roomModel->save();
        } else {

        }

        /* Double Sharing */
        if ($ds_rent || $ds_security_deposit) {
            $roomModel = new PGRoomDetails();
            $roomModel->pg_id = $last_pg_id;
            $roomModel->room_type = 'Double Sharing';
            $roomModel->total_beds_in_room = $ds_total_beds;
            $roomModel->rent = $ds_rent;
            $roomModel->security_deposit = $ds_security_deposit;
            $roomModel->facilities = $ds_facilities;
            $roomModel->save();
        }

        /* Triple Sharing */
        if ($ts_rent || $ts_security_deposit) {
            $roomModel = new PGRoomDetails();
            $roomModel->pg_id = $last_pg_id;
            $roomModel->room_type = 'Triple Sharing';
            $roomModel->total_beds_in_room = $ts_total_beds;
            $roomModel->rent = $ts_rent;
            $roomModel->security_deposit = $ts_security_deposit;
            $roomModel->facilities = $ts_facilities;
            $roomModel->save();
        }

        /* 3+ Sharing */
        if ($ms_rent || $ms_security_deposit) {
            $roomModel = new PGRoomDetails();
            $roomModel->pg_id = $last_pg_id;
            $roomModel->room_type = '3+ Sharing';
            $roomModel->total_beds_in_room = $ms_total_beds;
            $roomModel->rent = $ms_rent;
            $roomModel->security_deposit = $ms_security_deposit;
            $roomModel->facilities = $ms_facilities;
            $roomModel->save();
        }

        echo 'success';

    }

    public function uploadPGPropertyImage(Request $request)
    {
        $last_pg_id = session('pg_property_id');
        $pgImageModel = new PGImage();
        $pgImage = $request->file('file');
        $pg_image_name = uniqid() . '_' . $pgImage->getClientOriginalName();
        $path = storage_path('app/public/property/pg/');
        $pgImage->move($path, $pg_image_name);
        $pgImageModel->pg_id = $last_pg_id;
        $pgImageModel->pg_image = $pg_image_name;
        $pgImageModel->save();
        return response()->json(['success' => $pg_image_name]);
    }
}
