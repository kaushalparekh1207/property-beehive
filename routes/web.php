<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AgriculturePropertyController;
use App\Http\Controllers\NonAgriculturePropertyController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/admin', function () {
    return redirect('admin/login');
});

Route::get('/', function () {
    return redirect('admin/login');
});

// Logout Routes

Route::get('/admin/logout', function () {
    if (session('admin')) {
        session()->pull('admin');
    }
    return redirect('admin/login');
})->name('admin_logout');

Route::view('/admin/dashboard','admin.index')->name('index');

Route::view('/admin/login','admin.login')->name('login');

Route::post('/admin/login/validate',[AdminController::class,'validateLogin'])->name('validateLogin');

Route::get('/admin/profile',[AdminController::class,'profile'])->name('profile');

// Aggriculture Property

Route::get('/admin/aggriculture_property',[AgriculturePropertyController::class,'index'])->name('aggriculture_property');
Route::get('/admin/aggriculture_property/show',[AgriculturePropertyController::class,'show'])->name('showAggriculturePropertyDetails');
Route::get('/admin/aggriculture_property/add',[AgriculturePropertyController::class,'create'])->name('aggriculture_property_add');
Route::post('/admin/aggriculture_property/insert',[AgriculturePropertyController::class,'store'])->name('aggriculture_property_insert');
Route::get('/admin/aggriculture_property/destroy/{id}', [AgriculturePropertyController::class,'destroy'])->name('aggriculture_property_destroy');

// Non Aggriculture Property //

Route::get('/admin/non_aggriculture_property',[NonAgriculturePropertyController::class,'index'])->name('non_aggriculture_property');
Route::get('/admin/non_aggriculture_property/show',[NonAgriculturePropertyController::class,'show'])->name('show_non_AggriculturePropertyDetails');
Route::get('/admin/non_aggriculture_property/add',[NonAgriculturePropertyController::class,'create'])->name('non_aggriculture_property_add');
Route::post('/admin/non_aggriculture_property/insert',[NonAgriculturePropertyController::class,'store'])->name('non_aggriculture_property_insert');
Route::get('/admin/non_aggriculture_property/delete/{id}',[NonAgriculturePropertyController::class,'destroy'])->name('non_aggriculture_property_delete');

// Role Master Routes //

Route::get('/admin/roles',[AdminRoleController::class,'index'])->name('roles');
Route::get('/admin/roles/show',[AdminRoleController::class,'show'])->name('showAdminRoles');
Route::get('/admin/roles/add',[AdminRoleController::class,'create'])->name('roles_add');
Route::post('/admin/roles/insert',[AdminRoleController::class,'store'])->name('roles_insert');
Route::get('/admin/roles/delete/{id}',[AdminRoleController::class,'destroy'])->name('roles_destroy');


// State Master //

Route::get('/admin/state',[StateController::class,'index'])->name('state');
Route::get('/admin/state/show',[StateController::class,'show'])->name('showAdminState');
Route::get('/admin/state/add',[StateController::class,'create'])->name('state_add');
Route::post('/admin/state/insert',[StateController::class,'store'])->name('state_insert');
Route::get('/admin/state/delete/{id}',[StateController::class,'destroy'])->name('state_destroy');


// Admin Users Routes

Route::get('/admin/users',[AdminController::class,'index'])->name('admin_users');
Route::get('/admin/users/show',[AdminController::class,'show'])->name('showAdminUsers');
Route::get('/admin/users/add',[AdminController::class,'create'])->name('createAdminUsers');
Route::post('/admin/users/insert',[AdminController::class,'store'])->name('AdminUsersinsert');
Route::get('/admin/users/delete/{id}',[AdminController::class,'destroy'])->name('AdminUsersdestroy');

Route::get('/admin/city',[CityController::class,'index'])->name('city');
Route::get('/admin/city/show',[CityController::class,'show'])->name('showcity');
Route::get('/admin/city/add',[CityController::class,'create'])->name('city_add');
Route::post('/admin/city/insert',[CityController::class,'store'])->name('city_insert');
Route::get('/admin/city/delete/{id}',[CityController::class,'destroy'])->name('city_destroy');