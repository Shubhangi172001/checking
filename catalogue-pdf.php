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

   <body class="dashboard dashboard_1">
 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>CATALOGUE</h2>
                           </div>
                        </div>
                     </div>
					 
					 
				
					 
					 
					 
					 
					 
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              
				
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th>SR.NO</th>
													<th>PDF NAME</th>
													<th>VIEW</th>
													
													
													
													
                                                </tr>
                                             </thead>
                                             <tbody>
                                          
												
                    <tr>    
						<td>1</td>
						<td>Mahaveer Royalty PDF</td>
						<td><a href="viewPDF?file=firstPDF"><i style="color:red;font-size:35px;" class="fa fa-file-pdf-o"></i></a></td>	
                    </tr>
					<tr>    
						<td>2</td>
						<td>Mukesh Plain Chart Book</td>
						<td><a href="viewPDF?file=secondPDF"><i style="color:red;font-size:35px;" class="fa fa-file-pdf-o"></i></a></td>	
                    </tr>
					<tr>    
						<td>3</td>
						<td>Sangam Fortuner Plus</td>
						<td><a href="viewPDF?file=thirdPDF"><i style="color:red;font-size:35px;" class="fa fa-file-pdf-o"></i></a></td>	
                    </tr>
                
                 
         
                                         
                                         
                                            
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                     
                  </div>
                  <!-- end dashboard inner -->



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
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
	  <script>
function validateForm() {
 
  let party_name = document.forms["add_contractor"]["cont_name"].value;

    if (party_name == "") {
    alert("Name must be filled");
    return false;
  }
  
 
}
</script>
<script>
												function confirmation(){
													return confirm("Are you sure");
													
												}
											</script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
   </body>
</html>































