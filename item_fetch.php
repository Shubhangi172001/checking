<?php 
include("config.php");

if($_POST['type'] == ""){
	
	$sql = "SELECT * FROM tbl_customer_order WHERE flag='0' && status='0' ORDER BY cu_or_id DESC";

	$query = $DBcon->query($sql);

	$str = "";

	while($row = $query->fetch_array()){
			$str .= "<option value='{$row['cu_or_id']}'>order-{$row['cu_or_id']}</option>";
			
	}
	
}elseif($_POST['type']== "item_data"){
	

	$sql = "SELECT * FROM tbl_req WHERE or_id={$_POST['or_id']} && flag='0'";

	$query = $DBcon->query($sql);

	$str = "";
	$str .= "<option value=''>Select Item</option>";
	while($row = $query->fetch_array()){
			$item_id=$row['item_id'];
			$item_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id' && flag='0'");
			$item_fetch=$item_query->fetch_array();
			$str .= "<option value='{$row['item_id']}'>{$item_fetch['item_name']}</option>";
			
	}
}

echo $str;

?>