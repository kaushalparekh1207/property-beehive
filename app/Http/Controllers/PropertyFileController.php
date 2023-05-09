<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyFileController extends Controller
{
    /**
     * Upload Banner Insert
     */
    public function uploadPropertyBannerImage(Request $request)
    {
        $banner_certificate = $request->file('file');
        $banner_certificate_name = uniqid() . '_' . $banner_certificate->getClientOriginalName();
        $path = storage_path('app/public/property/banner_image/');
        $banner_certificate->move($path, $banner_certificate_name);
        return response()->json(['success'=>$banner_certificate_name]);
    }
}
