<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.state');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.state_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Model = new State();
        $Model->state = $request->state;
        $Model->created_by = session('admin')['admin_id'];
        $saveData = $Model->save();
        if($saveData){
            toastr('State Add successfully','success');
        }else{
            toastr('Something went wrong','error');
        }
        return redirect()->route('state');
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
 
         $totalRecords = State::select('count(*) as allcount')
             ->where('states.flag', 1)
             ->where('states.state', 'like', '%' . $searchValue . '%')
             ->count();
 
         $totalRecordswithFilter = State::select('count(*) as allcount')
         ->where('states.flag', 1)
         ->where('states.state', 'like', '%' . $searchValue . '%')
         ->count();
         // Fetch records
         $records = State::orderBy($columnName, $columnSortOrder)
         ->where('states.flag', 1)
         ->where('states.state', 'like', '%' . $searchValue . '%')
             ->skip($start)
             ->take($rowperpage)
             ->get();
 
         $data_arr = array();
         $count = 0;
         foreach ($records as $record) {
             $count = $count + 1;
             $id = $record->id;
             $state_name = $record->state;
 
             $data_arr[] = array(
                 "id" => $count,
                 "state" => $state_name,
                 "action" => '<div class="dropdown-primary dropdown open">
                 <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                 <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                 <a class="dropdown-item waves-light waves-effect" href="' . route('state_destroy', $id) . '">Delete</a>
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
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Model = State::findOrFail($id);
        $Model->flag = 2;
        $Model->updated_by = session('admin')['admin_id'];
        $delete = $Model->save();
        if($delete){
            toastr('\State deleted successfully','success');
        }else{
            toastr('Something went Wrong Please Try Again','error');
        }

        return redirect()->route('state');
    }
}