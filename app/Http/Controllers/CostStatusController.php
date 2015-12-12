<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\CostStatus;
use App\Repositories\CostStatusRepository;

class CostStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(CostStatusRepository $CostStatusRepository)
    {
        $this->middleware('auth');

        $this->CostStatusRepository = $CostStatusRepository;
    }


    public function index(Request $request)
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
        
        if($search){

            $allCostStatus = CostStatus::whereRaw('status_name = ?', [$search])
                ->orderBy('id','asc')
                ->paginate(5);    

        }else{

            $allCostStatus = CostStatus::orderBy('id', 'asc')->paginate(5);    
        }

        
        return view('CostStatus.index', [
            'CostStatuses' => $allCostStatus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CostStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status_name' => 'required|max:255',
        ]);

        CostStatus::create([
            'status_name' => $request->status_name,
        ]);

        return redirect('/costStatus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        return view('CostStatus.index', [
            'CostStatus' => $this->CostStatusRepository->getCostStatus($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
    {

        $costStatuses = \DB::table('cost_statuses')->lists('status_name', 'id');

        return view('CostStatus.create', [
            'CostStatus' => $this->CostStatusRepository->getCostStatus($id),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $CostStatus = CostStatus::find($request->id);

        $CostStatus->status_name = $request->status_name;
        
        $CostStatus->save();

        return redirect('/costStatus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function destroy($id)
    {
        $CostStatus = CostStatus::find($id);
        $CostStatus->delete();

        return redirect('/costStatus')->with('delete_message', 'Cost Status deleted.');;
    }


}
