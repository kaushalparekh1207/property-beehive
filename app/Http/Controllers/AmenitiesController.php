<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use Illuminate\Http\Request;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.amenities');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.amenities_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Model = new Amenities();
        $Model->amenities = $request->amenities;
        $Model->created_by = session('admin')['admin_id'];
        $saveData = $Model->save();
        if ($saveData) {
            toastr('Amenities Add successfully', 'success');
        } else {
            toastr('Something went wrong', 'error');
        }
        return redirect()->route('Amenities');
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

        $totalRecords = Amenities::select('count(*) as allcount')
            ->where('amenities.flag', 1)
            ->where('amenities.amenities', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = Amenities::select('count(*) as allcount')
            ->where('amenities.flag', 1)
            ->where('amenities.amenities', 'like', '%' . $searchValue . '%')
            ->count();
        // Fetch records
        $records = Amenities::orderBy($columnName, $columnSortOrder)
            ->where('amenities.flag', 1)
            ->where('amenities.amenities', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $amenities = $record->amenities;

            $data_arr[] = array(
                "id" => $count,
                "amenities" => $amenities,
                "action" => '<div class="btn-group m-b-5">
                <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-primary" aria-expanded="true">Action
                    <span class="caret"></span>
                </button>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="' . route('amenities_destroy', $id) . '">Delete</a></li>
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Model = Amenities::findOrFail($id);
        $Model->flag = 2;
        $Model->updated_by = session('admin')['admin_id'];
        $delete = $Model->save();
        if ($delete) {
            toastr('Amenities deleted successfully', 'success');
        } else {
            toastr('Something went Wrong Please Try Again', 'error');
        }

        return redirect()->route('Amenities');
    }
}
