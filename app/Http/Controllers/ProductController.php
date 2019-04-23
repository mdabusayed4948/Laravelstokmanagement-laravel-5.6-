<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Brand;
use Auth;
use Intervention\Image\Facades\Image;
use Session;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id', 'desc')->get(); //show only 5 items at a time in descending order

        return view('products.index',compact('products'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_id = Product::max('id');
        $brands    = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        
        return view('products.create',compact('brands','categories','product_id'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'brands' => 'required',
            'categories' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
          
           if (!file_exists('public/product')) {
               mkdir('public/product', 0777, true);
           }
         
            $image->move('public/product',$imagename);
        }else{
            $imagename = 'default.png';
        }
       
       $product = new Product();
       $product->name = $request->name;
       $product->quantity = $request->quantity;
       $product->rate = $request->rate;
       $product->status = $request->status;
       $product->image = $imagename;

       $product->save();

       $product->brands()->attach($request->brands);
       $product->categories()->attach($request->categories);

        Toastr::success('Product Successfully Saved :)' ,'Success');
        return redirect()->route('products.index');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = Product::findOrFail($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();
        $brands     = Brand::all();
       
        return view('products.edit',compact('product','categories','brands'));
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
        $product = Product::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'brands' => 'required',
            'categories' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);


         if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
          
           if (!file_exists('public/product')) {
               mkdir('public/product', 0777, true);
           }
           if (file_exists('public/product/'.$product->image)) {
          unlink('public/product/'.$product->image);
        }
          
            $image->move('public/product',$imagename);
        }else{
            $imagename = $product->image;
        }
       
       $product->name = $request->name;
       $product->quantity = $request->quantity;
       $product->rate = $request->rate;
       $product->status = $request->status;
       $product->image = $imagename;

       $product->save();

       $product->brands()->sync($request->brands);
       $product->categories()->sync($request->categories);

        Toastr::success('Product Successfully Saved :)' ,'Success');
        return redirect()->route('products.index');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if (file_exists('public/product/'.$product->image)) {
          unlink('public/product/'.$product->image);
        }

        $product->categories()->detach();
        $product->brands()->detach();
        $product->delete();
        Toastr::success('Product Successfully Deleted :)', 'Success');

        return redirect()->back();
   }
}
