<?php
/**
* Filename : grievanceView.php
* Authour : Jasleen kaur
* Description : first page of application.
* Date_of_creation : 10-March-2013
*/
	ini_set("display_errors","1");
	
	
?>
<head>
<script type="text/javascript">
    
            function showHide()
            {
                if(document.getElementById('Checkbox1').checked)
                {
                    document.getElementById('Text1').disabled = false;
                    document.getElementById('status').disabled = true;
					document.getElementById('response').disabled = true;
                }
                else
                {
                    document.getElementById('Text1').disabled = true;
                    document.getElementById('status').disabled = false;
					document.getElementById('response').disabled = false;

                }
            }
			
        </script>
		</head>
<body>


				

					<?php 
					if(isset($arrData) && !empty($arrData)){ ?>
					<table align="center" cellspacing="5" cellpadding="5" >
						<thead>
  							<tr>
					
                                <td align="left"><?php echo GRIEVANCE_NUMBER; ?></td>
								<td align="left"><?php echo EMPLOYEE_NAME; ?></td>
								<td align="left"><?php echo EMPLOYEE_EMAIL_ID; ?></td>
								<td align="left"><?php echo GRIEVANCE_CATEGORY; ?></td>
								<td align="left"><?php echo GRIEVANCES; ?></td>   
								<td align="left"><?php echo GRIEVANCE_TIME; ?></td>
                              </tr>
										 
  						</thead>
  						<tbody>
                    <?php 
					foreach($arrData as $unresolved){ ?>					                          
					<tr>
                    <td><?php echo $unresolved['id']; ?></td>
					<td><?php echo $unresolved['first_name']." ".$unresolved['middle_name']." ".$unresolved['last_name']; ?></td>
					<td><?php echo $unresolved['email_id']; ?></td>
					<td><?php echo $unresolved['code_value']; ?></td>
					<td><?php echo $unresolved['text']; ?></td>
					<td><?php echo $unresolved['grievance_time']; ?></td>
				
                   </tr> 
										<?php 
									break;	} ?>
										
					</tbody>
				</table>
										
			<?php					  
					} 
				 
					else{
						   echo "<strong>".UGMSG1."</strong>";
					}
					
					$_SESSION['id']=$unresolved['id']; 
	  		$_SESSION['olddept']=$unresolved['code_value'];  ?>      
					 
	<h3 align="center"><?php echo SUBMIT_RESPONSE; ?></h3>									
    <form name="insertresponse" id="insertresponse">  
	                       
					<table width="80%" align="center">

                                    <tbody>
                                     
                                        <tr>
                                           
                                            <td width:"30%"><strong><?php echo FORWARD;?></strong></td>
                                            <td width="10%"><input id="Checkbox1" name="checkbox1" type="checkbox" onClick="showHide();" value="Yes" /></td>
											<td width="40%"><select id="Text1" name="department" disabled="disabled">
										    <?php  $deptunresolved=$arrData['department'];
													  foreach($deptunresolved as $key){?>
													  <option><?php
													  echo $key['code_value']; ?>
													  </option> <?php } ?>
                                                </select>
												</td>
                                            
                                        </tr>
										<tr>
										<td width="30%"><strong><?php echo SEEN;?></strong> </td>
										<td width="10%"><input type="checkbox" id="status" name="status" value="1" /></td>
										<td></td>
										</tr>
										<tr>
										<td width="30%"><strong><?php echo RESPONSE;?></strong> </td>
										<td></td>
										<td width="40%"><textarea id="response" name="response" rows="4" cols="40" ></textarea></td>
										</tr>
										
					
							</tbody>
							</table>
							<div align="center"> 
								<input type="button" value="Submit" name="button" onClick="validate_form(this)" /></div>
</form>		

													
<script type="text/javascript">		                          
function validateresponse(fld)
            {
                var error = "";
                if (fld.value == "")
                {
                    error = "You didn't enter a response.\n";
                    fld.style.background = 'Yellow';
                    alert(error);
                    return false;
                }
                else
                {
                    fld.style.background = 'white';
                }
            }

          function validate_form(thisform){
                with (thisform){
                    	if (document.getElementById('response').disabled==false && validateresponse(response)==false){
							response.focus();
						}
                    	else{
                    		$.ajax({
            					type: "POST",
            					url: "<?php echo SITE_PATH?>index.php?controller=admingrievance&function=adminInsertResponse",
            					data: $('#insertresponse').serialize(),
            			        success: function(response){
								alert(response);
                                window.location.href="index.php?controller=admingrievance&function=admingrievancePage";
                                                    
            			        },
            			     
            			    	});
						}
                }
			
  
  
            }

</script>         
</body>
</html>
