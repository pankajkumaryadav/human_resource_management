<?php
if(!isset($arrData) || empty($arrData)) {
	echo "No openings yet.";
	die();	
}
if(isset($_SESSION['userInfo']['userId']) && $_SESSION['userInfo']['userId'] != '3') {
	$action = "Apply";
} else {
	$action = "Register";
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
										
										foreach($arrData as $value){ ?>
										                          
								        
					<li> Job Id :<?php echo $value['id']; ?><br/>
					Designation :<?php echo $value['designation']; ?><br/>
					No. of Vacancies: <?php echo $value['no_of_vacancies']; ?><br/>
					High School : <?php echo $value['criteria_10th']; ?><br/>
					Senior Secondary : <?php echo $value['criteria_12th']; ?><br/>
					Graduation : <?php echo $value['criteria_grad']; ?><br/>
					Post Graduation : <?php echo $value['criteria_post_grad']; ?><br/>
					Experience : <?php echo $value['experience']; ?><br/>
					Offered Salary : <?php echo $value['offered_salary']; ?><br/>
					Last Submission Date : <?php echo $value['last_submission_date']; ?><br/>
					Action : <?php echo $action;?></li>
					 

				
										<?php 
										} ?>
										
				</ui>
	</div>
			 
	</body>
</html>