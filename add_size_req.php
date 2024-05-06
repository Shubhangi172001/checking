<?php 
include("header.php");
$get_id=$_GET['id'];
$item_id=$_GET['item'];

if($_GET['id']!=='' && $_GET['item']){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) && ! preg_match('/^-?\d+$/', $item_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{

    if(isset($_POST['save_data'])){

		$remaining_qty=$_POST['remaining_qty'];
		$size= $_POST['size'];
		$qty= $_POST['qty'];
		
		$check_qry=$DBcon->query("SELECT * FROM tbl_size_req WHERE req_id='$get_id' && size='$size'");
		$check_count=$check_qry->num_rows;
		
		$location=sprintf('pages?page=$2y$10$30FHe6muO/auV6LXCVSvj.sXfKYmmwX5EgaVwJ7XSlWmD.EYeKsla&id=%s&item=%s&active=5', $get_id, $item_id); 
		
		if($remaining_qty!=='' && $size!=='' && $qty!==''){
					if($check_count > 0){
						echo '<script>alert("Already Existed this Size")</script>';
						redirect("$location");
					}else{
						
						
							if($qty > $remaining_qty){
								echo '<script>alert("Quantity must be less than remaining quantity")</script>';
								redirect("$location");
							}else{

												$req_query=$DBcon->query("INSERT INTO tbl_size_req (req_id, item_id, size, qty)
												VALUES('$get_id', '$item_id', '$size','$qty')");
										
													if($req_query==true){
														echo '<script>alert("Data Added")</script>';
														redirect("$location");
													}else{
														echo '<script>alert("Something Error")</script>';
														redirect("$location");
													}
							}			
				
					}
		}else{
					echo '<script>alert("All fields must be filled")</script>';
			}
    }
	
	if(isset($_POST['delete_req'])){
			$sz_req_id =$_POST['sz_req_id']; 
			$location=sprintf('pages?page=$2y$10$30FHe6muO/auV6LXCVSvj.sXfKYmmwX5EgaVwJ7XSlWmD.EYeKsla&id=%s&item=%s&active=5', $get_id, $item_id); 
		
			if($sz_req_id!==''){
			$delete_qry =$DBcon->query("DELETE FROM tbl_size_req WHERE sz_req_id='$sz_req_id'");
			
			if($delete_qry==true){
					echo '<script>alert("Data Deleted")</script>';
					redirect("$location");
                }else{
                    echo '<script>alert("Something Error")</script>';
                    redirect("$location");
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
                                    <h2>Add<small>( size requirement )</small></h2>
                                 </div>
                              </div>
				
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
											
												
													<?php
													
													$qty_fetch_query=$DBcon->query("SELECT * FROM tbl_req WHERE req_id='$get_id'");
													$fetch_qty=$qty_fetch_query->fetch_array();
													
													$total_qty_of_item=$fetch_qty['qty'];
													
													$total_qty=0;
													
													$size_req_qry=$DBcon->query("SELECT * FROM tbl_size_req WHERE req_id='$get_id' ");
													while($row=$size_req_qry->fetch_array()){
														$qty=$row['qty'];
														$total_qty=$total_qty+$qty;
													}
													
													$remaining_qty=$total_qty_of_item-$total_qty;
													?>
												
												 <form action="" method="POST" name="add_req" onsubmit="return validateForm()" enctype="multipart/form-data">
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
															<Td>Available Quantity :</td><td style="color:red;font-size:18px;"><?php echo $remaining_qty ?></td>
															<td></td>
															<Td><b>Total Quantity :</b></td><td style="color:green;font-size:18px;"><?php echo $total_qty_of_item ?></td>
															
														</tr>
													</table><br>
												
														<input type="hidden" value="<?php echo $remaining_qty ?>"  name="remaining_qty" onkeypress='return event.charCode >= 48 && event.charCode <= 57' readonly>  
												
													
												
												 
												 
													<div class="row">
													  <div class="col-25">
														<label for="fname">Size</label>
													  </div>
													  <div class="col-75">
												  
														 <input type="text" value="" placeholder="Size" name="size" >
															
													  </div>
													</div>
			
													
													<div class="row">
													  <div class="col-25">
														<label for="fname">Quantity</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value=""  name="qty" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Quantity">  
														
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
                                    <h2>Requirement List</h2>
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
														<th>SIZE</th>
														<th>QUANTITY</th>
														<th>ACTION</th>
														<th></th>
													</tr>
                                             </thead>
                                             <tbody>
												
												<?php 
												$count=1;
													$req_fetch=$DBcon->query("SELECT * FROM tbl_size_req WHERE req_id='$get_id'");
													while($row1=$req_fetch->fetch_array()){
														
													
														
												?>
												
													<tr>
														<td><?php echo $count ?></td>
														<td><?php echo $row1['size']; ?></td>
														<td><?php echo $row1['qty']; ?></td>
														
														<td><form action="" method="POST" > 
														
														<input type="hidden" value="<?php echo $row1['sz_req_id']; ?>" name="sz_req_id">
														<button name="delete_req" class="btn cur-p btn-danger" onclick="return confirmation()" ><i class="fa fa-trash"></i> Delete</button>
														</form> </td>
														<td></td>
													</tr>
													<?php
														$count++;
													} ?>
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
	
	let size = document.forms["add_req"]["size"].value;
	let qty = document.forms["add_req"]["qty"].value;


		  if (size == "") {
			alert("Size must be filled");
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































