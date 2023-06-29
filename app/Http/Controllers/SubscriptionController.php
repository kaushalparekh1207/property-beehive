<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subscription');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subscription_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Model = new Subscription();
        $Model->package_name = $request->package_name;
        $Model->package_description = $request->package_description;
        $Model->package_type = $request->package_type;
        $Model->number_of_listing_property = $request->number_of_listing_property;
        $Model->number_of_ads = $request->number_of_ads;
        $Model->price = $request->price;
        $Model->created_by = session('admin')['id'];
        $saveData = $Model->save();
        if ($saveData) {
            toastr('Subscription Add successfully', 'success');
        } else {
            toastr('Something went wrong', 'error');
        }
        return redirect()->route('Subscription');
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

        $totalRecords = Subscription::select('count(*) as allcount')
            ->where('subscriptions.flag', 1)
            ->where('subscriptions.package_name', 'like', '%' . $searchValue . '%')
            ->count();

        $totalRecordswithFilter = Subscription::select('count(*) as allcount')
            ->where('subscriptions.flag', 1)
            ->where('subscriptions.package_name', 'like', '%' . $searchValue . '%')
            ->count();
        // Fetch records
        $records = Subscription::orderBy($columnName, $columnSortOrder)
            ->where('subscriptions.flag', 1)
            ->where('subscriptions.package_name', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $package_name = $record->package_name;
            $package_description = $record->package_description;
            $package_type = $record->package_type;
            $number_of_listing_property = $record->number_of_listing_property;
            $number_of_ads = $record->number_of_ads;
            $price = $record->price;
            $data_arr[] = array(
                "id" => $count,
                "package_name" => $package_name,
                "package_description" => $package_description,
                "package_type" => $package_type,
                "number_of_listing_property" => $number_of_listing_property,
                "number_of_ads" => $number_of_ads,
                "price" => $price,
                "action" => '<div class="dropdown">
                 <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                   Action
                 </button>
                 <div class="dropdown-menu">

                 <a href="' . route('subscription_edit', $id) . '" class="dropdown-item" style="--hover-color: green" type="button">Edit</a>
                 <a href="' . route('subscription_destroy', $id) . '" class="dropdown-item" style="--hover-color: green" type="button">Delete</a>

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
        $package = Subscription::findOrFail($id);
        return view('admin.subscription_edit', compact('package'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        $Model = Subscription::find($request->sub_id);
        $Model->package_name = $request->package_name;
        $Model->package_description = $request->package_description;
        $Model->package_type = $request->package_type;
        $Model->number_of_listing_property = $request->number_of_listing_property;
        $Model->number_of_ads = $request->number_of_ads;
        $Model->price = $request->price;
        $Model->updated_by = session('admin')['id'];
        $updateData = $Model->save();
        if ($updateData) {
            toastr()->success('Subscription Updated Successfully !');
        } else {
            toastr()->error('Something Went Wrong!');
        }
        return redirect()->route('Subscription');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Model = Subscription::findOrFail($id);
        $Model->flag = 2;
        $Model->updated_by = session('admin')['id'];
        $delete = $Model->save();
        if ($delete) {
            toastr('Subscription deleted successfully', 'success');
        } else {
            toastr('Something went Wrong Please Try Again', 'error');
        }

        return redirect()->route('Subscription');
    }
}