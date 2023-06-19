<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AgriculturalProperty;
use App\Models\AgricultureProperty;
use App\Models\Amenities;
use App\Models\City;
use App\Models\CommercialProperty;
use App\Models\IndustrialProperty;
use App\Models\Inquiry;
use App\Models\PropertyAmenities;
use App\Models\PropertyBHKDetails;
use App\Models\PropertyExteriorViewImage;
use App\Models\PropertyFloorPlanImage;
use App\Models\PropertyMaster;
use App\Models\PropertyOtherImage;
use App\Models\PropertyType;
use App\Models\ResidentialProperty;
use App\Models\State;
use App\Models\Taluka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

date_default_timezone_set("Asia/Kolkata");

class PropertyMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propertymaster = PropertyMaster::where('flag', 1)->get();
        // echo"<pre>";
        // echo $propertymaster;
        // echo"</pre>";
        // exit;
        return view('admin.property_listing', compact('propertymaster'));
    }

    public function inquiry_Show()
    {
        $inquiry_data = Inquiry::where('flag', 1)->get();
        // echo"<pre>";
        // echo $propertymaster;
        // echo"</pre>";
        // exit;
        return view('admin.inquiry_listing', compact('inquiry_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $amenities = Amenities::where('flag', 1)->get();
        $states = State::where('flag', 1)->get();
        $cities = City::where('flag', 1)->get();
        $propertyTypes = PropertyType::where('flag', 1)->get(['id', 'property_type']);
        return view('admin.property_add', compact('propertyTypes', 'states', 'cities', 'amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $propertyMasterModel = new PropertyMaster();
        $propertyMasterModel->client_master_id = session('user')['id'];
        $propertyMasterModel->property_id = $request->property;
        $propertyMasterModel->property_type_id = $request->propertytype;
        $propertyMasterModel->state_id = $request->state;
        $propertyMasterModel->city_id = $request->city;
        $propertyMasterModel->taluka_id = $request->taluka_id;
        $propertyMasterModel->locality = $request->locality;
        $propertyMasterModel->name_of_project = $request->name_of_project;
        $propertyMasterModel->descr = $request->descr;
        $propertyMasterModel->spectification = null;
        $propertyMasterModel->address = $request->address;
        $propertyMasterModel->total_balconies = null;
        $propertyMasterModel->total_bathrooms = null;
        $propertyMasterModel->total_floor = $request->total_floor;
        $propertyMasterModel->furnished_status = $request->furnished_status;
        $propertyMasterModel->floor_allowed_for_construction = null;
        $propertyMasterModel->total_open_side = null;
        $propertyMasterModel->width_of_road_facing_plot = null;
        $propertyMasterModel->carpet_area = null;
        $propertyMasterModel->super_area = null;
        $propertyMasterModel->possession_status = $request->possession_status;
        if ($request->possession_status == 'Under Construction') {
            $propertyMasterModel->time_duration = $request->possession_status;
        } elseif ($request->possession_status == 'Ready to Move') {
            $propertyMasterModel->time_duration = $request->time_duration;
        }
        $propertyMasterModel->maintenance = $request->maintenance;
        $propertyMasterModel->monthly_charge = $request->monthly_charges;
        // Rera Certificate Upload Start
        $rera_certificate = $request->file('rera_certificate');
        $rera_certificate_name = uniqid() . '_' . $rera_certificate->getClientOriginalName();
        $path = storage_path('app/public/property/rera_certificate/');
        $rera_certificate->move($path, $rera_certificate_name);
        $propertyMasterModel->rera_certificate = $rera_certificate_name;
        // End

        // Khata Certificate Upload Start
        $khata_certificate = $request->file('khata_certificate');
        $khata_certificate_name = uniqid() . '_' . $khata_certificate->getClientOriginalName();
        $path = storage_path('app/public/property/khata_certificate/');
        $khata_certificate->move($path, $khata_certificate_name);
        $propertyMasterModel->khata_certificate = $khata_certificate_name;
        // End

        $saveData = $propertyMasterModel->save();
        $lastInsertedId = $propertyMasterModel->id;

        // Add Property Amenities
        $amenities = $request->amenities;
        foreach ($amenities as $amenity) {
            $propertyAmenities = new PropertyAmenities();
            $propertyAmenities->property_id = $lastInsertedId;
            $propertyAmenities->amenities_id = $amenity;
            $propertyAmenities->save();
        }

        // Add Property BHK Details
        $bhkDetails = $request->bhk_details;
        foreach ($bhkDetails as $bhkDetail) {
            $propertyBHKModel = new PropertyBHKDetails();
            $propertyBHKModel->property_id = $lastInsertedId;
            $propertyBHKModel->bhk_id = $bhkDetail;
            $propertyBHKModel->save();
        }

        // Upload Exterior View Property Image Code Start
        $propertyExteriorViewImages = $request->file('property_exterior_view_image');
        foreach ($propertyExteriorViewImages as $propertyExteriorViewImage) {
            $propertyExteriorViewModel = new PropertyExteriorViewImage();
            $propertyExteriorViewModel->property_id = $lastInsertedId;
            $imageNameWithExtension = uniqid() . '_' . $propertyExteriorViewImage->getClientOriginalName();
            $imageNameWithoutExtension = preg_replace('/\..+$/', '', $imageNameWithExtension);
            $ext = 'webp';
            $imageConvert = Image::make($propertyExteriorViewImage->getRealPath())->stream($ext, 100);
            Storage::put('public/property/exterior_view_image/' . $imageNameWithoutExtension . '.' . $ext, $imageConvert);
            $propertyExteriorViewModel->exterior_view_image = $imageNameWithoutExtension . '.' . $ext;
            $propertyExteriorViewModel->created_by = session('admin')['id'];
            $propertyExteriorViewModel->save();
        }
        // End

        // Upload Floor Plan Property Image Code Start
        $propertyFloorPlanImages = $request->file('property_exterior_view_image');
        foreach ($propertyFloorPlanImages as $propertyFloorPlanImage) {
            $propertyFloorPlanModel = new PropertyFloorPlanImage();
            $propertyFloorPlanModel->property_id = $lastInsertedId;
            $imageNameWithExtension = uniqid() . '_' . $propertyFloorPlanImage->getClientOriginalName();
            $imageNameWithoutExtension = preg_replace('/\..+$/', '', $imageNameWithExtension);
            $ext = 'webp';
            $imageConvert = Image::make($propertyFloorPlanImage->getRealPath())->stream($ext, 100);
            Storage::put('public/property/floor_plan_image/' . $imageNameWithoutExtension . '.' . $ext, $imageConvert);
            $propertyFloorPlanModel->floor_plan_image = $imageNameWithoutExtension . '.' . $ext;
            $propertyFloorPlanModel->created_by = session('admin')['id'];
            $propertyFloorPlanModel->save();
        }
        // End of Coding

        // Upload Property Other Image Code Start
        $propertyOtherImages = $request->file('property_other_image');
        foreach ($propertyOtherImages as $propertyOtherImage) {
            $propertyOtherImageModel = new PropertyOtherImage();
            $propertyOtherImageModel->property_id = $lastInsertedId;
            $imageNameWithExtension = uniqid() . '_' . $propertyOtherImage->getClientOriginalName();
            $imageNameWithoutExtension = preg_replace('/\..+$/', '', $imageNameWithExtension);
            $ext = 'webp';
            $imageConvert = Image::make($propertyOtherImage->getRealPath())->stream($ext, 100);
            Storage::put('public/property/other_property_image/' . $imageNameWithoutExtension . '.' . $ext, $imageConvert);
            $propertyOtherImageModel->other_image = $imageNameWithoutExtension . '.' . $ext;
            $propertyOtherImageModel->created_by = session('admin')['id'];
            $propertyOtherImageModel->save();
        }
        // End of Coding

        if ($saveData) {
            toastr()->success('Property Added Successfully');
        } else {
            toastr()->error('Something went wrong, please try again');
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyMaster $propertyMaster)
    {
        //
    }

    /**
     * Fetch Property Data
     */
    public function fetchPropertyCategory(Request $request)
    {
        $property_type_id = $request->property_type_id;
        $data['property_category'] = DB::table('property_categories')->where('property_type_id', $property_type_id)->where("flag", 1)->get(['id', 'property_category_name']);
        return response()->json($data);
    }

    /**
     * Fetch City Data
     */
    public function fetchCity(Request $request)
    {
        $data['city'] = City::where("state_id", $request->state)->where("flag", 1)->get(["id", "city"]);
        return response()->json($data);
    }

    public function fetchTaluka(Request $request)
    {
        $data['taluka'] = Taluka::where("city_id", $request->city)->where("flag", 1)->get(["id", "taluka"]);
        return response()->json($data);
    }
    /**
     * Create Property By Frontend User
     */
    public function postProperty()
    {
        $amenities = Amenities::where('flag', 1)->get();
        $propertyTypes = PropertyType::where('flag', 1)->get();
        $states = State::where('flag', 1)->get();
        $cities = City::where('flag', 1)->get();
        $taluka = Taluka::where('flag', 1)->get();
        return view('front.post_property', compact('propertyTypes', 'states', 'cities', 'amenities', 'taluka'));
    }

    /**
     * Insert Property Insert
     */

    public function propertyDataInsertAjax(Request $request)
    {

        $propertyMasterModel = new PropertyMaster();
        $propertyMasterModel->client_master_id = session('user')['id'];
        $propertyMasterModel->property_status = $request->propertystatus;
        $propertyMasterModel->property_type_id = $request->property_type;
        $propertyMasterModel->property_category_id = $request->property_category_dropdown;
        $propertyMasterModel->state_id = $request->state_id;
        $propertyMasterModel->city_id = $request->city_dropdown;
        $propertyMasterModel->taluka_id = $request->taluka_dropdown;
        $propertyMasterModel->locality = $request->locality;
        $propertyMasterModel->name_of_project = $request->name_of_project;
        $propertyMasterModel->address = $request->address;
        $propertyMasterModel->expected_price = $request->price;
        $propertyMasterModel->booking_amount = $request->booking_amount;
        $propertyMasterModel->save();
        $lastInsertedPropertyMasterId = $propertyMasterModel->id;

        if ($request->property_type == 1) {

            // Residential Property Insert //
            $residentialPropertyModel = new ResidentialProperty();
            $residentialPropertyModel->property_master_id = $lastInsertedPropertyMasterId;
            $residentialPropertyModel->descr = $request->descr;
            $residentialPropertyModel->no_of_flats = $request->no_of_flats;
            $residentialPropertyModel->total_bedrooms = $request->total_bedrooms;
            $residentialPropertyModel->total_balconies = $request->total_balconies;
            $residentialPropertyModel->total_bathrooms = $request->total_bathrooms;
            $residentialPropertyModel->total_floor = $request->total_floors;
            $residentialPropertyModel->floor_allowed_for_construction = $request->floors_allowed_for_construction;
            $residentialPropertyModel->total_open_side = $request->no_of_open_sides;
            $residentialPropertyModel->width_of_road_facing_plot = $request->width_of_road_facing_plot;
            $residentialPropertyModel->any_construction = $request->any_construction;
            $residentialPropertyModel->boundary_wall_made = $request->boundary_wall;
            $residentialPropertyModel->is_in_gated_colony = null;
            $residentialPropertyModel->carpet_area = $request->carpet_area;
            $residentialPropertyModel->super_area = $request->super_area;
            $residentialPropertyModel->plot_area = $request->plot_area;
            $residentialPropertyModel->plot_length = $request->plot_length;
            $residentialPropertyModel->plot_breadth = $request->plot_breadth;
            $residentialPropertyModel->furnished_status = $request->furnished_status;
            $residentialPropertyModel->possession_status = $request->possession_status;
            if ($request->possession_status == 'Under Construction') {
                $residentialPropertyModel->time_duration = $request->available_from;
            } elseif ($request->possession_status == 'Ready to Move') {
                $residentialPropertyModel->age = $request->age;
            }
            $saveData = $residentialPropertyModel->save();
            $lastInsertedTypeId = $residentialPropertyModel->id;
            $request->session()->put('property_master_id', $lastInsertedPropertyMasterId);

        } else if ($request->property_type == 2) {

            // Commercial Property Insert //
            $commercialPropertyModel = new CommercialProperty();
            $commercialPropertyModel->property_master_id = $lastInsertedPropertyMasterId;
            $commercialPropertyModel->descr = $request->descr;
            $commercialPropertyModel->land_zone = $request->land_zone;
            $commercialPropertyModel->total_washrooms = $request->total_bathrooms;
            $commercialPropertyModel->personal_washroom = $request->personal_washroom;
            $commercialPropertyModel->total_floor = $request->total_floors;
            $commercialPropertyModel->cafeteria = $request->cafeteria;
            $commercialPropertyModel->corner = $request->corner_showroom;
            $commercialPropertyModel->is_main_road_facing = $request->is_main_road_facing;
            $commercialPropertyModel->floor_allowed_for_construction = $request->floors_allowed_for_construction;
            $commercialPropertyModel->total_open_side = $request->no_of_open_sides;
            $commercialPropertyModel->width_of_road_facing_plot = $request->width_of_road_facing_plot;
            $commercialPropertyModel->any_construction = $request->any_construction;
            $commercialPropertyModel->boundary_wall_made = $request->boundary_wall;
            $commercialPropertyModel->is_in_gated_colony = null;
            $commercialPropertyModel->carpet_area = $request->carpet_area;
            $commercialPropertyModel->super_area = $request->super_area;
            $commercialPropertyModel->width_of_entrance = $request->width_of_entrance;
            $commercialPropertyModel->plot_area = $request->plot_area;
            $commercialPropertyModel->plot_length = $request->plot_length;
            $commercialPropertyModel->plot_breadth = $request->plot_breadth;
            $commercialPropertyModel->furnished_status = $request->furnished_status;
            $commercialPropertyModel->possession_status = $request->possession_status;
            if ($request->possession_status == 'Under Construction') {
                $commercialPropertyModel->time_duration = $request->available_from;
            } elseif ($request->possession_status == 'Ready to Move') {
                $commercialPropertyModel->age = $request->age;
            }
            $commercialPropertyModel->currently_leased_out = $request->currently_leased_out;
            $commercialPropertyModel->leased_to = $request->leased_to;
            $commercialPropertyModel->monthly_rent = $request->monthly_rent;
            $saveData = $commercialPropertyModel->save();
            $lastInsertedTypeId = $commercialPropertyModel->id;
            $request->session()->put('property_master_id', $lastInsertedPropertyMasterId);
        } else if ($request->property_type == 3) {

            // Industrial Property Insert //
            $industrialPropertyModel = new IndustrialProperty();
            $industrialPropertyModel->property_master_id = $lastInsertedPropertyMasterId;
            $industrialPropertyModel->descr = $request->descr;
            $industrialPropertyModel->land_zone = $request->land_zone;
            $industrialPropertyModel->total_floor = $request->total_floors;
            $industrialPropertyModel->is_main_road_facing = $request->is_main_road_facing;
            $industrialPropertyModel->floor_allowed_for_construction = $request->floors_allowed_for_construction;
            $industrialPropertyModel->total_open_side = $request->no_of_open_sides;
            $industrialPropertyModel->width_of_road_facing_plot = $request->width_of_road_facing_plot;
            $industrialPropertyModel->any_construction = $request->any_construction;
            $industrialPropertyModel->boundary_wall_made = $request->boundary_wall;
            $industrialPropertyModel->carpet_area = $request->carpet_area;
            $industrialPropertyModel->super_area = $request->super_area;
            $industrialPropertyModel->plot_area = $request->plot_area;
            $industrialPropertyModel->plot_length = $request->plot_length;
            $industrialPropertyModel->plot_breadth = $request->plot_breadth;
            $industrialPropertyModel->furnished_status = $request->furnished_status;
            $industrialPropertyModel->possession_status = $request->possession_status;
            if ($request->possession_status == 'Under Construction') {
                $industrialPropertyModel->time_duration = $request->available_from;
            } elseif ($request->possession_status == 'Ready to Move') {
                $industrialPropertyModel->age = $request->age;
            }
            $industrialPropertyModel->currently_leased_out = $request->currently_leased_out;
            $industrialPropertyModel->leased_to = $request->leased_to;
            $industrialPropertyModel->monthly_rent = $request->monthly_rent;
            $saveData = $industrialPropertyModel->save();
            $lastInsertedTypeId = $industrialPropertyModel->id;
            $request->session()->put('property_master_id', $lastInsertedPropertyMasterId);

        } else if ($request->property_type == 4) {

            // Agricultural Property Insert //
            $agriculturalPropertyModel = new AgriculturalProperty();
            $agriculturalPropertyModel->property_master_id = $lastInsertedPropertyMasterId;
            $agriculturalPropertyModel->descr = $request->descr;
            $agriculturalPropertyModel->total_floor = $request->total_floors;
            $agriculturalPropertyModel->total_bedrooms = $request->total_bedrooms;
            $agriculturalPropertyModel->total_bathrooms = $request->total_bathrooms;
            $agriculturalPropertyModel->total_open_side = $request->no_of_open_sides;
            $agriculturalPropertyModel->width_of_road_facing_plot = $request->width_of_road_facing_plot;
            $agriculturalPropertyModel->boundary_wall_made = $request->boundary_wall;
            $agriculturalPropertyModel->carpet_area = $request->carpet_area;
            $agriculturalPropertyModel->super_area = $request->super_area;
            $agriculturalPropertyModel->width_of_entrance = $request->width_of_entrance;
            $agriculturalPropertyModel->plot_area = $request->plot_area;
            $agriculturalPropertyModel->plot_length = $request->plot_length;
            $agriculturalPropertyModel->plot_breadth = $request->plot_breadth;
            $agriculturalPropertyModel->furnished_status = $request->furnished_status;
            $agriculturalPropertyModel->possession_status = $request->possession_status;
            if ($request->possession_status == 'Under Construction') {
                $agriculturalPropertyModel->time_duration = $request->available_from;
            } elseif ($request->possession_status == 'Ready to Move') {
                $agriculturalPropertyModel->age = $request->age;
            }
            $agriculturalPropertyModel->currently_leased_out = $request->currently_leased_out;
            $agriculturalPropertyModel->leased_to = $request->leased_to;
            $agriculturalPropertyModel->monthly_rent = $request->monthly_rent;
            $saveData = $agriculturalPropertyModel->save();
            $lastInsertedTypeId = $agriculturalPropertyModel->id;
            $request->session()->put('property_master_id', $lastInsertedPropertyMasterId);
        }

        // Add Property Amenities
        $amenitiesArray = $request->amenitiesArray;
        if ($amenitiesArray != []) {
            foreach ($amenitiesArray as $amenity) {
                $propertyAmenities = new PropertyAmenities();
                $propertyAmenities->property_master_id = $lastInsertedPropertyMasterId;
                $propertyAmenities->amenities_id = $amenity;
                $propertyAmenities->save();
            }
        }

        echo 'suceess';
    }
}
