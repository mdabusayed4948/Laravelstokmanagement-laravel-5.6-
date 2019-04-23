@extends('layouts.backend.app')

@section('title', '| Create New Category')

@push('css')
    <!-- DataTables -->
  
@endpush

@section('content')
<?php
 // $output = '';
 // foreach ($products as $row) {
 //            $output .= '<option value="'.$row['id'].'">'.$row['name'].'<option>';
 //        }
 //        return $output;

       
?>
<section class="content" >

<div class="box box-default" style="box-shadow: 0 0 25px 0 lightgray;">
    <div class="box-header with-border">
      <h3 class="box-title">
         
            <i class="fa fa-plus"></i> Add Order
          
      </h3>

      <div class="box-tools">
               
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

      </div>
    </div>
<div class="box-body">

<form class="form-horizontal" method="POST" action="" id="createOrderForm">

        <div class="form-group">
          <label for="orderDate" class="col-sm-2 control-label">Order Date</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="orderDate" name="orderDate" autocomplete="off" value="<?php echo date("Y-d-m"); ?>" />
          </div>
        </div> <!--/form-group-->
        <div class="form-group">
          <label for="clientName" class="col-sm-2 control-label">Client Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Client Name" autocomplete="off" />
          </div>
        </div> <!--/form-group-->
        <div class="form-group">
          <label for="clientContact" class="col-sm-2 control-label">Client Contact</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="Contact Number" autocomplete="off" />
          </div>
        </div> <!--/form-group-->       
        <div class="" style="box-shadow: 0 0 15px 0 lightgray;">
         
        <table class="table table-hover text-center" id="item_table">
         
          <tr> 
               <th style="width:40%;">Product</th>
              <th style="width:15%;">Total Quantity</th> 
              <th style="width:15%;">Quantity</th> 
              <th style="width:20%;">Price</th>
                          
              <th style="width:15%;">Total</th>             
              <th style="width:10%;">Action</th>
            </tr>
              
                   
        </table>
            <center style="padding: 10px;" >
          <button type="button" class="btn btn-default add"  class=""> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>
          

      </center><hr>

        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="sub_total" class="col-sm-3 control-label">Sub Total</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="sub_total" name="sub_total" required />
               </div>
          </div> <!--/form-group-->       
          <div class="form-group">
            <label for="gst" class="col-sm-3 control-label">VAT 18%</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="gst" name="gst" required />
               </div>
          </div> <!--/form-group-->       
         <!--  <div class="form-group">
            <label for="totalAmount" class="col-sm-3 control-label">Total Amount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
              <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
            </div>
          </div> <!--/form-group-->       
          <div class="form-group">
            <label for="discount" class="col-sm-3 control-label">Discount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="discount" name="discount"  autocomplete="off" required/>
            </div>
          </div> <!--/form-group--> 
          <div class="form-group">
            <label for="net_total" class="col-sm-3 control-label">Net Total</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="net_total" name="net_total" required/>
               </div>
          </div> <!--/form-group-->             
        </div> <!--/col-md-6-->

        <div class="col-md-6">
          <div class="form-group">
            <label for="paid" class="col-sm-3 control-label">Paid Amount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="paid" name="paid" autocomplete="off"  required/>
            </div>
          </div> <!--/form-group-->       
          <div class="form-group">
            <label for="due" class="col-sm-3 control-label">Due Amount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="due" name="due" disabled="true" />
              <input type="hidden" class="form-control" id="dueValue" name="dueValue" required/>
            </div>
          </div> <!--/form-group-->   
          <div class="form-group">
            <label for="payment_type" class="col-sm-3 control-label">Payment Method</label>
            <div class="col-sm-9">
              <select class="form-control" name="payment_type" id="payment_type" required>
                <option value="">~~SELECT~~</option>
                <option value="1">Cheque</option>
                <option value="2">Cash</option>
                <option value="3">Credit Card</option>
              </select>
            </div>
          </div> <!--/form-group-->               
          <div class="form-group">
            <label for="payment_status" class="col-sm-3 control-label">Payment Status</label>
            <div class="col-sm-9">
              <select class="form-control" name="payment_status" id="payment_status" required>
                <option value="">~~SELECT~~</option>
                <option value="1">Full Payment</option>
                <option value="2">Advance Payment</option>
                <option value="3">No Payment</option>
              </select>
            </div>
          </div> <!--/form-group-->               
        </div> <!--/col-md-6-->


        <div class="form-group submitButtonFooter">
          <div class="col-sm-offset-5 col-sm-7">
          
            <button type="submit" id="order_form"  class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>

            <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
          </div>
        </div>
      </form>
</div>

</div>
   <!-- /.box -->
 
    <!-- /.box -->
   
</section>


@endsection


@push('js')
 
 <script type="text/javascript">

   $(document).ready(function(){

      $(document).on('click','.add', function(){

        var html = '';
        html += '<tr>';
        html += '<td style="padding-left:20px;">'+
        '<select class="form-control form-control-sm pid" name="pid[]" id="pid" required  >'+
        '<option value="">~~SELECT~~</option><?php
          foreach($products as $product){
            echo '<option value="'.$product['id'].'">'.$product['name'].'</option>';
         
          }

        ?></select></td>';
        html +='<td style="padding-left:20px;"><input type="number" name="tqty[]"  autocomplete="off" class="form-control form-control-sm" readonly /></td>';
        html += '<td style="padding-left:20px;"><input type="number" name="qty[]"  autocomplete="off" class="form-control form-control-sm"  /> </td>';
        html += '<td style="padding-left:20px;"><input type="text" name="prce[]" i class="form-control form-control-sm" readonly/></td>';
        html += '<td style="padding-left:20px;">Tk 0 </td>';
        html += '<td style="padding-left:20px;"><button type="button" class="btn btn-danger remove"  > <i class="glyphicon glyphicon-minus-sign"></i> </button> </td>';
        
        $('#item_table').append(html);
      
      
      
      });

      $(document).on('click','.remove',function(){
        $(this).closest('tr').remove();
      });

       $(document).ready(function(){

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    });
      $('#item_table').delegate('.pid','change',function(){
        var pid = $(this).val();
        //alert(pid);
        var tr = $(this).parent().parent();
        $('.overlay').show();
        $.ajax({
          url : 'getproduct/',
          method : 'GET',
          data : {id:pid},
          success:function(data){
            console.log(data);
          }
        });
      })

   });

 </script>  
 
@endpush