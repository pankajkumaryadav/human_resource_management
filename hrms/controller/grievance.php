<?php
/**
* Filename : grievancecontroller.php
* Authour : Jasleen Kaur
* Description : control different view according to user type.
* Date_of_creation : 05-March-2013
*/
class grievanceController{
      
	public function __construct() {
	}

	public function grievancePage(){
		loadView('header.php');
		$user_id=$_SESSION['userInfo']['userId'];
		//$user_id=2;
	    $arrvalue=loadModel('grievance','showGrievance',$user_id);
	    loadView('grievance.php',$arrvalue);
	}
		
	public function resolvedPage(){
		loadView('header.php');
		$user_id=$_SESSION['userInfo']['userId'];
		//$user_id=2;
	    $arrvalue=loadModel('grievance','resolvedGrievance',$user_id);
		loadView('resolved.php',$arrvalue);
	}
		
	public function unresolvedPage(){
		loadView('header.php');
		$user_id=$_SESSION['userInfo']['userId'];
		//$user_id=2;
	    $arrvalue=loadModel('grievance','unresolvedGrievance',$user_id);
	    loadView('unresolved.php',$arrvalue);
	}
		
	public function searchGrievance(){
		loadView('header.php');
		loadView('searchGrievance.php');
	}
		
	public function findGrievance(){
			loadView('header.php');
			$gdetail[0]=$_POST['gnumber'];
			//$user_id=2;
			$user_id=$_SESSION['userInfo']['userId'];
			$gdetail[1]=$user_id;
		    $arrvalue=loadModel('grievance','searchGrievance',$gdetail);
		    loadView('searchResult.php',$arrvalue);
		
	}
		
	public function launchGrievance(){
		loadView('header.php');
		$arrvalue=loadModel('grievance','launchGrievance');
		loadView('launchGrievance.php',$arrvalue);
	}
		
	public function insertGrievance(){
		loadView('header.php');
		$user_id=$_SESSION['userInfo']['userId'];
		$arrInsert=array();
		$arrInsert[0]=$_POST['category'];
		$arrInsert[1]=strip_tags(mysql_real_escape_string($_POST['grievance']));
		$arrInsert[2]=$user_id;
		$arrvalue=loadModel('grievance','insertGrievance',$arrInsert);
	}

 }
?>
