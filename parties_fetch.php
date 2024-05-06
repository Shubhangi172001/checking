<?php 
include("config.php");

$value=$_POST['value']; 
?>
                                            
                                          
												<?php
        $count = 1;
        $party_fetch_query = $DBcon->query(
            "SELECT * FROM tbl_parties WHERE flag='0' && party_name LIKE '%$value%'"
        );
        $count_fetch = $party_fetch_query->num_rows;
        if ($count_fetch > 0) {
            while ($row = $party_fetch_query->fetch_array()) { ?>
                    <tr>    
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['party_name']; ?></td>
						<td><?php echo $row['mobile_number']; ?></td>
						<td><?php echo $row['party_address']; ?></td>
						<td><?php echo $row['gst_no']; ?></td>
						<td><?php  
						
						if($row['party_type']==1){
							echo "Puchase";
						}elseif($row['party_type']==2){
							echo "Selling";
							}; ?></td>
                        

						<td>
						<a href="pages?page=$2y$10$WuOrlQTb08lUYPJss0NByu1ej4j1PISxav4yrdw7q6pFWr7JNNUEe&id=<?php echo $row['p_id']; ?>"><button  class="btn cur-p btn-warning"><i class="fa fa-edit"></i> Edit</button></a>

								
                        </td>

							
                    </tr>
                <?php $count++;}
        } else {
             ?>
                 <tr>    
                        <td>No data Found   </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
                    </tr>
            <?php
        }
        ?>  
                                         
                                         

                                         
