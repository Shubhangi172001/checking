
<?php
include("header.php");
$get_id=$_GET['item'];

if($_GET['item']!==''){
if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO');
	}else{
?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                             <a href="pages?page=$2y$10$yFnQXsubBX5uTtpJeoHf.O.JqE8/da7u39G.GdE74Ynhnsq0u333C&active=4"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                        </div>
						</div>
						</div>
					
                     <!-- row -->
					
                     <div class="row column1x">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
								STOCK DETAILS
                              </div>
							  
				
                              <div class="full price_table padding_infor_info">
							  
                                  <div class="row">
                                    <div class="col-lg-12">
									
									
                                       <div class="table-responsive-sm">
									   
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                    <th>SR.NO</th>
													<th>ORDER NO</th>
													<th>ITEM NAME & DESCRIPTION</th>
													
													<th>STOCK QUANTITY</th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
                                                </tr>
                                             </thead>
                                             <tbody id="table">
												<?php 
												$count=1;
												$query=$DBcon->query("SELECT * FROM tbl_req WHERE item_id='$get_id' && (stock>0)");
												while($row=$query->fetch_array()){
													
													$cu_or_id=$row['or_id'];
													
													$order_query=$DBcon->query("SELECT * FROM tbl_customer_order WHERE cu_or_id='$cu_or_id'");
													$order_fetch=$order_query->fetch_array();
													$party_id=$order_fetch['party_id']; 
													
												?>
												<tr>
													<td><?php echo $count ?></td>
													<td>order-<?php echo $row['or_id']; ?></td>
													<td><?php 
														$item_fetch1=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$get_id'");
																while($row3=$item_fetch1->fetch_array()){
																	?>
																 <?php echo $row3['item_name']; ?>
																	<?php 
																}
															?>(<?php echo $row['description']; ?>)</td>
													
													<td style="color:red"><?php echo $row['stock']; ?></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php } ?>
                                             </tbody>
                                          </table>
										  
										 
                                       </div>
									   <br>
				
						
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
		$(document).ready(function(){
			$("#search_id").on('keyup', function(){
				var value= $(this).val();
				
				//alert(value);
				
				$.ajax({
					url:"contractor_fetch.php",
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





<?php 
	}
}else{
         redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO');
}   
?>





















