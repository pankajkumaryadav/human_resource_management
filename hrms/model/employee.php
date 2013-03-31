<?php

ini_set("display_errors", "1");
//include SITE_ROOT.'pdolib/cxpdo.php';
// require_once(SITE_ROOT . 'pdolib/cxpdo.php');
// require_once(SITE_ROOT . 'pdolib/mysql.php');

class employeeModel {

    private $_username;
    private $_password;
    protected $_dbConnect;
    protected $dbconn;

    function __construct() {

        // 	$this->dbconn = db::instance($config);
        $config = array();
        $config['user'] = 'root';
        $config['pass'] = 'root'; 
        $config['name'] = 'human_resource_management';
        $config['host'] = 'localhost';
        $config['type'] = 'mysql';
        $config['port'] = null;
        $config['persistent'] = true;
        $this->_db = db::instance($config);

//        $mysql_db_hostname = "localhost";
//        $mysql_db_user = "root";
//        $mysql_db_password = "";
//        $mysql_db_database = "human_resource_management";
//        $con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
//        mysql_select_db($mysql_db_database, $con) or die("Could not select database");
    }

    public function empDelete($arrData=array()) {

        $data = array('status' => '1');
        $where = array('id' => $arrData["user_id"]);
        $result = $this->_db->update('users', $data, $where);

		$data = array('status' => '1');
        $where = array('id' => $arrData["emp_id"]);
        $result = $this->_db->update('employees', $data, $where);
        if ($result) {
            die("1");
        } else {
            die("0");
        }
    }

    public function showDatabaseListing() {


        $data = array('tables' => 'employees');
        $data['columns']	= array('employees.user_id','employees.last_name','employees.first_name','departments.department_name');
        $data['conditions']		= array('users.status' => '0');
        $data['joins'][] = array(
            'table' => 'users',
            'type' => 'left',
            'conditions' => array('employees.user_id' => 'users.id')
        );
   $data['joins'][] = array(
            'table' => 'departments',
            'type' => 'left',
            'conditions' => array('employees.department_id' => 'employees.department_id')
        );

        $result = $this->_db->select($data);
        //echo '<pre>';
        $arrFinal = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrFinal[] = $row;
        }
        return $arrFinal;
        /* 	print_r($arrFinal);
          die;

          //$query="select * from employees";
          $query= "SELECT * FROM employees AS T1, users AS T2 WHERE status='0' AND T1.user_id=T2.id";          $res=mysql_query($query);
          $checkData=mysql_num_rows($res);
          $arrProduct=array();
          if($checkData > 0){
          while($row=mysql_fetch_assoc($res)){
          $arrProduct[]=$row;
          }
          return $arrProduct;
          } */
    }

    /* function employeeDetails($arrArgument){
      $id=$arrArgument['id'];
      // $query="select * from employees where id='$id'";
      // $res=mysql_query($query);
      //$checkData=mysql_num_rows($res);
      //$arrProduct=array();
      //if($checkData > 0){
      //  $row=mysql_fetch_assoc($res);
      //$arrProduct[]=$row;
      //return $arrProduct;
      //}
      //else echo"no such employee"; */

    function employeeDetails($arrArgument) {
//die("i am here");
        $id = $arrArgument;
        $data = array('tables' => 'employees as emp');
        $data["columns"] = array("emp.user_id",
            "emp.id",
            "emp.last_name",
            "emp.first_name",
            "emp.middle_name",
            "date_format(emp.dob,'%d/%m/%Y') as empdob",
            "emp.permanent_address",
            "emp.permanent_city",
            "emp.permanent_state",
            "emp.permanent_pin",
            "emp.temporary_address",
            "emp.temporary_city",
            "emp.temporary_state",
            "emp.temporary_pin",
            "cm1.code_value as gend",
            "emp.mobile_number",
            "emp.emergency_number",
            "cm2.code_value as maritalstatus",
            "emp.recent_qualification",
            "emp.salary",
            "dept.department_name as deptname",
            "date_format(emp.hire_date,'%d/%m/%Y') as hiredate",
            "date_format(emp.termination_date,'%d/%m/%Y') as terminationdate",
            "date_format(emp.retire_date,'%d/%m/%Y') as retiredate",
            "emp.account_number",
            "cm2.code_value as desig",
            "usr.email_id",
            "usr.status",
            "emp.gender",
            "emp.department_id",
            "emp.designation",
            "emp.marital_status"
        );
		//echo $id;die;
        $data['conditions'] = array('emp.id' => $id);
        $data['joins'][] = array(
            'table' => 'users as usr',
            'type' => 'left',
            'conditions' => array('emp.user_id' => 'usr.id')
        );
        $data['joins'][] = array(
            'table' => 'code_master as cm1',
            'type' => 'left',
            'conditions' => array('emp.gender' => 'cm1.id')
        );
        $data['joins'][] = array(
            'table' => 'code_master as cm2',
            'type' => 'left',
            'conditions' => array('emp.designation' => 'cm2.id')
        );
        $data['joins'][] = array(
            'table' => 'code_master as cm3',
            'type' => 'left',
            'conditions' => array('emp.marital_status' => 'cm3.id')
        );
        $data['joins'][] = array(
            'table' => 'departments as dept',
            'type' => 'left',
            'conditions' => array('emp.department_id' => 'dept.id')
        );
       
        $result = $this->_db->select($data);
//        print_r($result);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
       
    }

