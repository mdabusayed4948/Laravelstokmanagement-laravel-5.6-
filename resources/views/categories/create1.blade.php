@extends('layouts.backend.app')

@section('title', '| Create New Category')

@push('css')
    <!-- DataTables -->
  
@endpush

@section('content')


 <section class="content-header">
      <h1>
        Category
        <small>Create New Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="#">Category list</a></li>
        <li class="active">Create Category</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-2"></div>
     <div class="col-md-7">
               
      <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">
                   
                      <i class="fa fa-plus"></i> Add Category
                    
                </h3>

                <div class="box-tools">
                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

                </div>
              </div>
              <!-- /.box-header -->
               <div class="box-body">
                {{ Form::open(array('route' => 'categories.store','class' => 'form-horizontal')) }}

                <div class="form-group">
                     <div class="col-sm-12">
                   
                    {{ Form::text('name', null, array('class' => 'form-control','placeholder' => 'Category Name')) }}
                     </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                   
                     {!! Form::select('status', ['1' => 'available', '0' => 'Not Available'], null,array('class' => 'form-control','placeholder' => '~~select status~~')) !!} 

                     
                   </div>
                </div>
               
               
              </div>
              <div class="box-footer text-center">
                 <a href="{{ route('categories.index') }}" class="btn btn-default button1"  > <i class="glyphicon glyphicon-plus-sign"></i> Back </a>  
               
                {{ Form::submit('Create Brand', array('class' => 'btn btn-primary')) }}
               </div>
               {{ Form::close() }}
        
              <!-- /.modal -->
      </div>
    </div>
        <!-- left column -->
    
</div>
 </section>     
 @push('js')
 <!-- DataTables -->


@endpush   
   

@endsection
