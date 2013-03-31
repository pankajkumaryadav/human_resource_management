<?php
/**
* Filename : login_class.php
* Authour : Pankaj Kumar Yadav
* Description : authenticate users of application.
* Date_of_creation : 05-March-2013
*/

//session_start();
ini_set("display_errors","1");
//include_once('cxpdo.php');
    
class loginModel
{
	private $_username;
	private $_password;
	protected $_dbConnect;
	
	public function __construct()
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
		
	public function setusername($username)
	{
		$this->_username = $username;
	}
		
	public function setpassword($password)
	{
		$this->_password = $password;
	}
		
	function authenticateUser($loginInput)
	{
		$_SESSION['userInfo'] = array();
		
		$data = array('columns'=>array('id','user_type'),'tables'=>'users','conditions'=>array('email_id'=>"$loginInput[0]",'password'=>"$loginInput[1]",'status'=>'0'));
		$result = $this->db->select($data);
		if($result->rowCount() == 0) {
			return -1;			
		}
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$_SESSION['userInfo']['userType'] = $row['user_type'];
			
		if (($row['user_type'] == '2') || ($row['user_type'] == '1')) {

			$data = array('columns'=>array('id'),'tables'=>'employees','conditions'=>array('user_id'=>"$row[id]"));
			$result = $this->db->select($data);
			$row = $result->fetch(PDO::FETCH_ASSOC);
			$_SESSION['userInfo']['userId'] = $row['id'];
			
		} else if ($row['user_type'] == '3') {
				
			$data = array('columns'=>array('id'),'tables'=>'candidates','conditions'=>array('user_id'=>"$row[id]"));
			$result = $this->db->select($data);
			$row = $result->fetch(PDO::FETCH_ASSOC);
			$_SESSION['userInfo']['userId'] = $row['id'];
		}
			
	}
	
	function saveRegistrationDetails($fields)
	{
		$email = $fields['email_id'];
	
		
		$checkRecord = array('columns' => array('email_id'), 'tables' => 'users', 'conditions' => array('email_id' => "$email"));
		
		$result = $this->db->select($checkRecord);
		
		if ($result->rowCount() == 1) {
			echo "Email already in use <br/>";
		} else {
			echo "Welcome <br/>";
			
			$data[] = array(
					'email_id' => $fields['email_id'],
					'password' => $fields['password'],
			
				);
			
			foreach ($data as $row) {
				$result = $this->db->insert('users', $row);
			}
			
			if ($result) {
				echo "Check ur mail for authentication.<br/>";
			} else {
				echo "Something went wrong try again...<br/>";
			}
				
		
		}
	}
}

?>



