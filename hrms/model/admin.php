<?php
/**
 * Filename : admin.php
 * Authour : Pankaj Kumar Yadav
 * Description : handle admin request.
 * Date_of_creation : 18-March-2013
 */

ini_set("display_errors","1");
//include_once('cxpdo.php');

class adminModel
{
	function __construct()
	{
		$config = array();
		$config['user'] = 'root';
		$config['pass'] = 'root';
		$config['name'] = 'human_resource_management';
		$config['host'] = 'localhost';
		$config['type'] = 'mysql';
		$config['port'] = null;
		$config['persistent'] = true;
		
		$this->db = db::instance($config);
		
	}
	
	function fetchJobDetails($jobId = '')
	{
		$response = array();
		if ($jobId != '') {
			$data = array(
					'columns'=>array(
							'id',
							'designation',
							'no_of_vacancies',
							'criteria_10th',
							'criteria_12th',
							'criteria_grad',
							'criteria_post_grad',
							'offered_salary',
							'experience',
							'last_submission_date'
					),
					'tables'=>'job_details',
					
					'conditions'=>array('id'=>"$jobId",'status' => '0')
			);
			
			$result = $this->db->select($data);
			if ($result->rowCount() == 0) {
				return -1;
				
			} else {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$response[] = $row;
				}
				
				return $response;
				
			}
		
		} else {
			$data = array(
				'columns'=>array(
							'id',
							'designation',
							'no_of_vacancies',
							'criteria_10th',
							'criteria_12th',
							'criteria_grad',
							'criteria_post_grad',
							'offered_salary',
							'experience',
							'last_submission_date'
					),
					'tables'=>'job_details',
					'conditions'=>array('status'=>'0')
			);
			$result = $this->db->select($data);
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$response[] = $row;
				}
				
		return $response;
			
		}
		
		
	}
	
	function postJob($fields)
	{
		$data[] = array( 
				'designation' => $fields['designation'], 
				'no_of_vacancies' => $fields['noOfVacancies'],  
				'offered_salary' => $fields['offeredSalary'],  
				'experience' => $fields['experience'],  
				'last_submission_date' => $fields['lastSubmissionDate'],  
				'criteria_10th' => $fields['highSchoolPercentage'],  
				'criteria_12th' => $fields['secondarySchoolPercentage'],  
				'criteria_grad' => $fields['graduationPercentage'],  
				'criteria_post_grad' => $fields['postGraduationPercentage']
				
		);
		
		foreach ($data as $row) {
			$result = $this->db->insert('job_details', $row);
		}
		
		if ($result) {
			return true;			
		} else {
			return false;
		}
	}
	
	function changePassword($fields)
	{
		// 		$id = $fields['canidateId'];
		// 		$newPassword = $fields['newPassword'];
		// 		$oldPassword = $fields
		//$email = $fields['email_id'];
	
	
		$checkRecord = array('columns' => array('user_id'), 'tables' => 'employees', 'conditions' => array('id' => $fields['adminId']));
	
		$result = $this->db->select($checkRecord);
	
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
	
			$user_id = $row['user_id'];
	
		}
	
		$checkOldPassword = array('columns' => array('password'), 'tables' => 'users', 'conditions' => array('password' => $fields['oldPassword']));
		$result = $this->db->select($checkOldPassword);
		if ($result->rowCount() == 0) {
			return false;
		}
		$data = array('password' => "${fields['newPassword']}");
		$where = array('id' => "$user_id");
		$result = $this->db->update('users', $data, $where);
	
		if($result) {
			return true;
		} else {
			return false;
		}
	
	}
	
	function updateJob($fields)
	{
		$data = array (
				'no_of_vacancies' => $fields['noOfVacancies'],
				'criteria_10th' => $fields['highSchoolPercentage'],
				'criteria_12th' => $fields['secondarySchoolPercentage'],
				'offered_salary' => $fields['offeredSalary'],
				'criteria_grad' => $fields['graduationPercentage'],
				'criteria_post_grad' => $fields['postGraduationPercentage'],
				'experience' => $fields['experience'],
				'last_submission_date' => $fields['lastSubmissionDate'],
				
		);
		
		$where = array('id' => $fields['jobId']);
		
		$result = $this->db->update('job_details', $data, $where);
		
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	function deleteJob($fields)
	{
		$data = array (
				'status' => '1',
			);
		
		$where = array('id' => $fields['searchRequest']);
		
		$result = $this->db->update('job_details', $data, $where);
		
		if ($result) {
			return true;
		} else {
			return false;
		}
		
	}
	
	function searchCandidate($conditionArray)
	{
		$response = array();
// 		if (isset($conditionArray['candidate_id']) && ($conditionArray['candidate_id'] != '')) {
// 			$data = array(
// 					'columns'=>array(
// 							'first_name',
// 							'middle_name',
// 							'last_name',
			
// 					),
			
			
// 					'tables'=>'candidates',
// 					'conditions'=>array('id'=>"${conditionArray['candidate_id']}")
// 					);
// 			$result = $this->db->select($data);
// 			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
// 				$response[] = $row;
// 			}	
// 		}
// 		if (isset($conditionArray['job_id']) && ($conditionArray['job_id'] != '')) {
// 			$data = array(
// 					'columns'=>array(
// 							'designation',
														
// 					),
						
						
// 					'tables'=>'job_details',
// 					'conditions'=>array('id'=>"${conditionArray['job_id']}")
// 					);
// 			$result = $this->db->select($data);
// 			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
// 				$response[] = $row;
// 			}
// 		}
		
		$data = array(
				'columns'=>array(
						'id',
						'job_id',
						'candidate_id',
						'select_status',
						'submission_date'
				),
				
				'tables'=>'job_candidate',
				'conditions'=>$conditionArray//array('status'=>'0')
		);
		$result = $this->db->select($data);
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$response[] = $row;
		}
		
		//foreach ($response as $key => $value) {
// 			foreach ($response as $innerKey => $innerValue) {
// 				if ($innerKey == 'candidate_id') {
// 					$data = array(
// 							'columns'=>array(
// 								'first_name',
// 								'middle_name',
// 								'last_name',
// 						),
								
// 						'tables'=>'candidates',
// 						'conditions'=>array('id'=>"$innerValue")
// 					);
// 				$result = $this->db->select($data);
// 				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
// 					$response[$key][] = $row;
// 				}					
// 				}
// 			}
		//}
		
		
		return $response;
		 
	}
	function updateCandidateStatus($fields)
	{
		$data = array (
				'select_status' => $fields['status'],
			);
		
		$where = array('id' => $fields['searchRequest']);
		
		$result = $this->db->update('job_candidate', $data, $where);
		
		if ($result) {
			return true;
		} else {
			return false;
		}		 
	}
}
?>