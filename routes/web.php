<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AgriculturePropertyController;
use App\Http\Controllers\AmenitiesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\NonAgriculturePropertyController;
use App\Http\Controllers\PropertyTransactionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
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

Route::view('/admin/dashboard', 'admin.index')->name('index')->middleware('checksession');
// Route::get('/admin/dashboard', function () {
//     if (!session()->has('admin')) {
//         return redirect()->route('login');
//     } else {
//         return view('admin.index');
//     }
// })->name('index');

Route::view('/admin/login', 'admin.login')->name('login');

Route::post('/admin/login/validate', [AdminController::class, 'validateLogin'])->name('validateLogin');

Route::get('/admin/profile', [AdminController::class, 'profile'])->name('profile');

// Aggriculture Property
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/aggriculture_property', [AgriculturePropertyController::class, 'index'])->name('aggriculture_property');
    Route::get('/admin/aggriculture_property/show', [AgriculturePropertyController::class, 'show'])->name('showAggriculturePropertyDetails');
    Route::get('/admin/aggriculture_property/add', [AgriculturePropertyController::class, 'create'])->name('aggriculture_property_add');
    Route::post('/admin/aggriculture_property/insert', [AgriculturePropertyController::class, 'store'])->name('aggriculture_property_insert');
    Route::get('/admin/aggriculture_property/destroy/{id}', [AgriculturePropertyController::class, 'destroy'])->name('aggriculture_property_destroy');
});

// Non Aggriculture Property //
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/non_aggriculture_property', [NonAgriculturePropertyController::class, 'index'])->name('non_aggriculture_property');
    Route::get('/admin/non_aggriculture_property/show', [NonAgriculturePropertyController::class, 'show'])->name('show_non_AggriculturePropertyDetails');
    Route::get('/admin/non_aggriculture_property/add', [NonAgriculturePropertyController::class, 'create'])->name('non_aggriculture_property_add');
    Route::post('/admin/non_aggriculture_property/insert', [NonAgriculturePropertyController::class, 'store'])->name('non_aggriculture_property_insert');
    Route::get('/admin/non_aggriculture_property/delete/{id}', [NonAgriculturePropertyController::class, 'destroy'])->name('non_aggriculture_property_delete');
});

// Add Property Transaction //
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/property_transaction', [PropertyTransactionController::class, 'index'])->name('property_transaction');
    Route::get('/admin/property_transaction/show', [PropertyTransactionController::class, 'show'])->name('show_property_transaction');
    Route::get('/admin/property_transaction/add', [PropertyTransactionController::class, 'create'])->name('property_transaction_add');
    Route::post('/admin/property_transaction/insert', [PropertyTransactionController::class, 'store'])->name('property_transaction_insert');
    Route::get('/admin/property_transaction/delete/{id}', [PropertyTransactionController::class, 'destroy'])->name('property_transaction_delete');
});

// Role Master Routes //
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/roles', [AdminRoleController::class, 'index'])->name('roles');
    Route::get('/admin/roles/show', [AdminRoleController::class, 'show'])->name('showAdminRoles');
    Route::get('/admin/roles/add', [AdminRoleController::class, 'create'])->name('roles_add');
    Route::post('/admin/roles/insert', [AdminRoleController::class, 'store'])->name('roles_insert');
    Route::get('/admin/roles/delete/{id}', [AdminRoleController::class, 'destroy'])->name('roles_destroy');
});

// State Master //
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/state', [StateController::class, 'index'])->name('state');
    Route::get('/admin/state/show', [StateController::class, 'show'])->name('showAdminState');
    Route::get('/admin/state/add', [StateController::class, 'create'])->name('state_add');
    Route::post('/admin/state/insert', [StateController::class, 'store'])->name('state_insert');
    Route::get('/admin/state/delete/{id}', [StateController::class, 'destroy'])->name('state_destroy');
});

// Admin Users Routes
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/admin_users', [AdminController::class, 'index'])->name('admin_users');
    Route::get('/admin/admin_users/show', [AdminController::class, 'show'])->name('showAdminUsers');
    Route::get('/admin/admin_users/add', [AdminController::class, 'create'])->name('createAdminUsers');
    Route::post('/admin/admin_users/insert', [AdminController::class, 'store'])->name('AdminUsersinsert');
    Route::get('/admin/admin_users/delete/{id}', [AdminController::class, 'destroy'])->name('AdminUsersdestroy');
    Route::get('/admin/admin_users/edit/{id}', [AdminController::class, 'edit'])->name('AdminUsersedit');
    Route::post('/admin/admin_users/edit/updateuser', [AdminController::class, 'update'])->name('AdminUsersupdate');
});

// City Master Routes
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/city', [CityController::class, 'index'])->name('city');
    Route::get('/admin/city/show', [CityController::class, 'show'])->name('showcity');
    Route::get('/admin/city/add', [CityController::class, 'create'])->name('city_add');
    Route::post('/admin/city/insert', [CityController::class, 'store'])->name('city_insert');
    Route::get('/admin/city/delete/{id}', [CityController::class, 'destroy'])->name('city_destroy');
});
// City Master Routes
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/amenities', [AmenitiesController::class, 'index'])->name('Amenities');
    Route::get('/admin/amenities/show', [AmenitiesController::class, 'show'])->name('show_amenities');
    Route::get('/admin/amenities/add', [AmenitiesController::class, 'create'])->name('amenities_add');
    Route::post('/admin/amenities/insert', [AmenitiesController::class, 'store'])->name('amenities_insert');
    Route::get('/admin/amenities/delete/{id}', [AmenitiesController::class, 'destroy'])->name('amenities_destroy');
});

// Profile Master
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/profile/{id}', [AdminController::class, 'profile'])->name('profile');
    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('updateProfile');
});

// Add user Type//
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/user_type', [UserTypeController::class, 'index'])->name('user_type');
    Route::get('/admin/user_type/show', [UserTypeController::class, 'show'])->name('show_user_type');
    Route::get('/admin/user_type/add', [UserTypeController::class, 'create'])->name('user_type_add');
    Route::post('/admin/user_type/insert', [UserTypeController::class, 'store'])->name('user_type_insert');
    Route::get('/admin/user_type/delete/{id}', [UserTypeController::class, 'destroy'])->name('user_type_delete');
});
// Add users //
Route::group(['middleware' => 'checksession'], function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');
    Route::get('/admin/users/show', [UserController::class, 'show'])->name('show_users');
    Route::get('/admin/users/add', [UserController::class, 'create'])->name('users_add');
    Route::post('/admin/users/insert', [UserController::class, 'store'])->name('users_insert');
    Route::get('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('users_delete');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users_edit');
    Route::post('/admin/users/edit/updateuser', [UserController::class, 'update'])->name('users_update');
});