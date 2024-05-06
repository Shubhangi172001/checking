<?php 
session_start();
include("config.php");
include("function.php");
include("phpqrcode/qrlib.php");

check_admin();
$get_id=$_GET['id'];

if($_GET['id']!==''){
if ( ! preg_match('/^-?\d+$/', $get_id) ) {
				redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
	}else{
$invoice_query=$DBcon->query("SELECT * FROM tbl_invoice WHERE invoice_num='$get_id'");
$invoice=$invoice_query->fetch_array();

$location=$invoice['location'];
$transportation_cost=$invoice['transportation_cost'];
$party_id=$invoice['party_id'];
?>

<html>
<head>
   <head>
      <!-- basic -->
          <link rel="stylesheet" href="style.css" />
	  <style>
	  body{
		  padding: 1px 1px 1px 1px;
	  }
	  td{
		  padding: 1px 1px 1px 2px;
	  }
	  .pagination li{
		  display: inline-block;
	  }
.pagination a {
  color: black;
  float: left;
  padding: 7px 16px;
  text-decoration: none;
  transition: background-color .3s;
  
}

.pagination a.active {
  background-color: dodgerblue;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

body{
	font-family: Arial, sans-serif;
}
p {
 line-height: 1.5;
}
table, td, th {
  border: 1px solid;
}

table {
	font-size:13px;
  width: 100%;
  border-collapse: collapse;
}
.invoice_data{
	height:20%;
}
@media print {
	#print {
    visibility: hidden;
	}
	aside {
    visibility: hidden;
	}
	#link {
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
</head>
<body>
<center style="font-size:16px"><b>Tax Invoice</b></center><br>
<table cellpadding="1" style="" id="printTable">

		<tr>
			<td>
				<p><strong style="font-size:16px;
								">Venumadhav
Weaving Mill</strong><br>  
                                                102/a,Bhavani Peth, Ghongde Vasti, Solapur<br> 
												<strong>GSTIN/UIN : </strong>27AIUPG1041M1Z0<br>    
                                                <strong>State Name : </strong>Maharashtra, Code : 27<br>  
                                                <strong>Email : </strong>dhanshreegarmants@gmail.com<br>
                                                <strong>Mobile No : </strong>9028296747,9511889587
												
                                             </p><br>
			</td>
			<td style="width:40%;
					border:none;">
				<table class="details" style="border:none
											 padding: 15px;">
					<tr>
						<td>Invoice No:<br>
						<b><?php echo $invoice['invoice_num']; ?></b><br><br>
						</td>	
					
						<td>
							Dated:<br>
							<b><?php echo getCustomDate($invoice['date']); ?></b><br><br>
						</td>
					
					</tr>
					<tr>
						
					</tr>
					<tr>
						<td>Despatched through:<br>
						<b><?php echo $invoice['dispatch']; ?></b><br><br>
						</td>
						<td>
							Destination:<br>
							<b><?php echo $invoice['destination']; ?></b><br><br>
						</td>
						
					</tr>
					
					<tr>
						<td>Mode/Terms of Payment:<br>
						<b><?php echo $invoice['mode_of_payment']; ?></b><br><br>
						</td>
						<td>LR No:<br>
						<b><?php echo $invoice['lr_no']; ?></b><br><br>
						</td>
						
						
					</tr>
					<tr>
						
					</tr>
				</table><br><br>
			</td>
			
		</tr>
		
		
		
		<tr>
			<td>
				<?php 
				$party_details_query=$DBcon->query("SELECT * FROM tbl_parties WHERE p_id='$party_id'");
				$party_fetch=$party_details_query->fetch_array();
				?>
				<p>Buyer<br><strong style="font-size:16px"><?php echo $party_fetch['party_name']; ?></strong><br>  
                                                <?php  echo $party_fetch['party_address']; ?><br> 
												GSTIN/UIN			&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $party_fetch['gst_no']; ?><br>    
                                                State Name 			&nbsp;&nbsp;&nbsp; :<?php echo $party_fetch['state']; ?><br>  
												Mobile Number        : <?php echo $party_fetch['mobile_number']; ?>
                                             </p>
											 <br>
			</td>
		</tr>
		
		<table class="invoice_data">
				
				<tr>
					<td>Sr.No</td>
					<td>Description of Goods</td>
					<td>Quantity</td>
					<td>Rate</td>
					<td>per</td>
					<td style="text-align:right">Amount</td>
				</tr>
				
				<?php 
				$count=1;
				$total_amount=0;
					$invoice_data_query=$DBcon->query("SELECT * FROM tbl_invoice_data WHERE invoice_num='$get_id'");
					while($invoice_data=$invoice_data_query->fetch_array()){
						$quantity=$invoice_data['quanity']; 
						$rate =$invoice_data['rate'];
						$amount =$quantity * $rate;
						$total_amount = $total_amount + $amount;
						$item_id=$invoice_data['item_id'];
					
				?>
				
					<tr>
						<td ><?php echo $count ?></td>
						<td>
							<b><?php 
									$item_fetch1=$DBcon->query("SELECT * FROM tbl_items WHERE  it_id='$item_id'");
																while($row3=$item_fetch1->fetch_array()){
																	?>
																 <?php echo $row3['item_name']; ?>
																	<?php 
																}
															?></b><br>
							&nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo $invoice_data['description']; ?></i>
						</td>
						<td><b><?php echo $quantity ?> pcs.</b></td>
						<td><?php echo $rate ?> </td>
						<td>pcs.</td>
						<td style="text-align:right;"><b><?php echo $amount ?> <i class="fa fa-rupee"></i></b></td>
					</tr>
					<?php  
					$count++;
					} ?>
					
					<tr>
						<td colspan="5" style="text-align:right"><b>Sub Total</b></td><td style="text-align:right"> <?php echo round($total_amount,2)?> <i class="fa fa-rupee"></i> </td>
					</tr>
					<tr>
							
							<td colspan="5" style="text-align:right"><b>CGST@2.5%
											</b>
							</td>
							<td style="text-align:right"> <?php 
								
															$cgst= ($total_amount * (2.5/100));
															$sgst= ($total_amount * (2.5/100));
															$total_gst_amount = $cgst + $sgst;
															echo round($cgst,2); ?> <i class="fa fa-rupee"></i><?php 
													?> </td>
					</tr>
					<tr>
							
							<td colspan="5" style="text-align:right"><b>
											SGST@2.5%</b>
							</td>
							<td style="text-align:right"> <?php 
															$sgst= ($total_amount * (2.5/100));
															
															echo round($sgst,2)?> <i class="fa fa-rupee"></i><?php 
													?> </td>
					</tr>
						
					<?php 
					if($location==2){
					?>
					<tr>
							<td colspan="5" style="text-align:right"><b>IGST@5%</b></td><td style="text-align:right"> <?php $igst= ($total_amount * (5/100));
																								echo $igst; ?> <i class="fa fa-rupee"></i></td>
					</tr>
					<?php } ?>
					
					<tr>
						<td colspan="5" style="text-align:right"><b>Transportation Cost </b></td><td style="text-align:right"> <?php echo $transportation_cost?> <i class="fa fa-rupee"></i> </td>	
					</tr>	
					<tr>
						<?php 
							
							if($location==2){
							$grand_total = ($total_amount + $total_gst_amount + $transportation_cost + $igst);
							}else{
							$grand_total = ($total_amount + $total_gst_amount + $transportation_cost);
							}
						?>
						<td colspan="4"  style="text-align:right">
						
							
							<!----amount into words-->
										<span><b><?php 
																			
												$number = $grand_total;
												   $no = floor($number);
												   $point = round($number - $no, 2) * 100;
												   $hundred = null;
												   $digits_1 = strlen($no);
												   $i = 0;
												   $str = array();
												   $words = array('0' => '', '1' => 'One', '2' => 'Two',
													'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
													'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
													'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
													'13' => 'Thirteen', '14' => 'Fourteen',
													'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
													'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
													'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
													'60' => 'Sixty', '70' => 'Seventy',
													'80' => 'Eighty', '90' => 'Ninety');
												   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
												   while ($i < $digits_1) {
													 $divider = ($i == 2) ? 10 : 100;
													 $number = floor($no % $divider);
													 $no = floor($no / $divider);
													 $i += ($divider == 10) ? 1 : 2;
													 if ($number) {
														$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
														$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
														$str [] = ($number < 21) ? $words[$number] .
															" " . $digits[$counter] . $plural . " " . $hundred
															:
															$words[floor($number / 10) * 10]
															. " " . $words[$number % 10] . " "
															. $digits[$counter] . $plural . " " . $hundred;
													 } else $str[] = null;
												  }
												  $str = array_reverse($str);
												  $result = implode('', $str);
												  $points = ($point) ?
													"." . $words[$point / 10] . " " . 
														  $words[$point = $point % 10] : '';
												 
												?> INR <?php echo $result . "Rupees  "; ?></b></span>
							<!----amount into words-->
						
								</td>
						
									<td style="text-align:right"><span > <b >Grand Total</b></span> </td><td style="text-align:right"> <b> <?php echo round($grand_total,1)?> <i class="fa fa-rupee"></i></b>  </td>	
					</tr>		
					<tr >
						<td style="width:30%;padding:0px;margin-top:0px">
						
							Account Name- <b>DHANASHRI DRESSESS</b><br>
							A/C No      - <b>922020014046318</b><br>
							IFSC Code   - <b>UTIB0001723</b> <br>
							Cust ID     - <b>938911235</b> <br>
							AXIS BANK LTD, KANNA CHOWK,SOLAPUR<br><br>
							
						</td>
						<td  rowspan="2"  colspan="5" style="">
						<?php 
							
								$amount_of_upi=round($grand_total,1);
								$path='images/qrcode/';
								$qrcode = $path.time().".jpg";
								QRcode :: png("upi://pay?pa=9284702619@ybl&pn=AdarshAnnaldas&cu=INR&am=".$amount_of_upi."", $qrcode);
								 
								 echo "<img style='width:115px;height:115px;
																			
																			
													text-align:right;' src='".$qrcode."'>"
					
	
								 ?>
								<Br>
									<b>Pay Using this QR</b>
									<br>
									
															<span style="text-align:left;
																			margin-top:50px;
																			margin-left:0px;" ><b><u>Declaration:</u><br>
									We declare that Invoice shows the actual price of the
									goods described and that all particulars are true and correct.
									Payment should be made withing 30 days.<br>
									Goods once sold will not taken back </b></span>
						</td>
					</tr>
					<tr>
								<td>
									<img style="width:100px;height:100px" src="images/catalogue-qr/catalogue-qr.png"></img><br>
									<b>Scan QR and get our item catalogue</b>
								</td>
								
					</tr>
					
		</table>
		
</table><br>
<center style="font-size:14px;">This is a Computer Generated invoice</center>
<br>

<tr>
	<td><a id='link' href="pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=1&active=6">Back to home</a></td>
</tr>

<tr>
			<center><img id="print" style="width:50px;cursor:pointer;" onclick="window.print()" src="images/logo/print.png"></img></center>
</tr>
</body>
</html>

<?php 
	}
}else{
         redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
}   
?>