//public  function employeeUpdate($arrArgument){
    //          $id=$arrArgument['id'];
    //        $query="select * from employees where id='$id'";
    //      $res=mysql_query($query);
    //    $checkData=mysql_num_rows($res);
    //  $arrProduct=array();
    //if($checkData > 0){
    //  $row=mysql_fetch_assoc($res);
    //$arrProduct[]=$row;
    //return $arrProduct;
    //}
    //else {echo ("no such employee");}
    //}
//public function display
    public function addEmployee($arrValue) {
        echo"megha";

        $arrSearch = array();
        $query = "INSERT INTO employees ('id', 'first_name', 'middle_name', 'last_name', 'dob', 'permanent_address', 'permanent_city', 'permanent_state', 'permanent_pin', 'temporary_address', 'temporary_city', 'temporary_state', 'temporary_pin', 'gender', 'mobile_number', 'emergency_number', 'marital_status', 'recent_qualification', 'salary', 'department_id', 'hire_date', 'termination_date', 'retire_date', 'account_number', 'user_id', 'designation') VALUES( '','$first_name','$middle_name', '$last_name', '$dob', '$permanent_address', '$permanent_city','$permanent_state','$permanent_pin','$temporary_address', '$temporary_city','$temporary_state','$temporary_pin', '$gender', '$mobile_number', '$emergency_number', '$marital_status', '$recent_qualification', '$salary', '$department_id', '$hire_date', '$termination_date', '$retire_date', '$account_number', '$user_id', '$designation')";


        $objReturn = mysql_query($query);
        if ($objReturn) {
            die("done");
        } else {
            die("not done ");
        }
    }

    public function deleteEmployee($arrValue) {
        echo '<pre>';
        print_r($arrValue);
        die;
        $id = $arrValue['id'];

//$sql1= "UPDATE employees SET status='1' where id=$id";
        /* $sql= "UPDATE users SET status='1' where id=(select user_id from employees where id=$id)";for this one sir
          $objReturn = mysql_query($sql);
          if($objReturn) {
          die("done in employee");
          } else {
          die("not done in employees table ");
          }
         */

//$objReturn = mysql_query($sql);
//if($objReturn) {
//	die("done in users");
//} else {
//	die("not done in users");
//}
        $data = array('tables' => 'employees');
        $data['conditions'] = array('employees.user_id' => array($id));
        $data['joins'][] = array(
            'table' => 'users',
            'type' => 'left',
            'conditions' => array('user_profile.society_id' => 'society.id')
        );

        $result = $this->_db->select($data);
        //print_r($result);die;
        //echo '<pre>';
        $arrFinal = array();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (count($row) > 0) {
            echo "your leave has been accepted";
        } else {
            echo "leave denined";
        }
    }

    public function updateEmployee($arrValue) {
        $id = $arrValue['id'];
//echo $id;
        $query = "select * from employees where id='$id'";
        $res = mysql_query($query);
        $checkData = mysql_num_rows($res);
        $arrProduct = array();
        if ($checkData > 0) {
            $row = mysql_fetch_assoc($res);
            $arrProduct[] = $row;
            return $arrProduct;
        }
        else
            echo"no such employee";
    }

