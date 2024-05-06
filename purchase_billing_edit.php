<?php
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
		
		
if (isset($_POST['save_data'])) {
    $bill_no = $_POST['bill_no'];
	$total_amount = $_POST['total_amount'];
	$paid_amount = $_POST['paid_amount'];
	$party_id = $_POST['party_id'];
	$date = $_POST['date'];
	$status=$_POST['status'];
	
	if($status!==''){
			if ($bill_no !== '' && $total_amount !== '' && $paid_amount !== '' && $party_id!=='' && $date!=='' && $status!=='') {
					$cont_query = $DBcon->query(
						"UPDATE tbl_cloth_billing SET paid_amount='$total_amount',
						date='$date',status='$status' WHERE bi_id='$get_id'");

					if ($cont_query == true) {
						echo '<script>alert("Data Updated")</script>';
						redirect('pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&active=3');
					} else {
						echo '<script>alert("Something Error")</script>';
						redirect(
							'pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&active=3'
						);
					}
				} else {
					echo '<script>alert("All fields must be filled")</script>';
				}
	}else{
				if ($bill_no !== '' && $total_amount !== '' && $paid_amount !== '' && $party_id!=='' && $date!=='' ) {
					$cont_query = $DBcon->query(
						"UPDATE tbl_cloth_billing SET party_id='$party_id',bill_no='$bill_no',total_amount='$total_amount',paid_amount='$paid_amount',
						date='$date',status='0' WHERE bi_id='$get_id'");

					if ($cont_query == true) {
						echo '<script>alert("Data Updated")</script>';
						redirect('pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&active=3');
					} else {
						echo '<script>alert("Something Error")</script>';
						redirect(
							'pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&active=3'
						);
					}
				} else {
					echo '<script>alert("All fields must be filled")</script>';
				}
		
	}

   
} 

?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                             <a href="pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&pagination=1&active=3"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Edit Purchase<small>( cloth )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
						  <form action="" method="POST" name="add_bill" onsubmit="return validateForm()">
						  
						  <?php 
							$purchase_billing_edit_query=$DBcon->query("SELECT * FROM tbl_cloth_billing WHERE flag='0' && bi_id='$get_id'");
							while($row=$purchase_billing_edit_query->fetch_array()){
								
								if($row['status']==0){
						  ?>
						  	 <div class="row">
													  <div class="col-25">
														<label for="fname">Parties Name</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="party_id" >
															<option value="">Select Party</option>
															<?php 
																$party_fetch=$DBcon->query("SELECT * FROM tbl_parties WHERE flag='0' && party_type='1'");
																while($row1=$party_fetch->fetch_array()){
																	?>
																		<option value="<?php echo $row1['p_id']; ?>"
																		
																		<?php if($row['party_id']==$row1['p_id']){
																			echo "selected";
																		}?>><?php echo $row1['party_name']; ?></option>
																	<?php 
																}
															?>
													   </select>
													  </div>
													</div>
							<div class="row">
							  <div class="col-25">
								<label for="fname">Bill No</label>
							  </div>
							  <div class="col-75">
						  
								<input type="text" value="<?php echo $row['bill_no']; ?>"  name="bill_no" placeholder="Bill Number">  
								
							  </div>
							</div>
							
							<div class="row">
							  <div class="col-25">
								<label for="fname">Total Amount</label>
							  </div>
							  <div class="col-75">
						  
								<input type="text" value="<?php echo $row['total_amount']; ?>"  name="total_amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Total Amount">  
								
							  </div>
							</div>
							
							<div class="row">
							  <div class="col-25">
								<label for="fname">Paid Amount</label>
							  </div>
							  <div class="col-75">
						  
								<input type="text" value="<?php echo $row['paid_amount']; ?>"  name="paid_amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Paid Amount">  
								
							  </div>
							</div>
							
							<div class="row">
							  <div class="col-25">
								<label for="fname">Date</label>
							  </div>
							  <div class="col-75">
						  
								<input type="date" value="<?php echo $row['date']; ?>"  name="date" id="date" >  
								
							  </div>
							</div>
							
							<?php 
									if($row['status']==0){
							?>
							 	 <div class="row">
													  <div class="col-25">
														<label for="fname">Status</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="status" >
															<option value="">Select Status</option>
															<option value="1">Paid</option>
													   </select>
													  </div>
													</div>
									<?php } ?>
							
							
							<div class="row">
							  <button type="submit" class="btn cur-p btn-success" name="save_data">Save</button> 
							</div>
						  </form>
						  <?php 
								}elseif($row['status']==1){?>		



										  	 <div class="row">
													  <div class="col-25">
														<label for="fname">Parties Name</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="party_id" readonly>
															<option value="">Select Party</option>
															<?php 
																$party_fetch=$DBcon->query("SELECT * FROM tbl_parties WHERE flag='0' && party_type='1'");
																while($row1=$party_fetch->fetch_array()){
																	?>
																		<option value="<?php echo $row1['p_id']; ?>"
																		
																		<?php if($row['party_id']==$row1['p_id']){
																			echo "selected";
																		}?>><?php echo $row1['party_name']; ?></option>
																	<?php 
																}
															?>
													   </select>
													  </div>
													</div>
							<div class="row">
							  <div class="col-25">
								<label for="fname">Bill No</label>
							  </div>
							  <div class="col-75">
						  
								<input type="text" value="<?php echo $row['bill_no']; ?>"  name="bill_no" readonly placeholder="Bill Number">  
								
							  </div>
							</div>
							
							<div class="row">
							  <div class="col-25">
								<label for="fname">Total Amount</label>
							  </div>
							  <div class="col-75">
						  
								<input type="text" value="<?php echo $row['total_amount']; ?>" readonly name="total_amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Total Amount">  
								
							  </div>
							</div>
							
							<div class="row">
							  <div class="col-25">
								<label for="fname">Paid Amount</label>
							  </div>
							  <div class="col-75">
						  
								<input type="text" value="<?php echo $row['paid_amount']; ?>" readonly  name="paid_amount" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Paid Amount">  
								
							  </div>
							</div>
							
							<div class="row">
							  <div class="col-25">
								<label for="fname">Date</label>
							  </div>
							  <div class="col-75">
						  
								<input type="date" value="<?php echo $row['date']; ?>" readonly name="date" >  
								
							  </div>
							</div>
									
	<?php }
 } ?>
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
 
  let bill_no = document.forms["add_bill"]["bill_no"].value;
  let total_amount = document.forms["add_bill"]["total_amount"].value;
  let paid_amount = document.forms["add_bill"]["paid_amount"].value;
  let party_id = document.forms["add_bill"]["party_id"].value;
  let date = document.forms["add_bill"]["date"].value;
if (party_id == "") {
    alert("Party must be filled");
    return false;
  }
  if (bill_no == "") {
    alert("Bill no must be filled");
    return false;
  }
  if (total_amount == "") {
    alert("Total amount must be filled");
    return false;
  }
  if (paid_amount == "") {
    alert("Paid amount must be filled");
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































