<?php
/**
 * Filename : job_post.php
 * Authour : Pankaj Kumar Yadav
 * Description : allow admin to post new jobs.
 * Date_of_creation : 06-March-2013
 */
ini_set("display_errors","1");
     /*   session_start();
        
        
        
        if($_SESSION['authuser'] != 1) {
            echo 'Sorry, but you don\'t have permission to view this page!';
            exit();
        }
        
	require_once('../../../languages/lang.en.php');*/
	echo 'job post';
	echo "<pre/>";
	print_r($_SESSION['userInfo']);	
	if(!isset($arrData) || empty($arrData)) {
		die("Error in initializing form.");
	}	
?>
<html>
	<head>
	</head>
	<body>
		<form id="jobPostForm">
			<fieldset>
				<legend>Job Details</legend>
					<table>
						<tr>
							<td><?php echo DESIGNATION; ?></td>
							<td>
								<select name = "designation">
            						<?php
										for ($i = 0; $i < count($arrData['designation']); $i++) {
											echo "<option value= '" . $arrData['designation'][$i] ."'>". $arrData['designation'][$i] ."</option>";	
										}            		           				    		
					   				?>
            					</select>          		
            				</td>            	
						</tr>
				
						<tr>
							<td><?php echo NO_OF_VACANCIES; ?></td>
							<td><input type = "text" id = "noOfVacancies" name = "noOfVacancies"/></td>
						</tr>
				
						<tr>
							<td><?php echo OFFERED_SALARY; ?></td>
							<td><input type = "text" id = "offeredSalary" name = "offeredSalary" /></td>
						</tr>
				
						<tr>
							<td><?php echo EXPEPRIENCE; ?></td>
							<td><input type = "text" id = "experience" name = "experience" /><?php echo YEARS; ?></td>
						</tr>
				
						<tr>
							<td><?php echo LAST_SUBMISSION_DATE; ?></td>
							<td><input type = "text" id = "lastSubmissionDate" name = "lastSubmissionDate" /></td>
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
    	       				<td><input type = "text" id = "highSchoolPercentage" name = "highSchoolPercentage"/></td>
            			</tr>
            	
            			<tr>
            				<td><?php echo SECONDARY_SCHOOL; ?></td>
            				<td><input type = "text" id = "secondarySchoolPercentage" name = "secondarySchoolPercentage"/></td>
            	       	</tr>
            	
            			<tr>
            				<td><?php echo GRADUATION; ?></td>
            				<td><input type = "text" id = "graduationPercentage" name = "graduationPercentage"/></td>
            	      	</tr>
            	
            			<tr>
            				<td><?php echo POST_GRADUATION; ?></td>
            				<td><input type = "text" id = "postGraduationPercentage" name = "postGraduationPercentage"/></td>
				       	</tr>
					       	
				   </table>
            </fieldset>
            
            <table>
				<tr>
					<td><input type = "button" id = "button" name = "submit" value = "Post" onclick = "postJob()"/></td>
					<td><input type = "reset" id = "reset" name = "reset" value = "Reset" /></td> 
				</tr>
				
			</table>
		</form>
	</body>
</html>
<script>
	function postJob()
                       {
		               $.ajax({
                    	
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admin&function=postJob",
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
	
		
	