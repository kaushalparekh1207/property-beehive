<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user_type');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user_type_add');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = new UserType();
            $formdata->user_type = $request->user_type;
            $formdata->created_by = session('admin')['admin_id'];
            $formdata->updated_by = session('admin')['admin_id'];
            $saveData = $formdata->save();

            if ($saveData) {
                toastr()->success('User Type add !');
            } else {
                toastr()->error('Something went Wrong !');
            }
        
        return redirect()->route('user_type');
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

        $totalRecords = UserType::select('count(*) as allcount')
            ->where('user_types.flag', 1)
            ->where('user_types.user_type', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = UserType::select('count(*) as allcount')
            ->where('user_types.flag', 1)
            ->where('user_types.user_type', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = UserType::orderBy($columnName, $columnSortOrder)
            ->where('user_types.flag', 1)
            ->where('user_types.user_type', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $user_type = $record->user_type;

            $data_arr[] = array(
                "id" => $count,
                "user_type" => $user_type,
                "action" => '<div class="dropdown-primary dropdown open">
                <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <a class="dropdown-item waves-light waves-effect" href="' . route('user_type_delete', $id) . '">Delete</a>
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
    public function edit(UserType $userType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserType $userType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = UserType::find($id);
        $data->flag = 2;
        $data->updated_by = session('admin')['admin_id'];
        $saveData = $data->save();
        if ($saveData) {
            toastr()->success('User Type Deleted !');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return redirect()->route('user_type');
    }
}