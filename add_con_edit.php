<?php 
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{

    if(isset($_POST['save_data'])){

        $cont_name= $_POST['cont_name'];
    
        if($cont_name!==''){
            $cont_query=$DBcon->query("UPDATE tbl_contractors SET cn_name='$cont_name' WHERE cn_id='$get_id'");
    
                if($cont_query==true){
                    echo '<script>alert("Data Updated")</script>';
                    redirect('pages?page=$2y$10$USLRXrx0IJyMkcVtED8K7OHoDuTSefnxtLLzT9gz0rXcnUFcM/HGW&active=8');
                }else{
                    echo '<script>alert("Something Error")</script>';
                    redirect('pages?page=$2y$10$USLRXrx0IJyMkcVtED8K7OHoDuTSefnxtLLzT9gz0rXcnUFcM/HGW&active=8');
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
                               <a href="pages?page=$2y$10$USLRXrx0IJyMkcVtED8K7OHoDuTSefnxtLLzT9gz0rXcnUFcM/HGW&active=8"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				 
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Edit<small>( contractor )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
												 <form action="" method="POST" name="add_contractor" onsubmit="return validateForm()">
												   
												<?php 
												 $cont_fetch_query= $DBcon->query("SELECT * FROM tbl_contractors WHERE cn_id='$get_id'");
												 while($row=$cont_fetch_query->fetch_array()){   

														?>
													<div class="row">
													  <div class="col-25">
														<label for="fname">Contractor Name</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="<?php echo $row['cn_name']; ?>" onkeydown="return /[a-zA-Z]/i.test(event.key)" name="cont_name" placeholder="Contractor Name">  
														
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
 
  let party_name = document.forms["add_contractor"]["cont_name"].value;

    if (party_name == "") {
    alert("Name must be filled");
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































