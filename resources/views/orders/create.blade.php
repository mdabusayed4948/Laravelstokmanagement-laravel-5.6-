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
            <input type="text" class="form-control" id="orderDate" name="orderDate" autocomplete="off" />
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

        <table class="table table-hover" id="productTable">
          <thead>
            <tr>              
              <th style="width:40%;">Product</th>
              <th style="width:20%;">Rate</th>
              <th style="width:10%;">Total Quantity</th>
              <th style="width:10%;">Quantity</th>              
              <th style="width:15%;">Total</th>             
              <th style="width:10%;"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $arrayNumber = 0;
            for($x = 1; $x < 4; $x++) { ?>
              <tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">                
                <td style="padding-left: 20px;">
                  <div class="form-group">

                 <select class="form-control" name="productName[]" id="productName<?php echo $x; ?>" onchange="getProductData(<?php echo $x; ?>)" >
                     <option value="">~~SELECT~~</option>
                    <?php

                     // foreach($products as $row){ 
                     //  echo "<option value='".$row['id']."' id='changeProduct".$row['id']."'>".$row['name']."</option>";
                     //  } // /while 
                   ?> 
                   @foreach($products as $row)
                    <option value="{{ $row->id }}" id="changeProduct.{{ $row->id }}">{{ $row->name }}</option>
                   @endforeach
                    </select>

                  </div>
                </td>
                <td style="padding-left:20px;">                 
                  <input type="text" name="rate[]" id="rate<?php echo $x; ?>" autocomplete="off" disabled="true"  class="form-control" />                  
                  <input type="hidden" name="rateValue[]" id="rateValue<?php echo $x; ?>" autocomplete="off" class="form-control" />                  
                </td>
                 <td style="padding-left:20px;">                 
                  <input type="text" name="tqty" id="tqty<?php echo $x; ?>" autocomplete="off" disabled="true"  class="form-control" />                  
                  </td>
                <td style="padding-left:20px;">
                  <div class="form-group">
                  <input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
                  </div>
                </td>
                <td style="padding-left:20px;">                 
                  <input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />                  
                  <input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />                  
                </td>
                <td>

                  <button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
              </tr>
            <?php
            $arrayNumber++;
            } // /for
            ?>
          </tbody>          
        </table>

        <div class="col-md-6">
          <div class="form-group">
            <label for="subTotal" class="col-sm-3 control-label">Sub Amount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="subTotal" name="subTotal" disabled="true" />
              <input type="hidden" class="form-control" id="subTotalValue" name="subTotalValue" />
            </div>
          </div> <!--/form-group-->       
          <div class="form-group">
            <label for="vat" class="col-sm-3 control-label">VAT 13%</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="vat" name="vat" disabled="true" />
              <input type="hidden" class="form-control" id="vatValue" name="vatValue" />
            </div>
          </div> <!--/form-group-->       
          <div class="form-group">
            <label for="totalAmount" class="col-sm-3 control-label">Total Amount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="totalAmount" name="totalAmount" disabled="true"/>
              <input type="hidden" class="form-control" id="totalAmountValue" name="totalAmountValue" />
            </div>
          </div> <!--/form-group-->       
          <div class="form-group">
            <label for="discount" class="col-sm-3 control-label">Discount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="discount" name="discount" onkeyup="discountFunc()" autocomplete="off" />
            </div>
          </div> <!--/form-group--> 
          <div class="form-group">
            <label for="grandTotal" class="col-sm-3 control-label">Grand Total</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="grandTotal" name="grandTotal" disabled="true" />
              <input type="hidden" class="form-control" id="grandTotalValue" name="grandTotalValue" />
            </div>
          </div> <!--/form-group-->             
        </div> <!--/col-md-6-->

        <div class="col-md-6">
          <div class="form-group">
            <label for="paid" class="col-sm-3 control-label">Paid Amount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="paid" name="paid" autocomplete="off" onkeyup="paidAmount()" />
            </div>
          </div> <!--/form-group-->       
          <div class="form-group">
            <label for="due" class="col-sm-3 control-label">Due Amount</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="due" name="due" disabled="true" />
              <input type="hidden" class="form-control" id="dueValue" name="dueValue" />
            </div>
          </div> <!--/form-group-->   
          <div class="form-group">
            <label for="clientContact" class="col-sm-3 control-label">Payment Type</label>
            <div class="col-sm-9">
              <select class="form-control" name="paymentType" id="paymentType">
                <option value="">~~SELECT~~</option>
                <option value="1">Cheque</option>
                <option value="2">Cash</option>
                <option value="3">Credit Card</option>
              </select>
            </div>
          </div> <!--/form-group-->               
          <div class="form-group">
            <label for="clientContact" class="col-sm-3 control-label">Payment Status</label>
            <div class="col-sm-9">
              <select class="form-control" name="paymentStatus" id="paymentStatus">
                <option value="">~~SELECT~~</option>
                <option value="1">Full Payment</option>
                <option value="2">Advance Payment</option>
                <option value="3">No Payment</option>
              </select>
            </div>
          </div> <!--/form-group-->               
        </div> <!--/col-md-6-->


        <div class="form-group submitButtonFooter">
          <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

            <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>

            <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
          </div>
        </div>
      </form>
