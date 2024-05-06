<?php

date_default_timezone_set('Asia/Calcutta');
session_start();
include("config.php");
include("function.php");
CheckphpFile();
check_admin();


?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title tabindex="-1">Garment</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->

      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
		<!--- datepicker css-->
	<link rel="stylesheet" href="css/jquery-ui.min.css" />
	
	  <style>
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

.activeButton{
	height:35px;
	width:160px;
	background-color:#e883e2;
	padding:3px;
	border-radius:5px;
}


</style>
 

   </head>
   
   <body class="dashboard dashboard_1">
         <div id="preloader">
        <div class="loader"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    	<script>
        (function($) {
        "use strict";

        var preloader = $('#preloader');
        $(window).on('load', function() {
            setTimeout(function() {
                preloader.fadeOut('slow', function() { $(this).remove(); });
            }, 300)
        });
        
        })(jQuery);
    
    </script>
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="#"><img class="logo_icon img-responsive" src="images/logo/logo.jpeg" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                       
                        <div tabindex="-1"  class="user_info">
                       
                         <img class="logo_icon img-responsive" src="images/logo/logo.jpeg" alt="#" />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                 
                  <ul id="myDIV" class="list-unstyled components">
				  
					<!---- Home Page----->
					<?php 
						if($_GET['active']==1){
							?><li ><a tabindex="-1" href="pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1"><span  class="activeButton"><img style="width:28px;" src="images/logo/dashboard.png"></img>  <b>Home</b></span></a></li><?php 
						}else{
							?><li ><a tabindex="-1" href="pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1"><span  class=" "><img style="width:28px;" src="images/logo/dashboard.png"></img>  <b>Home</b></span></a></li><?php 
						}
					?>
					<!---- Home Page----->
					
					
					<!---- Order Page----->
					<?php 
						if($_GET['active']==5){
							?>		<li><a tabindex="-1" href="pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5"><span class=" activeButton"><img style="width:28px;" src="images/logo/order.jpg"></img>  <span><b>Order</b></span></a></li><?php 
						}else{
							?>		<li><a href="pages?page=$2y$10$aMJZteADpYd6B3TGHjOIwuhi0oeoC6QnTaFgv20..yl82V0ap.fVi&pagination=1&active=5"><span class=" "><img style="width:28px;" src="images/logo/order.jpg"></img>  <span><b>Order</b></span></a></li><?php 
						}
					?>
					<!---- Order Page----->
					
					
						<!---- Purchase Page----->
					<?php 
						if($_GET['active']==3){
							?><li><a tabindex="-1" href="pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&pagination=1&active=3"><span class=" activeButton"><img style="width:28px;" src="images/logo/purchase.png"></img>  <b>Purchase</b></span></a></li><?php 
						}else{
							?><li><a tabindex="-1" href="pages?page=$2y$10$vGLZm1HoKD0/eVGy1Gmf8.EtZeycga7WCZSjiEfGuULPmCFoP7WYy&pagination=1&active=3"><span class=" "><img style="width:28px;" src="images/logo/purchase.png"></img>  <b>Purchase</b></span></a></li><?php 
						}
					?>
					<!---- Purchase Page----->
					
					
					<!---- Contractor Page----->
					<?php 
						if($_GET['active']==2){
							?> <li><a  tabindex="-1" href="pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=1&active=2"><span class=" activeButton"><img style="width:28px;" src="images/logo/contractor.png"></img> <b>Contractor</b></span><em></em></a></li><?php 
						}else{
							?> <li><a tabindex="-1"  href="pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=1&active=2"><span class=""><img style="width:28px;" src="images/logo/contractor.png"></img>  <b>Contractor</b></span><em></em></a></li><?php 
						}
					?>
					<!---- Contractor Page----->
					
				
					
					<!---- Stock Page----->
					<?php 
						if($_GET['active']==4){
							?>	<li><a tabindex="-1" href="pages?page=$2y$10$yFnQXsubBX5uTtpJeoHf.O.JqE8/da7u39G.GdE74Ynhnsq0u333C&active=4"><span class=" activeButton"><img style="width:25px;" src="images/logo/storage1.png"></img>   <span><b>Stock</b></span></a></li><?php 
						}else{
							?>	<li><a tabindex="-1" href="pages?page=$2y$10$yFnQXsubBX5uTtpJeoHf.O.JqE8/da7u39G.GdE74Ynhnsq0u333C&active=4"><span class=" "><img style="width:25px;" src="images/logo/storage1.png"></img>   <span><b>Stock</b></span></a></li><?php 
						}
					?>
					<!---- Stock Page----->
					
				
				    <!---- Selling Billing Page----->
					<?php 
						if($_GET['active']==7){
							?>		<li> <a tabindex="-1" href="pages?page=$2y$10$m0jAkObqyeyfp8BIxygYhO5SYbLXczswFmyM8qyK2Q/t6Xh0UCF/K&active=7"><span class=" activeButton"><img style="width:30px;" src="images/logo/billing.png"></img>  <b> Billing</b></span></a></li><?php 
						}else{
							?>		<li> <a tabindex="-1" href="pages?page=$2y$10$m0jAkObqyeyfp8BIxygYhO5SYbLXczswFmyM8qyK2Q/t6Xh0UCF/K&active=7"><span class=" "><img style="width:30px;" src="images/logo/billing.png"></img>  <b> Billing</b></span></a></li><?php 
						}
					?>
					<!---- Selling Billing Page----->
					
					
					
					<!---- Selling History Page----->
					<?php 
						if($_GET['active']==6){
							?>		 <li><a tabindex="-1" href="pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=1&active=6"><span class=" activeButton"><img style="width:28px;" src="images/logo/history.png"></img>  <b>Selling History</b></span></a></li><?php 
						}else{
							?>		 <li><a tabindex="-1" href="pages?page=$2y$10$8IXdLtXOuyyesKZEeXr6x.5rAey6dsUSOCFiMm19upH0xKach/aNy&pagination=1&active=6"><span class=""><img style="width:28px;" src="images/logo/history.png"></img>  <b>Selling History</b></span></a></li><?php 
						}
					?>
					<!---- Selling History Page----->
					
					
					
                   
					 
						<!---- Contractor Page----->
					<?php 
						if($_GET['active']==8){
							?>		 <li><a tabindex="-1" href="pages?page=$2y$10$USLRXrx0IJyMkcVtED8K7OHoDuTSefnxtLLzT9gz0rXcnUFcM/HGW&active=8"><span class=" activeButton"><img style="width:23px;" src="images/logo/add.png"></img> <b>Add Contractor</b></span></a></li><?php 
						}else{
							?>		 <li><a tabindex="-1" href="pages?page=$2y$10$USLRXrx0IJyMkcVtED8K7OHoDuTSefnxtLLzT9gz0rXcnUFcM/HGW&active=8"><span class=" "><img style="width:23px;" src="images/logo/add.png"></img> <b>Add Contractor</b></span></a></li><?php 
						}
					?>
					<!----  ContractorPage----->
					
						<!---- Parties Page----->
					<?php 
						if($_GET['active']==9){
							?>		 <li><a tabindex="-1" href="pages?page=$2y$10$d1KyFcby1JukAZongyzfN.Jx1mLS9HaXo7RscRY8f7cXirUQqX8fO&active=9"><span class=" activeButton"><img style="width:23px;" src="images/logo/add.png"></img> <b>Add Parties</b></span></a></li><?php 
						}else{
							?>		 <li><a tabindex="-1" href="pages?page=$2y$10$d1KyFcby1JukAZongyzfN.Jx1mLS9HaXo7RscRY8f7cXirUQqX8fO&active=9"><span class=" "><img style="width:23px;" src="images/logo/add.png"></img> <b>Add Parties</b></span></a></li><?php 
						}
					?>
						<!---- Parties Page----->
						
						
					<!---- Item Page----->
					
					
					<?php 
						if($_GET['active']==10){
							?>		<li><a tabindex="-1" href="pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10"><span class=" activeButton"><img style="width:23px;" src="images/logo/add.png"></img> <b>Add Items</b></span></a></li><?php 
						}else{
							?>		<li><a tabindex="-1" href="pages?page=$2y$10$ZurWTGqDWjd4GYnzEPt.1.jIzByHOZxzNCeeDkH8yhoJtLnRHAtsO&active=10"><span class=" "><img style="width:23px;" src="images/logo/add.png"></img> <b>Add Items</b></span></a></li><?php 
						}
					?>
					<!---- Item Page----->
						
								<!---- Searching Page----->
					<?php 
						if($_GET['active']==11){
							?>		<li><a tabindex="-1" href="pages?page=$2y$10$aQy6XFUS4urDSO7k18/ytucuLJNy2VUdzaX4CDYG1WH5Yi0jhCmdO&active=11"><span class=" activeButton"><img style="width:23px;" src="images/logo/search.png"></img> <b>Search Data</b></span></a></li><?php 
						}else{
							?>		<li><a tabindex="-1" href="pages?page=$2y$10$aQy6XFUS4urDSO7k18/ytucuLJNy2VUdzaX4CDYG1WH5Yi0jhCmdO&active=11"><span class=" "><img style="width:23px;" src="images/logo/search.png"></img> <b>Search Data</b></span></a></li><?php 
						}
					?>
					
					<li><a tabindex="-1" href="pages?page=$2y$10$G5o5NRbJJvtzmXYjTnfRvOpheJ3ba5j3PbFYgd.CY6FFY6SyjTFD2"><span class=" "><img style="width:23px;" src="images/logo/logout.png"></img> <b>Logout</b></span></a></li>
					<!----Searching Page----->
						
			
                    
					
					
                    
					
                    
					 
					
                    
					
					 
					 
                    
					
					 
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
			
			
			
			 <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                         <marquee style="font-size:30px;color:white">Venumadhav Weaving Mill
</marquee>
                        <!--<button type="button" tabindex="-1" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>-->
                        
                        
                     </div>
                  </nav>
               </div>
			   <div id="loader" style="width:20px;margin-top:250px;margin-left:250px;display:none">
					<center><img   style="width:60px;" src="images/Dual Ring.gif"></center>
			   </div>
               <!-- end topbar -->