<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;

class CompanyController extends Controller
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

            $allCompanies = Company::whereRaw('store_name = ?', [$search])
                ->orderBy('id', 'desc')
                ->paginate(5);    

        }else{

            $allCompanies = Company::orderBy('id', 'desc')->paginate(5);    
        }
        
        
        return view('company.index', [
            'companies' => $allCompanies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'store_name' => 'required|max:255',
        ]);

        $company = Company::create([
            'store_name' => $request->store_name,
            'billing_country' => $request->billing_country,
            'legal_entity_name' => $request->legal_entity_name,
            'legal_entity_tax_register' => $request->legal_entity_tax_register,
        ]);        

        return redirect('/company')->with('message', 'Company added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('company.index', [
            'company' => Company::find($id),
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
        return view('company.create', [
            'company' => Company::find($id),
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
        $company = Company::find($request->id);

        $company->store_name = $request->store_name;
        $company->billing_country = $request->billing_country;
        $company->legal_entity_name = $request->legal_entity_name;
        $company->legal_entity_tax_register = $request->legal_entity_tax_register;
        
        $company->save();

        return redirect('/company');
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
