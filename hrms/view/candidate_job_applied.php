<?php
/**
* Filename : candidate_job_applied.php
* Authour : Pankaj Kumar Yadav
* Description : contains the information about the jobs applied by candidate
* Date_of_creation : 06-March-2013
*/
//session_start();
       
ini_set("display_errors","1");
        
if( (!isset($_SESSION['userInfo']['userType'])) || ($_SESSION['userInfo']['userType'] != '3')) {
    echo 'Sorry, but you don\'t have permission to view this page!';
    exit();
}

if(!isset($arrData) || empty($arrData)) {
	echo "Not applied for any job yet...";
	die();
}
        
//require_once('../../../languages/lang.en.php');
?>
<?php echo "Job Applied"; //echo $_SESSION['authuser']; ?>
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
										                          
								    <li>Job Id : <?php echo $value['job_id']; ?><br/>
										Designation : <?php echo $value['designation']; ?><br/>
										Offered Salary : <?php echo $value['offered_salary']; ?><br/>
									    Result : <?php echo $value['select_status']; ?><br/>
                                        Submission Date : <?php echo $value['submission_date']; ?><br/>
									    Last Submission Date : <?php echo $value['last_submission_date']; ?></li>
					

				
										<?php 
										} ?>
										
				</ui>
	</div>

			 
	</body>
</html>