<?php 
include("config.php");


    if($_GET['page']!==''){

        $get_value = $_GET['page'];

        $page_query = $DBcon->query("SELECT * FROM pages WHERE page_hash='$get_value'");
        $num_row = $page_query->num_rows;

        if($num_row>0){
            while($row=$page_query->fetch_array()){

                $page_name = $row['page_name'];
       
                include("$page_name.php");
               
               }
        }else{
           ?> 
		<script>
				window.location.href='<?php echo('logout.php'); ?>';
			</script>;
			<?php 
        }
     
    }else{
		 ?> 
			<script>
				window.location.href='<?php echo('logout.php'); ?>';
			</script>;
			<?php 
	}
?>