<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Auth;
use Session;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{

     public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index() {
        $categories = Category::orderby('id', 'desc')->get(); //show only 5 items at a time in descending order

        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) { 

    //Validating title and body field
        $this->validate($request, [
            'name'=>'required|max:100|unique:categories',
            'status'=>'required',
         
        ]);


        foreach($request->name as $key => $name)
        {
            $category = new Category();
            $category->name = $name;
            $category->status = $request->status[$key];
            
            $category->save();
           

        }

       // //Display a successful message upon save
        Toastr::success('Category Successfully Saved :)' ,'Success');
        return redirect()->route('categories.index');
    
 
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
          $category = Category::findOrFail($id); //Find post of id = $id
         // dump($brand_id);
        return view ('categories.edit', compact('category'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function update(Request $request, $id) {
        $this->validate($request, [
            'name'=>'required|max:100',
            'status'=>'required',           
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->status = $request->input('status');
       
        $category->save();

         Toastr::success('Category Successfully Update :)' ,'Success');
        return redirect()->route('categories.index');
    
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function destroy($id) {
        $categories = Category::findOrFail($id);
        $categories->delete();

        Toastr::success('Category Successfully Deleted :)' ,'Success');
        return redirect()->route('categories.index');
    }
}
