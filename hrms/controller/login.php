<?php
/**
* Filename : login_controller.php
* Authour : Pankaj Kumar Yadav
* Description : control different view according to user type.
* Date_of_creation : 05-March-2013
*/

//session_start();
ini_set("display_errors","1");

class loginController
{
	function __construct() 
	{
		
	}

   	function loginPage() 
   	{
		loadView('header.php');
   		loadView('login.php');
	}

	function authenticateUser() 
	{	$result='';
		loadView('header.php');
	
		if(isset($_REQUEST['email_id']) && isset($_REQUEST['password'])){
			$loginInput = array($_REQUEST['email_id'],$_REQUEST['password']);
			$result=loadModel('login','authenticateUser',$loginInput);
		}
		
		if ($result == -1) {
			$msg = "Invalid username or password.";
			loadView('login.php',$msg);	
		} else {
			if (isset($_SESSION['userInfo'])) {
		
				if (isset($_SESSION['userInfo']['userType']) && $_SESSION['userInfo']['userType'] == '1') {
			
					loadView('admin.php');
			
				} else if (isset($_SESSION['userInfo']['userType']) && $_SESSION['userInfo']['userType'] == '3') {
			
					loadView('candidate_home_page.php');
				
				} else if (isset($_SESSION['userInfo']['userType']) && $_SESSION['userInfo']['userType'] == '2') {
					
					loadView('showleaveemp.php');
				}
			}
		}
	}
		
		
	function registerCandidate()
	{	loadView('header.php');	
		loadView('register_candidate.php');
	}
	
	function saveRegistrationDetails()
	{	loadView('header.php');
		$fields['email_id'] = $_REQUEST['email'];
		$fields['password'] = $_REQUEST['password'];
		
		$result = loadModel('login', 'saveRegistrationDetails', $fields);
		if ($result) {
			loadView('abc.php');
		} else {
			echo "something went wrong"; 
		}

	}
	
	function logout()
	{	loadView('header.php');
		//echo "helleooeoekjhdsafkjhdfgsakhjdfgsakhj";
		session_destroy();
		loadView('login.php');
	}
}
	
?>
