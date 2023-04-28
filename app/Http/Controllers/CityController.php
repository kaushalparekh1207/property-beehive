<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cities');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
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

        $totalRecords = City::select('count(*) as allcount')
            ->join('states', 'states.id', '=', 'cities.state_id')
            ->where('cities.flag', 1)
            ->where('states.flag', 1)
            ->where('states.state', 'like', '%' . $searchValue . '%')
            ->orWhere('cities.city', 'like', '%' . $searchValue . '%')
            ->where('cities.flag', 1)
            ->where('states.flag', 1)
            ->count();

        $totalRecordswithFilter = City::select('count(*) as allcount')
            ->join('states', 'states.id', '=', 'cities.state_id')
            ->where('cities.flag', 1)
            ->where('states.flag', 1)
            ->where('states.state', 'like', '%' . $searchValue . '%')
            ->orWhere('cities.city', 'like', '%' . $searchValue . '%')
            ->where('cities.flag', 1)
            ->where('states.flag', 1)
            ->count();

        // Fetch records
        $records = City::orderBy($columnName, $columnSortOrder)
            ->join('states', 'states.id', '=', 'cities.state_id')
            ->where('cities.flag', 1)
            ->where('states.flag', 1)
            ->where('states.state', 'like', '%' . $searchValue . '%')
            ->orWhere('cities.city', 'like', '%' . $searchValue . '%')
            ->where('cities.flag', 1)
            ->where('states.flag', 1)
            ->select('states.state', 'cities.city', 'cities.id')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $count = 0;
        foreach ($records as $record) {
            $count = $count + 1;
            $id = $record->id;
            $state = $record->state;
            $city = $record->city;

            $data_arr[] = array(
                "id" => $count,
                "state" => $state,
                "city" => $city,
                "action" => '<div class="dropdown-primary dropdown open">
                <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <a class="dropdown-item waves-light waves-effect" href="' . route('city_destroy', $id) . '">Delete</a>
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stateData = State::where('flag', 1)->get();
        return view('admin.cities_add', compact('stateData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formdata = new City();
        $formdata->state_id = $request->state_id;
        $formdata->city = $request->city;
        $formdata->created_by = session('admin')['admin_id'];
        $saveData = $formdata->save();

        if ($saveData) {
            toastr()->success('City add Successfully !');
        } else {
            toastr()->error('Something went Wrong !');
        }

        return redirect()->route('city');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $formdata = City::findOrFail($id);
        $formdata->flag = 2;
        $formdata->updated_by = session('admin')['admin_id'];
        $saveData = $formdata->save();
        if ($saveData) {
            toastr()->success('City Deleted Successfully !');
        } else {
            toastr()->error('Something went Wrong !');
        }

        return redirect()->route('city');
    }
}
