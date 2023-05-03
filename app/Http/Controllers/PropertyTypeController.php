<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.property_types');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propertyData = Property::where('flag', 1)->get();

        return view('admin.property_types_add', compact('propertyData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = new PropertyType();
        $formdata->property_type = $request->property_type;
        $formdata->created_by = session('admin')['id'];
        $saveData = $formdata->save();
        if ($saveData) {
            toastr()->success('Property Type Added Successfully !');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return redirect()->route('property_types');
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

        $totalRecords = PropertyType::select('count(*) as allcount')
            ->where('property_types.flag', 1)
            ->where('property_types.property_type', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = PropertyType::select('count(*) as allcount')
            ->where('property_types.flag', 1)
            ->where('property_types.property_type', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = PropertyType::orderBy($columnName, $columnSortOrder)
            ->where('property_types.flag', 1)
            ->where('property_types.property_type', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $property_type = $record->property_type;

            $data_arr[] = array(
                "id" => $count,
                "property_type" => $property_type,
                "action" => '<div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">

                  <a href="' . route('property_types_destroy', $id) . '" class="dropdown-item" style="--hover-color: green" type="button">Delete</a>
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $obj = PropertyType::findOrFail($id);
        $obj->flag = 2;
        $obj->updated_by = session('admin')['id'];
        $saveData = $obj->save();
        if ($saveData) {
            toastr()->success('Property Type Deleted Successfully !');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return Redirect()->route('property_types');
    }
}
