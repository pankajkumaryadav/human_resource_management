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
					
					'conditions'=>array('id'=>"$jobId")
			);
			$result = $this->db->select($data);
			if ($result->rowCount() == 0) {
				echo "No Job found.";
				die();
			} else {
				return $result;
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
			return $result;
			
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
}
?>