<?php
/**
* Filename : search_candidate.php
* Authour : Pankaj Kumar Yadav
* Description : allow admin to search candidate and fix interviews/tests.
* Date_of_creation : 06-March-2013
*/
       /* session_start();
        
        ini_set("display_errors","1");
        
        if( (!isset($_SESSION['authuser'])) || ($_SESSION['authuser'] != 1)) {
            echo 'Sorry, but you don\'t have permission to view this page!';
            exit();
        }
        
	require_once('../../../languages/lang.en.php');*/
	echo 'candidate search';
?>
<html>
	<head>
		
	</head>
	
	<body>
		<form>
			<table>
				<tr>
					<td><?php echo CANDIDATE_ID; ?></td>
					<td><input type = "text" id = "candidateId" name = "candidateId" /></td>
				</tr>
				
				<tr>
					<td><?php echo JOB_ID; ?></td>
					<td><input type = "text" id = "jobId" name = "jobId" /></td>
				</tr>
				
			</table>
		</form>
	</body>
	
</html>