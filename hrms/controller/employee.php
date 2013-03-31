<?php

session_start();
session_destroy();

$_SESSION['userInfo']['userId'] = "2";
$_SESSION['userInfo']['user_type'] = "2";


//echo '<pre>';
//print_r($_SESSION);

ini_set("display_errors", "1");

class employeeController {

    function __construct() {
        
    }

    public function display() {
        loadView('header.php');
        loadView('employeehr.php');
    }

    public function deleteEmp() {
        $nUserId = $_POST["userId"];
		$arr = array();
		$arr["emp_id"] = $_POST["empId"];
		$arr["user_id"] = $_POST["userId"];
        $arrValue = loadModel('employee', 'empDelete', $arr);
    }

    public function listing() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'showDatabaseListing');
        // loadView('newtest.php',$arrValue);
        loadView('show.php', $arrValue);
    }

    public function findEmployee() {
        //echo "find employee";
//echo " hello m here";
        //loadView('showdb.php');
        $id = $_GET['id'];
        echo $id;
        $arrArgument = array('id' => $id);
        $arrValue = loadModel('employee', 'employeeDetails', $arrArgument);
        loadView('employeesearchResult.php', $arrValue);
        //loadView('footer.php');
    }

    public function findupdateEmployee() {
        echo "find employee to update";
        //loadView('showdb.php');
        $id = $_GET['id'];
        $arrArgument = array('id' => $id);
        $arrValue = loadModel('employee', 'employeeupdateDetails', $arrArgument);
        loadView('employeesearchupdateResult.php', $arrValue);
        //loadView('footer.php');
    }

   
    public function addEmployee() {
        loadView('header.php');
        loadView('add_emp.php');
    }

    public function addEmployee1() {
        //echo "vsahdha";
        loadView('header.php');
       // echo '<pre>';
       //  print_r($_POST);die;
        $first_name = $_POST['first_name'];

        $data[] = array(
            'first_name' => $_POST['first_name'],
            'middle_name' => $_POST['middle_name'],
            'dob' => $this->fncConvertDate($_POST['dob']),
            'department_id' => $_POST['department_id'],
            'last_name' => $_POST['last_name'],
            'permanent_address' => $_POST['permanent_address'],
            'permanent_city' => $_POST['permant_city'],
            'permanent_state' => $_POST['permanent_state'],
            'permanent_pin' => $_POST['permanent_pin'],
            'temporary_address' => $_POST['temporary_address'],
            'temporary_city' => $_POST['temporary_city'],
            'temporary_state' => $_POST['temporary_state'],
            'temporary_pin' => $_POST['temporary_pin'],
            'gender' => $_POST['gender'],
            'mobile_number' => $_POST['mobile_number'],
            'emergency_number' => $_POST['emergency_number'],
            'marital_status' => $_POST['marital_status'],
            'recent_qualification' => $_POST['recent_qualification'],
            'salary' => $_POST['salary'],
            'department_id' => $_POST['department_id'],
            'hire_date' => $this->fncConvertDate($_POST['hire_date']),
            'termination_date' => $this->fncConvertDate($_POST['termination_date']),
            'account_number' => $_POST['account_number'],
            'designation' => $_POST['designation'],
            'email_id' => $_POST['email_id']
        );
       // echo '<pre>';
         //print_r($data);
        //die;
        $arrValue1 = loadModel('employee', 'fncSaveData', $data);
		header("Location: ".SITE_PATH."index.php?controller=employee&function=listing");
    }

    public function fncConvertDate($argDate="") {
//echo $argDate."<br>";
        if ($argDate == "")
            return false;
        list($dd, $mm, $yy) = explode("/", $argDate);
        $strFinal = $yy . "-" . $mm . "-" . $dd;
        return $strFinal;
    }

    public function deleteEmployee() {
        loadView('header.php');
        $id = $_GET['searchval1'];
//echo $id;die;
        $arrArgument = array('id' => $id);
        $arrValue = loadModel('employee', 'deleteEmployee', $arrArgument);
        loadView('deleteemp.php', $arrValue);
    }

    public function updateEmployeeaction() {
        //loadView('header.php');
        $id = $_GET['searchval1'];
        $arrArgument = array('id' => $id);
        $arrValue = loadModel('employee', 'updateEmployee', $arrArgument);
//      loadView('updateemp.php',$arrValue);
    }

    public function saveupdateEmployee() {

        $data[] = array(
            'id' => $_POST['id'],
            'first_name' => $_POST['first_name'],
            'middle_name' => $_POST['middle_name'],
                 'dob' => $this->fncConvertDate($_POST['dob']),
                  'department_id' => $_POST['department_id'],
                  'last_name' => $_POST['last_name'],
                  'permanent_address' => $_POST['permanent_address'],
                  'permanent_city' => $_POST['permanent_city'],
                  'permanent_state'=> $_POST['permanent_state'],
                  'permanent_pin' => $_POST['permanent_pin'],
                  'temporary_address'=> $_POST['temporary_address'],
                  'temporary_city' => $_POST['temporary_city'],
                  'temporary_state' => $_POST['temporary_state'],
                  'temporary_pin' => $_POST['temporary_pin'],
                  'gender' => $_POST['gender'],
                  'mobile_number' => $_POST['mobile_number'],
                  'emergency_number'=> $_POST['emergency_number'],
                  'marital_status' => $_POST['marital_status'],
                  'recent_qualification' => $_POST['recent_qualification'],
                  'salary' => $_POST['salary'],
                  'department_id' => $_POST['department_id'],
                  'hire_date' => $this->fncConvertDate($_POST['hire_date']),
                  'termination_date' => $this->fncConvertDate($_POST['termination_date']),
                  'account_number' => $_POST['account_number'],
                  'user_id' => $_POST['user_id'],
                  'designation'=> $_POST['designation'] 
        );
//echo '<pre>';
//print_r($data);
//die;
        $arrValue1 = loadModel('employee', 'fncUpdateEmployeeData', $data);
//        echo '<pre>';
//        print_r($_POST);
//        die;
    }

    public function deleteEmployeeaction() {
        //loadView('header.php');
        $id = $_GET['searchval1'];
        $arrArgument = array('id' => $id);
        $arrValue = loadModel('employee', 'deleteEmployee', $arrArgument);
//      loadView('deleteemp.php',$arrValue);
    }

    /* public function findEmployee(){
      if(isset($_POST['search'])){
      $gnumber=$_POST['Gno'];
      $arrvalue=loadModel('employee','searchEmploye',$gnumber);
      loadView('searchResult.php',$arrvalue);
      }
      }
     */

    public function updateEmployee() {
        $id = base64_decode($_REQUEST["id"]);
//die($id);
        loadView('header.php');

        $arrValue = loadModel('employee', 'employeeDetails', $id);

        loadView('updateemp.php', $arrValue);
    }

    public function searchEmployee() {
        loadView('header.php');
        loadView('searchEmployee.php');
    }

    public function searchdeleteEmployee() {
        loadView('header.php');
        loadView('deleteempid.php');
    }

    public function searchupdateEmployee() {
        loadView('header.php');
        loadView('updateemp.php');
    }

    public function fetchEmpDetails() {
        loadView('header.php');
        $nId = base64_decode($_GET["id"]);

        $arrValue = loadModel('employee', 'employeeDetails', $nId);
        //print_r($arrValue);die;
        loadView('viewEmp.php', $arrValue);
    }

