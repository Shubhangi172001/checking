<?php 
include("config.php");

$item_id= $_POST['item_id'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$rate= $_POST['rate'];
$or_id= $_POST['or_id'];
$temprory_stock=$_POST['temprory_stock'];


$check_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE or_id='$or_id' && item_id='$item_id' && invoice_num='0' && status='0'");
$check_count=$check_query->num_rows;

if($check_count > 0){
	echo "already_existed";
}else{
			if($quantity > $temprory_stock){
				echo "qty_error";
			}else{

				$query=$DBcon->query("INSERT INTO tbl_invoice_data(invoice_num, or_id, item_id, description, quanity, rate, status)VALUES
									('0','$or_id', '$item_id', '$description', '$quantity', '$rate', '0')");
									
					if($query){
						echo "success";
					}else{
						echo "error";
					}
				
			}

}
					
?>