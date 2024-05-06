<?php include("header.php");
	
	if(isset($_POST['save_invoice'])){
		$invoice_no = $_POST['invoice_no'];
		$invoice_qry=$DBcon->query("SELECT * FROM tbl_invoice WHERE invoice_num='$invoice_no'");
		$invoice_num_rows=$invoice_qry->num_rows;
				  
		if($invoice_num_rows==0){
			
					$invoice_data_get_query1=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE status='0' && invoice_num='0'");
					$invoice_data_get_count1=$invoice_data_get_query1->num_rows;
			
			if($invoice_data_get_count1 >0){
				
				   $party_id = $_POST['party_id'];
				   $dispatch = $_POST['dispatch'];
				   $destination = $_POST['destination'];
				   $date = $_POST['date'];
				   $payment_mode = $_POST['payment_mode'];
				   $lr_no = $_POST['lr_no'];
				   $transportation_cost = $_POST['transportation_cost'];
				   $location = $_POST['location'];
				   $redirect_location=sprintf('pages?page=$2y$10$N1ZfH332n14t9I3IeHjZ.OdOWOra2E4l7XYJbj8zKLtJG8HMsrfMG&id=%s', $invoice_no);
		
							if($party_id!=='' && $dispatch!=='' && $destination!=='' && $invoice_no!=='' && $date!=='' && $payment_mode!=='' && $transportation_cost!=='' && $location!==''){
								$insert_query=$DBcon->query("INSERT INTO tbl_invoice(invoice_num, party_id, dispatch, destination,transportation_cost,location, date, mode_of_payment, lr_no,payment_status)
									VALUES('$invoice_no', '$party_id','$dispatch','$destination','$transportation_cost','$location', '$date','$payment_mode','$lr_no','0')");	
									
											if($insert_query==true){
												
																	$invoice_data_get_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE status='0' && invoice_num='0'");
																	$invoice_data_get_count=$invoice_data_get_query->num_rows;
																	if($invoice_data_get_count >0){
																			while($get_det=$invoice_data_get_query->fetch_array()){
																					
																					$or_id=$get_det['or_id'];
																					$item_id=$get_det['item_id'];
																					$quanity=$get_det['quanity'];
																					
																					$update_stock_query=$DBcon->query("UPDATE tbl_req SET stock=stock-'$quanity' WHERE or_id='$or_id' && item_id='$item_id'");
																					
																					if($update_stock_query==true){
																						$invoice_data_update=$DBcon->query("UPDATE tbl_invoice_data SET invoice_num='$invoice_no', status='1' WHERE or_id='$or_id' && item_id='$item_id' && status='0'");
																			
																					}
																			}
																	}

																		redirect($redirect_location);
																	

											}else{
												echo '<script>alert("Something Error")</script>';
												redirect('pages?page=$2y$10$m0jAkObqyeyfp8BIxygYhO5SYbLXczswFmyM8qyK2Q/t6Xh0UCF/K');
											}
							}else{
								echo '<script>alert("All fields must be filled")</script>';
							}
			}	else{
						echo '<script>alert("There is no items added")</script>';
					}
		
		}
		
		
	}
?>
  <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <br>
					 
					 
					  <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
						<form action="" method="POST" name="add_invoice" onsubmit="return validateForm1()">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Billing To</h2>
									
                                 </div>
								
                              </div>
                              
                                    
									<table class="table">
										<tr>
											<td><select name="party_id" id="party_id">
												<option value="" >Select Party</option>
												<option value="None">None</option>
												<?php 
													$party_query=$DBcon->query("SELECT * FROM tbl_parties WHERE flag='0' && party_type='2'");
													while($row=$party_query->fetch_array()){
												?>	
												<option value="<?php echo $row['p_id']; ?>"><?php echo $row['party_name']; ?></option>
													<?php } ?>
											</select>
											</td>
											<td><input type="text" name="dispatch" id="dispatch" placeholder="Dispatch" ></td>
											<td><input type="text" name="destination" id="destination" placeholder="Destination"></td>
											<td><select name="location" id="location">
												<option value="">Select Location</option>
												<option value="1">In Maharashtra</option>
												<option value="2">Out of Maharashtra</option>
											 </select></td>
											 <td><input type="date" value="" id="date" name="date"></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 
										</tr>
										<tr>
											<td><input type="text" name="payment_mode" id="payment_mode" placeholder="Payment Mode"></td>
											 <td><input type="text" name="lr_no" id="lr_no" placeholder="LR No"></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
											 <td></td>
										</tr>
									</table>
                                      
                                       
										  
										  <?php
											$invoice_no_query=$DBcon->query("SELECT * FROM tbl_invoice ");
											$num_rows=$invoice_no_query->num_rows;
											
											$invoice_no = $num_rows + 1;
										  ?>
                                            
											 
											<!--  input -->
											<input type="hidden" value="<?php echo $invoice_no ?>" name="invoice_no">
											 
										
											
                                     
                                       
                                  
                                 </div>
                              </div>
							  
						
                           </div>
                       
					 
					 
					 <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
					
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
							  
									 <!-- selection content section -->  

                                 	<table class="table table-striped">
											<tbody>  
												  <tr>
												  <td><div class="row">
												  
																		  <div class="col-25">
																			<label for="fname">&nbsp;&nbsp; Order Number</label>
																		  </div>
																		  <div class="col-50">
																	  
																			 <select name="or_id" id="order_id">
																				<option value="">Select Order</option>
																				
																		   </select>
																		  </div>
																		</div></td>
													
												<td><div class="row">
																		  <div class="col-25">
																			<label for="fname">Item Name</label>
																		  </div>
																		  <div class="col-50">
																	  
																			 <select name="item_id" id="item_id" >
																				
																		   </select>
																		  </div></td>
												</div>
											</tbody>
									   </table>
									   																		  
									   <!-- selection content section --> 
							  </div>
                           
					
							
                     
							  
							  
                              <div class="full padding_infor_info">
                                 <div class="table_row">
   
									 <!-- req fetch section -->  
									 
                                    <div class="table-responsive">
                                       <table  class="table table-striped projects">
											<thead class="thead-dark">
												<tr>
													<th>Item Name</th>
													<th>Stock</th>
													<th>Description</th>
													<th>Quantity</th>
													<th>Rate</th>
													<th></th>
												</tr>
												
												
												<tbody id="show_details">
										
												</tbody>
											
												
											</thead>
										</table><br><br>
										 <!-- req fetch section -->  
										
										
										
										
										<!-- Added data section --> 
									   <table class="table table-striped">
                                          <thead class="thead-dark">
                                             <tr>
                                                <th></th>
												<th>SR.NO</th>
                                                <th>DESCRIPTION OF GOODS</th>
                                                <th>QUANTITY</th>
                                                <th>RATE</th>
                                                <th>AMOUNT</th>
                                                
                                             </tr>
                                          </thead>
                                          <tbody id="invoice-data-load">
                                            
											
																							 
                                          </tbody>
                                       </table>
									   <!-- Added data section --> 
									   
									   
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
					 
					 
					 
					 
					 
                    
                     <!-- row -->
                     <div class="row">
                        <div class="col-md-6">
                           <div class="full white_shd">
                             
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="full white_shd">
                              
                              <div class="full padding_infor_info">
                                 <div class="price_table">
                                    <div class="table-responsive">
                                       <table class="table">
									   <?php 
									   $total_amount=0;
													$invoice_data_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE status='0'");

														while($row=$invoice_data_query->fetch_array()){
															$qty =$row['quanity'];
															$rate =$row['rate'];
															$amount =$qty * $rate;
															$total_amount = $total_amount+$amount;
															
														}
										?>
                                          <tbody>
                                            
                                           
                                            
                                            
											 <tr>
												<th>Transportation Cost:</th><td><input type="text" name="transportation_cost" id="transportation_cost" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Transportation Cost"></td>
											 </tr>
											 <tr>
												<td><button type="submit" name="save_invoice"  style="align-items: right;" class="btn cur-p btn-success" >Create Bill</button>
									</td>
											 </tr>
                                          </tbody>
                                       </table>
									   
							  </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div><br>
                  <!-- footer -->
                 
               </div>
               <!-- end dashboard inner -->
            </div> </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.js"></script>
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
	  
	  <script type="text/javascript">
function validateForm1() {
 
  let party_id = document.forms["add_invoice"]["party_id"].value;
  let dispatch = document.forms["add_invoice"]["dispatch"].value;
  let destination = document.forms["add_invoice"]["destination"].value;
  let invoice_no = document.forms["add_invoice"]["invoice_no"].value;
  let date = document.forms["add_invoice"]["date"].value;
  let payment_mode = document.forms["add_invoice"]["payment_mode"].value;
  
  let location = document.forms["add_invoice"]["location"].value;
  let transportation_cost = document.forms["add_invoice"]["transportation_cost"].value;

if (invoice_no == "") {
    alert("Go to Back.You have something error");
    return false;
  }
 if (party_id == "") {
    alert("Party must be filled");
	document.querySelector("#party_id").focus();
    return false;
  }
  if (dispatch == "") {
    alert("Dispatch must be filled");
	document.querySelector("#dispatch").focus();
    return false;
  }
  if (destination == "") {
    alert("Description must be filled");
	document.querySelector("#destination").focus();
    return false;
  }
  if (transportation_cost == "") {
    alert("Transportation Cost must be filled");
	document.querySelector("#transportation_cost").focus();
    return false;
  }
	if (location == "") {
    alert("Location must be filled");
	document.querySelector("#location").focus();
    return false;
  }
  
  if (date == "") {
    alert("Date must be filled");
	document.querySelector("#date").focus();
    return false;
  }
  if (payment_mode == "") {
    alert("Payment mode must be filled");
	document.querySelector("#payment_mode").focus();
    return false;
  }
 
  
  
  
 
}


</script>
	<script>
	var today = new Date().toISOString().split("T")[0];
	
	document.getElementById("date").setAttribute("max",today);
	
	
</script>
	 <script>
		$(document).ready(function(){
				
				function loadData(type, order_id){
					$.ajax({
						url: "item_fetch1.php",
						method: "POST",
						data: {type:type,or_id:order_id},
						success: function(data){
							 if(type == "item_data"){
								$("#item_id").html(data);	
							}else{
								$("#order_id").append(data);	
							}
							
						}
					});
				}
				loadData();
				
				
				$("#order_id").on("change", function(){
					var order = $("#order_id").val();
					
					loadData("item_data", order);
					
				});
	
		});
	  </script>
	<!--- order data load script-->
	 	<script>
		$(document).ready(function(){
			
			
			$("#item_id").on('change', function(){
				var value= $(this).val();
				var SelectElement= document.querySelector("#order_id");
				var output= SelectElement.value;
				
				
				$.ajax({
					url:"req_fetch.php",
					type: "POST",
					data: {item_id:value, order_id:output},
					dataType: "text",
					beforeSend:function(){
						$("#show_details").html("<span>Working....</span>");
					},
					success:function(data){
						$("#show_details").html(data);
						
					}
					
				});
				
				
			});
		});
		 </script>
		 <!--- data add script-->
		 <script>
			$(document).ready(function(){
				
				
					
					
				
									function loadData(){
										$.ajax({
											method:"POST",
											url: "invoice-data-load.php",
											success: function(data){
												$("#invoice-data-load").html(data);
											}
										});
									}
									
									loadData();
									
									
									
				
					$(document).on("click", ".add", function(){
						
						var id = $(this).attr("id");
						var description =  $("#description").val();
						var quantity =  $("#quantity").val();
						var rate =  $("#rate").val();
						var stock = $("#rate").val();
						var or_id = $("#or_id").val();
						var temprory_stock = $("#temprory_stock").val();
						
						
							
						
								
								
											if(id  !== "" && description !== "" && quantity !== "" && rate !== "" && stock !== "" && or_id !=="" && temprory_stock!==""){
											
														
												
																$.ajax({
																	method: "POST",
																	url: "add-data-invoice.php",
																	data: {or_id:or_id,item_id:id,description:description,quantity:quantity,rate:rate,temprory_stock:temprory_stock},
																	success: function(data){
																		
																		if(data == 'already_existed'){
																			alert("Already existed in table");
																		}
																		else if(data == 'qty_error'){
																			alert("quantity is must be lesser than available quantity");
																		}else if(data == 'error'){
																			alert("something error");
																		}else if(data == 'success'){
																			loadData();
																		}
																	}
																});
														
													
												
											}else{
												alert("All fields must be filled befor add");
											}
								
						
					});
					
					$(document).on("click", ".delete", function(){
							var id = $(this).data("id");
							
							$.ajax({
								method: "POST",
								url: "invoice-data-delete.php",
								data: {id:id},
								success: function(data){
									loadData();
								}
									
							});
					});
					
			});
		 </script>
	
		<script>
			$(document).ready(function(){
						
						$("party_id").on("change",function(){
							var party_id = $(this).val();
							$.ajax({
								method:"POST",
								url:"party_details_fetch.php",
								data:{party_id:party_id},
								success:function(data){
									$("destination").html(data);
								}
							});
						});
			});
			
		</script>
	  
   </body>
</html>

