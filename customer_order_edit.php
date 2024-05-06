<?php
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
		
		

			
		
			
if (isset($_POST['save_data'])) {


    $party_id = $_POST['party_id'];
    $status=$_POST['status']; 
  
	$update_query=$DBcon->query("UPDATE tbl_customer_order SET party_id='$party_id',status='$status' WHERE cu_or_id='$get_id'");
	
	if($update_query==true){
		
		
		echo '<script>alert("Data Updated")</script>';
		redirect('pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5');
	}else{
		echo '<script>alert("Somthing error")</script>';
		redirect('pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5');
	}
			
	
} 

?>

 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <a href="pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Edit<small>( order )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
												 <form action="" method="POST" name="add_order" onsubmit="return validateForm()">
													<?php 
													$order_fetch=$DBcon->query("SELECT * FROM tbl_customer_order WHERE flag='0' && cu_or_id='$get_id'");
													while($row=$order_fetch->fetch_array()){
													
													
													?>
													
													<div class="row">
													<input type="hidden" name="available_qty" value="<?php echo $row['qty']; ?>" >
													  <div class="col-25">
														<label for="fname">Parties Name</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="party_id" >
															<option value="">Select Party</option>
															<?php 
																$party_fetch=$DBcon->query("SELECT * FROM tbl_parties WHERE flag='0'");
																while($row1=$party_fetch->fetch_array()){
																	?>
																		<option value="<?php echo $row1['p_id']; ?>"
																		
																				<?php if($row1['p_id']==$row['party_id']){
																					echo "selected";
																				}																			
																			
																		 ?> ><?php echo $row1['party_name']; ?></option>
																	<?php 
																}
															?>
													   </select>
													  </div>
													</div>
												
													
												
													
													<div class="row">
													  <div class="col-25">
														<label for="fname">Work Status</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="status" >
															<option value="">Select Status</option>
															<option value="1"
															
															<?php if($row['status']==1){
																	echo "selected";
															}?>>Done</option>
															
													   </select>
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
 
  let party_id = document.forms["add_order"]["party_id"].value;
  

 if (party_id == "") {
    alert("Party must be filled");
    return false;
  }
 
 
  
 
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
         redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO');
}   
?>































