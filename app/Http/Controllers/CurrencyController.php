<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Currency;

class CurrencyController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @param  TaskRepository  $tasks
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
        if($search){

            $allCurrencies = Currency::whereRaw('currency_name = ?', [$search])
                ->orderBy('id', 'desc')
                ->paginate(5);    

        }else{

            $allCurrencies = Currency::orderBy('id', 'desc')->paginate(5);    
        }
        
        
        return view('currency.index', [
            'currencies' => $allCurrencies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currency.create');
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
            'currency_name' => 'required|max:255',
        ]);

        $company = Currency::create([
            'currency_code' => $request->currency_code,
            'currency_symbol' => $request->currency_symbol,
            'currency_name' => $request->currency_name,
            'country' => $request->country,
        ]);        

        return redirect('/currency')->with('message', 'Currency added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('currency.index', [
            'currency' => Currency::find($id),
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
        return view('currency.create', [
            'currency' => Currency::find($id),
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
        $currency = Currency::find($request->id);

        $currency->currency_code = $request->currency_code;
        $currency->currency_symbol = $request->currency_symbol;
        $currency->currency_name = $request->currency_name;
        $currency->country = $request->country;
        
        $currency->save();

        return redirect('/currency');
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
