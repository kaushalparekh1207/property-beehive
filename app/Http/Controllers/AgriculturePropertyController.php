<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgricultureProperty;
use App\Models\Property;
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
        $formdata = new AgricultureProperty();
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

        $totalRecords = AgricultureProperty::select('count(*) as allcount')
            ->where('agriculture_properties.flag', 1)
            ->where('agriculture_properties.a_property_name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = AgricultureProperty::select('count(*) as allcount')
            ->where('agriculture_properties.flag', 1)
            ->where('agriculture_properties.a_property_name', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = AgricultureProperty::orderBy($columnName, $columnSortOrder)
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
        $obj = AgricultureProperty::findOrFail($id);
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
}