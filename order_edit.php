<?php
include("header.php");
$get_id=$_GET['id'];
$or_id =$_GET['cu_order'];
$item_id =$_GET['item'];

if($_GET['id']!=='' && $_GET['item']!==''){

	if ( ! preg_match('/^-?\d+$/', $get_id) OR ! preg_match('/^-?\d+$/', $or_id) OR ! preg_match('/^-?\d+$/', $item_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
		
		
if (isset($_POST['edit_data'])) {

    $return_cloth = $_POST['return_cloth'];
    $return_qty = $_POST['return_qty'];
    $cloth = $_POST['Assigned_cloth'];
    $qty = $_POST['Assigned_qty'];
	$return_date = $_POST['return_date'];
	$status=$_POST['status'];
	$paid_or_unpaid=$_POST['paid_or_unpaid'];

	$location = sprintf('pages?page=$2y$10$RLpHDQB2GnBQculaf7WxwO3w28qjUiZPcKIkBXM6FmHX2SDN8P3PG&id=%s&cu_order=%s&item=%s&active=2', $get_id, $or_id, $item_id);

				
				
						$order_update_query = $DBcon->query("UPDATE  tbl_order SET return_date='$return_date',return_cloth='$return_cloth',return_qty='$return_qty',status='$status',paid_or_unpaid='$paid_or_unpaid' WHERE or_id='$get_id'");
						if ($order_update_query == true) {
							
							
								
								$update_stock_query=$DBcon->query("UPDATE tbl_req SET stock='$return_qty',status_returned='1' WHERE or_id='$or_id' && item_id='$item_id' && status_returned='0'");
							
								if($update_stock_query==true){
										echo '<script>alert("Data Updated")</script>';
										redirect($location);
								}else{
										echo '<script>alert("Something error")</script>';
										redirect($location);
								}
						
						
							
						} else {
							echo '<script>alert("Something Error")</script>';
							redirect('pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=1&active=2' );
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
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Edit<small>( return detail )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
												 <form action="" method="POST" name="edit_order" onsubmit="return validateForm()">
												  
    
       
    
												 <?php 
														$order_fetch_query = $DBcon->query("SELECT * FROM tbl_order WHERE or_id='$get_id'");
														while($row=$order_fetch_query->fetch_array()){
													   ?>
													
												
													<div class="row">
													  <div class="col-25">
														<label for="fname">Order Status</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="status" >
															<option value="">Select Status</option>
															<option 
																<?php if($row['status']==0){ echo "selected"; } ?>
															value="0">Not done
															</option>
															
															<option
														<?php if($row['status']==1){ echo "selected"; } ?>
															value="1">Work done</option>
													   </select>
													  </div>
													</div>
													
													<div class="row">
													  <div class="col-25">
														<label for="fname">Payment Status</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="paid_or_unpaid" >
															<option value="">Select Status</option>
															<option 
																<?php if($row['paid_or_unpaid']==0){ echo "selected"; } ?>
															value="0">Unpaid
															</option>
															
															<option
														<?php if($row['paid_or_unpaid']==1){ echo "selected"; } ?>
															value="1">Paid</option>
													   </select>
													  </div>
													</div>
										
													<div class="row">
													  <div class="col-25">
														<label for="fname">Return Date</label>
													  </div>
													  <div class="col-75">
												  
														 <input type="date" name="return_date" id="date1" class="disableFuturedate" id="return_date"  value="<?php echo $row['return_date']; ?>" >
													  </div>
													</div>
												    	<div class="row">
													  <div class="col-25">
														<label for="fname">Return Cloth (in Meter)</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" name="return_cloth"  value="<?php echo $row['return_cloth']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
													  </div>
													</div>
													
													<div class="row">
													  <div class="col-25">
														<label for="fname">Return Quantity</label>
													  </div>
													  <div class="col-75">
												   
														       <input type="text" name="return_qty"  value="<?php echo $row['return_qty']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
													  </div>
													</div>
													<input type="hidden"  name="Assigned_cloth"  value="<?php echo $row['cloth']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
													<input type="hidden"  name="Assigned_qty"  value="<?php echo $row['qty']; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
													  
												   
														<?php 
												 } ?>
												  
													<div class="row">
													  <button type="submit" class="btn cur-p btn-success" name="edit_data">Save</button> 
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
 
  let Assigned_cloth = document.forms["edit_order"]["Assigned_cloth"].value;
  let return_date = document.forms["edit_order"]["return_date"].value;
  let Assigned_qty = document.forms["edit_order"]["Assigned_qty"].value;
  let return_cloth = document.forms["edit_order"]["return_cloth"].value;
  let return_qty = document.forms["edit_order"]["return_qty"].value;
 
   if (return_date == "") {
    alert("Date must be filled");
    return false;
  }
 if (return_cloth == "") {
    alert("Return cloth must be filled");
    return false;
  }

  if (return_qty == "") {
    alert("Cloth must be filled");
    return false;
  }
  

  

 
}
</script>
<script>
	var today = new Date().toISOString().split("T")[0];
	
	document.getElementById("date").setAttribute("max",today);
	
	document.getElementById("date1").setAttribute("max",today);
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





