</div>

</div>
   <!-- /.box -->
 
    <!-- /.box -->
  </div>
</div>  
</section>


@endsection


@push('js')

    <script type="text/javascript">

     
   
  function removeProductRow(row = null) {
      if(row) {
        $("#row"+row).remove();
        } else {
        alert('error! Refresh the page again');
      }
    }//remove row

// function addRow() {
//   $("#addRowBtn").button("loading");

//   var tableLength = $("#productTable tbody tr").length;

//   var tableRow;
//   var arrayNumber;
//   var count;

//   if(tableLength > 0) {   
//     tableRow = $("#productTable tbody tr:last").attr('id');
//     arrayNumber = $("#productTable tbody tr:last").attr('class');
//     count = tableRow.substring(3);  
//     count = Number(count) + 1;
//     arrayNumber = Number(arrayNumber) + 1;          
//   } else {
//     // no table row
//     count = 1;
//     arrayNumber = 0;
//   }

//   $.ajax({
//     url: '{{ route('orders.getselectproduct') }}',
//     type: 'GET',
//     dataType: 'json',
//     success:function(response) {
//       console.log(response);
//       $("#addRowBtn").button("reset");      

//       var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+                
//         '<td>'+
//           '<div class="form-group">'+

//           '<select class="form-control" name="productName[]" id="productName'+count+'" onchange="getProductData('+count+')" >'+
//             '<option value="">~~SELECT~~</option>';
//              console.log(response);
//             $.each(response, function(index, value) {
//               tr += '<option value="'+value[0]+'">'+value[1]+'</option>';             
//             });
                          
//           tr += '</select>'+
//           '</div>'+
//         '</td>'+
//         '<td style="padding-left:20px;"">'+
//           '<input type="text" name="rate[]" id="rate'+count+'" autocomplete="off" disabled="true" class="form-control" />'+
//           '<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
//         '</td style="padding-left:20px;">'+
//         '<td style="padding-left:20px;">'+
//           '<div class="form-group">'+
//           '<input type="number" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
//           '</div>'+
//         '</td>'+
//         '<td style="padding-left:20px;">'+
//           '<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
//           '<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
//         '</td>'+
//         '<td>'+
//           '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
//         '</td>'+
//       '</tr>';
//       if(tableLength > 0) {             
//         $("#productTable tbody tr:last").after(tr);
//       } else {        
//         $("#productTable tbody").append(tr);
//       }   

//     } // /success
//   }); // get the product data

// } // /add row


//add row
function addRow() {
 // $("#addRowBtn").button("loading");

  var tableLength = $("#productTable tbody tr").length;

  var tableRow;
  var arrayNumber;
  var count;

  if(tableLength > 0) {   
    tableRow = $("#productTable tbody tr:last").attr('id');
    arrayNumber = $("#productTable tbody tr:last").attr('class');
    count = tableRow.substring(3);  
    count = Number(count) + 1;
    arrayNumber = Number(arrayNumber) + 1;  

     var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+                
        '<td style="padding-left: 20px;">'+
          '<div class="form-group">'+
          '<select class="form-control" name="productName[]" id="productName'+count+'" onchange="getProductData('+count+')" >'+
                    '<option value="">~~SELECT~~</option>'+
                    '<?php
                    //$arr = [1,2,3,4,];
                     foreach($products as $row){
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                   
                     }
                    
                     // foreach($products as $product){ 
                     //  echo "<option value='".$product['id']."'>".$product['name']."</option>";
                     //  } // /while 
                   ?>'
                   +
                   '</select>'+
            // console.log(response);
            // $.each(response, function(index, value) {
            //   tr += '<option value="'+value[0]+'">'+value[1]+'</option>';             
            // });
                          
          '</div>'+
        '</td>'+
        '<td style="padding-left:20px;"">'+
          '<input type="text" name="rate[]" id="rate'+count+'" autocomplete="off" disabled="true" class="form-control" />'+
          '<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
        '</td>'+
         '<td style="padding-left:20px;">'+
         
          '<input type="number" name="tqty" id="tqty'+count+'"  autocomplete="off" class="form-control" disabled="true" />'+
          
        '</td>'+
        '<td style="padding-left:5px; padding-right: 0px;">'+
         
          '<input type="number" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
          
        '</td>'+
        '<td style="padding-left:20px; margin-left:0px;">'+
          '<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
          '<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
        '</td>'+
        '<td>'+
          '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
        '</td>'+
      '</tr>';
      if(tableLength > 0) {             
        $("#productTable tbody tr:last").after(tr);
      } else {        
        $("#productTable tbody").append(tr);
      }   

        
  } else {
    // no table row
    count = 1;
    arrayNumber = 0;
  }

  // $.ajax({
  //   //url: 'php_action/fetchProductData.php',
  //   type: 'post',
  //   dataType: 'json',
  //   success:function(response) {
  //     $("#addRowBtn").button("reset");      

     
  //   } // /success
  // }); // get the product data

} // /add row




      
 

  // select on product data