//employee leave hr
    public function showMyProfile() {
//$data = array('tables' => 'employees');
       $data['tables']		= 'employees';
       $data['columns']	= array('employees.id',
'employees.first_name',
'employees.middle_name',
'employees.last_name',
'employees.dob',
'employees.permanent_address',
'employees.permanent_city',
'employees.permanent_state',
'employees.permanent_pin',
'employees.temporary_address',
'employees.temporary_city',
'employees.temporary_state',
'employees.temporary_pin','employees.gender',
'com .code_value as gname','employees.mobile_number','employees.emergency_number',
'mari.code_value as marital','employees.recent_qualification','employees.salary','departments.department_name as dname',
'employees.hire_date','employees.termination_date','employees.retire_date','employees.account_number','employees.user_id',
'code_master.code_value as cname','users.status','users.user_type','cm.code_value as usrtype');
   	$data['conditions']		= array('employees.id' => 2);
        $data['joins'][] = array(
    				'table' => 'users',
    				'type'	=> 'left',
    				'conditions' => array('employees.user_id' => 'users.id')
    		);
		$data['joins'][] = array(
    				'table' => 'departments',
    				'type'	=> 'left',
    				'conditions' => array('employees.department_id' => 'departments.id')
    		);
  $data['joins'][] = array(
    				'table' => 'code_master as cm',
    				'type'	=> 'left',
    				'conditions' => array('users.user_type' => 'cm.id')
    		); 
  $data['joins'][] = array(
    				'table' => 'code_master',
    				'type'	=> 'left',
    				'conditions' => array('employees.designation' => 'code_master.id')
    		);
   $data['joins'][] = array(
    				'table' => 'code_master as com',
    				'type'	=> 'left',
    				'conditions' => array('employees.gender' => 'com.id')
    		); 
$data['joins'][] = array(
    				'table' => 'code_master as mari',
    				'type'	=> 'left',
    				'conditions' => array('employees.marital_status' => 'mari.id')
    		); 

 
        $result = $this->_db->select($data);
        //echo '<pre>';
        $arrFinal = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrFinal[] = $row;
        }
        return $arrFinal;

}

    public function showAppliedLeaves() {

 	$data['tables']		= 'leave_applied';
	$data['columns']	= array('leave_applied.id',
		'leave_applied.employee_id',
		'cm.code_value as leavecat',
		'leave_applied.reason',
		'leave_applied.applied_date',
			'leave_applied.date_from',
			'leave_applied.till_date',
			'leave_applied.total_hours',
			'leave_applied.status');
	$data['conditions']		= array('leave_applied.status' => 0);
	$data['joins'][] = array(
			'table' => 'code_master as cm',
			'type'	=> 'left',
			'conditions' => array('leave_applied.leave_category' => 'cm.id')
	);

 $result = $this->_db->select($data);
        //echo '<pre>';
        $arrFinal = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrFinal[] = $row;
        }
        return $arrFinal;
        

}
   public function acceptLeave1($arrValue='') {
   		
 		$data = array('status' => '1');
        $where = array('id' => $arrValue);
        $result = $this->_db->update('leave_applied', $data, $where);
       	return $result;
             
    }
  
    public function denyLeave($arrValue='') {
 $data = array('status' => '2');
        $where = array('id' => $arrValue);
        $result = $this->_db->update('leave_applied', $data, $where);
      return $result;

    }

    public function searchAcceptedLeaves() {
 $data = array('tables' => 'leave_applied');
     $data['conditions']		= array('leave_applied.status' => 1);  
           $result = $this->_db->select($data);
        //echo '<pre>';
        $arrFinal = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrFinal[] = $row;
        }
        return $arrFinal;

   }

    public function searchDeninedLeaves() {
       $data = array('tables' => 'leave_applied');
     $data['conditions'] = array('leave_applied.status' => 2);  
           $result = $this->_db->select($data);
        //echo '<pre>';
        $arrFinal = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrFinal[] = $row;
        }
        return $arrFinal;
    }

