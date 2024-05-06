<?php
include("header.php");

if (isset($_POST['save_data'])) {
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
            redirect('pages?page=$2y$10$d1KyFcby1JukAZongyzfN.Jx1mLS9HaXo7RscRY8f7cXirUQqX8fO&active=9');
        } else {
            echo '<script>alert("Something Error")</script>';
            redirect('pages?page=$2y$10$d1KyFcby1JukAZongyzfN.Jx1mLS9HaXo7RscRY8f7cXirUQqX8fO&active=9'
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
                              <h2>PARTIES</h2>
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add<small>( parties )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
  <form action="" method="POST" name="add_party" onsubmit="return validateForm()">
  <div class="row">
      <div class="col-25">
        <label for="fname">Party Type</label>
      </div>
      <div class="col-75">
  
        <select name="party_type" tabindex="1" id="party_type">	
			<option value="">Select Type</option>
			<option value="1">Purchase</option>
			<option value="2">Selling</option>
		</select>
		
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Party Name</label>
      </div>
      <div class="col-75">
  
        <input type="text" value=""  tabindex="2" id="party_name" name="party_name" placeholder="Party Name">  
		
      </div>
    </div>
	
	 <div class="row">
      <div class="col-25">
        <label for="fname">Mobile Number</label>
      </div>
      <div class="col-75">
  
        <input type="text" value="" tabindex="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="10" maxlength="10" id="mobile_number" name="mobile_number" placeholder="Mobile Number">  
		
      </div>
    </div> 
	<div class="row">
      <div class="col-25">
        <label for="fname">Address</label>
      </div>
      <div class="col-75">
  
        <textarea rows="3" type="text" tabindex="4" value=""  name="address" id="address" placeholder="Address"></textarea>  
		
      </div>
    </div>
	 <div class="row">
      <div class="col-25">
        <label for="fname">Party State</label>
      </div>
      <div class="col-75">
  
        <input type="text" value=""  name="state" tabindex="5" id="state" placeholder="State Name">  
		
      </div>
    </div>
	 <div class="row">
      <div class="col-25">
        <label for="fname">GST Number</label>
      </div>
      <div class="col-75">
	
        <input type="text" value="" name="gst_no" tabindex="6" id="gst_no" placeholder="GST Nubmer">  
		
      </div>
    </div>
	
   
  
    <div class="row">
      <button type="submit" class="btn cur-p btn-success" tabindex="7" name="save_data">Save</button> 
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
                                
		<!-- search -->						 							
   

      <div class="col-25">
  
        <input type="text" value=""  id="search_id" name="value" placeholder="Search by Party Name">  
		
      </div>
  
                                    
		
                                
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects" >
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th>SR.NO</th>
													<th>PARTIES NAME</th>
													<th>MOBILE NO</th>
													<th>ADDRESS</th>
													<th>GST NO</th>
													<th>PARTY TYPE</th>
													<th>ACTION</th>

                                                </tr>
                                             </thead>
                                             <tbody id="parties_list">
                                          
												<?php
        $count = 1;
        $party_fetch_query = $DBcon->query(
            "SELECT * FROM tbl_parties WHERE flag='0'"
        );
        $count_fetch = $party_fetch_query->num_rows;
        if ($count_fetch > 0) {
            while ($row = $party_fetch_query->fetch_array()) { ?>
                    <tr>    
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['party_name']; ?></td>
						<td><?php echo $row['mobile_number']; ?></td>
						<td><?php echo $row['party_address']; ?></td>
						<td><?php echo $row['gst_no']; ?></td>
						<td><?php  
						
						if($row['party_type']==1){
							echo "Puchase";
						}elseif($row['party_type']==2){
							echo "Selling";
							}; ?></td>
                        

						<td>
						<a href="pages?page=$2y$10$WuOrlQTb08lUYPJss0NByu1ej4j1PISxav4yrdw7q6pFWr7JNNUEe&id=<?php echo $row['p_id']; ?>&active=9"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a>

								
                        </td>

							
                    </tr>
                <?php $count++;}
        } else {
             ?>
                 <tr>    
                        <td>No data Found   </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
                    </tr>
            <?php
        }
        ?>  
                                         
                                         
                                            
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
	  <script src="js/jquery.js"></script>
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
<script>
		$(document).ready(function(){
			$("#search_id").on('keyup', function(){
				var value= $(this).val();
				
				//alert(value);
				
				$.ajax({
					url:"parties_fetch.php",
					type: "POST",
					data: 'value=' + value,
					beforeSend:function(){
					$("#parties_list").html("<span>Working....</span>");
					},
					success:function(data){
						$("#parties_list").html(data);
						
					}
					
				});
				
				
			});
		});
</script>

      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
   </body>
</html>































