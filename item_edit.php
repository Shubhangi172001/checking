<?php 
include("header.php");
$get_id=$_GET['id'];

if($_GET['id']!==''){


if ( !preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
		
		
    if(isset($_POST['save_data'])){

        $item_name= $_POST['item_name'];
    
        if($item_name!==''){
            $item_query=$DBcon->query("UPDATE tbl_items SET item_name='$item_name' WHERE it_id='$get_id'");
    
                if($item_query==true){
                    echo '<script>alert("Data Updated")</script>';
                    redirect('pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10');
                }else{
                    echo '<script>alert("Something Error")</script>';
                    redirect('pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10');
                }
        }else{
            echo '<script>alert("All fields must be filled")</script>';
			redirect('pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10');
        }
        
    }
    
    
    
    ?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                             <a href="pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Edit<small>( item )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
												 <form action="" method="POST" name="add_item" onsubmit="return validateForm()">
												   
												<?php 
												 $item_fetch_query= $DBcon->query("SELECT * FROM tbl_items WHERE it_id='$get_id'");
												 while($row=$item_fetch_query->fetch_array()){   

														?>
													<div class="row">
													  <div class="col-25">
														<label for="fname">Item Name</label>
													  </div>
													  <div class="col-75">
												   
														<input type="text" value="<?php echo $row['item_name']; ?>" onkeydown="return /[a-zA-Z]/i.test(event.key)" name="item_name" placeholder="Item Name">  
														
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
 
  let item_name = document.forms["add_item"]["item_name"].value;

    if (item_name == "") {
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






























