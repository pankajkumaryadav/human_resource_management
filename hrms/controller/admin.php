<?php
/**
 * Filename : admin.php
 * Authour : Pankaj Kumar Yadav
 * Description : handle admin request.
 * Date_of_creation : 18-March-2013
 */

ini_set("display_errors","1");
       /* session_start();
        
        ini_set("display_errors","1");
        
        if($_SESSION['authuser'] != 1) {
            echo 'Sorry, but you don\'t have permission to view this page!';
            exit();
        }
        
	require_once('../../../languages/lang.en.php');
if (isset($_REQUEST['request'])) {
    
    if ($_REQUEST['request'] == "postJob") {
        
        header("Location:../view/job_post.php");
    
    } else if($_REQUEST['request'] == "SearchCandidate") {
    
        header("Location:../view/search_candidate.php");
    
    } else if($_REQUEST['request'] == "accountSettings") {
    
        header("Location:../view/admin_settings.php");
    }
    
}*/

class adminController
{
	function __construct() 
	{

   	}

   function requestHandler()
   {	loadView('header.php');
       
   		if (isset($_REQUEST['requestedPage'])) {
		
			if ($_REQUEST['requestedPage'] == 'postJob') {
				$formData = array();
				require_once SITE_ROOT . 'controller/codemaster.php';
				$codemasterControllerObj = new codemasterController();
				$designation = $codemasterControllerObj->getCodeValue('designation');
				
				while ($row = $designation->fetch(PDO::FETCH_ASSOC)) {
				
					$formData['designation'][]=$row['code_value'];
				
				}
				
				loadView('job_post.php',$formData);
			
			} else if ($_REQUEST['requestedPage'] == 'SearchCandidate') {
				
				$data = loadModel('admin', 'searchCandidate','');
				
			require_once SITE_ROOT . 'controller/codemaster.php';
   		
   		$codemasterControllerObj = new codemasterController();
   		
   		foreach ($data as $key => $value) {
   			foreach ($value as $innerKey => $innerValue) {
   		
   					if($innerKey == 'select_status') {
   					$result = $codemasterControllerObj->getCodeValueById($innerValue);
   		
   					while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   						$status = $row['code_value'];
   					}
   					$data[$key][$innerKey] = $status;
   				}
   			}
   		}
   		
   		$result = $codemasterControllerObj->getCodeValue('select_status');
   		 
   		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   			$data['status'][] = $row['code_value'];
   		}
				
				loadView('search_candidate.php',$data);
			
			} else if ($_REQUEST['requestedPage'] == 'accountSettings') {
		
				loadView('admin_settings.php');
			
			} else if ($_REQUEST['requestedPage'] == 'viewJob') {
				
				$data = loadModel('admin', 'fetchJobDetails','');
				
				require_once SITE_ROOT . 'controller/codemaster.php';
                
                $codemasterControllerObj = new codemasterController();
                
                foreach ($data as $key => $value) {
                	foreach ($value as $innerKey => $innerValue) {
						
                		if($innerKey == 'designation') {
							$result = $codemasterControllerObj->getCodeValueById($innerValue);
						
							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								$designation= $row['code_value'];
							}
							$data[$key][$innerKey] = $designation;
                		}
                	}
	            }
	           
