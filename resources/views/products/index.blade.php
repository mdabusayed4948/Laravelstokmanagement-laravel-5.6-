@extends('layouts.backend.app')

@section('title', '| Product List')

@push('css')
    <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  
@endpush

@section('content')



 <section class="content-header">
      <h1>
        Product
        <small>Manage Product </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product List</li>
      </ol>
    </section>

<section class="content">
 <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">
                   <a href="{{ route('products.create') }}" class="btn btn-default button1"  > <i class="glyphicon glyphicon-plus-sign"></i> Add Product </a>  
                </h3>

                <div class="box-tools">
                         
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

                </div>
              </div>
              <!-- /.box-header -->
               @if($products->count() > 0 )
              
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products as $key => $product)
                           <tr>
                               <td>{{ $key+1 }}</td>
                               <td>{{ $product->name }}</td>
                               <td>{{ $product->quantity }}</td>
                               <td>{{ $product->rate }}</td>
                               <td>
                                   @if($product->status == true)
                                   <label class='label label-success'>Available</label>
                                   @else
                                   <label class='label label-danger'>Not Available</label>
                                   @endif
                               </td>
                               <td>{{ $product->created_at->toDateString() }}</td>
                               <td>{{ $product->updated_at->toDateString() }}</td>
                               <td class="text-center">
                                <div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a type="button"  href="{{ route('products.show',$product->id) }}" data-toggle="tooltip" data-placement="top" title="Details"> <i class="fa fa-eye"></i>
                                     Details </a>
                                    </li>
                                    <li><a type="button"  href="{{ route('products.edit',$product->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    </li>

                                    <li>
                                        <a type="button"  onclick="deleteProduct({{ $product->id }})" data-toggle="tooltip" data-placement="top" title="Remove"> <i class="glyphicon glyphicon-trash"></i> Delete</a></li> 

                                  </ul>
                                </div>
                                   
                                  
                                   <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="POST" style="display: none">
                                       @csrf
                                       @method('DELETE')
                                   </form>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>     

               
            </div>
             @endif
              <!-- /.modal -->
      </div>
   
 </section>     
 @push('js')
 <!-- DataTables -->

<script src="{{ asset('public/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>

<!-- page script -->
<script>

 

  // $('.btn-save-program').on('click',function(){
  //   var brand_name     = $('#brand_name').val();
  //   var brand_status  = $('#brand_status').val();
  //   var brand_active = 0;
  //    $.post("{{ route('brands.store') }}",{ brand_name:brand_name, brand_status:brand_status,brand_active:1},function(data){
      
  //      })  
  //  });

  


  $(function () {
    $('#example1').DataTable()
   
   $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

   function deleteProduct(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
        }
</script>
@endpush   
   

@endsection
