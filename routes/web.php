<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgriculturePropertyController;
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

Route::get('/admin/aggriculture_property',[AgriculturePropertyController::class,'index'])->name('aggriculture_property');

Route::get('/admin/aggriculture_property/show',[AgriculturePropertyController::class,'show'])->name('showAggriculturePropertyDetails');

Route::get('/admin/aggriculture_property/add',[AgriculturePropertyController::class,'create'])->name('aggriculture_property_add');

Route::post('/admin/aggriculture_property/insert',[AgriculturePropertyController::class,'store'])->name('aggriculture_property_insert');