//employee leave hr
    public function myProfile() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'showMyProfile');
        // loadView('newtest.php',$arrValue);
        loadView('showleavehr.php', $arrValue);
    }

    public function displayleavehr() {
        loadView('header.php');
        loadView('empleavehr.php');
    }

    public function searchAppiledLeaves() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'showAppliedLeaves');
        // loadView('newtest.php',$arrValue);
        loadView('showappliedleaves.php', $arrValue);
    }

   /* public function acceptLeave() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'acceptLeave');
        // loadView('newtest.php',$arrValue);
        loadView('showappliedleaves.php', $arrValue);
    }*/

    public function acceptLeave1() {

        //loadView('header.php');
       // $id = 1; //$id=$_REQUEST['employee_id']; 
  	$id = ($_REQUEST["id"]);
       // echo $id;

        $arrArgument = array('id' => $id);
        $arrValue = loadModel('employee', 'acceptLeave1', $arrArgument);
        if ($arrValue) {
        	echo "Accepted.";
        } else {
        	echo "Nothing Done";
        }
        
        //loadView('showappliedleaves.php', $arrValue);
    }

    public function denyLeave() {
      
       // loadView('header.php');
       // $id = 2; //$id=$_REQUEST['employee_id']; 
        //echo $id;
        $id = ($_REQUEST["id"]);
        $arrArgument = array('id' => $id);
        $arrValue = loadModel('employee', 'denyLeave', $arrArgument);
        if ($arrValue) {
        	echo ("Leave Denined");
        } else {
        	echo ("Nothing Done");
        }
        //loadView('showappliedleaves.php', $arrValue);
    }

    public function searchAcceptedLeaves() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'searchAcceptedLeaves');
        // loadView('newtest.php',$arrValue);
        loadView('showacceptedleaves.php', $arrValue);
    }

    public function searchDeninedLeaves() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'searchDeninedLeaves');
        // loadView('newtest.php',$arrValue);
        loadView('showdeninedleaves.php', $arrValue);
    }
    public function viewLeavesDue() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'viewLeavesDue');
        // loadView('newtest.php',$arrValue);
        loadView('showdeninedleaves.php', $arrValue);
    }

// leave application
    public function displayemp() {
        loadView('header.php');
        loadView('showleaveemp.php');
    }

    public function status() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'status');
        // loadView('newtest.php',$arrValue);
        loadView('status.php', $arrValue);
    }

    public function empProfile() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'empProfile');
        // loadView('newtest.php',$arrValue);
        loadView('showleaveemp.php', $arrValue);
    }

    public function searchData() {
        $arrValues = array();

        if (isset($_POST["searchVal"]) && $_POST["searchVal"] != "") {

            $arrValues["id"] = $_POST["searchVal"];
            $arrValues["stype"] = $_POST["stype"];
        }
        $arrValue = loadModel('employee', 'fetchUsers', $arrValues);
        loadView('test1.php', $arrValue);
    }
    
   public function remainingleaves() {
        //echo "hello";
        loadView('header.php');
        $arrValue = loadModel('employee', 'remainingleaves');
        // loadView('newtest.php',$arrValue);
        loadView('reminingleaves.php', $arrValue);
    }
public function empapplyLeave(){
		
		loadView('leavesappliedform.php');

	}

public function submitLeave() {
	
	$data[] = array(
            'leave_category' => $_POST['leave_category'],
            'reason' => $_POST['reason'],
            'date_from' => $this->fncConvertDate($_POST['date_from']),
            'till_date' => $this->fncConvertDate($_POST['till_date']),
            'total_hours' => $_POST['total_hours'],
		'applied_date' => date('Y-m-d'),
		
            'employee_id' => $_SESSION['userInfo']['userId']
            
        );
        //echo '<pre>';
         //print_r($data);
       // die;
        $arrValue1 = loadModel('employee', 'submitLeave', $data);
		header("Location: ".SITE_PATH."index2.php?controller=employee&function=empProfile");
}
}

?>
