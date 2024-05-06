<?php 
include("config.php");
include("function.php"); 

	
		$item_id = $_POST['item_id']; 
		$order_id = $_POST['order_id']; 
			
			$query=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$order_id' && item_id='$item_id'");
			
			while($row=$query->fetch_array()){
					
					$item_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
					$item_fetch=$item_query->fetch_array();
					
					$stock=$row['stock'];
					
					
					$invoice_data_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE item_id='$item_id' && or_id='$order_id' && status='0'");
								$invoice_data_fetch=$invoice_data_query->fetch_array();
								$qty= $invoice_data_fetch['quanity'];
								$temprory_stock=$stock - $qty;
								
								
				?>
				
				<tr>
				<form onsubmit="return validateForm1()">
				
							<td style="text-align:left"><?php echo $item_fetch['item_name']; ?></td>
							<td><?php 
			
								echo $temprory_stock;
	
							?></td>
							<td>
							<input type="hidden" name="temprory_stock" id="temprory_stock" value="<?php echo $temprory_stock; ?>" placeholder="stock">
							<input type="hidden" name="stock" id="stock" value="<?php echo $row['stock']; ?>" placeholder="stock">
							<input type="hidden" name="or_id" id="or_id" value="<?php echo $order_id ?>" placeholder="stock">
							<input type="text" name="description" id="description" placeholder="Description"></td>
							<td><input type="text" name="quantity" id="quantity" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Quantity"></td>
							<td><input type="text" name="rate" id="rate"  placeholder="Rate"><br></td>
							<td>
								<?php if($stock == 0 OR $temprory_stock == 0){


								}else{?>
									<button type="submit"  id="<?php echo $item_id ?>"  class="btn cur-p btn-info add" >Add data to table</button>
								<?php } ?>
							
							</td>
				
					</form>
				</tr>
					
			
					
				<?php
			}


?>