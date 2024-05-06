<?php include("header.php");  ?>

			<div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
					 <?php 
					 
					 $item_fetch_query=$DBcon->query("SELECT * FROM tbl_items WHERE  flag='0' ");
					 while($row=$item_fetch_query->fetch_array()){
						 $item_id=$row['it_id'];
					 ?>
                        <div class="col-md-6 col-lg-3">
                          <a href="pages?page=$2y$10$txOK5TIXbexPG63vRbAq5e7DoxlcPB38gdd/oxBO8HydYrOUdRrbu&&active=4&item=<?php echo $item_id ?>"> <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <img style="width:70px;" src="images/logo/storage1.png"></img>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
									
									
										<?php 
										$total_stock=0;
										$stock_avilable_query=$DBcon->query("SELECT * FROM tbl_req WHERE item_id='$item_id'");
										while($stock_get=$stock_avilable_query->fetch_array()){
											$stock_qty=$stock_get['stock'];
											$total_stock=$total_stock + $stock_qty;
										}
										
										echo $total_stock;
										?>
									
									
									</p>
                                    <p class="head_couter"><b><?php echo $row['item_name']; ?></b></p>
                                 </div>
                              </div>
                           </div>
                        </div></a>
                     <?php } ?>
                 
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
      <!-- custom js -->
      <script src="js/chart_custom_style1.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>