<?php 	
include("config.php");


			
			$data_id =$_POST['id'];
			
			if($data_id!==''){
					
					$remove_query=$DBcon->query("DELETE FROM tbl_invoice_data WHERE data_id='$data_id'");
					if($remove_query==true){
										
										
					}else{
										
										
										
					}
			}else{
				
			}
 ?>