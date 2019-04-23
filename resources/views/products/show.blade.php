@extends('layouts.backend.app')

@section('title', '| Create New Product')

@push('css')
<!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/select2/dist/css/select2.min.css') }}">

   <!-- file input -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/fileinput/css/fileinput.min.css') }}">
  <style type="text/css">
    .photo-id{
        background-repeat: repeat-x;
        border-color: #ccc;
        padding: 5px;
        text-align: center;
        background: #eee;
        border-bottom: 1px solid #eee;
    }
  </style>

@endpush

@section('content')


 <section class="content-header">
      <h1>
        Product
        <small>Create New Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="#">Product list</a></li>
        <li class="active">Create Product</li>
      </ol>
    </section>

<section class="content">
         
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">
         
            <i class="glyphicon glyphicon-plus-sign"></i> Product Details
          
      </h3>

      <div class="box-tools">
               
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

      </div>
    </div>
    
    <div class="box-body">
       
      <div class="row">
        <div class="col-md-8">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding table-responsive">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Updated At</th>
                    
                  </tr>
                <tr>
                  <td>1.</td>
                  <td>{{ $product->name }}</td>
                  <td><span class="label label-primary">{{ $product->quantity }}</span></td>
                  <td><span class="badge bg-green">tk {{ $product->rate }} </span></td>
                 <td><span class="badge bg-red"> {{ $product->updated_at->toDateString() }} </span></td>
                
                </tr>
                
               
              </tbody>
             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="row">
            <div class="col-md-6">
               <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Categories</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($product->categories as $category)
               <span class="badge bg-green">{{ $category->name }}</span>
              @endforeach 
            </div>
            <!-- /.box-body -->
          </div>
         
            </div>
               <div class="col-md-6">
               <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Brands</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach($product->brands as $brand)
               <span class="badge bg-blue">{{ $brand->name }}</span>
              @endforeach </div>
            <!-- /.box-body -->
          </div>
         
            </div>
          </div>

        </div>
        <div class="col-md-4">
        
         
          <!-- /.box -->
         <div class="box box-primary">
            <div class="box-header with-border">
             <h4 class="text-center">Featured Image</h4>
            </div>
         
           <div class="box-body">
       
          <div class="form-group ">
          <div class="col-md-1"></div>
           <div class="col-md-10">
            <h5 class="text-center photo-id" >
              {{ sprintf('%05d',$product->id) }}
            </h5> 
     
              <!-- the avatar markup -->
              <div id="kv-avatar-errors-1" class="center-block" style="display:none;">
                
              </div>              
              <div class="kv-avatar center-block">                  
                  <img src="{{ asset( 'public/product/'.$product->image ) }}" alt="Product Image" style="width:100%; height:200px"> 
               </div>
              
            </div>
          </div> <!-- /form-group-->                           

       
       
           </div>
        
          <!-- /.modal -->
           </div>
        </div>
        

      </div>
       
       
    </div>
      <div class="box-footer text-center">
        <a href="{{ route('products.index') }}" class="btn btn-default button1"> <i class="fa fa-arrow-circle-left"></i> Back </a>

       </div>
        <!-- /.modal -->
  </div>
 
</section>     
 @push('js')

 

@endpush   
   

@endsection
