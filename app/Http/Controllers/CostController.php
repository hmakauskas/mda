<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CostRepository;

class CostController extends Controller
{

    protected $costs;

    public function __construct(CostRepository $costRepository)
    {
        $this->middleware('auth');

        $this->costRepository = $costRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
        $companies = \DB::table('companies')->lists('store_name', 'id');

        if($search){

            $allCosts = Cost::whereRaw('date(date_mgr) = ?', [$search])
                ->orderBy('id', 'desc')
                ->paginate(5);    

        }else{

            $allCosts = Cost::orderBy('id', 'desc')->paginate(5);    
        }

        return view('cost.index', [
            'costs' => $allCosts,
            'companies' => $companies,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currencies = \DB::table('currencies')->lists('currency_code', 'id');
        $companies = \DB::table('companies')->lists('store_name', 'id');
        $suppliers = \DB::table('suppliers')->lists('supplier_name', 'id');
        $marketing_channels = \DB::table('marketing_channels')->lists('channel_name', 'id');
        $categories = \DB::table('categories')->lists('category_name', 'id');
        $status = \DB::table('cost_statuses')->lists('status_name', 'id');

        return view('cost.create', [
            'currencies' => $currencies,
            'companies' => $companies,
            'suppliers' => $suppliers,
            'marketing_channels' => $marketing_channels,
            'categories' => $categories,
            'status' => $status,
        ]);
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
            'short_description' => 'required|max:255',
        ]);

        Cost::create([
            'date_mgr' => $request->date_mgr,
            'date_acc' => $request->date_acc,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'value' => $request->value,
            'fiscal_document_id' => $request->fiscal_document_id,
            'supplier_id' => $request->supplier_id,
            'currency_id' => $request->currency_id,
            'company_id' => $request->company_id,
            'marketing_channel_id' => $request->marketing_channel_id,
            'category_id' => $request->category_id,
            'cost_status_id' => $request->cost_status_id,

        ]);

        return redirect('/cost');
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
        $currencies = \DB::table('currencies')->lists('currency_code', 'id');
        $companies = \DB::table('companies')->lists('store_name', 'id');
        $suppliers = \DB::table('suppliers')->lists('supplier_name', 'id');
        $marketing_channels = \DB::table('marketing_channels')->lists('channel_name', 'id');
        $categories = \DB::table('categories')->lists('category_name', 'id');
        $status = \DB::table('cost_statuses')->lists('status_name', 'id');

        return view('cost.create', [
            'cost' => Cost::find($id),
            'currencies' => $currencies,
            'companies' => $companies,
            'suppliers' => $suppliers,
            'marketing_channels' => $marketing_channels,
            'categories' => $categories,
            'status' => $status,
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
        $cost = Cost::find($request->id);

        $cost->date_mgr = $request->date_mgr;
        $cost->date_acc = $request->date_acc;
        $cost->short_description = $request->short_description;
        $cost->description = $request->description;
        $cost->value = $request->value;
        $cost->supplier_id = $request->supplier_id;
        $cost->currency_id = $request->currency_id;
        $cost->company_id = $request->company_id;
        $cost->marketing_channel_id = $request->marketing_channel_id;
        $cost->category_id = $request->category_id;
        $cost->cost_status_id = $request->cost_status_id;

        $cost->save();

        return redirect('/cost');
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