// leaves emp
    public function status() {
        $id = $_SESSION['userInfo']['userId'];
        $data = array('tables' => 'leave_applied');
        //	$data['columns']	= array('employees.user_id','employees.last_name','employees.first_name','departments.department_name');
        //$data['conditions']		= array('leave_applied.status' => array('1'));
        $data['conditions'] = array('leave_applied.id' => array($id));
        $result = $this->_db->select($data);
        //print_r($result);die;
        //echo '<pre>';
        $arrFinal = array();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (count($row) > 0) {
            echo "your leave has been accepted";
        } else {
            echo "leave denined";
        }
    }
    public function remainingleaves() {
//echo"hello in model";
       // $id = $_SESSION['userInfo']['userId'];
        $arrFinal = array();
        $data = array('tables' => 'leave_applied');
        $data['columns']	= array('sum(total_hours) as el');
        $data['conditions'] = array(
                'status' => 1,
                'leave_category' => 27,
                'employee_id' => $_SESSION['userInfo']['userId']
                
            );
        $result = $this->_db->select($data);
        
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        $data1 = array('tables' => 'leave_applied');
        $data1['columns']	= array('sum(total_hours) as cl');
        $data1['conditions'] = array(
                'status' => 1,
                'leave_category' => 26,
                'employee_id' => $_SESSION['userInfo']['userId']
                
            );
        $result1 = $this->_db->select($data1);
        $row1 = $result1->fetch(PDO::FETCH_ASSOC);
        
        
        $data2 = array('tables' => 'leave_remaining');
        $data2['columns']	= array('remaining_cl','remaining_el');
        $data2['conditions'] = array(
                'employee_id' => $_SESSION['userInfo']['userId']
            );
        $result2 = $this->_db->select($data2);
        $row2 = $result2->fetch(PDO::FETCH_ASSOC);
        
        //echo '<pre>';
        $arrFinal["el"] = $row2["remaining_el"] - $row["el"];
        $arrFinal["cl"] = $row2["remaining_cl"] - $row1["cl"];
        //print_r($arrFinal);die;
        
        return $arrFinal;
    }

    public function empProfile() {

        $data = array('tables' => 'employees');
         $data['columns']	= array('employees.id',
'employees.first_name',
'employees.middle_name',
'employees.last_name',
'employees.dob',
'employees.permanent_address',
'employees.permanent_city',
'employees.permanent_state',
'employees.permanent_pin',
'employees.temporary_address',
'employees.temporary_city',
'employees.temporary_state',
'employees.temporary_pin','employees.gender',
'employees.gender','employees.mobile_number','employees.emergency_number',
'employees.marital_status','employees.recent_qualification','employees.salary','employees.department_id',
'employees.hire_date','employees.termination_date','employees.retire_date','employees.account_number','employees.user_id',
'employees.designation','users.status','users.user_type','cm.code_value as usrtype');
        $data['conditions'] = array('employees.id' => array($_SESSION['userInfo']['userId']));
        $data['joins'][] = array(
    				'table' => 'users',
    				'type'	=> 'left',
    				'conditions' => array('employees.user_id' => 'users.id')
    		);   
  $data['joins'][] = array(
    				'table' => 'code_master as cm',
    				'type'	=> 'left',
    				'conditions' => array('users.user_type' => 'cm.id')
    		);       
        $result = $this->_db->select($data);
        echo '<pre>';
     $arrFinal = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrFinal[] = $row;
        }
        return $arrFinal;
      
       
  
    }

    public function fncSaveData($arrValue) {


        foreach ($arrValue as $row) {

			$password = time() . rand(10*45, 100*98);
			$rowUser = array();
			$rowUser["email_id"] = $row["email_id"];
			$rowUser["password"] = $password;
			$rowUser["user_type"] = 2;

			$result = $this->_db->insert('users', $rowUser);
			$nUserId	= $this->_db->lastInsertId();

			array_pop($row);
			$row["user_id"] = $nUserId;

			if($nUserId) {
				$result = $this->_db->insert('employees', $row);
			}

		}	      
    }

    public function fncUpdateEmployeeData($arrValue) {

        foreach ($arrValue as $row) {
            $id = $row["id"];
            //$result = $this->_db->insert('employees', $row);
            $where = array('id' => $id);
            $result = $this->_db->update('employees', $row, $where);
            print 'Created row ' . $this->_db->lastInsertId() . ' in the table "posts"<br />';
        }

        //$result = $this->_db->select($arrValue);
    }

    public function fetchUsers($arrValues=array()) {

        if (isset($arrValues["id"])) {
            $arrId = $arrValues["id"];
        }
        $data = array('tables' => 'employees');
        $data['columns'] = array('employees.user_id', 'employees.id', 'employees.last_name', 'employees.first_name', 'users.email_id');
//		$data['conditions']		= array('employees.status' => '0');
        if (!empty($arrId)) {
            if ($arrValues["stype"] == "1") {
                $data['conditions'] = array('employees.status' => '0','employees.id' => array($arrId));
            } else if ($arrValues["stype"] == "2") {
                $data['conditionslike'] = " employees.status= '0' and CONCAT(employees.first_name,' ', employees.last_name) like '%" . $arrId . "%'";
            } else {
				$data['conditionslike'] = " employees.status= '0'";
			}
        } else {
			$data['conditionslike'] = " employees.status= '0'";
		}
        $data['joins'][] = array(
            'table' => 'users',
            'type' => 'left',
            'conditions' => array('employees.user_id' => 'users.id')
        );

        $result = $this->_db->select($data);
        //echo '<pre>';
        $arrFinal = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrFinal[] = $row;
        }
        return $arrFinal;
    }

	 public function submitLeave($arrValue) {


        foreach ($arrValue as $row) {
				$result = $this->_db->insert('leave_applied', $row);

		}	      
    }

}

