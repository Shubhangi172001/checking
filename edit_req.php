<?php 
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{

    if(isset($_POST['save_data'])){

		
		$item_id= $_POST['item_id'];
		$quality= $_POST['quality'];
		$pattern=$_POST['pattern'];
		$logo=$_POST['logo'];
		$qty= $_POST['qty'];
		$total_qty_with_size=$_POST['total_qty_with_size'];
		
		
		$location=sprintf('pages?page=$2y$10$m7p2wrKbvpNwLWgMA2oS9egon0eNRUadY8kUgyGsUeopUiWUOEYs.&id=%s&active=5', $get_id); 
		
			
					
						if( $item_id!=='' && $quality!=='' && $pattern!=='' && $logo!=='' && $qty!==''){
							
									if($total_qty_with_size > $qty){
										echo '<script>alert("Quantity is greater than availble in size requirement. Kindly edit your size requirement in sizes")</script>';
										redirect("$location");
									}else{
	
									$req_query=$DBcon->query("UPDATE tbl_req SET item_id='$item_id',quality='$quality',pattern='$pattern',logo='$logo',qty='$qty'");
							
										if($req_query==true){
											echo '<script>alert("Data Updated")</script>';
											redirect("$location");
										}else{
											echo '<script>alert("Something Error")</script>';
											redirect("$location");
										}
									}	
										
						}else{
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
                              <a href="pages?page=$2y$10$ukvgrAyPOtMrS7DyeAsHkOMV.PyWVEsc/psglbi2p7QUHQ2L74/gO&active=5&id=<?php echo $_GET['extra']; ?>"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                           </div>
                        </div>
                     </div>
					 
					
		<!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Edit<small>( requirement )</small></h2>
                                 </div>
                              </div>
				
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
											
													<?php 
														$total_qty_with_size=0;
														$qty_of_requirement_with_size=$DBcon->query("SELECT * FROM tbl_size_req WHERE req_id='$get_id'");
														while($fetch=$qty_of_requirement_with_size->fetch_array()){
																	$qty=$fetch['qty'];
																	$total_qty_with_size = $total_qty_with_size+ $qty;
														}
														
													?>
													
													 <table>
														<tr>
															<Td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<Td><b>Actual Quantity Available in size requirement :</b></td><td style="color:red;font-size:18px;"><?php echo $total_qty_with_size ?></td>
															<td></td>
															
														</tr>
													</table><br>
													
													<?php 
													
													$req_fetch=$DBcon->query("SELECT * FROM tbl_req WHERE req_id='$get_id' && flag='0'");
													while($row=$req_fetch->fetch_array()){
														
														?>
														
														
														
												 <form action="" method="POST" name="add_req" onsubmit="return validateForm()">
												 
													<input type="hidden" value="<?php echo $total_qty_with_size ?>" name="total_qty_with_size">
													<div class="row">
													  <div class="col-25">
														<label for="fname">Item Name</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="item_id" >
															<option value="">Select Item</option>
															<?php 
																$item_fetch=$DBcon->query("SELECT * FROM tbl_items WHERE flag='0'");
																while($row2=$item_fetch->fetch_array()){
																	?>
																		<option <?php if($row['item_id']==$row2['it_id']){ echo "selected"; } ?> value="<?php echo $row2['it_id']; ?>"
																			> <?php echo $row2['item_name']; ?></option>
																	<?php 
																}
															?>
													   </select>
													  </div>
													</div>
													<div class="row">
													  <div class="col-25">
														<label for="fname">Quality</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="<?php echo $row['quality']; ?>"  name="quality"  placeholder="Enter Quality">  
														
													  </div>
													</div>
													<div class="row">
													  <div class="col-25">
														<label for="fname">Pattern</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="<?php echo $row['pattern']; ?>"  name="pattern"  placeholder="Enter Pattern">  
														
													  </div>
													</div>
													
													
													
													<div class="row">
													  <div class="col-25">
														<label for="fname">Logo</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="<?php echo $row['logo']; ?>"  name="logo" placeholder="Enter Logo">  
														
													  </div>
													</div>
													
													<div class="row">
													  <div class="col-25">
														<label for="fname">Quantity</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="<?php echo $row['qty']; ?>"  name="qty" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Quantity">  
														
													  </div>
													</div>
													
												
													
													
													
												   
													<?php } ?>
												  
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
						
					 
					 
					 	 
                </div>
                     
					 
                  
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
	
	
	let or_id = document.forms["add_req"]["or_id"].value;
	let item_id = document.forms["add_req"]["item_id"].value;
	let quality = document.forms["add_req"]["quality"].value;
	let pattern = document.forms["add_req"]["pattern"].value;
    let logo = document.forms["add_req"]["logo"].value;
	let qty = document.forms["add_req"]["qty"].value;
  

		 if (or_id == "") {
			alert("Go back some error found");
			return false;
		  }
		  
		  if (item_id == "") {
			alert("Item must be filled");
			return false;
		  }
		  if (quality == "") {
			alert("Quality must be filled");
			return false;
		  }
		   if (pattern == "") {
			alert("Pattern must be filled");
			return false;
		  }
		  if (logo == "") {
			alert("Logo must be filled");
			return false;
		  }
		  
		  if (qty == "") {
			alert("Quantity must be filled");
			return false;
		  }
		 
 
 
}
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































