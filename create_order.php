<?php
include("header.php");
if (isset($_POST['save_data'])) {


    $cont_id = $_POST['con_id'];
	$item_id = $_POST['item_id'];
	$cu_or_id = $_POST['or_id'];
    $cloth = $_POST['cloth'];
    $qty = $_POST['qty'];
    $rate = $_POST['rate'];
	$pattern = $_POST['pattern'];
	$date = $_POST['given_date'];

	
    if($cont_id!== '' && $item_id!== '' && $cloth!== '' && $qty!== '' && $rate!== '' && $cu_or_id!=='' && $pattern!=='' && $date!=='') {
		
		$qty_check_qry=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$cu_or_id' && item_id='$item_id'");
		$qty_fetch=$qty_check_qry->fetch_array();
		$req_qty=$qty_fetch['qty'];
		
		$exist_query=$DBcon->query("SELECT * FROM tbl_order WHERE item_id='$item_id' && cu_or_id='$cu_or_id'");
		$count_exist=$exist_query->num_rows;
		
			if($count_exist > 0){
				echo '<script>alert("Selected Item already existed")</script>';
				redirect('pages?page=$2y$10$jZGS0/wMrKpucAgK8HcpBegEHWwn5tyrAWpz.j8pMH55BFNbjcMSW&active=2');
			}elseif($count_exist==0){
				
				if($qty > $req_qty OR $qty < $req_qty){
					echo '<script>alert("Quantity must be equal to required quantity")</script>';
					redirect('pages?page=$2y$10$jZGS0/wMrKpucAgK8HcpBegEHWwn5tyrAWpz.j8pMH55BFNbjcMSW&active=2');
				}else{
			
					$order_query = $DBcon->query("INSERT INTO tbl_order(cu_or_id,con_id,item_id,cloth,qty,rate,pattern,given_date,return_date,return_cloth,return_qty,flag)
					VALUES('$cu_or_id','$cont_id','$item_id','$cloth', '$qty','$rate','$pattern','$date','0000-00-00','0','0','0')");

					if ($order_query == true) {
						echo '<script>alert("Data Inserted")</script>';
					   redirect('pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&active=2');
					}else{
						echo '<script>alert("Something Error")</script>';
						redirect('pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&active=2' );
					}
				}
			}
    }else {
        echo '<script>alert("All fields must be filled")</script>';
    }
} 

?>

 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                  <a href="pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=1&active=2"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                           </div>
                        </div>
                     </div>
					 

					
					 <div class="row">
					 <!-- table section -->
                        <div class="col-md-7">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>PLACE ORDER</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
								 <form action="" method="POST" name="add_order" onsubmit="return validateForm()">
										
                                    <table class="table table-light">
                                    
                                       <tbody>
									    		
                                          <tr>
                                             <td><b>Order Number</b></td>
                                             <td>  
													 <div class="col-50">
												  
														 <select name="or_id" id="order_id">
															<option value="">Select Order</option>
															
													   </select>
													  </div>
											  </td>
                                             
                                          </tr>
										   <tr>
                                             <td><b>Item Name</b></td>
                                             <td>
												 <div class="col-50">
												  
														 <select name="item_id" id="item_id" >
															
													   </select>
													  </div>
											 </td>
                                          
                                          </tr>
                                          <tr>
                                             <td><b>Order Quantity</b></td>
                                             <td>
												   <div class="col-50">
												  
														 <input type="text" name="qty" id="qty_data"  value="" placeholder="Quantity" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
													  </div>
											 </td>
                                           
                                          </tr>
                                          <tr>
                                             <td><b>Rate</b></td>
                                             <td>
												  <div class="col-50">
												  
														 <input type="text" name="rate" id="rate"  value="" placeholder="Rate" >
													  </div>
											 </td>
                                          
                                          </tr>
										  <tr>
                                             <td><b>Contractor Name</b></td>
                                             <td>
												<div class="col-50">
												  
														 <select name="con_id" >
															<option value="">Select Contractor</option>
															<?php 
																$cont_fetch=$DBcon->query("SELECT * FROM tbl_contractors WHERE flag='0'");
																while($row=$cont_fetch->fetch_array()){
																	?>
																		<option value="<?php echo $row['cn_id']; ?>"><?php echo $row['cn_name']; ?></option>
																	<?php 
																}
															?>
													   </select>
											 </td>
                                         
                                          </tr>
										  <tr>
                                             <td><b>Cloth (in Meter)</b></td>
                                             <td>
												 <div class="col-50">
												  
														 <input type="text" name="cloth"  value="" placeholder="Cloth Size" >
													  </div>
											 </td>
                                             
                                          </tr>
										  <tr>
                                             <td><b>Pattern</b></td>
                                             <td>
												<div class="col-50">
												  
														 <input type="text" name="pattern"  value="" placeholder="Pattern" >
													  </div>
											 </td>
                                           
                                          </tr>
										  <tr>
                                             <td><b>Date</b></td>
                                             <td>
												<div class="col-50">
												  
														 <input type="date" name="given_date" id="date"  value="" >
													  </div>
											 </td>
                                             
                                          </tr>
										  <tr>
												  <td>
												  </td>
											<td>
												<div class="row">
													<button type="submit" class="btn cur-p btn-success" name="save_data">Save</button> 
												</div>
											</td>
										  </tr>
										 
                                       </tbody>
                                    </table>
									</form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        <div class="col-md-5">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>ORDER DETAILS</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-light table-striped">
                                       <thead>
                                          <tr>
                                             <th><b>ITEM NAME</b></th>
                                             <th><b>QTY</b></th>
                                             <th><b>HISTORY</b></th>
                                          </tr>
                                       </thead>
                                      	<tbody id="show_details">
										</tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                   
						</div>
                        <!-- table section -->
					 
					 
					 
                    
                     
                  </div>
                  <!-- end dashboard inner -->



     </div>
            </div>
         </div>
      </div>
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

<script>
function validateForm() {
 
  let or_id = document.forms["add_order"]["or_id"].value;
  let con_id = document.forms["add_order"]["con_id"].value;
  let item_id = document.forms["add_order"]["item_id"].value;
  let cloth = document.forms["add_order"]["cloth"].value;
  let qty = document.forms["add_order"]["qty"].value;
  let rate = document.forms["add_order"]["rate"].value;
  let pattern = document.forms["add_order"]["pattern"].value;
  let date = document.forms["add_order"]["given_date"].value;

 if (or_id == "") {
    alert("Order must be filled");
    return false;
  }
  if (con_id == "") {
    alert("Contractor must be filled");
    return false;
  }
  if (item_id == "") {
    alert("Item must be filled");
    return false;
  }
  if (cloth == "") {
    alert("Cloth must be filled");
    return false;
  }
  if (qty == "") {
    alert("Quantity must be filled");
    return false;
  }
  if (rate == "") {
    alert("Rate must be filled");
    return false;
  }
  if (pattern == "") {
    alert("Pattern must be filled");
    return false;
  }
  if (date == "") {
    alert("Date must be filled");
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
						url: "item_fetch.php",
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
		<script>
		$(document).ready(function(){
			$("#order_id").on('change', function(){
				var value= $(this).val();
				
				//alert(value);
				
				$.ajax({
					url:"order_fetch.php",
					type: "POST",
					data: 'request=' + value,
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
		
	 
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
   </body>
</html>

































