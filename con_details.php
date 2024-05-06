<?php include("header.php"); 
$get_id=$_GET['con'];

if($_GET['con']!==''){
if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO');
	}else{
		
		
	$get_details_contractor=$DBcon->query("SELECT * FROM tbl_contractors WHERE cn_id='$get_id'");
	$fetch_details=$get_details_contractor->fetch_array();
	$con_name=$fetch_details['cn_name'];
	
	$grand_total_remaining1=0;											  
	  $order_details_query1=$DBcon->query("SELECT * FROM tbl_order WHERE con_id='$get_id' && status='1'");
	  $record1=$order_details_query1->num_rows;
	  
	  while($row1=$order_details_query1->fetch_array()){
														  $item_id1=$row1['item_id'];
														  $return_qty1=$row1['return_qty'];
														  $rate1=$row1['rate'];
														  $total_amount1=$return_qty1 * $rate1;
														  $cu_or_id1=$row1['cu_or_id']; 
														  $or_id1=$row1['or_id']; 
  
														  $paid_total1=0;
															$payment_fetch_query2 = $DBcon->query("SELECT * FROM tbl_con_payment WHERE cu_or_id='$cu_or_id1' && item_id='$item_id1'");
															 while ($row2 = $payment_fetch_query2->fetch_array()) { 
																$amount1=$row2['amount'];
																$paid_total1 =$paid_total1 + $amount1;
															 }
															 
															 $remaining_amount1 = ($total_amount1 - $paid_total1);
															 
															 $grand_total_remaining1 = $grand_total_remaining1 + $remaining_amount1;
															 
													}
?>

<!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     
				<!-- row --><br>
				<a href="pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				<br>
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
																<th style="color:#ff5a5a"><b><?php echo $grand_total_remaining1; ?> <i class="fa fa-rupee"></i></b></th>
															</tr>
														</thead>
														<thead class="thead-dark">
															<tr>
																<th>SR.NO</th>
																<th>ORDER NO</th>
																<th>ITEM</th>
																<th>TOTAL AMOUNT</th>
																<th>PAID AMOUNT</th>
																<th>PENDING AMOUNT</th>
																<th></th>
															</tr>
														</thead>
                                                      <tbody>
													  
													  <?php 
													  $grand_total_remaining=0;
													  $count=1;
													  	  $order_details_query=$DBcon->query("SELECT * FROM tbl_order WHERE con_id='$get_id' && status='1'");
														  $record=$order_details_query->num_rows;
													  if($record > 0){
													  while($row=$order_details_query->fetch_array()){
														  $item_id=$row['item_id'];
														  $return_qty=$row['return_qty'];
														  $rate=$row['rate'];
														  $total_amount=$return_qty * $rate;
														  $cu_or_id=$row['cu_or_id'];
														  $or_id=$row['or_id']; 
  
														  $paid_total=0;
															$payment_fetch_query1 = $DBcon->query("SELECT * FROM tbl_con_payment WHERE cu_or_id='$cu_or_id' && item_id='$item_id'");
															 while ($row1 = $payment_fetch_query1->fetch_array()) { 
																$amount=$row1['amount'];
																$paid_total =$paid_total + $amount;
															 }
													
															 $remaining_amount = ($total_amount - $paid_total);
															 
															 $grand_total_remaining = $grand_total_remaining + $remaining_amount;
														?>
                                                         <tr class="unread">
																<td><?php echo $count ?></td>
																<td>order-<?php echo $row['cu_or_id']; ?></td>
																<td>
																	<?php 
																		$item_fetch_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
																		$item_fetch=$item_fetch_query->fetch_array();
																		echo $item_fetch['item_name'];
																	?> 
																</td>
																<td><?php echo $total_amount ?> <i class="fa fa-rupee"></i></td>
																<td style="color:green"><?php echo $paid_total ?> <i class="fa fa-rupee"></i></td>
																<td style="color:red"><?php echo $remaining_amount ?> <i class="fa fa-rupee"></i></td>
																<td><a href="pages?page=$2y$10$ds29/QVp/K2JY6EPv1BdJ.GUdGMlHFJdb/0IHLUQTaNO4b2bwfSvy&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $row['cu_or_id'];  ?>&item=<?php echo $item_id ?>&active=1"><button  class="btn cur-p btn-info"><i class="fa fa-plus"></i> Payment</button></a></td>
																
														 </tr>
													<?php 
													$count++;
													  }
													  ?>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td><b>GRAND TOTAL</b></td>
																<td style="color:red"><b><?php echo $grand_total_remaining; ?> <i class="fa fa-rupee"></i></b></td>
																<td></td>
															</tr>
													<?php 		
													  
														
													  }else{
													?>
														<tr class="unread">
																<td>No data Found</td>
                                                         </tr>
													<?php } ?>
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
         redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO');
}   
?>
