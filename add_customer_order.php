<?php
include("header.php");
if (isset($_POST['save_data'])) {


    $party_id = $_POST['party_id'];
    
	$current_date = date('y-m-d');
    if($party_id!== '' ) {
        
        $order_query = $DBcon->query("INSERT INTO tbl_customer_order(party_id,status,date, flag) VALUES('$party_id','0','$current_date','0')");

        if ($order_query == true) {
            echo '<script>alert("Data Inserted")</script>';
           redirect('pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5');
        } else {
            echo '<script>alert("Something Error")</script>';
            redirect('pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5' );
        }
    }else {
        echo '<script>alert("All fields must be filled")</script>';
    }
} 

if (isset($_POST['save_data_party'])) {
    $party_name = $_POST['party_name'];
	$mobile_number = $_POST['mobile_number'];
	$address = $_POST['address'];
	$state = $_POST['state'];
	$gst_no = $_POST['gst_no'];
	$party_type = $_POST['party_type'];

    if ($party_name!=='' && $mobile_number!=='' && $address!=='' && $gst_no!=='' && $party_name!=='' && $state!=='') {
        $party_query = $DBcon->query(
            "INSERT INTO tbl_parties(party_name,mobile_number,party_address,state,gst_no,party_type,flag)
			VALUES('$party_name','$mobile_number','$address','$state','$gst_no','$party_type', '0')"
        );

        if ($party_query == true) {
            echo '<script>alert("Data Inserted")</script>';
            redirect('pages?page=$2y$10$6Z7Rb272pEJPCnSJ3o/TVu6rsmIY3d1OPu0AF7b66C/l2RJOZwK2a&active=5');
        } else {
            echo '<script>alert("Something Error")</script>';
            redirect('pages?page=$2y$10$6Z7Rb272pEJPCnSJ3o/TVu6rsmIY3d1OPu0AF7b66C/l2RJOZwK2a&active=5'
            );
        }
    } else {
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
                                    <h2>Add<small>( order )</small></h2>
									
                                 </div>
								 
								 	
									
									<!--- Add party form-->
									<div class="modal fade" id="myModal">
												<div class="modal-dialog">
												   <div class="modal-content">
													  <!-- Modal Header -->
													  <div class="modal-header">
														 <h4 class="modal-title">Party Add Form</h4>
														 <button type="button" class="close" data-dismiss="modal">&times;</button>
													  </div>
													  <!-- Modal body -->
													  <div class="modal-body">
													  
													 
													  <div class="login-form">
														<div class="container">
															 <form action="" method="POST" name="add_party" onsubmit="return validateForm1()">
															 
																	<table>
																		<tr>
																			<td> <div class="col-25">
																					<label for="fname">Party Type</label>
																				  </div></td>
																			<td style="width:500px"> <div class="col-75">
																			  
																					<select name="party_type" tabindex="1" id="party_type">	
																						<option value="">Select Type</option>
																						<option value="1">Purchase</option>
																						<option value="2">Selling</option>
																					</select>
																					
																				  </div></td>
																		</tr>
																		<tr>
																			<td ><label for="fname">Party Name</label></td>
																			<td style="width:500px">
																			
																				<div class="col-75">
																			  
																					<input type="text" value=""  tabindex="2" id="party_name" name="party_name" placeholder="Party Name">  
																					
																				  </div></td>
																		</tr>
																		<tr>
																			<td >
																				 
																					<label for="fname">Mobile Number</label>
																				 </td>
																			<td style="width:500px">
																				
																				<div class="col-75">
																			  
																					<input type="text" value="" tabindex="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="10" maxlength="10" id="mobile_number" name="mobile_number" placeholder="Mobile Number">  
																					
																				  </div>
																			</td>
																		</tr>
																		<tr>
																			<td ><label for="fname">Address</label></td>
																			<td style="width:500px"><div class="col-75">
																			  
																					<textarea rows="3" type="text" tabindex="4" value=""  name="address" id="address" placeholder="Address"></textarea>  
																					
																				  </div></td>
																		</tr>
																		<tr>
																			<td ><label for="fname">Party State</label></td>
																			<td style="width:500px"> <div class="col-75">
																			  
																					<input type="text" value=""  name="state" tabindex="5" id="state" placeholder="State Name">  
																					
																				  </div></td>
																		</tr>
																		<tr>
																			<td ><label for="fname">GST Number</label></td>
																			<td style="width:500px"> <div class="col-75">
																				
																					<input type="text" value="" name="gst_no" tabindex="6" id="gst_no" placeholder="GST Nubmer">  
																					
																				  </div></td>
																		</tr>
																		
																	</table>

																			   
																			  
																				<div class="row">
																				  <button type="submit" class="btn cur-p btn-success" tabindex="7" name="save_data_party">Save</button> 
																				</div>
																			  </form>
														</div>
													</div>
											
													  </div>
													  <!-- Modal footer -->
													  <div class="modal-footer">
														 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
													  </div>
												   </div>
												</div>
											 </div>
									<!--- Add party form-->
								 
								 	<div style="text-align:right;">
									<button  class="model_bt btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Item</button></div>
									
									
								
                              </div>
			
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
												 <form action="" method="POST" name="add_order" onsubmit="return validateForm()">
												 <div class="row">
													  <div class="col-25">
														<label for="fname">Parties Name</label>
													  </div>
													  <div class="col-75">
												  
														 <select name="party_id" >
															<option value="">Select Party</option>
															<?php 
																$party_fetch=$DBcon->query("SELECT * FROM tbl_parties WHERE flag='0' && party_type='2'");
																while($row=$party_fetch->fetch_array()){
																	?>
																		<option value="<?php echo $row['p_id']; ?>"><?php echo $row['party_name']; ?></option>
																	<?php 
																}
															?>
													   </select>
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
	  <script>
function validateForm1() {
	
  let party_name = document.forms["add_party"]["party_name"].value;
  let mobile_number = document.forms["add_party"]["mobile_number"].value;
  let address = document.forms["add_party"]["address"].value;
  let state = document.forms["add_party"]["state"].value;
  let gst_no = document.forms["add_party"]["gst_no"].value;
  let party_type = document.forms["add_party"]["party_type"].value;
 
		
	if (party_type == "") {
		alert("Party type must be filled");
		document.querySelector("#party_type").focus();
		return false;
	}
    if (party_name == "") {
		alert("Party name must be filled");
		document.querySelector("#party_name").focus();
		return false;
	}
	if (mobile_number == "") {
		alert("Mobile Number must be filled");
		document.querySelector("#mobile_number").focus();
		return false;
	}
	if (address == "") {
		alert("Address must be filled");
		document.querySelector("#address").focus();
		return false;
	}
	if (state == "") {
		alert("State must be filled");
		document.querySelector("#state").focus();
		return false;
	}
	if (gst_no == "") {
		alert("GST Number must be filled");
		document.querySelector("#gst_no").focus();
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

































