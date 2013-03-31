<?php
/**
 * Filename : candidate.php
* Authour : Pankaj Kumar Yadav
* Description : fetch data for candidates.
* Date_of_creation : 18-March-2013
*/

ini_set("display_errors","1");
//include_once('cxpdo.php');

class candidateModel
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
	
	function changePassword($fields)
	{
// 		$id = $fields['canidateId'];
// 		$newPassword = $fields['newPassword'];
// 		$oldPassword = $fields
		//$email = $fields['email_id'];
		
		
		$checkRecord = array('columns' => array('user_id'), 'tables' => 'candidates', 'conditions' => array('id' => $fields['canidateId']));
		
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
	
	function saveCandidateProfile($fields)
	{
		$data = array (
				'first_name' => $fields['firstName'],
				'middle_name' => $fields['middleName'],
				'last_name' => $fields['lastName'],
				'dob' => $fields['dob'],
				'permanent_address' => $fields['permanentAddress'],
				'permanent_city' => $fields['permanentCity'],
				'permanent_state' => $fields['permanentState'],
				'permanent_pin' => $fields['permanentPin'],
				'temporary_address' => $fields['temporaryAddress'],
				'temporary_city' => $fields['temporaryCity'],
				'temporary_state' => $fields['temporaryState'],
				'temporary_pin' => $fields['temporaryPin'],
				'gender' => $fields['gender'],
				'mobile_number' => $fields['moblileNumber'],
				'emergency_number' => $fields['emergencyNumber'],
				'marital_status' => $fields['marital_status'],
				'other_course' => $fields['otherCourse'],
				'other_course_percentage' => $fields['otherPercentage'],
				'10th_percent' => $fields['highSchoolPercentage'],
				'10th_course' => $fields['highSchoolCourse'],
				'12th_percent' => $fields['secondarySchoolPercentage'],
				'12th_course' => $fields['secondarySchoolCourse'],
				'grad_percent' => $fields['graduationPercentage'],
				'grad_course' => $fields['graduationCourse'],
				'post_grad_percent' => $fields['postGraduationPercentage'],
				'post_grad_course' => $fields['postGraduationCourse'],				
				'experience' => $fields['experience'] 
				
		);
		
		$where = array('id' => $fields['id']);
		
		$result = $this->db->update('candidates', $data, $where);
				
		if ($result) {
			return true;
 		} else {
			return false;
 		}
			
	}
	
	
	function fetchJobApplied($candidateId)
	{
// 		$data = array(
// 					'columns'=>array(
// 						'job_id',
// 						'submission_date',
// 						'select_status',
// 					),
					
// 					'tables'=>'job_candidate',
					
// 					'conditions'=>array('candidate_id'=>"$candidateId")
// 			);
// 			$result = $this->db->select($data);
// 			return $result;
			
			
			$response = array();
			$data['columns'] = array('job_candidate.job_id','job_candidate.submission_date','job_candidate.select_status','job_details.designation','job_details.offered_salary','job_details.last_submission_date');
			$data['tables'] = 'job_candidate';
			$data['joins'][] = array(
					'table' => 'job_details',
					'type'	=> '',
					'conditions' => array('job_candidate.job_id' => 'job_details.id'));
			$data['conditions'] = array('job_candidate.candidate_id'=> $candidateId);
				
			$result = $this->db->select($data);
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$response[] = $row;
			}
				
			return $response;
				
	}
	
	function fetchCandidateDetails($candidateId)
	{
		$response = array();
		$data = array(
					'columns'=>array(
							'first_name',
							'middle_name',
							'last_name',
							'dob',
							'permanent_address',
							'permanent_city',
							'permanent_state',
							'permanent_pin',
							'temporary_address',
							'temporary_city',
							'temporary_state',
							'temporary_pin',
							'gender',
							'mobile_number',
							'emergency_number',
							'marital_status',
							'other_course',
							'other_course_percentage',
							'resume',
							'photo',
							'select_status',
							'10th_percent',
							'10th_course',
							'12th_percent',
							'12th_course',
							'grad_percent',
							'grad_course',
							'post_grad_percent',
							'post_grad_course',
							'experience'
							
					),
					'tables'=>'candidates',
					
					'conditions'=>array('id' => $candidateId)
			);
		
		$result = $this->db->select($data);
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$response[] = $row;
		}
		
		return $response;
			
	}
	
	function fetchNewJob($candidateId)
	{
		$response = array();
		$jobData = array(
					'columns'=>array('job_id'),
				
					'tables'=>'job_candidate',
					
					'conditions'=>array('candidate_id' => $candidateId)
			);
		
		$result = $this->db->select($jobData);
		
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$response[] = $row;
		}
		
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
					
					'conditions'=>array('id'=>"$jobId")
			);
			$result = $this->db->select($data);
		print_r($response);
		die();
		
		return $response; 
		
	}
}
	
?>
