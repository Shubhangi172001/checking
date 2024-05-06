
<?php
include("header.php");

?>


 <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <a href="pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=1&active=2"><button class="btn btn-info"><i class="fa fa-long-arrow-left"></i> Back</button></a>
				
                        </div>
                     </div>
 </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                <div class="col-25">
										<input type="text" value="" name="search" id="search_id" placeholder="Search ">
								</div>
								 
							
								
                              </div>
				
                              <div class="full price_table padding_infor_info">
							  
                                 <div class="row">
                                    <div class="col-lg-12">
									
									
                                       <div class="table-responsive-sm">
									   
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                    <th>SR.NO</th>
													<th>ORDER NO</th>
													<th>ITEM</th>
													<th>CON.NAME</th>
													<th>ACTUAL QTY</th>
													<th>RETURN QTY X RATE</th>
													<th>AMOUNT</th>
													<th>PAID/UNPAID</th>
													<th>ACTION</th>
                                                </tr>
                                             </thead>
                                             <tbody id="table">
                                          
											 <?php 
											 // <!-- PAGINATION CODE -->
				$limit = 10;
			
				if(isset($_GET['pagination'])){
					$pagination =$_GET['pagination'];
				}else{
					$pagination =1;
				}
				
				$offset = ($pagination - 1) * $limit; 
				
				// <!-- PAGINATION CODE -->
                $count=1;
				
                    $order_fetch =$DBcon->query("SELECT * FROM tbl_order WHERE status='1' ORDER BY or_id DESC LIMIT {$offset}, {$limit} ");
                    while($row=$order_fetch->fetch_array()){
						
						$return_qty=$row['return_qty'];
						$or_id=$row['cu_or_id'];
                        $con_id = $row['con_id'];
						$item_id=$row['item_id'];
						
						
						//total amount calculation
						
						$get_req_id=$DBcon->query("SELECT * FROM tbl_req WHERE or_id='$or_id' && item_id='$item_id'");
						$get_req_id_fetch=$get_req_id->fetch_array();
						$req_id=$get_req_id_fetch['req_id'];
						
			
						//total amount calculation
						
                        ?>
                            <tr>
								
                                <td><?php echo $count ?></td>
								<td>order-<?php echo $row['cu_or_id']; ?></td>
								<td>
									<?php 
										$item_fetch_query=$DBcon->query("SELECT * FROM tbl_items WHERE it_id='$item_id'");
										$item_fetch=$item_fetch_query->fetch_array();
										echo $item_fetch['item_name'];
									?>
								</td>
                                <td>
									<?php 
										$con_id_qry =$DBcon->query("SELECT * FROM tbl_contractors WHERE cn_id='$con_id'");
										$con_id_fetch = $con_id_qry->fetch_array();         
										echo $con_id_fetch['cn_name'];
									?>
								</td>
								<td><?php echo $row['qty']; ?> pie</td>
								<td><?php echo $row['return_qty']; ?> pie X <?php echo $row['rate']; ?> Rs</td>	     
								<td style="color:red"> 
									<?php 
										$return_qty=$row['return_qty'];
										$rate=$row['rate']; 
										echo ($return_qty * $rate);?>.Rs<?php 
									?>
								</td>
								
				
								<td>
									<?php 
										if($row['paid_or_unpaid']==0){
												echo "Unpaid";
										}elseif($row['paid_or_unpaid']==1){
											echo "Paid";
										};
									
									?> 
								</td>
                                <td>
								
										<a href="pages?page=$2y$10$RLpHDQB2GnBQculaf7WxwO3w28qjUiZPcKIkBXM6FmHX2SDN8P3PG&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $or_id ?>&item=<?php echo $row['item_id']; ?>&active=2"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
										<a href="pages?page=$2y$10$D46atkBo4VYfgAbDf07G/O8k8s/zbcNnTcwKUvm6ThDZ4G22Dlfxq&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $or_id ?>&item=<?php echo $item_id ?>&active=2" target="_blank" ><button  class="btn cur-p btn-warning"><i class="fa fa-print"></i> </button></a><br><br>
										<a href="pages?page=$2y$10$ds29/QVp/K2JY6EPv1BdJ.GUdGMlHFJdb/0IHLUQTaNO4b2bwfSvy&id=<?php echo $row['or_id']; ?>&cu_order=<?php echo $or_id ?>&item=<?php echo $item_id ?>&active=2"><button  class="btn cur-p btn-info"><i class="fa fa-plus"></i> Payment</button></a></td>
								 </td>
                            </tr>
                        <?php
                        $count++; 
                    }

                ?>
                                         
                                         
                                            
                                             </tbody>
                                          </table>
										  
										 
                                       </div>
									   <br>
									   	 <!-- PAGINATION CODE -->
								 <?php 	
										  $link = 2;
										  $pagination_query =$DBcon->query("SELECT * FROM tbl_order WHERE status='0' ");
										  $total_record = $pagination_query->num_rows;
										  
										  if($total_record>0){
												
												$total_pages = ceil($total_record / $limit);
												
												$start = (($pagination - $link) > 0) ? $pagination - $link : 1;
												$end = (($pagination + $link ) < $total_pages ) ? $pagination + $link : $total_pages;
												
												?><ul class="pagination">
												<?php 
												if($pagination > 1){?>
													<li><a href="pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=<?php echo ($pagination - 1); ?>"><< Prev </a></li>
												<?php }
												?>
													
												<?php		
												for($i=$start; $i <= $end ; $i++){
													
													if($i == $pagination){
														$active = "active";
													}else{
														$active = "";
													}
													?>
															<li> <a class="<?php echo $active ?>" href="pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=<?php echo $i ?>"><?php echo $i ?></a></li>
													<?php	
												}
												?>
												
												<?php if($total_pages > $pagination){
													?><li><a href="pages?page=$2y$10$/KS51/XIitsYHugA1QxcSOx5yJfypiX3xnBYoSdPCCmBRi7ri2Uae&pagination=<?php echo ($pagination + 1); ?>">Next >></a></li></ul><?php 
												}?>
												
												 
										<?php 
										  }  
										  ?>
								 <!-- PAGINATION CODE -->
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
		$(document).ready(function(){
			$("#search_id").on('keyup', function(){
				var value= $(this).val();
				
				//alert(value);
				
				$.ajax({
					url:"contractor_fetch.php",
					type: "POST",
					data: 'value=' + value,
					beforeSend:function(){
					$("#parties_list").html("<span>Working....</span>");
					},
					success:function(data){
						$("#parties_list").html(data);
						
					}
					
				});
				
				
			});
		});
	</script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->     
      <script src="js/semantic.min.js"></script>
   </body>
</html>



























