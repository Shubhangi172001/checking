<?php 
if($_GET['file']=='firstPDF'){
	?><iframe style="width:100%;height:100%" src="PDF/Mahaveer Royalty PDF.pdf"></iframe><?php 
}elseif($_GET['file']=='secondPDF'){
	?><iframe style="width:100%;height:100%" src="PDF/Mukesh Plain Chart Book.pdf"></iframe><?php 
}elseif($_GET['file']=='thirdPDF'){
	?><iframe style="width:100%;height:100%" src="PDF/Sangam Fortuner Plus.pdf"></iframe><?php 
}else{
	?><center><h1>Something Error</h1></center><?php 
}

?>