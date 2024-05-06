
<?php
include("header.php");

?>




 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Invoice</h2>
                           </div>
                        </div>
                     </div>

                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>INVOICE DETAILS</h2>
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
													<th>INVOICE NO</th>
													<th>DATE</th>
													<th>PARTY NAME</th>
													<th>TOTAL AMOUNT</th>
													<th>PAID AMOUNT</th>
													<th>PENDING AMOUNT</th>
													<th>STATUS</th>
													<th>ACTION</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                          
											 <?php 
				// <!-- PAGINATION CODE -->
				$limit = 10;
			
				if(isset($_GET['pagination'])){
					$pagination =$_GET['pagination'];
				}else{
					$pagination =1;
				}
				
				$offset = ($pagination - 1) * $limit; 
				
				// <!-- PAGINATION CODE -->
                $count=1;
				
                    $order_fetch =$DBcon->query("SELECT * FROM tbl_invoice ORDER BY invoice_id DESC LIMIT {$offset}, {$limit} ");
                    while($row=$order_fetch->fetch_array()){
                        $party_id = $row['party_id'];
						$invoice_num = $row['invoice_num'];
						$location= $row['location'];
						$transportation_cost=$row['transportation_cost'];	
						$invoice_id = $row['invoice_id'];
                        ?>
                            <tr>
                                <td><?php echo $count ?></td>
								<td><b>#invoice-<?php echo $row['invoice_num']; ?></b></td>
								<td><?php echo getCustomDate($row['date']); ?></td>
								<td> <?php 
                                    $party_id_qry =$DBcon->query("SELECT * FROM tbl_parties WHERE p_id='$party_id'");
                                    $party_id_fetch = $party_id_qry->fetch_array();         
                                    
                                    echo $party_id_fetch['party_name'];
                                ?></td>
								
								<td>
										<?php 
													$total_amount=0;
													$invoice_data_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE invoice_num='$invoice_num'");
													while($invoice_data=$invoice_data_query->fetch_array()){
														$quantity=$invoice_data['quanity']; 
														$rate =$invoice_data['rate'];
														$amount =$quantity * $rate;
														$total_amount = $total_amount + $amount;
																											
													} 
													$cgst= ($total_amount * (2.5/100));
													$sgst= ($total_amount * (2.5/100));
													$total_gst_amount = $cgst + $sgst;
													if($location==2){
													$igst= ($total_amount * (5/100));
													}
													
													if($location==2){
													$grand_total = ($total_amount + $total_gst_amount + $transportation_cost + $igst);
													}else{
													$grand_total = ($total_amount + $total_gst_amount + $transportation_cost);
													}
													?><b><?php echo $grand_total; ?> <i class="fa fa-rupee"></i></b>
								</td>
								
								<td  style="color:#"><b>
									<?php
												$paid_total = 0;
												$paid_amount_query=$DBcon->query("SELECT * FROM tbl_payment WHERE invoice_num='$invoice_num'");
												while($paid_fetch=$paid_amount_query->fetch_array()){
													$amount1 = $paid_fetch['amount'];
													$paid_total = $paid_total + $amount1;
												}
												
												echo $paid_total; ?> <i class="fa fa-rupee"></i><?php
												
												
												if($grand_total==$paid_total){
													
													$sql=$DBcon->query("UPDATE tbl_invoice SET payment_status='1' WHERE payment_status='0' && invoice_id='$invoice_id'");
												}
									?></b>
								</td>
								
								<td style="color:red"><b><?php echo ($grand_total - $paid_total)?> <i class="fa fa-rupee"></i></b></td>
                                <td>
									<?php if($row['payment_status']==0){
										echo "Unpaid";
									}else{
										echo "Paid";
									}
									?>
								</td>
								<td>
								<a href="pages?page=$2y$10$N1ZfH332n14t9I3IeHjZ.OdOWOra2E4l7XYJbj8zKLtJG8HMsrfMG&id=<?php echo $row['invoice_num']; ?>" target="_blank"><button  class="btn cur-p btn-warning">View</button></a>
								<a href="pages?page=$2y$10$lNaTr.hicgV1ld8o/dYLqOhTNgPvJrnjAljhbglOvrpuAqD0sUBc2&active=6&id=<?php echo $row['invoice_num']; ?>"><button  class="btn cur-p btn-info"><i class="fa fa-plus"></i> Add Payment</button></a></td>
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
										  $pagination_query =$DBcon->query("SELECT * FROM tbl_invoice ");
										  $total_record = $pagination_query->num_rows;
										  
										  if($total_record>0){
												
												$total_pages = ceil($total_record / $limit);
												
												$start = (($pagination - $link) > 0) ? $pagination - $link : 1;
												$end = (($pagination + $link ) < $total_pages ) ? $pagination + $link : $total_pages;
												
												?><ul class="pagination">
												<?php 
												if($pagination > 1){?>
													<li><a href="pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=<?php echo ($pagination - 1); ?>&active=6"><< Prev </a></li>
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
															<li> <a class="<?php echo $active ?>" href="pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=<?php echo $i ?>&active=6"><?php echo $i ?></a></li>
													<?php	
												}
												?>
												
												<?php if($total_pages > $pagination){
													?><li><a href="pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=<?php echo ($pagination + 1); ?>&active=6">Next >></a></li></ul><?php 
												}?>
												
												 
										<?php 
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



























