@extends('layouts.backend.app')

@section('title', '| Create New Category')

@push('css')
    <!-- DataTables -->
  
@endpush

@section('content')

<section class="content">
<div class="row">
<div class="col-sm-12">

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

 {{ Form::open(array('route' => 'categories.store','class' => 'form-horizontal','id' => 'createscoreForm')) }}


 <div class="box-body">

      <div class="form-group ">
        <label for="students" class="col-sm-3 control-label"></label>
        <div class="col-sm-6 ">
           
        <table class="table table-hover text-center" id="ScoreTable">
          <thead>
            <tr>              
              <th>Category Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $arrayNumber = 0;
            ?>
            @for($x = 1; $x < 4; $x++)
              <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">  

                <td>                 
                 {{ Form::text('name[]', null, array('class' => 'form-control','placeholder' => 'Category Name')) }}
                     </td>  
                <td>
                  
                     {!! Form::select('status[]', ['1' => 'available', '0' => 'Not Available'], null,array('class' => 'form-control','placeholder' => '~~select status~~')) !!} 

                       
                </td>

                <td>
                  <button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeScoreRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
              </tr>
            <?php
            $arrayNumber++; ?>
            @endfor
            
          </tbody>          
        </table>
      </div>
    </div>

  </div>
  <div class="box-footer text-center">
   <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left"></i> Back</a> 
   <button type="button" class="btn btn-default btn-sm" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

  <button type="reset" class="btn btn-default" onclick="resetscoreForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
  <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-save"></i> Submit</button>
   
  </div>

  </form>


</div>
   <!-- /.box -->
 
    <!-- /.box -->
  </div>
</div>  
</section>


@endsection


@push('js')

    <script type="text/javascript">
     function resetscoreForm() {
      // reset the input field
      $("#createscoreForm")[0].reset();
      // remove remove text danger
      $(".text-danger").remove();
      // remove form group error 
      $(".form-group").removeClass('has-success').removeClass('has-error');
    } // /reset score form
     
    function removeScoreRow(row = null) {
      if(row) {
        $("#row"+row).remove();
        } else {
        alert('error! Refresh the page again');
      }
    }


function addRow() {
  
  var tableLength = $("#ScoreTable tbody tr").length;

  var tableRow;
  var arrayNumber;
  var count;

  if(tableLength >= 0) {   
    tableRow = $("#ScoreTable tbody tr:last").attr('id');
    arrayNumber = $("#ScoreTable tbody tr:last").attr('class');
    count = tableRow.substring(3);  
    count = Number(count) + 1;
    arrayNumber = Number(arrayNumber) + 1;   


 
      var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+                
        '<td>'+
        
          
          '<input type="text" name="name[]" placeholder="Category Name"  autocomplete="off"  class="form-control"  /> '+
         '</td>'+

        '<td>'+
          '{!! Form::select('status[]', ['1' => 'available', '0' => 'Not Available'], null,array('class' => 'form-control','placeholder' => '~~select status~~')) !!}' + 

        '</td>'+
        '<td>'+
          '<button class="btn btn-default " type="button" onclick="removeScoreRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
        '</td>'+
      '</tr>';
      if(tableLength >= 0) {             
        $("#ScoreTable tbody tr:last").after(tr);
      } else {        
        $("#ScoreTable tbody").append(tr);
      }   

       
  } else {
    // no table row
    count = 1;
    arrayNumber = 0;
  }

  
} // /add row

  </script>

@endpush