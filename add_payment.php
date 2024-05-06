<?php 
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{

    if(isset($_POST['save_data'])){

        $date= $_POST['date'];
        $amount= $_POST['amount'];
        $remaining_amount= $_POST['remaining_amount'];
		$location=sprintf('pages?page=$2y$10$lNaTr.hicgV1ld8o/dYLqOhTNgPvJrnjAljhbglOvrpuAqD0sUBc2&id=%s&active=6', $get_id);
        if($date!=='' && $amount!=='' && $get_id!=='' && $remaining_amount!=='' ){
			
			if($amount > $remaining_amount){
				echo '<script>alert("Amount must be less than remaining amount")</script>';
				redirect($location);
			}else{
					$cont_query=$DBcon->query("INSERT INTO tbl_payment(invoice_num, date,amount,flag)VALUES('$get_id','$date','$amount','0')");
			
						if($cont_query==true){
							echo '<script>alert("Data Inserted")</script>';
							redirect($location);
						}else{
							echo '<script>alert("Something Error")</script>';
							redirect('pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=1&active=6');
						}
				}
		
		
		}else{
					echo '<script>alert("All fields must be filled")</script>';
				}
        
    }
	
	    if(isset($_POST['delete_cont'])){

		$location=sprintf('pages?page=$2y$10$lNaTr.hicgV1ld8o/dYLqOhTNgPvJrnjAljhbglOvrpuAqD0sUBc2&id=%s&active=6', $get_id);
        $id=$_POST['py_id'];

        if($id!==''){


            $cont_delete=$DBcon->query("DELETE FROM tbl_payment  WHERE py_id='$id' ");

            if ($cont_delete == true) {
                 echo '<script>alert("Data Deleted")</script>';
                   redirect("$location");
            } else {
                 echo '<script>alert("Something Error")</script>';
                 redirect("$location");
            }

        }else{
            echo '<script>alert("Something Error")</script>';
            echo 'pages?page=$2y$10$USLRXrx0IJyMkcVtED8K7OHoDuTSefnxtLLzT9gz0rXcnUFcM/HGW&active=6';
        }
       

    }
?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                               <a href="pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=1&active=6"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add<small>( payment )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
												 <form action="" method="POST" name="add_payment" onsubmit="return validateForm()">
											<?php 
													$order_fetch =$DBcon->query("SELECT * FROM tbl_invoice WHERE invoice_num='$get_id' ");
													$row=$order_fetch->fetch_array();
													$location= $row['location'];
													$transportation_cost=$row['transportation_cost'];
													
													$total_amount=0;
													$invoice_data_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE invoice_num='$get_id'");
													while($invoice_data=$invoice_data_query->fetch_array()){
														$quantity=$invoice_data['quanity']; 
														$rate =$invoice_data['rate'];
														$amount =$quantity * $rate;
														$total_amount = $total_amount + $amount;
																											
													} 
													$cgst= ($total_amount * (2.5/100));
													$sgst= ($total_amount * (2.5/100));
													$total_gst_amount = $cgst + $sgst;
													if($location==2){
													$igst= ($total_amount * (5/100));
													}
													
													if($location==2){
													$grand_total = ($total_amount + $total_gst_amount + $transportation_cost + $igst);
													}else{
													$grand_total = ($total_amount + $total_gst_amount + $transportation_cost);
													}
													
													
													
													
													
													//paid amount Total
													$total=0;
													$payment_fetch_query = $DBcon->query(
														"SELECT * FROM tbl_payment WHERE invoice_num='$get_id'");
														while ($row1 = $payment_fetch_query->fetch_array()) { 
					
																$amount1=$row1['amount'];
																$total =$total + $amount1;
																
														}
														
														$remaining_payment_amount = $grand_total - $total;
													?>
													<input type="hidden" value="<?php echo $remaining_payment_amount; ?>" name="remaining_amount">
													<div class="row">
													  <div class="col-25">
														<label for="fname">Date</label>
													  </div>
													  <div class="col-75">
												   
														<input type="date" value=""  id="date" name="date" placeholder="Date Name">  
														
													  </div>
													</div>
													<div class="row">
													  <div class="col-25">
														<label for="fname">Amount</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="amount" placeholder="Amount">  
														
													  </div>
													</div>
												   
														
												  
													<div class="row">
													  <button type="submit" class="btn cur-p btn-success" name="save_data">Save</button> 
													</div>
												  </form>
</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
						  </div>
                        <!-- end row -->
					 
					 
					   <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Payment List</h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th>SR.NO</th>
													<th>CONTRACTOR NAME</th>
													<th>ACTION</th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													
                                                </tr>
                                             </thead>
                                             <tbody>
                                          
												<?php
        $count = 1;
		$total=0;
        $payment_fetch_query = $DBcon->query(
            "SELECT * FROM tbl_payment WHERE invoice_num='$get_id'");
		
        $count_fetch = $payment_fetch_query->num_rows;
        if ($count_fetch > 0) {
            while ($row = $payment_fetch_query->fetch_array()) { 
					
					$amount=$row['amount'];
					$total =$total + $amount;
			?>
                    <tr>    
                        <td><?php echo $count; ?></td>
                        <td><?php echo getCustomDate($row['date']); ?></td>
                        <td><?php echo $row['amount']; ?> Rs</td>
                        <td>
						<form action="" method="POST" > 
										<input type="hidden" value="<?php echo $row['py_id']; ?>" name="py_id">
										<button name="delete_cont" class="btn cur-p btn-danger" onclick="return confirmation()" ><i class="fa fa-trash"></i> Delete</button>
						</form> 
						</td>

						<td></td>
						<td></td>
						<td></td>
							
                    </tr>
                <?php $count++;} ?>
				<tr>    
                        <td></td>
						<td>Total Amount</td>
						<td><?php echo $total ?> Rs</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
                    </tr>
        <?php } else {
             ?>
                 <tr>    
                        <td>No data Found   </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
                    </tr>
            <?php
        }
        ?>  
		
                                         
                                         
                                            
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
					 
					 
					 
                  
                  </div>
                  <!-- end dashboard inner -->



     </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
	 <script>
function validateForm() {
 
  let date = document.forms["add_payment"]["date"].value;
  let amount = document.forms["add_payment"]["amount"].value;

    if (date == "") {
    alert("Date must be filled");
    return false;
  }
  if (amount == "") {
    alert("Amount must be filled");
    return false;
  }
 
}
</script>
<script>
	var today = new Date().toISOString().split("T")[0];
	
	document.getElementById("date").setAttribute("max",today);
	
</script>
<script>
												function confirmation(){
													return confirm("Are you sure");
													
												}
											</script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
   </body>
</html>


<?php 
	}
}else{
         redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
}   
?>































