<?php 
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{

    if(isset($_POST['save_data'])){

		$or_id= $_POST['or_id'];
		$item_id= $_POST['item_id'];
		$desc= $_POST['desc'];
		$quality= $_POST['quality'];
		$pattern=$_POST['pattern'];
		$logo=$_POST['logo'];
		$qty= $_POST['qty'];
		$location=sprintf('pages?page=$2y$10$ukvgrAyPOtMrS7DyeAsHkOMV.PyWVEsc/psglbi2p7QUHQ2L74/gO&id=%s&active=5', $or_id); 
		$check_item=$DBcon->query("SELECT * FROM tbl_req WHERE item_id='$item_id' && or_id='$or_id'");
		$count=$check_item->num_rows;
		if($count > 0){
			echo '<script>alert("Item already existed in order")</script>';
			redirect("$location");
		}else{
		
		

					
						if($or_id!=='' && $item_id!=='' && $quality!=='' && $pattern!=='' && $logo!=='' && $qty!==''){
									$req_query=$DBcon->query("INSERT INTO tbl_req (or_id,item_id,description,quality,pattern,logo,qty,stock,status_returned,flag)
									VALUES('$or_id', '$item_id','$desc', '$quality','$pattern', '$logo', '$qty','0','0','0')");
									
									
									$reqID=$DBcon->insert_id;
		
												for($a=0; $a<count($_POST["size"]); $a++)
												{
													$sql1 = $DBcon->query("INSERT INTO tbl_size_req (req_id, item_id, size, qty)VALUES('$reqID', 
													'".$item_id."', '".$_POST['size'][$a]."', '".$_POST['size_qty'][$a]."')");
													
													
													
												}
							
										
											echo '<script>alert("Data Added")</script>';
											redirect("$location");
										
								}else{
									echo '<script>alert("All fields must be filled")</script>';
								}
		}
        
    }
	
	
	if (isset($_POST['save_data_item'])) {
    $item_name = $_POST['item_name'];
	$location=sprintf('pages?page=$2y$10$ukvgrAyPOtMrS7DyeAsHkOMV.PyWVEsc/psglbi2p7QUHQ2L74/gO&id=%s&active=5', $get_id); 
    if ($item_name !== '') {
        $item_query = $DBcon->query(
            "INSERT INTO tbl_items(item_name,flag)VALUES('$item_name', '0')"
        );

        if ($item_query == true) {
            echo '<script>alert("Data Inserted")</script>';
            redirect("$location");
        } else {
            echo '<script>alert("Something Error")</script>';
            redirect("$location");
        }
    } else {
        echo '<script>alert("All fields must be filled")</script>';
    }
} 
	
	
	
	if(isset($_POST['delete_req'])){
			$req_id =$_POST['req_id']; 
			$location=sprintf('pages?page=$2y$10$ukvgrAyPOtMrS7DyeAsHkOMV.PyWVEsc/psglbi2p7QUHQ2L74/gO&id=%s&active=5', $get_id); 
		
			if($req_id!==''){
			$delete_qry =$DBcon->query("UPDATE tbl_req SET flag='1' WHERE req_id='$req_id'");
			
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
                             <a href="pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5"><button tabindex="-1" class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                           </div>
                        </div>
                     </div>
					 
					
	 <div class="row">
					 <!-- table section -->
                        <div class="col-md-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>REQUIREMENT</h2>
													 
                                 </div>
								 
											<div class="modal fade" id="myModal">
												<div class="modal-dialog">
												   <div class="modal-content">
													  <!-- Modal Header -->
													  <div class="modal-header">
														 <h4 class="modal-title">Add Item Form</h4>
														 <button type="button" class="close" data-dismiss="modal">&times;</button>
													  </div>
													  <!-- Modal body -->
													  <div class="modal-body">
													  
													  <!--- Item Form--->
													  <div class="login-form">
														<div class="container">
															<form action="" method="POST" name="add_item" onsubmit="return validateForm()">
															<table>
																<tr>
																	<td><div class="col-25">
																			<label for="fname">Item Name</label>
																		  </div></td>
																	<td style="width:500px;"><div class="row">
																		  
																		  <div class="col-50">
																			<input type="text" value=""  id="item_name" name="item_name" placeholder="Item Name">  
																		  </div>
																		</div></td>
																</tr>
															</table>
															
																
													   
													  
																<div class="row">
																  <button type="submit" class="btn cur-p btn-success" name="save_data_item">Save</button> 
																</div>
													        </form>
														</div>
													</div>
													  <!--- Item Form--->
													  </div>
													  <!-- Modal footer -->
													  <div class="modal-footer">
														 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													  </div>
												   </div>
												</div>
											 </div>
																	 
								<div style="text-align:right;">
									<button type="button" class="model_bt btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Item</button></div>
                              </div>
													
									<form action="" method="POST" id="form" name="add_req" >
					
													<div class="table_section padding_infor_info">
															<div class="table-responsive-sm">
																	<table class="table table-striped projects">
																			<tr>
																				<td>Item Name</td>
																				<td>
																				<input type="hidden" value="<?php echo $_GET['id']; ?>" name="or_id" required>
																				<select name="item_id" required >
																							<option value="">Select Item</option>
																							<?php 
																								$item_fetch=$DBcon->query("SELECT * FROM tbl_items WHERE flag='0'");
																								while($row2=$item_fetch->fetch_array()){
																									?>
																										<option value="<?php echo $row2['it_id']; ?>"
																											> <?php echo $row2['item_name']; ?></option>
																									<?php 
																								}
																							?>
																					</select>
																				 </td>
																				<td>Description</td>
																				<td><input type="text" value=""  name="desc"  placeholder="Enter description" required> </td>
																			</tr>
																			
																			<tr>
																				<td>Quality</td>
																				<td><input type="text" value=""  name="quality"  placeholder="Enter Quality" required></td>
																				<td>Pattern</td>
																				<td><input type="text" value=""  name="pattern"  placeholder="Enter Pattern" required></td>
																			</tr>
																			
																			<tr>
																				<td>Logo</td>
																				<td><input type="text" value=""  name="logo" placeholder="Enter Logo" required></td>
																				<td>Pieaces</td>
																				<td><input type="text" value=""  name="qty" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Quantity">  
														</td>
																			</tr>
																			
																			
																	</table>
															</div>
													
															<div class="table-responsive-sm">
																	<table class="table table-striped projects">
																		<thead class="thead-dark">
																			<tr>
																				
																				<th>SIZE</th>
																				<th>QUANTITY</th>
																				<th></th>
																				<th><span class="btn btn-warning" id="BtnAdd"><i class="fa fa-plus"></i></th>
																				
																			</tr>
																		</thead>
																		
																		<tbody id="Tbody">
																				<tr id="Trow" >
																					
																					<td><input type="text" value="" name="size[]" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="size" placeholder="Enter Size" required ></td>
																					<td><input type="text" value="" name="size_qty[]" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Quantity" required></td>
																					<td></span></td>
																					<td></td>
																				</tr>
																		</tbody>
																	</table>
															</div>
													</div>

													<table class="table table-light">
													<tr >
														<td></td>
														<td><button type="submit" class="btn cur-p btn-success"  name="save_data">Save</button></td>
														
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													</table>
												  </form>
											</div>	
                                       </div>
									       <div class="col-md-6">
												   <div class="white_shd full margin_bottom_30">
													  <div class="full graph_head">
														 <div class="heading1 margin_0">
															<h2>REQUIREMENT DETAILS</h2>
														 </div>
														   </div>
													  <div class="table_section padding_infor_info">
														 <div class="table-responsive-sm">
															<table class="table table-light table-striped">
															   <thead class="thead-dark">
																		<tr>
																			<th>SR.NO</th>
																			<th>ITEM NAME</th>
																			<th>QUALITY</th>
																			<th>PATTERN</th>
																			<th>LOGO</th>
																			<th>QTY</th>
																			
																			<th>ACTION</th>
																		</tr>
																 </thead>
																<tbody>
												
												<?php 
												$count=1;
													$req_fetch=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$get_id' && flag='0'");
													while($row=$req_fetch->fetch_array()){
														
														$item_id=$row['item_id'];
														$qty=$row['qty'];
														
														
														
												?>
												
													<tr>
														<td><?php echo $count ?></td>
														<td><?php 
																$item_fetch1=$DBcon->query("SELECT * FROM tbl_items WHERE flag='0' && it_id='$item_id'");
																while($row3=$item_fetch1->fetch_array()){
																	?>
																 <?php echo $row3['item_name']; ?>
																	<?php 
																}
															?></td>
														
														<td><?php echo $row['quality']; ?></td>
														<td><?php echo $row['pattern']; ?></td>
														<td><?php echo $row['logo']; ?></td>
														<td><?php echo $row['qty']; ?></td>
														
														<td>
														 <?php 
														 if($row['status_returned']==1){
															 ?><span style="color:red"><?php echo "No action available";?><span><?php
														 }else{ ?>
														 
															<table>
																
																	<td><a href="pages?page=$2y$10$30FHe6muO/auV6LXCVSvj.sXfKYmmwX5EgaVwJ7XSlWmD.EYeKsla&id=<?php echo $row['req_id']; ?>&item=<?php echo $row['item_id']; ?>&active=5&extra=<?php echo $get_id ?>"><button  class="btn cur-p btn-info"><i class="fa fa-plus"></i> </button></a></td>
																	<td> <a href="pages?page=$2y$10$m7p2wrKbvpNwLWgMA2oS9egon0eNRUadY8kUgyGsUeopUiWUOEYs.&id=<?php echo $row['req_id']; ?>&active=5&extra=<?php echo $get_id ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> </button></td>
																	<td><form action="" method="POST" > 
																		<input type="hidden" value="<?php echo $row['req_id']; ?>" name="req_id">
																		<button name="delete_req" class="btn cur-p btn-danger" onclick="return confirmation()" ><i class="fa fa-trash"></i> </button>
																	</form></td>
															</table>
															<div> </div>&nbsp;
															<div></a>
															<div></div>
														 <?php }
														 
														 ?>	
														
														</td>
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
	  $(document).ready(function(){
		var i=1;
		
		$('#BtnAdd').click(function(){
			i++;
			$("#Tbody").append('<tr id="Trow'+i+'" ><td><input type="text" value="" name="size[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="size" placeholder="Enter Size" required></td><td><input type="text" value="" name="size_qty[]" placeholder="Enter Quantity" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required></td><td><span class="btn btn-danger btn_remove" id="'+i+'">X</span></td></tr>');
			//children().find("#size").focus();
		});
			
		$(document).on('click', '.btn_remove', function(){
			var button_id = $(this).attr("id"); 
			$('#Trow'+button_id+'').remove();
		});
	  });
	  </script>
	  

<script>
	function confirmation(){
		return confirm("Are you sure");
		
	}
</script>
	  <script>
function validateForm() {
 
  let item_name = document.forms["add_item"]["item_name"].value;

    if (item_name == "") {
    alert("Item name must be filled");
	document.querySelector("#item_name").focus();
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































