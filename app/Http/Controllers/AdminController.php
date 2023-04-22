<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function validateLogin(Request $request)
    {
        $input = $request->input('contact_no');
        $name = AdminUser::where('contact', $input)->pluck('name')->first();
        $role_id = AdminUser::where('contact', $input)->pluck('role_id')->first();
        $role_name = AdminRole::where('id', $role_id)->pluck('role_name')->first();
        $admin_id = AdminUser::where('contact', $input)->pluck('id')->first();

        $credentials = array(
            'contact' => $input,
            'password' => $request->get('password'),
        );

        if (Auth::guard('admin_user')->attempt($credentials, $request->get('remember'))) {
            // Remember Login Details
            if ($request->has('remember')) {
                Cookie::queue('saved_input', $input, 1440);
                Cookie::queue('saved_password', $request->get('password'), 1440);
            }
            $request->session()->put('admin', ['admin_id' => $admin_id, 'name' => $name, 'role' => $role_id, 'role_name' => $role_name]);
            return redirect('admin/dashboard');
        } else {
            toastr()->error('Invalid Info !');
            return redirect('admin/login')->with('failedmsg', 'Invalid Information');
        }
    }

    public function index()
    {
        return view('admin.admin_users');
    }

    public function create()
    {
        $roles = AdminRole::where('flag',1)->get();
        return view('admin.admin_users_add',compact('roles'));
    }
    public function store(Request $request)
    {
        $Model = new AdminUser();
        $Model->role_id = $request->role;
        $Model->name = $request->user_name;
        $Model->email = $request->email;
        $Model->contact = $request->contact_number;
        $Model->admin_password = $request->password;
        $Model->password = Hash::make($request->passwoed);
        
        // $Model->created_by = session('admin')['admin_id'];
        $saveData = $Model->save();
        if($saveData){
            toastr('Admin User created successfully','success');
        }else{
            toastr('Something went wrong','error');
        }
        return redirect()->route('admin_users');

    }
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

        $totalRecords = AdminUser::join('admin_roles', 'admin_roles.id', '=', 'admin_users.role_id')->select('count(*) as allcount')
            ->where('admin_users.flag', 1)
            ->where('admin_roles.flag',1)
            ->where('admin_users.name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = AdminUser::join('admin_roles', 'admin_roles.id', '=', 'admin_users.role_id')->select('count(*) as allcount')
        ->where('admin_users.flag', 1)
        ->where('admin_roles.flag',1)
        ->where('admin_users.name', 'like', '%' . $searchValue . '%')
        ->count();

        // Fetch records
        $records = AdminUser::orderBy($columnName, $columnSortOrder)
            ->join('admin_roles', 'admin_roles.id', '=', 'admin_users.role_id')
            ->where('admin_users.flag', 1)
            ->where('admin_roles.flag',1)
            ->where('admin_users.name', 'like', '%' . $searchValue . '%')
            ->orWhere('admin_roles.role_name', 'like', '%' . $searchValue . '%')
            ->where('admin_users.flag', 1)
            ->where('admin_roles.flag',1)
            ->orWhere('admin_users.email', 'like', '%' . $searchValue . '%')
            ->where('admin_users.flag', 1)
            ->where('admin_roles.flag',1)
            ->orWhere('admin_users.contact', 'like', '%' . $searchValue . '%')
            ->where('admin_users.flag', 1)
            ->where('admin_roles.flag',1)
            ->select('admin_users.*','admin_roles.role_name')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $role_name = $record->role_name;
            $username = $record->name;
            $useremail = $record->email;
            $number = $record->contact;

            $data_arr[] = array(
                "id" => $count,
                "role_name" => $role_name,
                "name"=>$username,
                "email" => $useremail,
                "contact"=>$number,
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

}