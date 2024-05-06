<?php
include("header.php");

if (isset($_POST['save_data'])) {
    $item_name = $_POST['item_name'];

    if ($item_name !== '') {
        $item_query = $DBcon->query(
            "INSERT INTO tbl_items(item_name,flag)VALUES('$item_name', '0')"
        );

        if ($item_query == true) {
            echo '<script>alert("Data Inserted")</script>';
            redirect('pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10');
        } else {
            echo '<script>alert("Something Error")</script>';
            redirect(
                'pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10'
            );
        }
    } else {
        echo '<script>alert("All fields must be filled")</script>';
    }
} 

    if(isset($_POST['delete_item'])){


        $id=$_POST['it_id'];

        if($id!==''){


            $item_delete=$DBcon->query("UPDATE tbl_items SET flag='1' WHERE it_id='$id' ");

            if ($item_delete == true) {
                echo '<script>alert("Data Deleted")</script>';
                redirect('pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10');
            } else {
                echo '<script>alert("Something Error")</script>';
                redirect(
                    'pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10'
                );
            }

        }else{
            echo '<script>alert("Something Error")</script>';
            echo 'pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10';
        }
       

    }


?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>ITEMS</h2>
                           </div>
                        </div>
                     </div>
					 
					 
					    <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add<small>( items )</small></h2>
                                 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="login-form">
											<div class="container">
  <form action="" method="POST" name="add_item" onsubmit="return validateForm()">
    <div class="row">
      <div class="col-25">
        <label for="fname">Item Name</label>
      </div>
      <div class="col-75">
  
        <input type="text" value=""  id="item_name" name="item_name" placeholder="Item Name">  
		
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
                                    <h2>Items DETAILS</h2>
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
													<th>ITEMS NAME</th>
													<th>ACTION</th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                          
												<?php
        $count = 1;
        $cont_fetch_query = $DBcon->query(
            "SELECT * FROM tbl_items WHERE flag='0'"
        );
        $count_fetch = $cont_fetch_query->num_rows;
        if ($count_fetch > 0) {
            while ($row = $cont_fetch_query->fetch_array()) { ?>
                    <tr>    
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['item_name']; ?></td>
                        <td>
						<form action="" method="POST" > 
										<input type="hidden" value="<?php echo $row['it_id']; ?>" name="it_id">
										<button name="delete_item" class="btn cur-p btn-danger" onclick="return confirmation()" ><i class="fa fa-trash"></i> Delete</button>
						</form> 
						</td>

						<td>
						<a href="pages?page=$2y$10$fRNa98iKchVZAroH62XUyO.HEFuV4Ui9.CYVRK/HsJOT8j8PSKe0a&active=10&id=<?php echo $row['it_id']; ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a>

								
                        </td>
						<td></td>
						<td></td>
						<td></td>
							
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
	document.querySelector("#item_name").focus();
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































