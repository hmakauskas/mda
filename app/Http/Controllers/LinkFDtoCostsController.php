<?php

namespace App\Http\Controllers;

use App\FiscalDocument;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FiscalDocumentRepository;

use App\Cost;
use App\Repositories\CostRepository;

class LinkFDtoCostsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(FiscalDocumentRepository $fiscalDocumentRepository, CostRepository $costRepository)
    {
        $this->middleware('auth');

        $this->fiscalDocumentRepository = $fiscalDocumentRepository;

        $this->costRepository = $costRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sbranches = array(
                1 => 'Oracle Alemanha',
                2 => 'Google BR',
                3 => 'Google Alemanha',
            );

        $channels = array(
                1 => 'CRM',
                2 => 'SEM',
                3 => 'Facebook',
            );

        $companies = \DB::table('companies')->lists('store_name', 'id');


        $fk_supplier_branch = \Request::get('fk_supplier_branch');
        $fk_channel = \Request::get('fk_channel');
        $fk_company = \Request::get('fk_company');
        $from = \Request::get('from').' 00:00:00';
        $to = \Request::get('to').' 23:59:59';

        if($fk_supplier_branch && $fk_channel && $fk_company){

            $allFiscalDocuments = FiscalDocument::whereBetween('created_at', [$from, $to])
                ->Where('fk_supplier_branch', $fk_supplier_branch)
                ->Where('fk_company', $fk_company)
                ->orderBy('id', 'desc')
                ->paginate(5); 


             $allCost = Cost::whereBetween('created_at', [$from, $to])
                ->Where('fk_supplier', 1)
                ->Where('fk_channel', $fk_channel)
                ->Where('fk_company', $fk_company)
                ->orderBy('id', 'desc')
                ->get();

        }else{

            $allFiscalDocuments = FiscalDocument::orderBy('id', 'desc')->paginate(5);    

            $allCost = Cost::orderBy('id', 'desc')->paginate(5);
        }

        return view('cost.join', [
            'fiscalDocuments' => $allFiscalDocuments,
            'companies' => $companies,
            'sbranches' => $sbranches,
            'channels' => $channels,
            'costs' => $allCost,
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        foreach ($request->cost_ids as $cost_id) {
            
            $cost = Cost::find($cost_id);
            $cost->fk_fiscal_document = $request->fiscalDocument_id;            
            $cost->save();
        }

        return redirect('/joincosts');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
