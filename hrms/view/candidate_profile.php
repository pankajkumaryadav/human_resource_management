<?php
/**
* Filename : candidate_profile.php
* Authour : Pankaj Kumar Yadav
* Description : contains candidate profile information and allow candidate to update it.
* Date_of_creation : 06-March-2013
*/
//session_start();
       
echo "<pre/>";
print_r($_SESSION['userInfo']);
ini_set("display_errors","1");
        
if( (!isset($_SESSION['userInfo']['userType'])) || ($_SESSION['userInfo']['userType'] != '3')) {
    echo 'Sorry, but you don\'t have permission to view this page!';
    exit();
}
 
if(!isset($arrData) || empty($arrData)) {
	die("Error in initializing form.");         	
}
 
//$arrData['name']='Jai';        
	//require_once('../../../languages/lang.en.php');*/
?>
<html>
    <head>
        
    </head>
    
    <body>
        <form id = "candidateProfileForm" enctype="multipart/form-data">
            <?php echo "Candidate Profile";  ?>
   			<fieldset>
   				<legend><?php echo PERSONAL_DETAILS; ?></legend>       
            		<table>
                   		<tr>
            				<td><?php echo FIRST_NAME; ?></td>
            				<td><input type = "text" id = "firstName" name = "firstName" value = "<?php echo $arrData[0]['first_name'];?>"/></td>
            			</tr>
            	
            			<tr>
            				<td><?php echo MIDDLE_NAME; ?></td>
            				<td><input type = "text" id = "middleName" name = "middleName" value = "<?php echo $arrData[0]['middle_name'];?>"/></td>
            			</tr>
            	
            			<tr>
            				<td><?php echo LAST_NAME; ?></td>
            				<td><input type = "text" id = "lastName" name = "lastName" value = "<?php echo $arrData[0]['last_name'];?>"/></td>
            			</tr>
            	
            			<tr>
            				<td><?php echo DOB; ?></td>
            				<td><input type = "text" id = "dob" name = "dob" value = "<?php echo $arrData[0]['dob'];?>"/></td>
            			</tr>
            	
            			<tr>
            				<td><?php echo GENDER;?></td>
            				<td>
            					<?php
									for ($i = 0; $i < count($arrData['gender']); $i++) {  
										if ($arrData[0]['gender'] == $arrData['gender'][$i]) {
											echo '<input type="radio" name = "gender"  checked = "true" value = "' . $arrData['gender'][$i]. '">'. $arrData['gender'][$i];	
										} else {         		           				    		
            								echo '<input type="radio" name = "gender" value = "' . $arrData['gender'][$i]. '">'. $arrData['gender'][$i];
										}
            						}
            					?>
            				</td>
            	
            			</tr>
            				
            			<tr>
            				<td><?php echo MARITAL_STATUS;?></td>
            				<td>
            					<select name = "marital_status">
            						<?php
										for ($i = 0; $i < count($arrData['marital_status']); $i++) {
											if ($arrData[0]['marital_status'] == $arrData['marital_status'][$i]) {
												echo "<option value=" . $arrData['marital_status'][$i]. " selected = " .selected . ">". $arrData['marital_status'][$i] ."</option>";
											} else {          		           				    		
            									echo "<option value=" . $arrData['marital_status'][$i]. ">". $arrData['marital_status'][$i] ."</option>";
											}
            							}
            		           				
            						?>
            					</select>
            			
            				</td>
            	
            			</tr>
            		</table>
            	</fieldset>
            	
            	<br/>
            	
            	<fieldset>
            		<legend><?php echo EDUCATIONAL_DETAILS; ?></legend>
            			<table>
            				<tr>
            					<th><?php echo DEGREE; ?></th>
            					<th><?php echo COURSE; ?></th>
            					<th><?php echo PERCENTAGE; ?></th>
            		 		</tr>
            	
	           				<tr>
        			    		<td><?php echo HIGH_SCHOOL; ?></td>
    	        				<td><input type = "text" id = "highSchoolCourse" name = "highSchoolCourse" value = "<?php echo $arrData[0]['10th_course'];?>"/></td>
            					<td><input type = "text" id = "highSchoolPercentage" name = "highSchoolPercentage" value = "<?php echo $arrData[0]['10th_percent'];?>"/></td>
            				</tr>
            	
            				<tr>
            					<td><?php echo SECONDARY_SCHOOL; ?></td>
            					<td><input type = "text" id = "secondarySchoolCourse" name = "secondarySchoolCourse" value = "<?php echo $arrData[0]['12th_course'];?>"/></td>
            					<td><input type = "text" id = "secondarySchoolPercentage" name = "secondarySchoolPercentage" value = "<?php echo $arrData[0]['12th_percent'];?>"/></td>
            		       	</tr>
            	
            				<tr>
            					<td><?php echo GRADUATION; ?></td>
            					<td><input type = "text" id = "graduationCourse" name = "graduationCourse" value = "<?php echo $arrData[0]['grad_course'];?>"/></td>
            					<td><input type = "text" id = "graduationPercentage" name = "graduationPercentage" value = "<?php echo $arrData[0]['grad_percent'];?>"/></td>
            		      	</tr>
            	
            				<tr>
            					<td><?php echo POST_GRADUATION; ?></td>
            					<td><input type = "text" id = "postGraduationCourse" name = "postGraduationCourse" value = "<?php echo $arrData[0]['post_grad_course'];?>"/></td>
            					<td><input type = "text" id = "postGraduationPercentage" name = "postGraduationPercentage" value = "<?php echo $arrData[0]['post_grad_percent'];?>"/></td>
					       	</tr>
					       	
					       	<tr>
            					<td><?php echo OTHER_DEGREE; ?></td>
            					<td><input type = "text" id = "otherCourse" name = "otherCourse" value = "<?php echo $arrData[0]['other_course'];?>"/></td>
            					<td><input type = "text" id = "otherPercentage" name = "otherPercentage" value = "<?php echo $arrData[0]['other_course_percentage'];?>"/></td>
					       	</tr>
						</table>
               	</fieldset>
            	
            	<br/>
            	
            	<fieldset>
            		<legend>Experience Details</legend>
            			<table>
            				<tr>
								<td><?php echo EXPEPRIENCE; ?></td>
								<td><input type = "text" id = "experience" name = "experience" value = "<?php echo $arrData[0]['experience'];?>"/><?php echo YEARS;?></td>
							</tr>
						</table>
            	</fieldset>
            	
            	<br/>
            	            	
            	<fieldset>
            		<legend><?php echo CONTACT_DETAILS; ?></legend>
            			<table>
            				<tr>
            					<td><?php echo MOBILE_NUMBER; ?></td>
            					<td><input type = "text" id = "moblileNumber" name = "moblileNumber" value = "<?php echo $arrData[0]['mobile_number'];?>" /></td>
            				</tr>
            	
            				<tr>
            					<td><?php echo EMERGENCY_NUMBER; ?></td>
            					<td><input type = "text" id = "emergencyNumber" name = "emergencyNumber" value = "<?php echo $arrData[0]['emergency_number'];?>"/></td>
            				</tr>
            			</table>
            		
            		<br/>
            		
            		<fieldset>
            			<legend><?php echo TEMORARY_ADDRESS_DETAILS; ?></legend>
            				<table>
            					<tr>
            						<td><?php echo ADDRESS; ?></td>
            						<td><input type = "text" id = "temporaryAddress" name = "temporaryAddress" value = "<?php echo $arrData[0]['temporary_address'];?>"/></td>
            					</tr>
            	
            					<tr>
            						<td><?php echo CITY; ?></td>
            						<td><input type = "text" id = "temporaryCity" name = "temporaryCity" value = "<?php echo $arrData[0]['temporary_city'];?>"/></td>
            					</tr>
            	
            					<tr>
            						<td><?php echo STATE; ?></td>
            						<td><input type = "text" id = "temporaryState" name = "temporaryState" value = "<?php echo $arrData[0]['temporary_state'];?>"/></td>
            					</tr>
            	
            					<tr>
            						<td><?php echo PIN; ?></td>
            						<td><input type = "text" id = "temporaryPin" name = "temporaryPin" value = "<?php echo $arrData[0]['temporary_pin'];?>"/></td>
            					</tr>
            				</table>
            	</fieldset>
            	
            	<br/>
            	
            	<input type ="checkbox" id = "sameAsTemp" name = "sameAsTemp" value ="same"><?php echo SAME_ADDRESS; ?>
            	
            	<br/>
            	            	
            	<fieldset>
            		<legend><?php echo PERMANENT_ADDRESS_DETAILS; ?></legend>
            			<table>
            		
            				<tr>
            					<td><?php echo ADDRESS; ?></td>
            					<td><input type = "text" id = "permanentAddress" name = "permanentAddress" value = "<?php echo $arrData[0]['permanent_address'];?>"/></td>
            				</tr>
            	
            				<tr>
            					<td><?php echo CITY; ?></td>
            					<td><input type = "text" id = "permanentCity" name = "permanentCity" value = "<?php echo $arrData[0]['permanent_city'];?>"/></td>
            				</tr>
            	
            				<tr>
            					<td><?php echo STATE; ?></td>
            					<td><input type = "text" id = "permanentState" name = "permanentState" value = "<?php echo $arrData[0]['permanent_state'];?>"/></td>
            				</tr>
            	
            				<tr>
            					<td><?php echo PIN; ?></td>
            					<td><input type = "text" id = "permanentPin" name = "permanentPin" value = "<?php echo $arrData[0]['permanent_pin'];?>"/></td>
            				</tr>
            			</table>
           		</fieldset>
           	</fieldset>
           	
           	<br/>
           	
           	<fieldset>
           		<legend><?php echo UPLOAD; ?></legend>
           			<table>
           				<tr>
           					<td><?php echo RESUME; ?></td>
							<td><input type="file" id = "resume" name="resume"/></td>            					
           				</tr>
           				
           				<tr>
           					<td><?php echo PHOTO; ?></td>
							<td><input type="file" id = "photo" name="photo"/></td>            					
           				</tr>
           			</table>
           	</fieldset>
           	<table>
           		<tr>
           			<td><input type = "button" id = "submit" name = "submit" value = "Save" onclick = "saveCandidateProfile()"/></td>
					<td><input type = "reset" id = "reset" name = "reset" value = "Reset" /></td> 
				</tr>
			</table>
        </form>
    </body>
</html>

<script>
	function saveCandidateProfile()
    {
       //alert("rrr");
            $.ajax({
				type: "POST",
				url: "<?php echo SITE_PATH?>index.php?controller=candidate&function=saveCandidateProfile",
				data:$("#candidateProfileForm").serialize(),
				success: function(response){
					//alert("adsfasdfasdfasdfsda");
                  	$("#templatemo_content").html(response);
	                     
	 			}
			});
       
    } 
</script>