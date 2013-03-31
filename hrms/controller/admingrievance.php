<?php
/**
* Filename : grievancecontroller.php
* Authour : Jasleen Kaur
* Description : control different view according to user type.
* Date_of_creation : 05-March-2013
*/
	
class admingrievanceController{
	public function __construct() {

  	}

	public function admingrievancePage(){
		loadView('header.php');
		$arrvalue=loadModel('admingrievance','adminshowGrievance');
	    loadView('admingrievance.php',$arrvalue);
	}
		
	public function adminresolvedPage(){
		loadView('header.php');
		$arrvalue=loadModel('admingrievance','adminresolvedGrievance');
		loadView('adminresolved.php',$arrvalue);
	}
		
	public function adminunresolvedPage(){
		loadView('header.php');
		$arrvalue=loadModel('admingrievance','adminunresolvedGrievance');
		loadView('adminunresolved.php',$arrvalue);
	}
		
	public function adminsearchGrievance(){
		loadView('header.php');
		loadView('adminsearchGrievance.php');
	}
		
	public function adminfindGrievance(){
			loadView('header.php');
			$gdetail[0]= $_POST['gnumber'];
		    $arrvalue=loadModel('admingrievance','adminsearchGrievance',$gdetail);
		    loadView('adminsearchResult.php',$arrvalue);
		
	}
	
	public function adminInsertResponse(){
		$arrInsert=array();
		if(isset($_POST['response'])){
			$arrInsert['response']= strip_tags(mysql_real_escape_string($_POST['response']));
		}
		else{
			if(isset($_POST['department']))
				$arrInsert['department']=$_POST['department'];
		}
			$arrInsert['id']=$_SESSION['id'];
			$arrInsert['olddept']=$_SESSION['olddept'];
			$msg=loadModel('admingrievance','adminInsertResponse',$arrInsert);
			echo $msg;
	}
		
		public function adminSubmitResponse(){
			loadView('header.php');
			$gno=$_REQUEST['id'];
			$arrvalue=loadModel('admingrievance','adminSubmitResponse',$gno);
			loadView('adminSubmitResponse.php',$arrvalue);
		}

 }
?>
