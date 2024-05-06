<?php 
		include("config.php");											

													$count=1;
													$total_amount=0;
													$invoice_data_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE status='0'");

														while($row=$invoice_data_query->fetch_array()){
															$qty =$row['quanity'];
															$rate =$row['rate'];
															$amount =$qty * $rate;
															$item_id=$row['item_id'];
															$amount= $rate * $qty;
															$total_amount = $total_amount + $amount;
																?>
																	<tr>
																		<td>
																		
																		
																			<button  data-id='<?php echo $row['data_id']; ?>' class="btn cur-p btn-danger delete" >Remove</button>
															
																		
																		</td>
																		<td><?php echo $count ; ?></td>
																		<td><?php 
																$item_fetch1=$DBcon->query("SELECT * FROM tbl_items WHERE flag='0' && it_id='$item_id'");
																while($row3=$item_fetch1->fetch_array()){
																	?>
																 <?php echo $row3['item_name']; ?>
																	<?php 
																}
															?><br>
																			&nbsp;&nbsp;&nbsp;<?php echo $row['description']; ?></td>
																		<td><?php echo $row['quanity']; ?></td>
																		<td><?php echo $row['rate']; ?></td>
																		<td><?php echo $amount  ?></td>
																	
																	</tr>
																<?php 
															$count++;
														}


													?>	
														
														<tr>
															<td></td><td></td><td></td><td></td><th>Total Amount</th><th style="color:green"><?php echo $total_amount; ?> <i class="fa fa-rupee"></i></th>
														</tr>
														 <tr>
														 <td></td><td></td><td></td><td></td>
																<th>CGST (2.5%) & <br>
																	SGST (2.5%)</th>
																<th style="color:green"><?php 
																		$cgst= ($total_amount * (2.5/100));
																		$sgst= ($total_amount * (2.5/100));
																		echo $total_gst_amount = $cgst + $sgst;?> <i class="fa fa-rupee"></i><?php 
																?></th>
														</tr>
														 <tr>
														 <td></td><td></td><td></td><td></td>
															<th>Grand Total:</th>
															<th style="color:green"><?php
																	$total_amount_igst_cgst_sgst = $total_gst_amount;
																	
																	echo $grandTotal = $total_amount_igst_cgst_sgst + $total_amount; ?> <i class="fa fa-rupee"></i><?php 
															?></th>
														</tr>
													