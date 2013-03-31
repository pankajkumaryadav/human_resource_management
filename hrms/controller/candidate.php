<?php
/**
* Filename : candidate_controller.php
* Authour : Pankaj Kumar Yadav
* Description : control various request by the candidate.
* Date_of_creation : 06-March-2013
*/
ini_set("display_errors","1");
/*session_start();

if (isset($_REQUEST['request'])) {
    
    if ($_REQUEST['request'] == "profile") {
        
        header("Location:../view/candidate_profile.php");
    
    } else if($_REQUEST['request'] == "jobApplied") {
    
        header("Location:../view/candidate_job_applied.php");
    
    } else if($_REQUEST['request'] == "accountSettings") {
    
        header("Location:../view/candidate_settings.php");
    }
    
}

    
?>*/

class candidateController
{
	function __construct() 
	{
	
	}
	
	function requestHandler()
	{	loadView('header.php');
		//print_r($_SERVER['REQUEST_URI']); die();
		if(isset($_REQUEST['requestedPage'])) {
	
			if($_REQUEST['requestedPage'] == 'jobApplied') {
	
				$data = loadModel('candidate', 'fetchJobApplied', $_SESSION['userInfo']['userId']);
// 				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				
// 					print_r($row);
				
// 				}
				require_once SITE_ROOT . 'controller/codemaster.php';
				
				$codemasterControllerObj = new codemasterController();
				
				foreach ($data as $key => $value) {
					foreach ($value as $innerKey => $innerValue) {
				
						if($innerKey == 'designation') {
							$result = $codemasterControllerObj->getCodeValueById($innerValue);
				
							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								$designation = $row['code_value'];
							}
							$data[$key][$innerKey] = $designation;
						}
						
						if($innerKey == 'select_status') {
							$result = $codemasterControllerObj->getCodeValueById($innerValue);
						
							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								$designation = $row['code_value'];
							}
							$data[$key][$innerKey] = $designation;
						}
					}
				}
						
				loadView('candidate_job_applied.php',$data);
					
			} else if($_REQUEST['requestedPage'] == 'profile') {
				
				$formData = array();
				$data = loadModel('candidate','fetchCandidateDetails',$_SESSION['userInfo']['userId']);
				
				require_once SITE_ROOT . 'controller/codemaster.php';
				$codemasterControllerObj = new codemasterController();
				
				foreach ($data as $key => $value) {
					foreach ($value as $innerKey => $innerValue) {
				
						if($innerKey == 'gender') {
							$result = $codemasterControllerObj->getCodeValueById($innerValue);
				
							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								$designation = $row['code_value'];
							}
							$data[$key][$innerKey] = $designation;
						}
				
						if($innerKey == 'marital_status') {
							$result = $codemasterControllerObj->getCodeValueById($innerValue);
				
							while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
								$designation = $row['code_value'];
							}
							$data[$key][$innerKey] = $designation;
						}
					}
				}
				$formData = array();
				$gender = $codemasterControllerObj->getCodeValue('gender');
				
				while ($row = $gender->fetch(PDO::FETCH_ASSOC)) {
					$data['gender'][]=$row['code_value'];
				}
				
				$marital_status = $codemasterControllerObj->getCodeValue('marital_status');
				
				while ($row = $marital_status->fetch(PDO::FETCH_ASSOC)) {
					$data['marital_status'][]=$row['code_value'];
				
				}
// 				$data['formdata'] = $formData;
				 
// 				print_r($data);
// 				die("abc");
				loadView('candidate_profile.php',$data);
				
				
// 				$gender = $codemasterControllerObj->getCodeValue('gender');
// 				while ($row = $gender->fetch(PDO::FETCH_ASSOC)) {
				
// 					$formData['gender'][]=$row['code_value'];
				
// 				}
				
// 				$marital_status = $codemasterControllerObj->getCodeValue('marital_status');
				
// 				while ($row = $marital_status->fetch(PDO::FETCH_ASSOC)) {
				
// 					$formData['marital_status'][]=$row['code_value'];
				
// 				}
// 				loadView('candidate_profile.php',$formData);
					
			} else if($_REQUEST['requestedPage'] == 'accountSettings') {
	
				loadView('candidate_settings.php');
					
			}
	
		}
		
	}
	
	function saveCandidateProfile()
	{	loadView('header.php');
		include SITE_ROOT . 'controller/codemaster.php';
		$codemasterControllerObj = new codemasterController();
		
		$gender = $codemasterControllerObj->getCodeId($_REQUEST['gender']);
		
		while ($row = $gender->fetch(PDO::FETCH_ASSOC)) {
			 
			$_REQUEST['gender'] = $row['id'];
			 
		}
		
		$maritalStatus = $codemasterControllerObj->getCodeId($_REQUEST['marital_status']);
		
		while ($row = $maritalStatus->fetch(PDO::FETCH_ASSOC)) {
		
			$_REQUEST['marital_status'] = $row['id'];
		
		}
		
		$_REQUEST['id'] = $_SESSION['userInfo']['userId'];
				
		$result = loadModel('candidate','saveCandidateProfile',$_REQUEST);
		
		if($result) {
			echo "Profile updated successfully.";
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
		$fields['canidateId'] = $_SESSION['userInfo']['userId'];
		//print_r($fields);
		$result = loadModel('candidate', 'changePassword', $fields);
		if ($result) {
			echo "Password Changed Successfully.";
		} else {
			echo "Something went wrong. Try again...";
		}
		//echo "in change password controller";		
	}
	
	function fetchNewJob()
	{
		$data = loadModel('candidate', 'fetchNewJob',$_SESSION['userInfo']['userId']);
	}
	
	function fetchAllJobs()
	{
		$data = loadModel('candidate', 'fetchAllJobs');
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
		//loadView('header.php');
		loadView('career.php',$data);
		
	}
	
}