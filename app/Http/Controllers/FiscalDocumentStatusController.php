<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\FiscalDocumentStatus;
use App\Repositories\FiscalDocumentStatusRepository;

class FiscalDocumentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(FiscalDocumentStatusRepository $FiscalDocumentStatusRepository)
    {
        $this->middleware('auth');

        $this->FiscalDocumentStatusRepository = $FiscalDocumentStatusRepository;
    }

    public function index()
    {
        //
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
        
        if($search){

            $allFiscalDocumentStatus = FiscalDocumentStatus::whereRaw('status_name = ?', [$search])
                ->orderBy('id','asc')
                ->paginate(5);    

        }else{

            $allFiscalDocumentStatus = FiscalDocumentStatus::orderBy('id', 'asc')->paginate(5);    
        }

        
        return view('FiscalDocumentStatus.index', [
            'FiscalDocumentStatuses' => $allFiscalDocumentStatus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('FiscalDocumentStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'status_name' => 'required|max:255',
        ]);

        FiscalDocumentStatus::create([
            'status_name' => $request->status_name,
        ]);

        return redirect('/fiscalDocumentStatus');
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

        return view('FiscalDocumentStatus.index', [
            'FiscalDocumentStatus' => $this->FiscalDocumentStatusRepository->getFiscalDocumentStatus($id),
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
        //
        return view('FiscalDocumentStatus.create', [
            'FiscalDocumentStatus' => $this->FiscalDocumentStatusRepository->getFiscalDocumentStatus($id),
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

        $FiscalDocumentStatus = FiscalDocumentStatus::find($request->id);

        $FiscalDocumentStatus->status_name = $request->status_name;
        
        $FiscalDocumentStatus->save();

        return redirect('/fiscalDocumentStatus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $FiscalDocumentStatus = FiscalDocumentStatus::find($id);
        $FiscalDocumentStatus->delete();

        return redirect('/fiscalDocumentStatus')->with('delete_message', 'Fiscal Document Status deleted.');;
    }
}
