<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Category;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->middleware('auth');

        $this->CategoryRepository = $CategoryRepository;
    }


    public function index(Request $request)
    {
        $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
        
        if($search){

            $allCategory = Category::whereRaw('category_name = ?', [$search])
                ->orderBy('id','asc')
                ->paginate(5);    

        }else{

            $allCategory = Category::orderBy('id', 'asc')->paginate(5);    
        }

        
        return view('Category.index', [
            'Categories' => $allCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
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
            'category_name' => 'required|max:255',
        ]);

        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Category.index', [
            'Category' => $this->CategoryRepository->getCategory($id),
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

       
        return view('Category.create', [
            'Category' => $this->CategoryRepository->getCategory($id),
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

        $Category = Category::find($request->id);

        $Category->category_name = $request->category_name;
        
        $Category->save();

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
    public function destroy($id)
    {
        $Category = Category::find($id);
        $Category->delete();

        return redirect('/category')->with('delete_message', 'Category deleted.');;
    }


}
