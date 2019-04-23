@extends('layouts.backend.app')

@section('title', '| Edit Category')

@push('css')

@endpush

@section('content')


 <section class="content-header">
      <h1>
        Category
        <small>Edit Category</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       <li><a href="#">Category list</a></li>
        <li class="active">Edit Category</li>
      </ol>
    </section>

<section class="content">
  <div class="row">
    <div class="col-md-2"></div>
     
     <div class="col-md-7">
               
      <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">
                   
                      <i class="fa fa-edit"></i> Edit Category
                    
                </h3>

                <div class="box-tools">
                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

                </div>
              </div>
              <!-- /.box-header -->
               <div class="box-body">
                {{ Form::model($category, array('class'=>'form-horizontal','route' => array('categories.update', $category->id), 'method' => 'PUT')) }}
           
                <div class="form-group">
                     <div class="col-sm-12">
                   
                    {{ Form::text('name', null, array('class' => 'form-control','placeholder' => 'Category Name')) }}
                     </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                   
                     {!! Form::select('status',  ['1' => 'available', '0' => 'Not Available'], null,array('class' => 'form-control','placeholder' => '~~select status~~')) !!} 

                   </div>
                </div>
               
               
              </div>
              <div class="box-footer text-center">
                 <a href="{{ route('categories.index') }}" class="btn btn-default button1"  > <i class="fa fa-sign-out"></i> back </a>  
               
                {{ Form::submit('Update Brand', array('class' => 'btn btn-primary')) }}
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
