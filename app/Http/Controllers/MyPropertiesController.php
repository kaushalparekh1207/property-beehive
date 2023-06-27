<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalProperty;
use App\Models\CommercialProperty;
use App\Models\IndustrialProperty;
use App\Models\PropertyMaster;
use App\Models\ResidentialProperty;
use Illuminate\Http\Request;

class MyPropertiesController extends Controller
{
    public function showMyProperties()
    {
        return view('front.my_properties');
    }

    public function showPropertyDetails(Request $request)
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

        $totalRecords = PropertyMaster::select('count(*) as allcount')
            ->join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('property_masters.client_master_id', '=', session('user')['id'])
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            ->where('property_categories.flag', 1)
            ->count();

        $totalRecordswithFilter = PropertyMaster::select('count(*) as allcount')
            ->join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('property_masters.client_master_id', '=', session('user')['id'])
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            ->where('property_categories.flag', 1)
            ->count();

        // Fetch records
        $records = PropertyMaster::join('property_categories', 'property_categories.id', '=', 'property_masters.property_category_id')
            ->join('client_master', 'client_master.id', '=', 'property_masters.client_master_id')
            ->where('property_masters.client_master_id', '=', session('user')['id'])
            ->where('client_master.flag', 1)
            ->where('property_masters.flag', 1)
            ->where('property_categories.flag', 1)
            ->select('property_masters.id', 'property_masters.name_of_project', 'property_masters.property_status', 'property_masters.display_price', 'property_masters.locality', 'property_categories.property_category_name', 'property_masters.cover_image', 'property_masters.property_type_id')
            ->get();

        $data_arr = array();
        foreach ($records as $record) {
            $commercial_property = CommercialProperty::where('flag', 1)->get();
            $residential_property = ResidentialProperty::where('flag', 1)->get();
            $industrial_property = IndustrialProperty::where('flag', 1)->get();
            $agriculture_property = AgriculturalProperty::where('flag', 1)->get();
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

            $data_arr[] = array(
                "image" => '<div class="dash_prt_wrap">
                <div class="dash_prt_thumb">
                        <img src=' . $path . '
                            class="img-fluid"
                            alt="" style="width:100px; height:80px;">
                </div>
            </div>',
                "details" => '<div class="dash_prt_caption">
                <h5>' . $record->name_of_project . '
                </h5>
                <div class="prt_dashb_lot">
                    ' . $record->locality . '
                </div>
                <div class="prt_dash_rate" style="color:red;">₹
                ' . $property_price . '
                </div>
            </div>',
                "for" => '<div class="prt_leads"><h6 ' . $color . '>' . $record->property_status . '</h6></div>',
                "type" => '<div class="_leads_view"><h5 class="up">' . $record->property_category_name . '</h5></div>',
                "status" => '<div class="_leads_status"><span class="active">Active</span></div>',
                "action" => '<div class="_leads_action">
                <a href="' . route('editProperty', $record->id) . '"><i class="fas fa-edit"></i></a>
                <a href="' . route('destroyMyProperties', [$record->id, $types]) . '" title="Delete Property"><i class="fas fa-trash"></i></a></div>',
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

    public function destroyMyProperties($id, $type)
    {
        $Model = PropertyMaster::findOrFail($id);
        $Model->flag = 2;
        $delete = $Model->save();

        if ($delete) {
            if ($type == 1) {
                $model = ResidentialProperty::where('property_master_id', $id)->first();
                $model->flag = 2;
                $model->save();
                toastr('Property deleted successfully', 'success');
            } elseif ($type == 2) {
                $model = CommercialProperty::where('property_master_id', $id)->first();
                $model->flag = 2;
                $model->save();
                toastr('Property deleted successfully', 'success');
            } elseif ($type == 3) {
                $model = IndustrialProperty::where('property_master_id', $id)->first();
                $model->flag = 2;
                $model->save();
                toastr('Property deleted successfully', 'success');
            } elseif ($type == 4) {
                $model = AgriculturalProperty::where('property_master_id', $id)->first();
                $model->flag = 2;
                $model->save();
                toastr('Property deleted successfully', 'success');
            }
        } else {
            toastr('Something went Wrong Please Try Again', 'error');
        }
        return redirect()->back();
    }
}
