<?php

session_start();
include("config.php");
include("function.php");

if(isset($_POST['login']))
{ 
	$email=$_POST['username'];
	$password=$_POST['password'];
	$captch=$_POST['captch'];
	
	if($_SESSION['CODE'] == $captch){
		
	$res=$DBcon->query("SELECT * FROM tbl_admin WHERE username='$email'");
	
	if($res->num_rows>0){
							$row=$res->fetch_assoc();
							
								$db_password=$row['password'];
								if(password_verify($password,$db_password))
										{
										
											$_SESSION['ADMIN_ID']= $row['a_id'];	
											redirect('pages?page=$2y$10$SN/lGOuuOz0iEnvPx96f9eCPqwOGenJ9giqkBpr5hxPofFXdaS.YO&active=1');
										}
										else
										{
											$msg="Please enter correct password";
											$_SESSION['MESSAGE'] = $msg;
			
											// Redirect to the same page after 2 seconds
											//header("Refresh: 0; URL=".$_SERVER['PHP_SELF']);
											//exit();
										}
							
								}						
								else
								{
									$msg="Please enter valid login details";
									$_SESSION['MESSAGE'] = $msg;
			
									// Redirect to the same page after 2 seconds
									//header("Refresh: 0; URL=".$_SERVER['PHP_SELF']);
									//exit();
								}
	}else{
	

			$msg="Please enter valid captch";
			
			$_SESSION['MESSAGE'] = $msg;
			
			// Redirect to the same page after 2 seconds
			//header("Refresh: 0; URL=".$_SERVER['PHP_SELF']);
			//exit();


		
	}
}	
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
      <title></title>
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
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
        <style>

        </style>
      
   </head>
   <body class="inner_page login" style="background: url('images/bg-login.jpg'); background-repeat: no-repeat; background-size: cover;">
       
    <div id="preloader">
        <div class="loader"></div>
    </div>
    
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="full graph_head" style="background:#032f56">
                                 <div style="text-align:center;">
                                  <p style="color:white;font-size:30px">SIGN IN</p>
                                 </div>
                              </div>
                  <div class="login_form">
			       
	
				<!--	<div class="center">
						 <img width="210" src="images/logo/logo.jpg" style="width:15%" alt="#" />
                        
                     </div>-->
					 <center><span style="color:red"><?php

							 if (isset($_SESSION['MESSAGE'])) {
									echo '<div id="message">' . $_SESSION['MESSAGE'] . '</div>';
									
									// Unset the session variable to avoid displaying the message again
									unset($_SESSION['MESSAGE']);
								}
								
								

						  ?></span></center>
                     <form action="" method="POST" name="login" onsubmit="return validateForm()">
				
                        <fieldset>
							 	 
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="text" name="username" placeholder="Username" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
						    <div class="field">
                              <label class="label_field"><img src="captch.php"></label>
                              <input type="text" name="captch" maxlength="5" placeholder="Enter Captch" />
                           </div>
                           
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button name="login" class="main_bt_bt">SUBMIT <i class="fa fa-long-arrow-right"></i></button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      
      //for preloader
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	  <script>
	 
function validateForm() {
 
  let username = document.forms["login"]["username"].value;
  let password = document.forms["login"]["password"].value;
  let captch = document.forms["login"]["captch"].value;

    if (username == "") {
    alert("Username must be filled");
    return false;
  }
    if (password == "") {
    alert("Password must be filled");
    return false;
  }
  if (captch == "") {
    alert("Captch must be filled");
    return false;
  }
 
}
</script>
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
	 
   </body>
</html>