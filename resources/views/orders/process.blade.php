<?php

if (isset($_POST(['getNewOrderItem']))) { 
	?>
	
	<tr>  
                <td style=" padding-left: 30px;"><b id="number">1</b></td>               
                <td style=" padding-left: 30px;">
                  <div class="form-group">

                 <select class="form-control form-control-sm" name="pid[]" id="" required  >
                     <option value=""></option>
                  
                    </select>

                  </div>
                </td>
               <td style="padding-left:20px;">
                  <input type="number" name="tqty[]"  autocomplete="off" class="form-control form-control-sm" readonly />
                  
                </td>
                <td style="padding-left:20px;">
                  <input type="number" name="qty[]"  autocomplete="off" class="form-control form-control-sm"  />
                  
                </td>
                 <td style="padding-left:20px;">                 
                  <input type="text" name="prce[]" i class="form-control form-control-sm" readonly/>                  
                                 
                </td>
                <td style="padding-left:20px;">                 
                  Rs.1540                
                                   
                </td>
                <td>

                  
                </td>
              </tr>

<?php
 }
?>