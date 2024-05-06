<?php include("header.php"); ?>



 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Search Page</h2>
                           </div>
                        </div>
                     </div>
                   <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <table>
										<tr>
										<!--- Search Form--->
										 <div class="login-form">
											<td style="width:100px;">SEARCH BY:</td>
											<td style="width:250px;">
												<div class="row">
														  <div class="col-75"> 
													<select id="person_type" class="main_target">
																			
													</select>
													</div>
												</div>
											</td>
											
											<td style="width:250px;">
												<div class="row">
														 <div class="col-75">  
													<select id="persons" class="main_target">
																			
													</select>
													</div>
												</div>
											</td>
											
											<td style="width:250px;">
												<div class="row">
														   <div class="col-75">
													<select id="payment_status" class="main_target">
																			<option value="">Select Payment </option>
																			<option value="0">Unpaid </option>
																			<option value="1">Paid </option>
																			
													</select>
													</div>
												</div>
											</td>
											
											<td style="width:250px;">
												<div class="row">
														   <div class="col-75">
													<input class="main_target" id="from" type="date" placeholder="From date">
													</div>
												</div>
											</td>
											
											<td style="width:250px;">
												<div class="row">
														   <div class="col-75">
													<input id="to" class="main_target" type="date" placeholder="To date">
													</div>
												</div>
											</td>
											
										</div>
										<!--- Search Form--->
										</tr>
										<tr style="height:30px;">
											<td>OR</td>
										</tr>
										
										
										<tr>
											<td>SEARCH BY ORDER</td>
											<td style="width:250px;">
												<div class="row">
														   <div class="col-75">
													<select id="order" >
																			<option value="">Select Order </option>
																			<?php 
																			$sql1 = $DBcon->query("SELECT * FROM tbl_customer_order WHERE flag='0'  ORDER BY cu_or_id DESC");
																			while($row1=$sql1->fetch_array()){
																					?><option value="<?php echo $row1['cu_or_id']; ?>">order-<?php echo $row1['cu_or_id']; ?></option><?php
																			}
																			?>
																			
													</select>
													</div>
												</div>
											</td>
										</tr>
									</table>
                                 </div>
                              </div>
								 
								 
								 <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm" id="search-data">
                                          
                                          
											
                                    </div>
									
                                 </div>
								
								 
							
                              </div>
                           </div>
                              </div>
                              
                           </div>
                        </div>
                        <!-- table section -->
                     </div>
                  </div>
                  
                 
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
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
      <!-- fancy box js -->
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
	  <script src="js/jquery-ui-1.12.1.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#order").on("change",function(){
					var order = $("#order").val();
					$.ajax({
						url:"search_allData",
						method:"POST",
						data:{order_id:order,search:3},
						beforeSend: function(){
							$("#search-data").html("Fetching Data............");
						},
						success: function(data){
							$("#search-data").html(data);
						}
					});
				});
			});
		</script>
	  	 <script>
		$(document).ready(function(){
				
				function loadData(persons, person_type){
					$.ajax({
						url: "search_allData.php",
						method: "POST",
						data: {persons:persons,person_type:person_type,search:1},
						success: function(data){
							 if(persons == "persons"){
								$("#persons").html(data);	
							}else{
								$("#person_type").append(data);	
							}
							
						}
					});
				}
				loadData();
				
				
				$("#person_type").on("change", function(){
					var person_type = $("#person_type").val();
					
					loadData("persons", person_type);
					
				});
	
		});
	  </script>
	    
  <script>
	// search section code
			$(document).ready(function(){
			$(".main_target").on('change', function(){
				var person_type    = $("#person_type").val();
				var persons        = $("#persons").val();
				var payment_status = $("#payment_status").val();
				var date1 		   = $("#from").val();
				var date2 		   = $("#to").val();
				
					$.ajax({
						url: "search_allData.php",
						type: "POST",
						data: { person_type: person_type, persons: persons, payment_status: payment_status,date1:date1,date2:date2, search: 2 },
						dataType: "text",
						beforeSend: function(){
							$("#search-data").html("Fetching Data............");
						},
						success: function(data){
							$("#search-data").html(data);
							
						}
					});
				
			});
		});

  </script>


   </body>
</html>