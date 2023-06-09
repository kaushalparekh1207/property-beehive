<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ClientType;
use App\Models\State;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userType = UserType::where('flag', 1)->get();
        return view('admin.user_add', compact('userType'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = new User();
        $formdata->user_type_id = $request->user_type;
        $formdata->name = $request->user_name;
        $formdata->contact = $request->contact;
        $formdata->email = $request->email;
        $formdata->user_password = $request->password;
        $formdata->password = Hash::make($request->password);
        // $formdata->created_by = session('admin')['admin_id'];
        // $formdata->updated_by = session('admin')['admin_id'];
        $saveData = $formdata->save();

        if ($saveData) {
            toastr()->success('User add !!!');
        } else {
            toastr()->error('Something went Wrong !');
        }

        return redirect()->route('users');
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

        $totalRecords = User::select('count(*) as allcount')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('users.flag', 1)
            ->where('user_types.flag', 1)
            ->where('users.name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = User::select('count(*) as allcount')
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('users.flag', 1)
            ->where('user_types.flag', 1)
            ->where('users.name', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = User::orderBy($columnName, $columnSortOrder)
            ->join('user_types', 'user_types.id', '=', 'users.user_type_id')
            ->where('users.flag', 1)
            ->where('user_types.flag', 1)
            ->where('users.name', 'like', '%' . $searchValue . '%')
            ->orWhere('users.contact', 'like', '%' . $searchValue . '%')
            ->where('users.flag', 1)
            ->where('user_types.flag', 1)
            ->orWhere('users.email', 'like', '%' . $searchValue . '%')
            ->where('users.flag', 1)
            ->where('user_types.flag', 1)
            ->orWhere('user_types.user_type', 'like', '%' . $searchValue . '%')
            ->where('users.flag', 1)
            ->where('user_types.flag', 1)
            ->select('users.*', 'user_types.user_type')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $user_type = $record->user_type;
            $name = $record->name;
            $contact = $record->contact;

            $data_arr[] = array(
                "id" => $count,
                "user_type" => $user_type,
                "name" => $name,
                "contact" => $contact,
                "action" => '<div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">
                  <a href="' . route('users_edit', $id) . '" class="dropdown-item" style="--hover-color: green" type="button">Edit</a>
                  <a href="' . route('users_delete', $id) . '" class="dropdown-item" style="--hover-color: green" type="button">Delete</a>
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
    public function edit($id)
    {
        $userData = User::find($id);
        $userType = UserType::where('flag', 1)->get();
        return view('admin.user_edit', compact('userType', 'userData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $formdata = User::find($request->user_id);
        $formdata->user_type_id = $request->user_type;
        $formdata->name = $request->user_name;
        $formdata->contact = $request->contact;
        $formdata->email = $request->email;
        $formdata->user_password = $request->password;
        $formdata->password = Hash::make($request->password);
        $updateData = $formdata->save();
        if ($updateData) {
            toastr()->success('User Details Updated Successfully !');
        } else {
            toastr()->error('Something Went Wrong!');
        }
        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->flag = 2;
        // $data->updated_by = session('admin')['admin_id'];
        $saveData = $data->save();
        if ($saveData) {
            toastr()->success('User Deleted !!!');
        } else {
            toastr()->error('Something went Wrong !');
        }
        return redirect()->route('users');
    }

    /**
     * Individual User Registration Call Blade File.
     */

    public function sign_up()
    {
        $clientTypes = ClientType::where('flag', 1)->get(['id', 'client_type']);
        return view('front.sign_up', compact('clientTypes'));
    }

    /**
     * Individual User Registration.
     */
    public function registerUser(Request $request)
    {
        $formdata = new User();
        $formdata->client_type_id = $request->regsiter_as;
        //   $formdata->name = $request->user_name;
        $formdata->contact = $request->contact_no;
        $formdata->email = $request->email;
        $formdata->user_password = $request->password;
        $formdata->password = Hash::make($request->password);
        // $formdata->created_by = session('admin')['admin_id'];
        // $formdata->updated_by = session('admin')['admin_id'];
        $saveData = $formdata->save();

        if ($saveData) {
            toastr()->success('Registration Successfully !!!');
        } else {
            toastr()->error('Something went Wrong !');
        }

        return redirect()->back();
    }

    /**
     * Individual User Login.
     */
    public function loginUser(Request $request)
    {
        $input = $request->input('contact_no');
        $email = User::where('contact', $input)->pluck('email')->first();
        $client_type_id = User::where('contact', $input)->pluck('client_type_id')->first();
        $role_name = ClientType::where('id', $client_type_id)->pluck('client_type')->first();
        $user_id = User::where('contact', $input)->pluck('id')->first();
        $user_name = User::where('contact', $input)->pluck('name')->first();
        $city_id = User::where('contact', $input)->pluck('city_id')->first();
        $city = City::where('id', $city_id)->pluck('city')->first();
        $state_id = User::where('contact', $input)->pluck('state_id')->first();
        $state = State::where('id', $state_id)->pluck('state')->first();

        $credentials = array(
            'contact' => $input,
            'password' => $request->get('password'),
        );

        if (Auth::attempt($credentials, $request->get('savepassword'))) {
            // Remember Login Details
            if ($request->has('remember')) {
                Cookie::queue('saved_input', $input, 1440);
                Cookie::queue('saved_password', $request->get('password'), 1440);
            }
            $request->session()->put('user', ['id' => $user_id, 'role' => $role_name, 'contact_no' => $input, 'email' => $email, 'name' => $user_name, 'city' => $city, 'state' => $state]);
            return redirect()->route('front_home');
        } else {
            toastr()->error('Invalid Info !');
            return redirect()->back();
        }
    }

    /**
     * User Profile.
     */
    public function userProfile($id)
    {
        $userData = User::findOrFail($id);
        $clientTypes = ClientType::where('flag', 1)->get();
        $states = State::where('flag', 1)->get();
        $cities = City::where('flag', 1)->get();
        return view('front.profile', compact('userData', 'clientTypes', 'states', 'cities'));
    }

    /**
     * Edit User Profile.
     */
    public function editProfile(Request $request)
    {
        $userData = User::find($request->id);
        if ($request->client_type_id == '') {
            $client_type_id = User::where('id', $request->id)->pluck('client_type_id')->first();
        }
        $userData->client_type_id = $client_type_id;
        $userData->first_name = $request->first_name;
        $userData->middle_name = $request->middle_name;
        $userData->last_name = $request->last_name;
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->birthday_date = $request->birthday_date;
        $userData->anniversary_date = $request->anniversary_date;
        $userData->rera_registration_number = $request->rera_registration_number;
        $userData->contact = $request->contact;
        $userData->state_id = $request->state_id;
        $userData->city_id = $request->city_id;
        $userData->zip = $request->zip;
        $userData->address = $request->address;
        $saveData = $userData->save();

        if ($saveData) {
            $user_id = User::where('id', $request->id)->pluck('id')->first();
            $email = User::where('contact', $request->contact)->pluck('email')->first();
            $client_type_id = User::where('contact', $request->contact)->pluck('client_type_id')->first();
            $role_name = ClientType::where('id', $client_type_id)->pluck('client_type')->first();
            $city = City::where('id', $request->city_id)->pluck('city')->first();
            $state = State::where('id', $request->state_id)->pluck('state')->first();
            session()->pull('user');
            $request->session()->put('user', ['id' => $user_id, 'role' => $role_name, 'contact_no' => $request->contact, 'email' => $email, 'name' => $request->name, 'city' => $city, 'state' => $state]);
            return back()->with('success', 'Profile Details Updated Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Change Password
     */
    public function changePassword(Request $request)
    {
        return view('front.change-password');
    }

    /**
     * Change Password Post Method
     */
    public function changePasswordSave(Request $request)
    {
        $auth = $request->user_id;
        $users_pass = User::where('id', $auth)->pluck('user_password')->first();

        if ($users_pass != $request->current_password) {
            return back()->with('error', "Old Password is Invalid");
        }
        if ($request->current_password == $request->new_password) {
            return back()->with('error', "New Password cannot be same as your current password");
        }
        $user = User::find($auth);
        $user->password = Hash::make($request->new_password);
        $user->user_password = $request->new_password;
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
}