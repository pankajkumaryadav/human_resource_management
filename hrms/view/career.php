<?php
if(!isset($arrData) || empty($arrData)) {
	echo "No openings yet.";
	die();	
}
if(!isset($_SESSION['userInfo'])) {
	$action = "Register";
} else {
	$action = "Apply";
}
?>
<html>
	<head>
	
	</head>
	
	<body>
		
		
		<table width="100%" border="1" cellpadding="0" cellspacing="0" id="shubh" class="display"  >
<thead>
  <tr>
					
                                           
                                        <td align="center">Job Id</td>
										<td align="center">Designation</td>
										<td align="center">No. of Vacancies</td>   
										<td align="center">High School</td>
						                <td align="center">Senior Secondary</td>
                                        <td align="center">Graduation</td>
                                        <td align="center">Post Graduation</td>
                                        <td align="center">Experience</td>
                                        <td align="center">Offered Salary</td>
                                        <td align="center">Last Submission Date</td>
                                       <?php 
                                       if (!isset($_SESSION['userInfo']['userType']) || $_SESSION['userInfo']['userType'] == 3 ) {
                                       		echo '<td align="center">Action</td>';
                                       	}
                                       ?>
                                       
                                        
                                        </tr>
										 
  										</thead>
  										<tbody>
                                        <?php 
										
										foreach($arrData as $value){ ?>
										                          
								        <tr>
                                        <td align="right"><?php echo $value['id']; ?></td>
										<td><?php echo $value['designation']; ?></td>
										<td align="right"><?php echo $value['no_of_vacancies']; ?></td>
									    <td align="right"><?php echo $value['criteria_10th']; ?></td>
                                        <td align="right"><?php echo $value['criteria_12th']; ?></td>
									    <td align="right"><?php echo $value['criteria_grad']; ?></td>
									    <td align="right"><?php echo $value['criteria_post_grad']; ?></td>
									    <td align="right"><?php echo $value['experience']; ?></td>
									    <td align="right"><?php echo $value['offered_salary']; ?></td>
									    <td><?php echo $value['last_submission_date']; ?></td>
									    <?php 
                                       if (!isset($_SESSION['userInfo']['userType']) || $_SESSION['userInfo']['userType'] == 3 ) {
                                       		echo '<td align="center">'. $action .'</td>';
                                       	}
                                       ?>
									    									    
                                        </tr>
										<?php 
										} ?>
										
										</tbody>
										</table>
			 
	</body>
</html>