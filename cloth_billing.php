
<?php
include("header.php");

?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>PURCHASE BILLING</h2>
                           </div>
                        </div>
                     </div>
					 
			
					 
					 
					 
					 
					 
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>PURCHASE DETAILS</h2>
                                 </div>
								
                                   
								 <div style="text-align:right;">
								  
								<a href="pages?page=$2y$10$sF73HhxpaU4348XxJeBTce7qthFHmz2yF70i.oNFRWGHVRPhX.f9y&active=3"> <button class="btn cur-p btn-info"><i class="fa fa-plus"></i> Add Bill</button></a>
								 </div>
                              </div>
				
                              <div class="full price_table padding_infor_info">
							  
									
                                 <div class="row">
								 	
                                    <div class="col-lg-12">
								
							
							
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
											 
											 	 <!-- PAGINATION CODE -->
				<?php $limit = 6;
			
				if(isset($_GET['pagination'])){
					$pagination =$_GET['pagination'];
				}else{
					$pagination =1;
				}
				
				$offset = ($pagination - 1) * $limit;  ?>
				
			<!-- PAGINATION CODE -->
			
											 					 <?php 
					$total=0;
                    $billing_fetch =$DBcon->query("SELECT * FROM tbl_cloth_billing WHERE status='0'  ORDER BY bi_id DESC");
                    while($row=$billing_fetch->fetch_array()){
							$total_amount= $row['total_amount'];
							$paid_amount= $row['paid_amount'];
							
							$remaining_amount = $total_amount - $paid_amount;
							$total =  $total + $remaining_amount;
                        ?>	
							
						 
						 
					<?PHP } ?>
					
					<tr>
                                                    <th>PAYBLE AMOUNT</th>
													<th style="color:#a2f7a2"><b><?php echo $total ?> <i class="fa fa-rupee"></i></b></th>
					</tr>
						
                                                <tr>
                                                    <th>SR.NO</th>
													<th>DATE</th>
													<th>BILLING NO</th>
													<th>TOTAL AMOUNT</th>
													<th>PAID AMOUNT</th>
													<th>REMAINING AMOUNT</th>
													<th>STATUS</th>
													<th>ACTION</th>
												</tr>
                                             </thead>
                                             <tbody>
                                          
											 <?php 
					$count=1;
                    $billing_fetch =$DBcon->query("SELECT * FROM tbl_cloth_billing ORDER BY bi_id DESC LIMIT {$offset}, {$limit} ");
                    while($row=$billing_fetch->fetch_array()){
							$total_amount= $row['total_amount'];
							$paid_amount= $row['paid_amount'];
							
							$remaining_amount = $total_amount - $paid_amount;
                        ?>
                            <tr>
                                <td><?php echo $row['bi_id']; ?></td>
								<td><?php echo getCustomDate($row['date']); ?></td>
                                <td><?php echo $row['bill_no']; ?></td>
								<td><?php echo $row['total_amount']; ?> <i class="fa fa-rupee"></i></td>
								<td><?php echo $row['paid_amount']; ?> <i class="fa fa-rupee"></i></td>
								<td><?php echo $remaining_amount ?> <i class="fa fa-rupee"></i></td>
								<td>
									<?php 
										if($row['status']==0){
												?>	
												<b><span style="color:red">Unpaid</span></b>
												<?php 
										}elseif($row['status']==1){
											?>	
												<b><span style="color:green">Paid</span></b>
											<?php 
										}else{
											
										}	
									?>
								
								</td>
                                <td><a href="pages?page=$2y$10$YZDBhwRWH/FD2CZikNdBc.qvhouhpMalgoA23CIRWm4wmQ4sPkU0e&active=3&id=<?php echo $row['bi_id']; ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a></td>
                            </tr>
                        <?php
                        $count++; 
                    }

                ?>
                                         
                                         
                                            
                                             </tbody>
                                          </table>
                                       </div>
									   <Br>
									   <!-- PAGINATION CODE -->
								 <?php 	
										  $link = 2;
										  $pagination_query =$DBcon->query("SELECT * FROM tbl_cloth_billing ");
										  $total_record = $pagination_query->num_rows;
										  
										  
										  
										  if($total_record>0){
												
												$total_pages = ceil($total_record / $limit);
												
										// condition for if any changes happens in url
										  if($pagination > $total_pages ){
											  
											  redirect('pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&pagination=1');
											  
										  }else{
											  
											  
												
												$start = (($pagination - $link) > 0) ? $pagination - $link : 1;
												$end = (($pagination + $link ) < $total_pages ) ? $pagination + $link : $total_pages;
												
												?><ul class="pagination">
												<?php 
												if($pagination > 1){?>
													<li><a href="pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&pagination=<?php echo ($pagination - 1); ?>&active=3"><< Prev </a></li>
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
															<li> <a class="<?php echo $active ?>" href="pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&pagination=<?php echo $i ?>&active=3"><?php echo $i ?></a></li>
													<?php	
												}
												?>
												
												<?php if($total_pages > $pagination){
													?><li><a href="pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&pagination=<?php echo ($pagination + 1); ?>&active=3">Next >></a></li></ul><?php 
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



























