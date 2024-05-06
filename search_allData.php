<?php 
include("config.php");
include("function.php");
if($_POST['search']==1){
			if($_POST['persons'] == ""){
				
				
						$str .= "<option value=''>Select Person type </option>";
						$str .= "<option value='1'>Purchase</option>";
						$str .= "<option value='2'>Selling </option>";
						$str .= "<option value='3'>Contractor </option>";
																						

			}elseif($_POST['persons']== "persons"){
				
					$persons=$_POST['person_type']; 
					
					if($persons==1){
						
						$sql =$DBcon->query("SELECT * FROM tbl_parties WHERE party_type='1'");
						$str .="<option value=''>Select Person</option>";
						while($row=$sql->fetch_array()){
							
							$str .="<option value='{$row['p_id']}'>{$row['party_name']}</option>";
						}
					}elseif($persons==2){
						
						$sql =$DBcon->query("SELECT * FROM tbl_parties WHERE party_type='2'");
							$str .="<option value=''>Select Person</option>";
						while($row=$sql->fetch_array()){
							
							$str .="<option value='{$row['p_id']}'>{$row['party_name']}</option>";
						}
					}elseif($persons==3){
						
						$sql =$DBcon->query("SELECT * FROM tbl_contractors ");
							$str .="<option value=''>Select Person</option>";
						while($row=$sql->fetch_array()){
							
							$str .="<option value='{$row['cn_id']}'>{$row['cn_name']}</option>";
						}
					}
				
			}

	echo $str;
	
}elseif($_POST['search']==2){
	
	$person_type=$_POST['person_type']; 
	$persons=$_POST['persons']; 
	$payment_status=$_POST['payment_status']; 
	
	$date1=$_POST['date1']; 
	$date2=$_POST['date2']; 
	
	if($person_type==1){
		?>
	
		<!---- Data of Purchase---------------------------------------------------------------------------------
		-------------------------------------------------------------------------------------------------------->
		
			
			<table class="table table-striped projects">
                                             <thead class="thead-dark">
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
													
													if((empty($date1)) && (empty($date2))) {
														$billing_fetch =$DBcon->query("SELECT * FROM tbl_cloth_billing WHERE party_id='$persons' && status='$payment_status' ORDER BY date ASC  ");
													
													}else{
														$billing_fetch =$DBcon->query("SELECT * FROM tbl_cloth_billing WHERE party_id='$persons' && status='$payment_status' && (date BETWEEN '$date1' AND '$date2') ORDER BY date ASC  ");
													
													}
														
													while($row=$billing_fetch->fetch_array()){
															$total_amount= $row['total_amount'];
															$paid_amount= $row['paid_amount'];
															
															$remaining_amount = $total_amount - $paid_amount;
														?>
															<tr>
																<td><?php echo $count; ?></td>
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
																<td><a href="pages?page=$2y$10$YZDBhwRWH/FD2CZikNdBc.qvhouhpMalgoA23CIRWm4wmQ4sPkU0e&active=11&id=<?php echo $row['bi_id']; ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a></td>
															</tr>
														<?php
															$count++; 
														}
													?>
                                         
                                         
                                            
                                             </tbody>
                                          </table>
			
			
		
		<!---- Data of Purchase---------------------------------------------------------------------------------
		-------------------------------------------------------------------------------------------------------->
		
	<?php }elseif($person_type==2){
		?>
	
		<!---- Data of Selling---------------------------------------------------------------------------------
		-------------------------------------------------------------------------------------------------------->
		
		
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
													<th>ACTION</th>
                                                </tr>
                                             </thead>
                                             <tbody>
											                           
											 <?php 
			
                $count=1;
					
					if((empty($date1)) && (empty($date2))) {
						$order_fetch =$DBcon->query("SELECT * FROM tbl_invoice WHERE party_id='$persons' && payment_status='$payment_status' ORDER BY date ASC ");
					
					}else{
                    $order_fetch =$DBcon->query("SELECT * FROM tbl_invoice WHERE party_id='$persons' && payment_status='$payment_status' && (date BETWEEN '$date1' AND '$date2') ORDER BY date ASC ");
					}
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
													?><b><?php echo round($grand_total,2); ?> Rs</b>
								</td>
								
								<td  style="color:#"><b>
									<?php
												$paid_total = 0;
												$paid_amount_query=$DBcon->query("SELECT * FROM tbl_payment WHERE invoice_num='$invoice_num'");
												while($paid_fetch=$paid_amount_query->fetch_array()){
													$amount1 = $paid_fetch['amount'];
													$paid_total = $paid_total + $amount1;
												}
												
												echo $paid_total; ?> Rs<?php
									?></b>
								</td>
								<td style="color:red"><b><?php echo ($grand_total - $paid_total)?> Rs</b></td>
                                <td>
								<a href="pages?page=$2y$10$N1ZfH332n14t9I3IeHjZ.OdOWOra2E4l7XYJbj8zKLtJG8HMsrfMG&id=<?php echo $row['invoice_num']; ?>" target="_blank"><button  class="btn cur-p btn-warning">View</button></a>
								<a href="pages?page=$2y$10$lNaTr.hicgV1ld8o/dYLqOhTNgPvJrnjAljhbglOvrpuAqD0sUBc2&active=11&id=<?php echo $row['invoice_num']; ?>"><button  class="btn cur-p btn-info"><i class="fa fa-plus"></i> Add Payment</button></a></td>
                            </tr>
							
                        <?php
                        $count++; 
                    }

                ?>
                                         
                                         
                                            
                                             </tbody>
                                          </table>
			
		
		<!---- Data of Selling---------------------------------------------------------------------------------
		-------------------------------------------------------------------------------------------------------->
		
	<?php }elseif($person_type==3){
		?>
	
		<!---- Data of Contractor---------------------------------------------------------------------------------
		-------------------------------------------------------------------------------------------------------->
					
					  <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                    <th>SR.NO</th>
													<th>ORDER NO</th>
													<th>ITEM</th>
													<th>CON.NAME</th>
													<th>ACTUAL QTY</th>
													<th>RETURN QTY X RATE</th>
													<th>AMOUNT</th>
													<th>PAID/UNPAID</th>
													<th>ACTION</th>
                                                </tr>
                                             </thead>
                                             <tbody id="table">
                                          
											 <?php 
									
                $count=1;
					if((empty($date1)) && (empty($date2))) {
						$order_fetch =$DBcon->query("SELECT * FROM tbl_order WHERE paid_or_unpaid='$payment_status' && con_id='$persons' ORDER BY return_date ASC ");
                    
					}else{
						$order_fetch =$DBcon->query("SELECT * FROM tbl_order WHERE paid_or_unpaid='$payment_status' && con_id='$persons' && (return_date BETWEEN '$date1' AND '$date2') ORDER BY return_date ASC");
                    
					}
                    while($row=$order_fetch->fetch_array()){
						
						$return_qty=$row['return_qty'];
						$or_id=$row['cu_or_id'];
                        $con_id = $row['con_id'];
						$item_id=$row['item_id'];
						
						
						//total amount calculation
						
						$get_req_id=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$or_id' && item_id='$item_id'");
						$get_req_id_fetch=$get_req_id->fetch_array();
						$req_id=$get_req_id_fetch['req_id'];
						
						
						
						//total amount calculation
						
                        ?>
                            <tr>
								
                                <td><?php echo $count ?></td>
								<td>order-<?php echo $row['cu_or_id']; ?></td>
								<td>
									<?php 
										$item_fetch_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
										$item_fetch=$item_fetch_query->fetch_array();
										echo $item_fetch['item_name'];
									?>
								</td>
                                <td>
									<?php 
										$con_id_qry =$DBcon->query("SELECT * FROM tbl_contractors WHERE cn_id='$con_id'");
										$con_id_fetch = $con_id_qry->fetch_array();         
										echo $con_id_fetch['cn_name'];
									?>
								</td>
								<td><?php echo $row['qty']; ?> pie</td>
								<td><?php echo $row['return_qty']; ?> pie X <?php echo $row['rate']; ?> Rs</td>	     
								<td style="color:red"> 
									<?php 
										$return_qty=$row['return_qty'];
										$rate=$row['rate']; 
										echo ($return_qty * $rate);?>.Rs<?php 
									?>
								</td>
								
				
								<td>
									<?php 
										if($row['paid_or_unpaid']==0){
												echo "Unpaid";
										}elseif($row['paid_or_unpaid']==1){
											echo "Paid";
										};
									
									?> 
								</td>
                                <td>
								<div>
								<a href="pages?page=$2y$10$RLpHDQB2GnBQculaf7WxwO3w28qjUiZPcKIkBXM6FmHX2SDN8P3PG&active=11&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $or_id ?>&item=<?php echo $row['item_id']; ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
								
								<a href="pages?page=$2y$10$D46atkBo4VYfgAbDf07G/O8k8s/zbcNnTcwKUvm6ThDZ4G22Dlfxq&active=11&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $or_id ?>&item=<?php echo $item_id ?>" target="_blank" ><button  class="btn cur-p btn-warning"><i class="fa fa-print"></i> </button></a><br><br>
								</div>
							</td>
                            </tr>
                        <?php
                        $count++; 
                    }

                ?>
                                         
                                         
                                            
                                             </tbody>
                                          </table>
										  
										 
                                       
							
		
		<!---- Data of Contractor---------------------------------------------------------------------------------
		-------------------------------------------------------------------------------------------------------->
		
	<?php }
	
	
}elseif($_POST['search']==3){
	$order_id=$_POST['order_id'];
	
	$party_give_fetch_qry=$DBcon->query("SELECT * FROM tbl_customer_order WHERE cu_or_id='$order_id'");
	$party_give_fetch=$party_give_fetch_qry->fetch_array();
	$party_id=$party_give_fetch['party_id'];
	?>
	<!---party details---->
	<table>
		<tr>
			<td>ORDER DETAILS</td>
		</tr>
	</table>
	<table class="table table-striped projects">
                                           
											 
											 <tbody>
											
												<tr>
													<th>ORDER NUMBER</th>
													<td>order-<?php echo $order_id ?></td>
													<td></td>
													<td>:</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<th>PARTY NAME</th>
													<td><?php 
														$party_id_qry =$DBcon->query("SELECT * FROM tbl_parties WHERE p_id='$party_id'");
														$party_id_fetch = $party_id_qry->fetch_array();         
														
														echo $party_id_fetch['party_name'];
													?></td>
													<td></td>
													<td>:</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<th>GIVEN DATE</th>
													<td><?php echo getCustomDate($party_give_fetch['date']); ?></td>
													<td></td>
													<td>:</td>
													<td></td>
													<td></td>
													<td></td>													
													<td></td>													
													<td></td>													
												</tr>
											
											 </tbody>
	</table>
	<!---party details---->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!------------------------------------req details---------------------------------------------------------------------------->
	<br>
									<br>
												<tr>
													<th>REQUIREMENTS</th>
												</tr>
				<?php
						$req_fetch_query=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$order_id'");
						while($req_fetch=$req_fetch_query->fetch_array()){
							$req_id=$req_fetch['req_id'];
							$item_id=$req_fetch['item_id']; 
							$item_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
							$item_fetch=$item_query->fetch_array();
								?>
									 <table class="table table-bordered"  >
										<tr>
											<th colspan="10" style="width:50%;">Item Name :<b><?php echo $item_fetch['item_name']; ?></b></th>
										</tr>
										
										<tr>
											<th>Size</th>
											<?php 
											$req_fetch_with_size_query=$DBcon->query("SELECT * FROM tbl_size_req WHERE req_id='$req_id'");
											while($req_size_fetch=$req_fetch_with_size_query->fetch_array()){
												?><td>
													<?php echo $req_size_fetch['size'];  ?>
												</td><?php 
											}
											?>
										</tr>
										<tr>
											<th>Quantity</th>
											<?php 
											$req_fetch_with_size_query1=$DBcon->query("SELECT * FROM tbl_size_req WHERE req_id='$req_id'");
											while($req_size_fetch1=$req_fetch_with_size_query1->fetch_array()){
												?><td>
													<?php echo $req_size_fetch1['qty'];  ?>
												</td><?php 
											}
											?>
										</tr>
										<br>
									</table>
   <!------------------------------------req details---------------------------------------------------------------------------->
							<?php 
						}
						?>
						
						
						
						
						
						
						
						
						
						<br><BR>
	<!------------------------------------contractor details---------------------------------------------------------------------------->
							<tr>
								CONTRACTOR DETAILS
							</tr>
							<table class="table table-striped projects">
                                             <thead class="thead-dark">
											 </thead>
											 
											 <tbody>
											 <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                    <th>SR.NO</th>
													<th>ORDER NO</th>
													<th>ITEM</th>
													<th>CON.NAME</th>
													<th>ACTUAL QTY</th>
													<th>RETURN QTY X RATE</th>
													<th>AMOUNT</th>
													<th>PAID/UNPAID</th>
													<th>ACTION</th>
                                                </tr>
                                             </thead>
                                             <tbody id="table">
                                          
											 <?php 
				
                $count=1;
				
                    $order_fetch =$DBcon->query("SELECT * FROM tbl_order WHERE cu_or_id='$order_id'");
                    while($row=$order_fetch->fetch_array()){
						
						$return_qty=$row['return_qty'];
						$or_id=$row['cu_or_id'];
                        $con_id = $row['con_id'];
						$item_id=$row['item_id'];
						
						
						//total amount calculation
						
						$get_req_id=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$or_id' && item_id='$item_id'");
						$get_req_id_fetch=$get_req_id->fetch_array();
						$req_id=$get_req_id_fetch['req_id'];
						
						
						
						//total amount calculation
						
                        ?>
                            <tr>
								
                                <td><?php echo $count ?></td>
								<td>order-<?php echo $row['cu_or_id']; ?></td>
								<td>
									<?php 
										$item_fetch_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
										$item_fetch=$item_fetch_query->fetch_array();
										echo $item_fetch['item_name'];
									?>
								</td>
                                <td>
									<?php 
										$con_id_qry =$DBcon->query("SELECT * FROM tbl_contractors WHERE cn_id='$con_id'");
										$con_id_fetch = $con_id_qry->fetch_array();         
										echo $con_id_fetch['cn_name'];
									?>
								</td>
								<td><?php echo $row['qty']; ?> pie</td>
								<td><?php echo $row['return_qty']; ?> pie X <?php echo $row['rate']; ?> <i class="fa fa-rupee"></i></td>	     
								<td style="color:red"> 
									<?php 
										$return_qty=$row['return_qty'];
										$rate=$row['rate']; 
										echo ($return_qty * $rate);?> <i class="fa fa-rupee"></i><?php 
									?>
								</td>
								
				
								<td>
									<?php 
										if($row['paid_or_unpaid']==0){
												echo "Unpaid";
										}elseif($row['paid_or_unpaid']==1){
											echo "Paid";
										};
									
									?> 
								</td>
                                <td>
								<div>
								<a href="pages?page=$2y$10$RLpHDQB2GnBQculaf7WxwO3w28qjUiZPcKIkBXM6FmHX2SDN8P3PG&active=11&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $or_id ?>&item=<?php echo $row['item_id']; ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
								
								<a href="pages?page=$2y$10$D46atkBo4VYfgAbDf07G/O8k8s/zbcNnTcwKUvm6ThDZ4G22Dlfxq&active=11&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $or_id ?>&item=<?php echo $item_id ?>" target="_blank" ><button  class="btn cur-p btn-warning"><i class="fa fa-print"></i> </button></a><br><br>
								</div>
							</td>
                            </tr>
                        <?php
                        $count++; 
                    }

                ?>
                                         
                                         
                                            
                                             </tbody>
                                          </table>
<!------------------------------------contractor details---------------------------------------------------------------------------->	  
										
						<?php
}else{
	echo "something error";
	
}

?>