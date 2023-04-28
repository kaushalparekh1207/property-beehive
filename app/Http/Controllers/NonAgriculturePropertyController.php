<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NonAgricultureProperty;
use App\Models\Property;
use Illuminate\Http\Request;

class NonAgriculturePropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.non_aggriculture_property');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nonpropertyData = Property::where('flag', 1)->get();
        return view('admin.non_aggriculture_property_add', compact('nonpropertyData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = new NonAgricultureProperty();
        $formdata->property_id = $request->propertytype;
        $formdata->na_property_type = $request->na_property_type;
        $formdata->na_property_name = $request->nonaggriculture;
        $formdata->created_by = session('admin')['admin_id'];
        $formdata->updated_by = session('admin')['admin_id'];
        $saveData = $formdata->save();

        if ($saveData) {
            toastr()->info('Non Agriculture Property add !');
        } else {
            toastr()->error('Something went Wrong !');
        }

        return redirect()->route('non_aggriculture_property');
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

        $totalRecords = NonAgricultureProperty::select('count(*) as allcount')
            ->where('non_agriculture_properties.flag', 1)
            ->where('non_agriculture_properties.na_property_name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = NonAgricultureProperty::select('count(*) as allcount')
            ->where('non_agriculture_properties.flag', 1)
            ->where('non_agriculture_properties.na_property_name', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = NonAgricultureProperty::orderBy($columnName, $columnSortOrder)
            ->where('non_agriculture_properties.flag', 1)
            ->where('non_agriculture_properties.na_property_name', 'like', '%' . $searchValue . '%')
        // ->select('block_lists.block', 'block_lists.id', 'block_lists.site_detail_id', 'site_details.title', 'bhk_types.bhk')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $na_property_name = $record->na_property_name;
            $property_type = $record->na_property_type;
            $property_id = $record->property_id;

            $data_arr[] = array(
                "id" => $count,
                "na_property_type" => $property_type,
                "na_property_name" => $na_property_name,
                "action" => '<div class="btn-group m-b-5">
                <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary" aria-expanded="true">Action
                    <span class="caret"></span>
                </button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="' . route('non_aggriculture_property_delete', $id) . '">Delete</a></li>
                </ul>
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
    public function edit(NonAgricultureProperty $nonAgricultureProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NonAgricultureProperty $nonAgricultureProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = NonAgricultureProperty::find($id);
        $data->flag = 2;
        $data->updated_by = session('admin')['admin_id'];
        $saveData = $data->save();
        if ($saveData) {
            toastr()->success('Non Agriculture Property Deleted !');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return redirect()->route('non_aggriculture_property');
    }
}
