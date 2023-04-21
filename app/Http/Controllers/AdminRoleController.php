<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin_roles');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin_roles_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roleModel = new AdminRole();
        $roleModel->role_name = $request->role_name;
        $roleModel->created_by = session('admin')['admin_id'];
        $saveData = $roleModel->save();
        if($saveData){
            toastr('Role created successfully','success');
        }else{
            toastr('Something went wrong','error');
        }
        return redirect()->route('roles');

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

        $totalRecords = AdminRole::select('count(*) as allcount')
            ->where('admin_roles.flag', 1)
            ->where('admin_roles.role_name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = AdminRole::select('count(*) as allcount')
            ->where('admin_roles.flag', 1)
            ->where('admin_roles.role_name', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = AdminRole::orderBy($columnName, $columnSortOrder)
            ->where('admin_roles.flag', 1)
            ->where('admin_roles.role_name', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $role_name = $record->role_name;

            $data_arr[] = array(
                "id" => $count,
                "role_name" => $role_name,
                "action" => '<div class="dropdown-primary dropdown open">
                <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <a class="dropdown-item waves-light waves-effect" href="' . route('roles_destroy', $id) . '">Delete</a>
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
        $roleModel = AdminRole::findOrFail($id);
        $roleModel->flag = 2;
        $roleModel->updated_by = session('admin')['admin_id'];
        $delete = $roleModel->save();
        if($delete){
            toastr('Role deleted successfully','success');
        }else{
            toastr('Something went Wrong Please Try Again','error');
        }

        return redirect()->route('roles');
    }
}
