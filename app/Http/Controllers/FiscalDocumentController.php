<?php

namespace App\Http\Controllers;

use App\FiscalDocument;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Repositories\FiscalDocumentRepository;

class FiscalDocumentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(FiscalDocumentRepository $fiscalDocumentRepository)
    {
        $this->middleware('auth');

        $this->fiscalDocumentRepository = $fiscalDocumentRepository;
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

            $allFiscalDocuments = FiscalDocument::whereRaw('date(created_at) = ?', [$search])
                ->orderBy('id', 'desc')
                ->paginate(5);    

        }else{

            $allFiscalDocuments = FiscalDocument::orderBy('id', 'desc')->paginate(5);    
        }
        
        
        return view('fiscalDocument.index', [
            'fiscalDocuments' => $allFiscalDocuments,
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
        $companies = \DB::table('companies')->lists('store_name', 'id');

        return view('fiscalDocument.create', [
            'companies' => $companies,
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
            'fiscal_document_number' => 'required|max:255',
        ]);

        $fileName = null;

        if ($request->file('file')->isValid()) {

            $fileName = md5(uniqid(rand(), true)) . '.' . $request->file('file')->getClientOriginalExtension();           
            $request->file('file')->move(
                base_path() . '/public/files/fiscal_documents/', $fileName
            );
        }

        $ficalDocument = FiscalDocument::create([
            'fiscal_document_number' => $request->fiscal_document_number,
            'value' => $request->value,
            'fk_supplier_branch' => $request->fk_supplier_branch,
            'fk_currency' => $request->fk_currency,
            'fk_company' => $request->fk_company,
            'fk_fiscal_document_status' => $request->fk_fiscal_document_status,
            'filename' => $fileName,
        ]);        

        return redirect('/fiscalDocument')->with('message', 'Document added!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('fiscalDocument.index', [
            'fiscalDocument' => $this->fiscalDocumentRepository->getFiscalDocument($id),
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

        $companies = \DB::table('companies')->lists('store_name', 'id');

        return view('fiscalDocument.create', [
            'fiscalDocument' => FiscalDocument::find($id),
            'companies' => $companies,
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
        $fileName = null;

        if ($request->file('file')->isValid()) {

            $fileName = md5(uniqid(rand(), true)) . '.' . $request->file('file')->getClientOriginalExtension();           
            $request->file('file')->move(
                base_path() . '/public/files/fiscal_documents/', $fileName
            );
        }

        $fiscalDocument = FiscalDocument::find($request->id);

        $fiscalDocument->fiscal_document_number = $request->fiscal_document_number;
        $fiscalDocument->value = $request->value;
        $fiscalDocument->fk_supplier_branch = $request->fk_supplier_branch;
        $fiscalDocument->fk_currency = $request->fk_currency;
        $fiscalDocument->fk_company = $request->fk_company;
        $fiscalDocument->fk_fiscal_document_status = $request->fk_fiscal_document_status;
        if($fileName){
          if($fiscalDocument->filename) File::delete(base_path() . '/public/files/fiscal_documents/' . $fiscalDocument->filename);
          $fiscalDocument->filename = $fileName;  
        } 

        $fiscalDocument->save();

        return redirect('/fiscalDocument');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FiscalDocument $fiscalDocument)
    {
        $fiscalDocument->delete();

        return redirect('/fiscalDocument');
    }
}
