<?php include("header.php"); 
$get_id=$_GET['par'];

if($_GET['par']!==''){
if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
	
	$grand_remaining_total=0;
	$order_fetch1 =$DBcon->query("SELECT * FROM tbl_invoice WHERE party_id='$get_id'");
    while($row1=$order_fetch1->fetch_array()){
                        $party_id1= $row1['party_id'];
						$invoice_num1 = $row1['invoice_num'];
						$location1= $row1['location'];
						$transportation_cost1=$row1['transportation_cost'];	
						$invoice_id1 = $row1['invoice_id'];
						
						$total_amount1=0;
													$invoice_data_query1=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE invoice_num='$invoice_num1'");
													while($invoice_data1=$invoice_data_query1->fetch_array()){
														$quantity1=$invoice_data1['quanity']; 
														$rate1 =$invoice_data1['rate'];
														$amount1 =$quantity1 * $rate1;
														$total_amount1 = $total_amount1 + $amount1;
																											
													} 
													$cgst1= ($total_amount1 * (2.5/100));
													$sgst1= ($total_amount1 * (2.5/100));
													$total_gst_amount1 = $cgst1 + $sgst1;
													if($location1==2){
													$igst1= ($total_amount1 * (5/100));
													}
													
													if($location1==2){
													$grand_total1 = ($total_amount1 + $total_gst_amount1 + $transportation_cost1 + $igst1);
													}else{
													$grand_total1 = ($total_amount1 + $total_gst_amount1 + $transportation_cost1);
													}
													
													$paid_total1 = 0;
													$paid_amount_query1=$DBcon->query("SELECT * FROM tbl_payment WHERE invoice_num='$invoice_num1'");
													while($paid_fetch1=$paid_amount_query1->fetch_array()){
														$amount2 = $paid_fetch1['amount'];
														$paid_total1 = $paid_total1 + $amount2;
													}
										
												$remaining_total=($grand_total1 - $paid_total1);
												
												$grand_remaining_total=$grand_remaining_total+$remaining_total;
                    }

 ?>


<!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <br>
				<a href="pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				<br>
				<!-- row -->
                     <div class="row">
                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>OUSTANDING DETAILS</h2>
                                 </div>
                              </div>
                              <div class="full inbox_inner_section">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full padding_infor_info">
                                          <div class="mail-box">
                                        
                                                 
                                                   <table class="table table-striped projects">
												   	<thead class="thead-dark">
															<tr>
																
																<th>PENDING AMOUNT</th>
																<th style="color:#ff5a5a"><b><?php echo $grand_remaining_total ?> <i class="fa fa-rupee"></i></b></th>
															</tr>
														</thead>
														<thead class="thead-dark">
															<tr>
																<th>SR.NO</th>
																<th>INVOICE NO</th>
																<th>DATE</th>
																<th>AMOUNT</th>
																<th>PAID AMOUNT</th>
																<th>PENDING AMOUNT</th>
																<th></th>
															
															</tr>
															</thead>
															
														
                                                      <tbody>
													  <?php 
					 $count=1;
                    $order_fetch =$DBcon->query("SELECT * FROM tbl_invoice WHERE party_id='$get_id'");
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
													?><b><?php echo round($grand_total,2); ?> <i class="fa fa-rupee"></i></b>
								</td>
								
								<td  style="color:green"><b>
									<?php
												$paid_total = 0;
												$paid_amount_query=$DBcon->query("SELECT * FROM tbl_payment WHERE invoice_num='$invoice_num'");
												while($paid_fetch=$paid_amount_query->fetch_array()){
													$amount1 = $paid_fetch['amount'];
													$paid_total = $paid_total + $amount1;
												}
												
												echo $paid_total; ?> <i class="fa fa-rupee"></i><?php
									?></b>
								</td>
								<td style="color:red"><b><?php echo ($grand_total - $paid_total)?> <i class="fa fa-rupee"></i></b></td>
                                <td>
								<a href="pages?page=$2y$10$N1ZfH332n14t9I3IeHjZ.OdOWOra2E4l7XYJbj8zKLtJG8HMsrfMG&id=<?php echo $row['invoice_num']; ?>&active=1" target="_blank"><button  class="btn cur-p btn-warning">View</button></a>
								<a href="pages?page=$2y$10$lNaTr.hicgV1ld8o/dYLqOhTNgPvJrnjAljhbglOvrpuAqD0sUBc2&id=<?php echo $row['invoice_num']; ?>&active=1"><button  class="btn cur-p btn-info"><i class="fa fa-plus"></i> Add Payment</button></a></td>
                            </tr>
							
                        <?php
                        $count++; 
                    }

                ?>
                                                      </tbody>
                                                   </table>
                                                </div>
                                             </aside>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                     </div>
                  </div>
                 
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
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
