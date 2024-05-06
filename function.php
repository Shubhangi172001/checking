<?php
function redirect($link){
	?>
	<script>
	window.location.href='<?php echo $link ?>';
	</script>
	<?php 
}

function getCustomDate($date){
	if($date!=''){
		$date=strtotime($date);
		return date('d-M-Y', $date);
	}
}

function check_admin(){
	if(!isset($_SESSION['ADMIN_ID'])){
			redirect('pages?page=$2y$10$nkHtSfI59wxsInTVFFo42u00tef/bJmAYpzAhqDhezZ7k1THAjIrK');
	}
	
}

function CheckphpFile(){
	// Get the requested URL
		$request_url = $_SERVER['REQUEST_URI'];

	$forbidden_string = 'forbidden';
		// Check if ".php" is present in the URL
		if (strpos($request_url, '.php') !== false ) {
			//Deny access
			header("HTTP/1.0 403 Forbidden");
			?><center><span ><h1><?php echo "Access denied."; ?></h1></center></span><?php
			exit();
		}
}




?>

