<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PropertyFloorPlanImage;
use App\Models\PropertyMaster;
use App\Models\PropertyMasterPlanImage;
use App\Models\PropertySiteViewImage;
use App\Models\PropertyExteriorViewImage;
use App\Models\PropertyLivingRoomImage;
use App\Models\PropertyBedroomImage;
use App\Models\PropertyKitchenImage;
use App\Models\PropertyBathroomImage;
use App\Models\PropertyLocationMapImage;
use App\Models\PropertyOtherImage;
use Illuminate\Http\Request;

class PropertyFileController extends Controller
{
    /**
     * Upload Banner Insert
     */
    public function uploadPropertyBannerImage(Request $request)
    {
        $propertyMasterModel = PropertyMaster::find(session('property_master_id'));
        $banner_certificate = $request->file('file');
        $banner_certificate_name = uniqid() . '_' . $banner_certificate->getClientOriginalName();
        $path = storage_path('app/public/property/banner_image/');
        $banner_certificate->move($path, $banner_certificate_name);
        $propertyMasterModel->cover_image = $banner_certificate_name;
        $propertyMasterModel->save();
        return response()->json(['success'=>$banner_certificate_name]);
    }

    public function uploadPropertyMasterPlanImage(Request $request)
    {
        $masterPlanImageModel = new PropertyMasterPlanImage();
        $masterPlanImages = $request->file('file');
        $master_plan_image_name = uniqid() . '_' . $masterPlanImages->getClientOriginalName();
        $path = storage_path('app/public/property/master_plan_image/');
        $masterPlanImages->move($path, $master_plan_image_name);
        $masterPlanImageModel->property_master_id = session('property_master_id');
        $masterPlanImageModel->master_plan_image = $master_plan_image_name;
        $masterPlanImageModel->save();
        return response()->json(['success' => $master_plan_image_name]);
    }

    public function uploadPropertySiteViewImage(Request $request)
    {
        $siteViewImageModel = new PropertySiteViewImage();
        $siteViewImage = $request->file('file');
        $site_view_image_name = uniqid() . '_' . $siteViewImage->getClientOriginalName();
        $path = storage_path('app/public/property/site_view_image/');
        $siteViewImage->move($path, $site_view_image_name);
        $siteViewImageModel->property_master_id = session('property_master_id');
        $siteViewImageModel->site_view_image = $site_view_image_name;
        $siteViewImageModel->save();
        return response()->json(['success' => $site_view_image_name]);
    }

    public function uploadPropertyFloorPlanImage(Request $request)
    {
        $floorPlanImageModel = new PropertyFloorPlanImage();
        $floorPlanImage= $request->file('file');
        $site_view_image_name = uniqid() . '_' . $floorPlanImage->getClientOriginalName();
        $path = storage_path('app/public/property/floor_plan_image/');
        $floorPlanImage->move($path, $site_view_image_name);
        $floorPlanImageModel->property_master_id = session('property_master_id');
        $floorPlanImageModel->floor_plan_image = $site_view_image_name;
        $floorPlanImageModel->save();
        return response()->json(['success' => $site_view_image_name]);

    }

    public function uploadExteriorViewImage(Request $request)
    {
        $exteriorViewImageModel = new PropertyExteriorViewImage();
        $exteriorViewImages = $request->file('file');
        $exterior_view_image_name = uniqid() . '_' . $exteriorViewImages->getClientOriginalName();
        $path = storage_path('app/public/property/exterior_view_image/');
        $exteriorViewImages->move($path, $exterior_view_image_name);
        $exteriorViewImageModel->property_master_id = session('property_master_id');
        $exteriorViewImageModel->exterior_view_image = $exterior_view_image_name;
        $exteriorViewImageModel->save();
        return response()->json(['success' => $exterior_view_image_name]);
    }

    public function uploadLivingRoomImage(Request $request)
    {
        $livingRoomImageModel = new PropertyLivingRoomImage();
        $livingRoomImages = $request->file('file');
        $living_room_image_name = uniqid() . '_' . $livingRoomImages->getClientOriginalName();
        $path = storage_path('app/public/property/living_room_image/');
        $livingRoomImages->move($path, $living_room_image_name);
        $livingRoomImageModel->property_master_id = session('property_master_id');
        $livingRoomImageModel->living_room_image = $living_room_image_name;
        $livingRoomImageModel->save();
        return response()->json(['success' => $living_room_image_name]);
    }

    public function uploadBedRoomImage(Request $request)
    {
        $bedRoomImageModel = new PropertyBedroomImage();
        $bedRoomImages = $request->file('file');
        $bedroom_image_name = uniqid() . '_' . $bedRoomImages->getClientOriginalName();
        $path = storage_path('app/public/property/bedroom_image/');
        $bedRoomImages->move($path, $bedroom_image_name);
        $bedRoomImageModel->property_master_id = session('property_master_id');
        $bedRoomImageModel->bedroom_image = $bedroom_image_name;
        $bedRoomImageModel->save();
        return response()->json(['success' => $bedroom_image_name]);
    }

    public function uploadKitchenImage(Request $request)
    {
        $kitchenImageModel = new PropertyKitchenImage();
        $kitchenImages = $request->file('file');
        $kitchen_image_name = uniqid() . '_' . $kitchenImages->getClientOriginalName();
        $path = storage_path('app/public/property/kitchen_image/');
        $kitchenImages->move($path, $kitchen_image_name);
        $kitchenImageModel->property_master_id = session('property_master_id');
        $kitchenImageModel->kitchen_image = $kitchen_image_name;
        $kitchenImageModel->save();
        return response()->json(['success' => $kitchen_image_name]);
    }

    public function uploadBathroomImage(Request $request)
    {
        $bathroomImageModel = new PropertyBathroomImage();
        $bathroomImages = $request->file('file');
        $bathroom_image_name = uniqid() . '_' . $bathroomImages->getClientOriginalName();
        $path = storage_path('app/public/property/bathroom_image/');
        $bathroomImages->move($path, $bathroom_image_name);
        $bathroomImageModel->property_master_id = session('property_master_id');
        $bathroomImageModel->bathroom_image = $bathroom_image_name;
        $bathroomImageModel->save();
        return response()->json(['success' => $bathroom_image_name]);
    }

    public function uploadLocationMapImage(Request $request)
    {
        $locationMapImageModel = new PropertyLocationMapImage();
        $locationMapImages = $request->file('file');
        $location_map_image_name = uniqid() . '_' . $locationMapImages->getClientOriginalName();
        $path = storage_path('app/public/property/location_map_image/');
        $locationMapImages->move($path, $location_map_image_name);
        $locationMapImageModel->property_master_id = session('property_master_id');
        $locationMapImageModel->location_map_image = $location_map_image_name;
        $locationMapImageModel->save();
        return response()->json(['success' => $location_map_image_name]);
    }

    public function uploadOtherImage(Request $request)
    {
        $otherImageModel = new PropertyOtherImage();
        $otherImages = $request->file('file');
        $other_image_name = uniqid() . '_' . $otherImages->getClientOriginalName();
        $path = storage_path('app/public/property/other_image/');
        $otherImages->move($path, $other_image_name);
        $otherImageModel->property_master_id = session('property_master_id');
        $otherImageModel->other_image = $other_image_name;
        $otherImageModel->save();
        return response()->json(['success' => $other_image_name]);
    }

}
