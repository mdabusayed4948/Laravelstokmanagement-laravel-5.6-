<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use Auth;
use Session;
use Brian2694\Toastr\Facades\Toastr;

class BrandController extends Controller
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
        $brands = Brand::orderby('id', 'desc')->get(); //show only 5 items at a time in descending order

        return view('brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
            'name'=>'required|max:100|unique:brands',
            'status'=>'required',
         
        ]);

        foreach($request->name as $key => $name)
        {
            $brands = new Brand();
            $brands->name = $name;
            $brands->status = $request->status[$key];
            
            $brands->save();
           

        }
    // //Display a successful message upon save
        Toastr::success('Brand Successfully Saved :)' ,'Success');
        return redirect()->route('brands.index');
    
 
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
        $brand = Brand::findOrFail($id); //Find post of id = $id
         // dump($brand_id);
        return view ('brands.edit', compact('brand'));
   
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

        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('name');
        $brand->status = $request->input('status');
       
        $brand->save();

         Toastr::success('Brand Successfully Update :)' ,'Success');
        return redirect()->route('brands.index');
    
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        Toastr::success('Brand Successfully Deleted :)' ,'Success');
        return redirect()->route('brands.index');
    }
}
