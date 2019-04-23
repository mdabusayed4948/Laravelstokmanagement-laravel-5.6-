@extends('layouts.backend.app')

@section('title', '| Edit Product')

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
        <small>Edit Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="#">Product list</a></li>
        <li class="active">Edit Product</li>
      </ol>
    </section>

<section class="content">
         
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">
         
            <i class="glyphicon glyphicon-plus-sign"></i> Edit Product
          
      </h3>

      <div class="box-tools">
               
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

      </div>
    </div>
      <!-- /.box-header -->
         
       {{ Form::model($product, array('class'=>'form-horizontal','files'=>true,'route' => array('products.update', $product->id), 'method' => 'PUT')) }}
           

       <div class="box-body">
       
       <div class="row">
         <div class="col-md-8">
           <div class="box box-primary">
            <div class="box-header with-border">
          
            </div>
    
       <div class="box-body">
         <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Product Name :</label>

           <div class="col-sm-9">
         
          {{ Form::text('name', null, array('class' => 'form-control','placeholder' => 'Brand Name')) }}
           </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Quantity :</label>

           <div class="col-sm-9">
         
          {{ Form::text('quantity', null, array('class' => 'form-control','placeholder' => 'Quantity')) }}
           </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label">Rate :</label>

           <div class="col-sm-9">
         
          {{ Form::text('rate', null, array('class' => 'form-control','placeholder' => 'Rate')) }}
           </div>
          </div>
          <div class="form-group">
            <label for="brands" class="col-sm-3 control-label">Brand Name :</label>

            <div class="col-sm-9">
             <select name="brands[]" class="form-control select2" multiple="multiple" data-placeholder="~~select multiple brands~~" style="width: 100%;">
               @foreach($brands as $brand)
                  <option
                      @foreach( $product->brands as $productBrand)
                         {{ $productBrand->id == $brand->id ? 'selected' : '' }}
                      @endforeach
                     value="{{ $brand->id }}">{{ $brand->name }}
                  </option>
              @endforeach  
             </select>
            </div>
          </div>

          <div class="form-group">
            <label for="categories" class="col-sm-3 control-label">Category Name :</label>

            <div class="col-sm-9">
             <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="~~select multiple categories~~" style="width: 100%;">
               @foreach($categories as $category)
                  <option
                      @foreach( $product->categories as $productCategory)
                         {{ $productCategory->id == $category->id ? 'selected' : '' }}
                      @endforeach
                     value="{{ $category->id }}">{{ $category->name }}
                  </option>
              @endforeach  
             </select>
            </div>
          </div>

          <div class="form-group">
            {!! Form::label('status', 'Product Status :', ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
           
             {!! Form::select('status', ['1' => 'available', '0' => 'Not Available'], null,array('class' => 'form-control','placeholder' => '~~select status~~')) !!} 

           </div>
        </div>
               
               
      </div>
      
      <!-- /.modal -->
  </div> 
  </div>
   <div class="col-md-4">
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
                  <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="image" class="file-loading" style="width:auto;"/>
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

         <button type="submit" class="btn btn-primary" ><i class="glyphicon glyphicon-plus-sign"></i> Add Product</button>
  

        <button type="reset" class="btn btn-default" ><i class="glyphicon glyphicon-erase"></i> Reset</button>
  
       </div>
       {{ Form::close() }}

      <!-- /.modal -->
  </div>
 
</section>     
 @push('js')
 <!-- Select2 -->
<script src="{{ asset('public/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

 <!-- DataTables -->
 <script src="{{ asset('public/bower_components/fileinput/js/fileinput.min.js') }}"></script> 


 <script type="text/javascript">
     $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });

    $("#productImage").fileinput({
        overwriteInitial: true,
        maxFileSize: 2500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="{{ asset( 'public/product/'.$product->image ) }}" alt="Profile Image" style="width:100%; height:100%">',
        layoutTemplates: {main2: '{preview} {remove} {browse}'},                    
        allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
      });   

 </script>

@endpush   
   

@endsection
