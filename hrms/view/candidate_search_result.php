<?php
/**
 * Filename : admin_search_result.php
 * Authour : Pankaj Kumar Yadav
 * Description : allow admin to search job posted.
 * Date_of_creation : 31-March-2013
 */
if(!isset($arrData) || empty($arrData)) {
	echo "No candidate found.";
	die();
}
?>
<html>
<head>

	
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>paging.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>paging.js"></script>

</head>

<body>
<div id="main">
    <ul id="holder">
                                        <?php 
										
										foreach($arrData as $value){ 
											//print_r($value);
											?>
										                          
						
					<li>
					Job Id : <?php echo $value['job_id']; ?><br/>
					Candidate Id: <?php echo $value['candidate_id']; ?><br/>
					Select Status : <select id = "select_status" name = "select_status">
            						<?php
										for ($i = 0; $i < count($arrData['status']); $i++) {
											if ($arrData['status'][$i] == $value['select_status']) {
												echo "<option value=" . $arrData['status'][$i]. " selected = " . "selected" . ">". $arrData['status'][$i] ."</option>";
											} else {          		           				    		
            									echo "<option value=" . $arrData['status'][$i]. ">". $arrData['status'][$i] ."</option>";
											}
            							}
            		           				
            						?>
            					</select><br/>
					Submission Date : <?php echo $value['submission_date']; ?><br/>
					<a href = "#" name = "<?php echo $value['id']; ?>" onclick = "changeStatus(this.name)">Change Status</a></li>

				
										<?php 
										} ?>
										
				</ui>
	</div>
<!-- 		<table width="100%" border="1" cellpadding="0" cellspacing="0" -->
<!-- 			id="shubh" class="display"> -->
<!-- 			<thead> -->
<!-- 				<tr> -->


<!-- 					<td align="center">Job Id</td> -->
<!-- 					<td align="center">Designation</td> -->
<!-- 					<td align="center">No. of Vacancies</td> -->
<!-- 					<td align="center">High School</td> -->
<!-- 					<td align="center">Senior Secondary</td> -->
<!-- 					<td align="center">Graduation</td> -->
<!-- 					<td align="center">Post Graduation</td> -->
<!-- 					<td align="center">Experience</td> -->
<!-- 					<td align="center">Offered Salary</td> -->
<!-- 					<td align="center">Last Submission Date</td> -->

<!-- 				</tr> -->

<!-- 			</thead> -->
<!-- 			<tbody> -->
                                        <?php 
										
// 										foreach($arrData as $value){ ?>
										                          
<!-- 								        <tr> -->
					<td align="right"><a href =" #"><?php //echo $value['id']; ?></a></td>
					<td><?php //echo $value['designation']; ?></td>
					<td align="right"><?php //echo $value['no_of_vacancies']; ?></td>
					<td align="right"><?php //echo $value['criteria_10th']; ?></td>
					<td align="right"><?php //echo $value['criteria_12th']; ?></td>
					<td align="right"><?php //echo $value['criteria_grad']; ?></td>
					<td align="right"><?php //echo $value['criteria_post_grad']; ?></td>
					<td align="right"><?php //echo $value['experience']; ?></td>
					<td align="right"><?php //echo $value['offered_salary']; ?></td>
					<td><?php //echo $value['last_submission_date']; ?></td>

<!-- 				</tr> -->
										<?php 
// 										} ?>
										
<!-- 										</tbody> -->
<!-- 		</table> -->
</body>
</html>
<script>
			</script>
