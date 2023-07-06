<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalProperty;
use App\Models\AgricultureProperty;
use App\Models\City;
use App\Models\CommercialProperty;
use App\Models\IndustrialProperty;
use App\Models\Amenities;
use App\Models\Property;
use App\Models\PropertyMaster;
use App\Models\PropertyType;
use App\Models\ResidentialProperty;
use App\Models\Taluka;
use Illuminate\Http\Request;

class AgriculturePropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.aggriculture_property');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propertyData = Property::where('flag', 1)->get();

        return view('admin.aggriculture_property_add', compact('propertyData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = new AgriculturalProperty();
        $formdata->property_id = $request->select;
        $formdata->a_property_name = $request->a_property_name;
        $formdata->created_by = session('admin')['admin_id'];
        $saveData = $formdata->save();
        if ($saveData) {
            toastr()->success('Property Added Successfully !');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return redirect()->route('aggriculture_property');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
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

        $totalRecords = AgriculturalProperty::select('count(*) as allcount')
            ->where('agriculture_properties.flag', 1)
            ->where('agriculture_properties.a_property_name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = AgriculturalProperty::select('count(*) as allcount')
            ->where('agriculture_properties.flag', 1)
            ->where('agriculture_properties.a_property_name', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = AgriculturalProperty::orderBy($columnName, $columnSortOrder)
            ->where('agriculture_properties.flag', 1)
            ->where('agriculture_properties.a_property_name', 'like', '%' . $searchValue . '%')
        // ->select('block_lists.block', 'block_lists.id', 'block_lists.site_detail_id', 'site_details.title', 'bhk_types.bhk')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $a_property_name = $record->a_property_name;
            $property_id = $record->property_id;

            $data_arr[] = array(
                "id" => $count,
                "property_name" => $a_property_name,
                "action" => '<div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">

                  <a href="' . route('aggriculture_property_destroy', $id) . '" class="dropdown-item" style="--hover-color: green" type="button">Delete</a>
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgricultureProperty $agricultureProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgricultureProperty $agricultureProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obj = AgriculturalProperty::findOrFail($id);
        $obj->flag = 2;
        $obj->updated_by = session('admin')['admin_id'];
        $saveData = $obj->save();
        if ($saveData) {
            toastr()->success('Property Deleted Successfully !');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return Redirect()->route('aggriculture_property');
    }

    public function land()
    {
        $properties = PropertyMaster::where('flag', 1)->where('property_type_id', 4)->limit(10)->get(['id', 'property_status', 'cover_image', 'property_type_id', 'name_of_project', 'client_master_id', 'display_price', 'locality']);
        $city = City::where('flag', 1)->get(['id', 'city']);
        $taluka = Taluka::where('flag', 1)->get(['id', 'taluka']);
        $propertyType = PropertyType::where('flag', 1)->where('id',4)->get(['id', 'property_type']);
        return view('front.land', compact('properties', 'city', 'propertyType', 'taluka'));
    }

    public function searchLandProperty(Request $request)
    {
        $city_id = $request->city_id;
        $taluka_id = $request->taluka_id;
        $type_id = $request->property_type_id;
        $category_id = $request->property_category_id;
        $custom_filter = $request->custom_filter;
        $budget = $request->budget;
        $amenities = Amenities::where('flag', 1)->get(['id', 'amenities']);

        return view('front.land-property-result', compact('type_id', 'city_id', 'taluka_id', 'category_id', 'custom_filter', 'budget', 'amenities'));
    }

    public function landPropertyResultSearchList(Request $request)
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

        if ($type_id == 4 || $searchByType == 4) {

            // Agricultural Property Category
            if ($custom_filter == 'yes') {

                $totalCount = PropertyMaster::select('count(*) as allcount')
                    ->join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_status', 'Rent/Lease');

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
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_status', 'Rent/Lease');

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
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_status', 'Rent/Lease');

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
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_status', 'Rent/Lease');

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
                        $totalCount->where('agricultural_properties.total_bathrooms', $bathRoomFilter);
                    }
                    if ($bhkFilter) {
                        $totalCount->whereRaw("agricultural_properties.total_bedrooms IN($selectedBhkFilter)");
                    }
                    if ($furnishedStatusFilter) {
                        $totalCount->whereRaw("agricultural_properties.furnished_status IN($selectedFurnishedStatus)");
                    }
                    if ($possessionStatusFilter) {
                        $totalCount->where('agricultural_properties.possession_status', $possessionStatusFilter);
                    }
                    if ($sortByFilter && $sortByFilter == 1) {
                        $totalCount->where('property_masters.expected_price', '<', '5000000');
                    }
                    if ($sortByFilter && $sortByFilter == 2) {
                        $totalCount->where('property_masters.expected_price', '>', '5000000');
                    }

                $totalRecords = $totalCount->count();

                // Total Filter Records
                $totalFilterCount = PropertyMaster::select('count(*) as allcount')
                    ->join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_status', 'Rent/Lease');

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
                        $totalFilterCount->where('agricultural_properties.total_bathrooms', $bathRoomFilter);
                    }
                    if ($bhkFilter) {
                        $totalFilterCount->whereRaw("agricultural_properties.total_bedrooms IN($selectedBhkFilter)");
                    }
                    if ($furnishedStatusFilter) {
                        $totalFilterCount->whereRaw("agricultural_properties.furnished_status IN($selectedFurnishedStatus)");
                    }
                    if ($possessionStatusFilter) {
                        $totalFilterCount->where('agricultural_properties.possession_status', $possessionStatusFilter);
                    }
                    if ($sortByFilter && $sortByFilter == 1) {
                        $totalFilterCount->where('property_masters.expected_price', '<', '5000000');
                    }
                    if ($sortByFilter && $sortByFilter == 2) {
                        $totalFilterCount->where('property_masters.expected_price', '>', '5000000');
                    }

                $totalRecordswithFilter = $totalFilterCount->count();

                // Fetch Records
                $data = PropertyMaster::join('agricultural_properties', 'agricultural_properties.property_master_id', '=', 'property_masters.id')
                    ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
                    ->where('property_masters.flag', 1)
                    ->where('agricultural_properties.flag', 1)
                    ->where('property_status', 'Rent/Lease');

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
                        $data->where('agricultural_properties.total_bathrooms', $bathRoomFilter);
                    }
                    if ($bhkFilter) {
                        $data->whereRaw("agricultural_properties.total_bedrooms IN($selectedBhkFilter)");
                    }
                    if ($furnishedStatusFilter) {
                        $data->whereRaw("agricultural_properties.furnished_status IN($selectedFurnishedStatus)");
                    }
                    if ($possessionStatusFilter) {
                        $data->where('agricultural_properties.possession_status', $possessionStatusFilter);
                    }
                    if ($sortByFilter && $sortByFilter == 1) {
                        $data->where('property_masters.expected_price', '<', '5000000');
                    }
                    if ($sortByFilter && $sortByFilter == 2) {
                        $data->where('property_masters.expected_price', '>', '5000000');
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
}
