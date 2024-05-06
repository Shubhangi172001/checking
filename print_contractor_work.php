<?php 

include("config.php"); 
$get_id =$_GET['id'];
$or_id=$_GET['cu_order'];
$item_id=$_GET['item'];
if($_GET['id']!=='' && $_GET['cu_order']!=='' && $_GET['item']!==''){
	
	if ( ! preg_match('/^-?\d+$/', $get_id) && ! preg_match('/^-?\d+$/', $or_id) && ! preg_match('/^-?\d+$/', $item_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO');
	}else{
		
		
		
		//total amount calculation
						
				
		//total amount calculation
						
?>
<!DOCTYPE html>
<html lang="en">
   <head>
<style>
		@media print {
	#print {
    visibility: hidden;
	}
	aside {
    visibility: hidden;
	}
	
	#hidden{
		visibility: hidden;
	}
	@page {
        margin-top: 0;
        margin-bottom: 0;
    }

	
}
	</style>
	<center><img src="images/logo/logo.jpg" style="width:50px;"></img></center><br>
	<center><b><i><span style="font-size:20px;">Venumadhav
Weaving Mill</span></i></b></center><br>
	<center>
	<?php $order_fetch =$DBcon->query("SELECT * FROM tbl_order WHERE or_id='$get_id'");
                    while($row=$order_fetch->fetch_array()){ 
					$con_id = $row['con_id'];
					$qty=$row['qty'];
					$return_qty=$row['return_qty'];
					$rate=$row['rate'];
					$total_amount= $qty * $rate;
					?>
					
						<center><table border="1" cellpadding="6" cellspacing="0" >
							<tr >
								<td style="width:40%">CONTRACTOR NAME</td>
								<td style="width:40%"><?php 
                                    $con_id_qry =$DBcon->query("SELECT * FROM tbl_contractors WHERE cn_id='$con_id'");
                                    $con_id_fetch = $con_id_qry->fetch_array();         
                                    
                                    echo $con_id_fetch['cn_name'];
                                ?></td>
							</tr>
							<tr>
								<td>PATTERN</td>
								<td><?php echo $row['pattern'];?></td>
							</tr>
							<tr>
								<td>GIVEN QTY</td>
								<td><?php echo $row['qty'];?></td>
							</tr>
							<tr>
								<td>RETURN QTY</td>
								<td><?php echo $row['return_qty'];?></td>
							</tr>
							<tr>
								<td>RATE</td>
								<td><?php echo $row['rate'];?> Rs</td>
							</tr>
							<tr>
								<td>PAYMENT STATUS</td>
								<td><?php 
										if($row['paid_or_unpaid']==0){
												echo "Unpaid";
										}elseif($row['paid_or_unpaid']==1){
											 echo "Paid";
											 };
									
									?> </td>
							</tr>
							<tr>
								<td>PAID AMOUNT</td>
								<td><?php //paid amout calculation
										$paid_total=0;
										$payment_fetch_query1 = $DBcon->query("SELECT * FROM tbl_con_payment WHERE cu_or_id='$or_id' && item_id='$item_id'");
										 while ($row1 = $payment_fetch_query1->fetch_array()) { 
											$amount=$row1['amount'];
											$paid_total =$paid_total + $amount;
									} 
								?><b><?php 	echo $paid_total; ?> Rs</b><?php
									?>
						 
								</td>
							</tr>
							<tr>
								<td>TOTAL AMOUNT</td>
								<td><b><?php echo $total_amount; ?> Rs</b></td>
							</tr>
						</table></center>
						
					<?php } ?><br>
					Order Details: --
					<?php
						$req_fetch_query=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$or_id' && item_id='$item_id'");
						while($req_fetch=$req_fetch_query->fetch_array()){
							$req_id=$req_fetch['req_id'];
							
							$item_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
							$item_fetch=$item_query->fetch_array();
								?>
									
									<table  border="1" cellpadding="6" cellspacing="0"  >
										<tr >
											<td colspan="10" style="width:50%;">Item Name :<b><?php echo $item_fetch['item_name']; ?></b></td>
										</tr>
										
										<tr>
											<td >Size</td>
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
											<td>Quantity</td>
											<?php 
											$req_fetch_with_size_query1=$DBcon->query("SELECT * FROM tbl_size_req WHERE req_id='$req_id'");
											while($req_size_fetch1=$req_fetch_with_size_query1->fetch_array()){
												?><td>
													<?php echo $req_size_fetch1['qty'];  ?>
												</td><?php 
											}
											?>
										</tr>
									</table>
								
								<?php 
						}	?>
		<br>
----------------------------------------------------------------------------------------------------------------------------------				
					<br><button id="print" onclick="window.print()">Print</button></center>
</body>
</html>
<?php 
	}
}else{
         redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO');
}   
?>


									   
									   
                      