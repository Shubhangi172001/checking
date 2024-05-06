
<?php
include("header.php");


if ( (! preg_match('/^-?\d+$/', $_GET['pagination']))  ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
		


?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>ORDERS</h2>
                           </div>
                        </div>
                     </div>
					 
			
					 
					 
					 
					 
					 
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>ORDER DETAILS</h2>
                                 </div>
								
                                    
								 <div style="text-align:right;">
										   <a href="pages?page=$2y$10$6Z7Rb272pEJPCnSJ3o/TVu6rsmIY3d1OPu0AF7b66C/l2RJOZwK2a&active=5"> <button class="btn cur-p btn-info"><i class="fa fa-plus"></i> Add Order</button></a>
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
													<th>ORDER NO</th>
													<th>DATE</th>
													<th>PARTY NAME</th>
													<th>TOTAL QUANTITY</th>
													<th>STATUS</th>
													<th>ACTION</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                          
											 <?php 
			// <!-- PAGINATION CODE -->
				$limit = 6;
			
				if(isset($_GET['pagination'])){
					$pagination =$_GET['pagination'];
				}else{
					$pagination =1;
				}
				
				$offset = ($pagination - 1) * $limit; 
				
			// <!-- PAGINATION CODE -->
			
			
                $count=1;
				
                    $order_fetch =$DBcon->query("SELECT * FROM tbl_customer_order ORDER BY cu_or_id DESC LIMIT {$offset}, {$limit} ");
                    while($row=$order_fetch->fetch_array()){
                        $party_id= $row['party_id'];
					
						$or_id=$row['cu_or_id'];
						
						
                        ?>
                            <tr>
                                <td><?php echo $row['cu_or_id']; ?></td>
								<td><b>order-<?php echo $row['cu_or_id']; ?></b></td>
								
								<td><?php echo $row['date']; ?></td>
                                <td><?php 
                                    $party_id_qry =$DBcon->query("SELECT * FROM tbl_parties WHERE p_id='$party_id'");
                                    $party_id_fetch = $party_id_qry->fetch_array();         
                                    
                                    echo $party_id_fetch['party_name'];
                                ?></td>
								
                                <td> 	<?php
											$qty_total=0;
											$return_qty_total=0;
											$check_total_query=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$or_id'");
											$check_count=$check_total_query->num_rows;
											while($check_fetch=$check_total_query->fetch_array()){
												$qun=$check_fetch['qty'];
												$stock = $check_fetch['stock'];
												
												$return_qty_total=$return_qty_total + $stock;
												$qty_total=$qty_total+ $qun;
												
											}
											echo $qty_total;
											
											
											
								?></td>
								<td>
						
								
								
								<?php if($row['status']==0){
									?><span style="color:red">Not done</span><?php
								}else{
									?><span style="color:green">Done</span><?php
								}?></td>
                                
                                <td>
								
								<a href="pages?page=$2y$10$P7dFQfh8YmZuPBxJQTfDn.AKeJPWo2q93UeylAKVicpt92MdjW40C&active=5&id=<?php echo $row['cu_or_id']; ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
								<a href="pages?page=$2y$10$ukvgrAyPOtMrS7DyeAsHkOMV.PyWVEsc/psglbi2p7QUHQ2L74/gO&active=5&id=<?php echo $row['cu_or_id']; ?>"><button  class="btn cur-p btn-info"><i class="fa fa-plus"></i> Add Req</button></a>
								
								</td>
                            </tr>
                        <?php
                        $count++; 
                    }

                ?>
                                         
                                         
                                            
                                             </tbody>
                                          </table>
										  
										 
                                       </div>
									   <br>
							<!-- PAGINATION CODE -->
								 <?php 	
										  $link = 2;
										  $pagination_query =$DBcon->query("SELECT * FROM tbl_customer_order WHERE flag='0' ");
										  $total_record = $pagination_query->num_rows;
										  
										  
										  
										  if($total_record>0){
												
												$total_pages = ceil($total_record / $limit);
												
										// condition for if any changes happens in url
										  if($pagination > $total_pages ){
											  
											  redirect('pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1');
											  
										  }else{
											  
											  
												
												$start = (($pagination - $link) > 0) ? $pagination - $link : 1;
												$end = (($pagination + $link ) < $total_pages ) ? $pagination + $link : $total_pages;
												
												?><ul class="pagination">
												<?php 
												if($pagination > 1){?>
													<li><a href="pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=<?php echo ($pagination - 1); ?>&active=5"><< Prev </a></li>
												<?php }
												?>
													
												<?php		
												for($i=$start; $i <= $end ; $i++){
													
													if($i == $pagination){
														$active = "active";
													}else{
														$active = "";
													}
													?>
															<li> <a class="<?php echo $active ?>" href="pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=<?php echo $i ?>&active=5"><?php echo $i ?></a></li>
													<?php	
												}
												?>
												
												<?php if($total_pages > $pagination){
													?><li><a href="pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=<?php echo ($pagination + 1); ?>&active=5">Next >></a></li></ul><?php 
												}?>
												
												 
										<?php 
											}
										  }
										  
										  ?>
								 <!-- PAGINATION CODE -->
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
	
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
   </body>
</html>
	<?php } ?>


























