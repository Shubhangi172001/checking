<?php 
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){
if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
    if(isset($_POST['save_data'])){

    $party_name = $_POST['party_name'];
	$mobile_number = $_POST['mobile_number'];
	$address = $_POST['address'];
	$gst_no = $_POST['gst_no'];
	$party_type = $_POST['party_type'];

    if ($party_name!=='' && $mobile_number!=='' && $address!=='' && $gst_no!=='' && $party_name!=='') {
            $party_query=$DBcon->query("UPDATE tbl_parties SET party_name='$party_name', mobile_number='$mobile_number' , party_address='$address' , gst_no='$gst_no', 
										party_type='$party_type' WHERE p_id='$get_id'");
    
                if($party_query==true){
                    echo '<script>alert("Data Updated")</script>';
                    redirect('pages?page=$2y$10$d1KyFcby1JukAZongyzfN.Jx1mLS9HaXo7RscRY8f7cXirUQqX8fO&active=9');
                }else{
                    echo '<script>alert("Something Error")</script>';
                    redirect('pages?page=$2y$10$d1KyFcby1JukAZongyzfN.Jx1mLS9HaXo7RscRY8f7cXirUQqX8fO&active=9');
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
                               <a href="pages?page=$2y$10$d1KyFcby1JukAZongyzfN.Jx1mLS9HaXo7RscRY8f7cXirUQqX8fO&active=9"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				 
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Edit<small>( party )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
												 <form action="" method="POST" name="add_party" onsubmit="return validateForm()">
												   
												<?php 
												 $party_fetch_query= $DBcon->query("SELECT * FROM tbl_parties WHERE p_id='$get_id'");
												 while($row=$party_fetch_query->fetch_array()){   

														?>
													<div class="row">
													  <div class="col-25">
														<label for="fname">Party Name</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="<?php echo $row['party_name']; ?>" onkeydown="return /[a-zA-Z]/i.test(event.key)" name="party_name" placeholder="Party Name">  
														
													  </div>
													</div>
													
													 <div class="row">
      <div class="col-25">
        <label for="fname">Mobile Number</label>
      </div>
      <div class="col-75">
  
        <input type="text" value="<?php echo $row['mobile_number'] ?>"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" name="mobile_number" placeholder="Mobile Number">  
		
      </div>
    </div> 
	<div class="row">
      <div class="col-25">
        <label for="fname">Address</label>
      </div>
      <div class="col-75">
  
        <textarea rows="3" type="text" value="<?php echo $row['party_address']; ?>"  name="address" placeholder="Address"><?php echo $row['party_address']; ?></textarea>  
		
      </div>
    </div>
	 <div class="row">
      <div class="col-25">
        <label for="fname">GST Number</label>
      </div>
      <div class="col-75">
  
        <input type="text" value="<?php echo $row['gst_no']; ?>"  name="gst_no" placeholder="GST Nubmer">  
		
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="fname">Party Type</label>
      </div>
      <div class="col-75">
  
        <select name="party_type">	
			<option value="">Select Type</option>
			<option 
			<?php  if($row['party_type']==1){echo "Selected"; } ?> value="1">Puchase</option>
			<option 
			<?php  if($row['party_type']==2){echo "Selected"; } ?> value="2">Selling</option>
		</select>
		
      </div>
    </div>
												   
														<?php 
												 } ?>
												  
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
 
  let party_name = document.forms["add_party"]["party_name"].value;
  let mobile_number = document.forms["add_party"]["mobile_number"].value;
  let address = document.forms["add_party"]["address"].value;
  let gst_no = document.forms["add_party"]["gst_no"].value;
  let party_type = document.forms["add_party"]["party_type"].value;

    if (party_name == "") {
    alert("Name must be filled");
    return false;
	}
	if (mobile_number == "") {
    alert("Mobile Number must be filled");
    return false;
	}
	if (address == "") {
    alert("Address must be filled");
    return false;
	}
	if (gst_no == "") {
    alert("GST Number must be filled");
    return false;
	}
	if (party_type == "") {
    alert("Party type must be filled");
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
         redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
}   
?>


























