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
<h1> <?php echo "Job Applied"; //echo $_SESSION['authuser']; ?></h1>
<html>
	<head>
	<style type="text/css" title="currentStyle">
            
            @import "media/css/demo_table.css";
            
        </style>
        <link rel="stylesheet" type="text/css" href="layout.css" />
        <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>

        <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#shubh').dataTable();
            } );
        </script>
	</head>
	
	<body>
		
		<table width="100%" border="1" cellpadding="0" cellspacing="0" id="shubh" class="display" >
<thead>
  <tr>
					
                                           
                                        <td align="center">JOb Id</td>
										<td align="center">Designation</td>
										<td align="center">Offered Salary</td>
										<td align="center">Result</td>
										<td align="center">Submission Date</td>
                                        <td align="center">Last Submission Date</td>
                                        
                                        </tr>
										 
  										</thead>
  										<tbody>
                                        <?php 
										
										foreach($arrData as $value){ ?>
										                          
								        <tr>
                                        <td align="right"><?php echo $value['job_id']; ?></td>
										<td><?php echo $value['designation']; ?></td>
										<td align="right"><?php echo $value['offered_salary']; ?></td>
									    <td><?php echo $value['select_status']; ?></td>
                                        <td><?php echo $value['submission_date']; ?></td>
									    <td><?php echo $value['last_submission_date']; ?></td>
									    
                                        </tr>
										<?php 
										} ?>
										
										</tbody>
										</table>
			 
	</body>
</html>