<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.property_categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propertyTypes = PropertyType::where('flag', 1)->get();
        return view('admin.property_categories_add', compact('propertyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = new PropertyCategory();
        $formdata->property_type_id = $request->property_type;
        $formdata->property_category_name = $request->property_category_name;
        $formdata->created_by = session('admin')['id'];
        $formdata->updated_by = session('admin')['id'];
        $saveData = $formdata->save();

        if ($saveData) {
            toastr()->info('Property Category Added !');
        } else {
            toastr()->error('Something went Wrong !');
        }

        return redirect()->route('property_categories');
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

        $totalRecords = PropertyCategory::select('count(*) as allcount')
            ->join('property_types','property_types.id','=','property_categories.property_type_id')
            ->where('property_categories.flag', 1)
            ->where('property_categories.property_category_name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = PropertyCategory::select('count(*) as allcount')
            ->join('property_types','property_types.id','=','property_categories.property_type_id')
            ->where('property_categories.flag', 1)
            ->where('property_categories.property_category_name', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = PropertyCategory::orderBy($columnName, $columnSortOrder)
            ->join('property_types','property_types.id','=','property_categories.property_type_id')
            ->where('property_categories.flag', 1)
            ->where('property_categories.property_category_name', 'like', '%' . $searchValue . '%')
             ->select('property_categories.*', 'property_types.property_type')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $property_category_name = $record->property_category_name;
            $property_type = $record->property_type;

            $data_arr[] = array(
                "id" => $count,
                "property_type" => $property_type,
                "property_category_name" => $property_category_name,
                "action" => '<div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">

                  <a href="' . route('property_categories_delete', $id) . '" data-confirm="Are you sure you want to delete this item?" class="dropdown-item" style="--hover-color: green" type="button">Delete</a>
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
        $data = PropertyCategory::find($id);
        $data->flag = 2;
        $data->updated_by = session('admin')['id'];
        $saveData = $data->save();
        if ($saveData) {
            toastr()->success('Property Category Deleted !');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return redirect()->route('property_categories');
    }
}
