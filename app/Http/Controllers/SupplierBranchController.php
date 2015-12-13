<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SupplierBranch;
use App\Supplier;

class SupplierBranchController extends Controller
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

            $allSuppliers = Supplier::whereRaw('supplier_name = ?', [$search])
                ->orderBy('id', 'desc')
                ->paginate(5);    

        }else{

            $allSuppliers = Supplier::orderBy('id', 'desc')->paginate(5);            
        }

        return view('supplierBranch.index', [
            'suppliers' => $allSuppliers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $suppliers = \DB::table('suppliers')->lists('supplier_name', 'id');

        return view('supplierBranch.create', [
            'suppliers' => $suppliers,
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
            'fiscal_id' => 'required|max:255',
        ]);

        $supplierBranch = SupplierBranch::create([
            'supplier_id' => $request->supplier_id,
            'fiscal_id' => $request->fiscal_id,
            'country' => $request->country,
        ]);        

        return redirect('/supplierbranch')->with('message', 'Company added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('supplierBranch.index', [
            'supplierBranch' => SupplierBranch::find($id),
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
        $suppliers = \DB::table('suppliers')->lists('supplier_name', 'id');

        return view('supplierBranch.create', [
            'supplierBranch' => SupplierBranch::find($id),
            'suppliers' => $suppliers,
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
        $supplierBranch = SupplierBranch::find($request->id);

        $supplierBranch->supplier_id = $request->supplier_id;
        $supplierBranch->fiscal_id = $request->fiscal_id;
        $supplierBranch->country = $request->country;
        
        $supplierBranch->save();

        return redirect('/supplierbranch');
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