function getProductData(row = null) {
  if(row) {
     var id = $("#productName"+row).val();    
    //alert(id);
    if(id == "") {
      $("#rate"+row).val("");

      $("#quantity"+row).val("");           
      $("#total"+row).val("");


    } else {
      $.ajax({
        url: "getproduct/"+id,       
        type: 'GET',
        dataType: 'json',
        success:function(data) {
          // setting the rate value into the rate input field
          console.log(data);

          $("#rate"+row).val(data.rate);
          $("#rateValue"+row).val(data.rate);
          $("#tqty"+row).val(data.quantity);

          $("#quantity"+row).val(1);

          var total = Number(data.rate) * 1;
          total = total.toFixed(2);
          $("#total"+row).val(total);
          $("#totalValue"+row).val(total);
          
          // check if product name is selected
          // var tableProductLength = $("#productTable tbody tr").length;         
          // for(x = 0; x < tableProductLength; x++) {
          //  var tr = $("#productTable tbody tr")[x];
          //  var count = $(tr).attr('id');
          //  count = count.substring(3);

          //  var productValue = $("#productName"+row).val()

          //  if($("#productName"+count).val() != productValue) {
          //    // $("#productName"+count+" #changeProduct"+count).addClass('div-hide');  
          //    $("#productName"+count).find("#changeProduct"+productId).addClass('div-hide');                
          //    console.log("#changeProduct"+count);
          //  }                     
          // } // /for
      
         subAmount();
        } // /success
      }); // /ajax function to fetch the product data 
    }
        
  } else {
    alert('no row! please refresh the page');
  }
} // /select on product data


// table total
function getTotal(row = null) {
  if(row) {
    var total = Number($("#rate"+row).val()) * Number($("#quantity"+row).val());
    total = total.toFixed(2);
    $("#total"+row).val(total);
    $("#totalValue"+row).val(total);
    
    subAmount();

  } else {
    alert('no row !! please refresh the page');
  }
}

function subAmount() {
  var tableProductLength = $("#productTable tbody tr").length;
  var totalSubAmount = 0;
  for(x = 0; x < tableProductLength; x++) {
    var tr = $("#productTable tbody tr")[x];
    var count = $(tr).attr('id');
    count = count.substring(3);

    totalSubAmount = Number(totalSubAmount) + Number($("#total"+count).val());
  } // /for

  totalSubAmount = totalSubAmount.toFixed(2);

  // sub total
  $("#subTotal").val(totalSubAmount);
  $("#subTotalValue").val(totalSubAmount);

  // vat
  var vat = (Number($("#subTotal").val())/100) * 13;
  vat = vat.toFixed(2);
  $("#vat").val(vat);
  $("#vatValue").val(vat);

  // total amount
  var totalAmount = (Number($("#subTotal").val()) + Number($("#vat").val()));
  totalAmount = totalAmount.toFixed(2);
  $("#totalAmount").val(totalAmount);
  $("#totalAmountValue").val(totalAmount);

  var discount = $("#discount").val();
  if(discount) {
    var grandTotal = Number($("#totalAmount").val()) - Number(discount);
    grandTotal = grandTotal.toFixed(2);
    $("#grandTotal").val(grandTotal);
    $("#grandTotalValue").val(grandTotal);
  } else {
    $("#grandTotal").val(totalAmount);
    $("#grandTotalValue").val(totalAmount);
  } // /else discount 

  var paidAmount = $("#paid").val();
  if(paidAmount) {
    paidAmount =  Number($("#grandTotal").val()) - Number(paidAmount);
    paidAmount = paidAmount.toFixed(2);
    $("#due").val(paidAmount);
    $("#dueValue").val(paidAmount);
  } else {  
    $("#due").val($("#grandTotal").val());
    $("#dueValue").val($("#grandTotal").val());
  } // else

} // /sub total amount

function discountFunc() {
  var discount = $("#discount").val();
  var totalAmount = Number($("#totalAmount").val());
  totalAmount = totalAmount.toFixed(2);

  var grandTotal;
  if(totalAmount) {   
    grandTotal = Number($("#totalAmount").val()) - Number($("#discount").val());
    grandTotal = grandTotal.toFixed(2);

    $("#grandTotal").val(grandTotal);
    $("#grandTotalValue").val(grandTotal);
  } else {
  }

  var paid = $("#paid").val();

  var dueAmount;  
  if(paid) {
    dueAmount = Number($("#grandTotal").val()) - Number($("#paid").val());
    dueAmount = dueAmount.toFixed(2);

    $("#due").val(dueAmount);
    $("#dueValue").val(dueAmount);
  } else {
    $("#due").val($("#grandTotal").val());
    $("#dueValue").val($("#grandTotal").val());
  }

} // /discount function

function paidAmount() {
  var grandTotal = $("#grandTotal").val();

  if(grandTotal) {
    var dueAmount = Number($("#grandTotal").val()) - Number($("#paid").val());
    dueAmount = dueAmount.toFixed(2);
    $("#due").val(dueAmount);
    $("#dueValue").val(dueAmount);
  } // /if
} // /paid amoutn function


  </script>

@endpush