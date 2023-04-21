<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Auth;

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
}
