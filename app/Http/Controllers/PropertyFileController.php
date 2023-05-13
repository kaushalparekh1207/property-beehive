<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PropertyFloorPlanImage;
use App\Models\PropertyMaster;
use App\Models\PropertyMasterPlanImage;
use App\Models\PropertySiteViewImage;
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

    public function uploadPropertyMasterPlanImage(Request $request)
    {
        $propertyMasterModel = new PropertyMaster();
        $masterPlanImageModel = new PropertyMasterPlanImage();
        $masterPlanImages = $request->file('file');
        $master_plan_image_name = uniqid() . '_' . $masterPlanImages->getClientOriginalName();
        $path = storage_path('app/public/property/master_plan_image/');
        $masterPlanImages->move($path, $master_plan_image_name);
        $property_master_id = $propertyMasterModel->id;
        $masterPlanImageModel->property_master_id = $property_master_id;
        $masterPlanImageModel->master_plan_image = $master_plan_image_name;
        $masterPlanImageModel->save();
        return response()->json(['success' => $master_plan_image_name]);
    }

    public function uploadPropertySiteViewImage(Request $request)
    {
        $propertyMasterModel = new PropertyMaster();
        $siteViewImageModel = new PropertySiteViewImage();
        $siteViewImageModel = $request->file('file');
        $site_view_image_name = uniqid() . '_' . $siteViewImageModel->getClientOriginalName();
        $path = storage_path('app/public/property/site_view_image/');
        $site_view_image_name->move($path, $site_view_image_name);
        $property_master_id = $propertyMasterModel->id;
        $siteViewImageModel->property_master_id = $property_master_id;
        $siteViewImageModel->site_view_image = $site_view_image_name;
        $siteViewImageModel->save();
        return response()->json(['success' => $site_view_image_name]);
    }

    public function uploadPropertyFloorPlanImage(Request $request)
    {
        $propertyMasterModel = new PropertyMaster();
        $floorPlanImageModel = new PropertyFloorPlanImage();
        $floorPlanImage = $request->file('file');
        $floor_plan_image_name = uniqid() . '_' . $floorPlanImage->getClientOriginalName();
        $path = storage_path('app/public/property/floor_plan_image/');
        $floor_plan_image_name->move($path, $floor_plan_image_name);
        $property_master_id = $propertyMasterModel->id;
        $floorPlanImageModel->property_master_id = $property_master_id;
        $floorPlanImageModel->site_view_image = $floor_plan_image_name;
        $floorPlanImageModel->save();
        return response()->json(['success' => $floor_plan_image_name]);
    }

}
