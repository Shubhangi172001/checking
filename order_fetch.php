<?php 
include("config.php");
include("function.php"); 

if($_POST['request']){
	
		$request = $_POST['request']; 
		$order_query=$DBcon->query("SELECT * FROM  tbl_req WHERE or_id={$_POST['request']}  && flag='0'");
		$order_count=$order_query->num_rows;
			
			if($order_count>0){
		?>
				
				<tr>
				<?php 
				while($row=$order_query->fetch_array()){
					$item_id=$row['item_id'];
					$item_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
					$item_fetch=$item_query->fetch_array();
					?>
							<tr>
							<th><?php echo $item_fetch['item_name']; ?></th><td><?php echo $row['qty']; ?></td>
							<td>
							
								<?php
										$order_history=$DBcon->query("SELECT * FROM tbl_order WHERE cu_or_id='$request' && item_id='$item_id'");
										$order_history_fetch=$order_history->fetch_array();
										$num_rows=$order_history->num_rows;
										$date=$order_history_fetch['given_date'];
										if($num_rows>0){
										?>This item already gave to contrator on this <b style="color:red"><?php echo getCustomDate($date); 
										?></b><?php } else{
											echo "None";
										} ?>
							
							</td>
							</tr>
							
							
							
						
					<?php
				}
				?>
				</tr>
		
		<?php 
			}else{
				?>
					<tr>
						<td>No data Found</td><td></td><td></td>
					</tr>
				<?php
			}
	
}

?>