                loadView('admin_view_job.php',$data);
     		}
		
		}
     
   	}
   	
   	function fetchJobDetails()
   	{
   		loadView('header.php');
   		
   		if (isset($_REQUEST['searchRequest'])) {
   			$jobId = $_REQUEST['searchRequest'];
   			$data = loadModel('admin', 'fetchJobDetails',$jobId);
 			if ($data == -1) {
 				echo "No Job Found";
 			} else {
   				require_once SITE_ROOT . 'controller/codemaster.php';
   			
   				$codemasterControllerObj = new codemasterController();
   			
   				foreach ($data as $key => $value) {
   					foreach ($value as $innerKey => $innerValue) {
   			
   						if($innerKey == 'designation') {
   							$result = $codemasterControllerObj->getCodeValueById($innerValue);
   			
   							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   								$designation= $row['code_value'];
   							}
   						$data[$key][$innerKey] = $designation;
   						}
   					}
   				}
   				loadView('admin_search_result.php',$data);
 			}
   		
   		} 
	}
   	

   	
   	function postJob()
   	{	loadView('header.php');
   		include SITE_ROOT . 'controller/codemaster.php';
   		$codemasterControllerObj = new codemasterController();
  		$id = $codemasterControllerObj->getCodeId($_REQUEST['designation']);
   		while ($row = $id->fetch(PDO::FETCH_ASSOC)) {
   		
   			$_REQUEST['designation'] = $row['id'];
   		
   		}
   		
   		$result = loadmodel('admin','postJob',$_REQUEST);
   		if ($result) {
   			echo "Job posted Successfully.";
   		} else {
   			echo "Something went wrong. Try again...";
   		}
   	}
   	
   	function changePassword()
   	{	loadView('header.php');
   		if ($_REQUEST['newPassword'] != $_REQUEST['confirmPassword']) {
   			echo "Password does't match";
   			return;
   		}
   		$fields['oldPassword'] = $_REQUEST['oldPassword'];
   		$fields['newPassword'] = $_REQUEST['newPassword'];
   		$fields['adminId'] = $_SESSION['userInfo']['userId'];
   		//print_r($fields);
   		$result = loadModel('admin', 'changePassword', $fields);
   		if ($result) {
   			echo "Password Changed Successfully.";
   		} else {
   			echo "Something went wrong. Try again...";
   		}
   		//echo "in change password controller";
   	}
   	
   	function editJob()
   	{
   		loadView('header.php');
   	if (isset($_REQUEST['searchRequest'])) {
   			$jobId = $_REQUEST['searchRequest'];
   			$data = loadModel('admin', 'fetchJobDetails',$jobId);
 			if ($data == -1) {
 				echo "No Job Found";
 			} else {
   				require_once SITE_ROOT . 'controller/codemaster.php';
   			
   				$codemasterControllerObj = new codemasterController();
   			
   				foreach ($data as $key => $value) {
   					foreach ($value as $innerKey => $innerValue) {
   			
   						if($innerKey == 'designation') {
   							$result = $codemasterControllerObj->getCodeValueById($innerValue);
   			
   							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   								$designation= $row['code_value'];
   							}
   						$data[$key][$innerKey] = $designation;
   						}
   					}
   				}
   				loadView('admin_edit_job.php',$data);
 			}
   		} 
   		
   	}
   	
   	function updateJob()
   	{
   		loadView('header.php');
   		$result = loadModel('admin', 'updateJob',$_REQUEST);
   		if ($result) {
   			echo "update successfully.";
   		} else {
   			echo "Something went wrong. Try again...";
   		}
   	}
   	
   	function deleteJob()
   	{
   		loadView('header.php');
   		$result = loadModel('admin', 'DeleteJob',$_REQUEST);
   		if ($result) {
   			echo "Delete successfully.";
   		} else {
   			echo "Something went wrong. Try again...";
   		}
   	}
   	
   	function searchCandidate()
   	{
   		loadView('header.php');
   		//print_r($_REQUEST);
   		$conditionArray = array();
   		if (isset($_REQUEST['jobId']) && ($_REQUEST['jobId'] != '')) {
   			$conditionArray['job_id'] =  $_REQUEST['jobId'];
   		}
   		
   		if (isset($_REQUEST['candidateId']) && ($_REQUEST['candidateId'] != '')) {
   			$conditionArray['candidate_id'] =  $_REQUEST['candidateId'];
   		}
   		
   		$data = loadModel('admin', 'searchCandidate',$conditionArray);
   		require_once SITE_ROOT . 'controller/codemaster.php';
   		
   		$codemasterControllerObj = new codemasterController();
   		
   		foreach ($data as $key => $value) {
   			foreach ($value as $innerKey => $innerValue) {
   		
   					if($innerKey == 'select_status') {
   					$result = $codemasterControllerObj->getCodeValueById($innerValue);
   		
   					while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   						$status = $row['code_value'];
   					}
   					$data[$key][$innerKey] = $status;
   				}
   			}
   		}
   		
   		$result = $codemasterControllerObj->getCodeValue('select_status');
   		 
   		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   			$data['status'][] = $row['code_value'];
   		}
//    		print_r($data);
//    		die();
   		loadView('candidate_search_result.php',$data);
   	}
   	
   	function updateCandidateStatus()
   	{
   		//print_r($_REQUEST);
   		require_once SITE_ROOT . 'controller/codemaster.php';
   		 
   		$codemasterControllerObj = new codemasterController();
   		 
   		$result = $codemasterControllerObj->getCodeId($_REQUEST['status']);
   					 
   		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
   			$_REQUEST['status'] = $row['id'];
   		}
//    		print_r($_REQUEST);
//    		die();
   		$result = loadModel('admin', 'updateCandidateStatus',$_REQUEST);
   		
   		if ($result) {
   			echo "Record updated successfully";
   		} else {
   			echo "Something went wrong. Try again...";
   		}
   		 
   		
   	
   	
	}
}
?>
