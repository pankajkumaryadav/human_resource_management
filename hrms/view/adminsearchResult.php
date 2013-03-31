<?php
/**
* Filename : grievanceView.php
* Authour : Jasleen kaur
* Description : first page of application.
* Date_of_creation : 10-March-2013
*/
	ini_set("display_errors","1");
	
?>
                

<body>


					
					<?php 
					if(isset($arrData) && !empty($arrData)){ ?>
					<table align="center" cellspacing="5" cellpadding="5" >
                                    <tbody> <tr>
                                           
                    <th width="20%" align="left"><?php echo GRIEVANCE_NUMBER;?></th>
					<th align="left"><?php echo EMPLOYEE_NAME; ?></th>
					<th align="left"><?php echo EMPLOYEE_EMAIL_ID; ?></th>
					<th width="20%" align="left"><?php echo GRIEVANCE_CATEGORY;?></th>
					<th width="20%" align="left"><?php echo GRIEVANCES;?></th>
										<?php 
										foreach($arrData as $search){
										if($search['response']){ ?>   
										<th width="20%" align="left"><?php echo RESPONSES;?></th>
										<?php } } ?>
                                        <th width="20%" align="left"><?php echo GRIEVANCE_TIME;?></th>
										<?php 
										foreach($arrData as $search){
										if($search['response']){ ?>   
										<th width="20%" align="left"><?php echo CHECKED_TIME;?></th>
										<?php } } ?>
                                        
                                        
                                        </tr>
                                        <?php 
										
										foreach($arrData as $search){ ?>
										                          
					<tr>
                                        <td><?php echo $search['id']; ?></td>
										<td><?php echo $search['first_name']." ".$search['middle_name']." ".$search['last_name']; ?></td>
					<td><?php echo $search['email_id']; ?></td>
					<td><?php echo $search['code_value']; ?></td>
					<td><?php echo $search['text']; ?></td>
										<?php 
										foreach($arrData as $search){
										if($search['response']){ ?>   
										<td><?php echo $search['response']; ?></td>
										<?php } } ?>
									    
                                        <td><?php echo $search['grievance_time']; ?></td>
										<?php 
										foreach($arrData as $search){
										if($search['response']){ ?>   
										<td><?php echo $search['checked_time']; ?></td>
										<?php } } ?>
									    
									    
                                        </tr>
										<?php 
										} 
										?>
										
										</tbody>
										</table>
			<div id="short_text" align="center">					
			<?php	foreach($arrData as $search){
					if(!$search['response']){
									 
                             echo "<br/><strong>".GSMSG1."</strong>";
                         	}
					} ?>
			
			</div>
			
			  <?php } 
				 
					else{
						  echo "<br/><strong>".GSMSG2."</strong>";
					}
					?> 
										
                                       
										
				

</body>
</html>
