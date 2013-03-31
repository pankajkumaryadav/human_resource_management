<?php
echo "edit job";
if(!isset($arrData) || empty($arrData)) {
		die("Error in initializing form.");
	}	
?>
<html>
	<head>
	</head>
	<body>
		<form id="jobPostForm">
			<input type = "hidden" name = "jobId" value = "<?php echo $arrData[0]['id'];?>"/> 
			<fieldset>
				<legend>Job Details</legend>
					<table>
						<tr>
							<td><?php echo DESIGNATION; ?></td>
							<td><?php echo $arrData[0]['designation']; ?></td>            	
						</tr>
				
						<tr>
							<td><?php echo NO_OF_VACANCIES; ?></td>
							<td><input type = "text" id = "noOfVacancies" name = "noOfVacancies" value ="<?php echo $arrData[0]['no_of_vacancies']; ?>"/></td>
						</tr>
				
						<tr>
							<td><?php echo OFFERED_SALARY; ?></td>
							<td><input type = "text" id = "offeredSalary" name = "offeredSalary" value ="<?php echo $arrData[0]['offered_salary']; ?>"/></td>
						</tr>
				
						<tr>
							<td><?php echo EXPEPRIENCE; ?></td>
							<td><input type = "text" id = "experience" name = "experience" value ="<?php echo $arrData[0]['experience']; ?>"/><?php echo YEARS; ?></td>
						</tr>
				
						<tr>
							<td><?php echo LAST_SUBMISSION_DATE; ?></td>
							<td><input type = "text" id = "lastSubmissionDate" name = "lastSubmissionDate" value ="<?php echo $arrData[0]['last_submission_date']; ?>"/></td>
						</tr>
					</table>
			</fieldset>
			
			<br/>
			
			<fieldset>
            	<legend><?php echo EDUCATIONAL_DETAILS; ?></legend>
            		<table>
            			<tr>
            				<th><?php echo DEGREE; ?></th>
            				<th><?php echo PERCENTAGE; ?></th>
            	 		</tr>
            
	        			<tr>
        		    		<td><?php echo HIGH_SCHOOL; ?></td>
    	       				<td><input type = "text" id = "highSchoolPercentage" name = "highSchoolPercentage" value ="<?php echo $arrData[0]['criteria_10th']; ?>"/></td>
            			</tr>
            	
            			<tr>
            				<td><?php echo SECONDARY_SCHOOL; ?></td>
            				<td><input type = "text" id = "secondarySchoolPercentage" name = "secondarySchoolPercentage" value ="<?php echo $arrData[0]['criteria_12th']; ?>"/></td>
            	       	</tr>
            	
            			<tr>
            				<td><?php echo GRADUATION; ?></td>
            				<td><input type = "text" id = "graduationPercentage" name = "graduationPercentage" value ="<?php echo $arrData[0]['criteria_grad']; ?>"/></td>
            	      	</tr>
            	
            			<tr>
            				<td><?php echo POST_GRADUATION; ?></td>
            				<td><input type = "text" id = "postGraduationPercentage" name = "postGraduationPercentage"value ="<?php echo $arrData[0]['criteria_post_grad']; ?>"/></td>
				       	</tr>
					       	
				   </table>
            </fieldset>
            
            <table>
				<tr>
					<td><input type = "button" id = "button" name = "submit" value = "Update" onclick = "updateJob()"/></td>
					<td><input type = "reset" id = "reset" name = "reset" value = "Reset" /></td> 
				</tr>
				
			</table>
		</form>
	</body>
</html>
<script>
	function updateJob()
                       {
		               $.ajax({
                    	
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admin&function=updateJob",
					data:$('#jobPostForm').serialize(),
				 	beforeSend: function() {
					
			        },
			        success: function(response){
		                             	$("#templatemo_content").html(response);
                                        
			        },
			        complete: function () {
			            
			       },
			        error: function(){
			           
			       }
			    });
		                       }
                          
		</script>
	
		
	