<?php
/**
* Filename : grievanceModel.php
* Authour : Jasleen Kaur
* Description : authenticate users of application.
* Date_of_creation : 05-March-2013
*/

    class admingrievanceModel
	{
		private $_username;
		private $_password;
		private $_db;
		
	    public function __construct(){       

                       
						$config = array();
						$config['user'] = 'root';
						$config['pass'] = 'root';
						$config['name'] = 'human_resource_management';
						$config['host'] = 'localhost';
						$config['type'] = 'mysql';
						$config['port'] = null;
						$config['persistent'] = true;
						$this->_db = db::instance($config);

			
		 }
		
		
        public function adminshowGrievance(){
	  
                    $grievanceRecord=array();
                            $c = 0;
                            $r = 0;
                            $u = 0;
                           
					//$user_id=2;
					$data['columns'] = array('status');
					$data['tables'] = 'grievances';
					//$data['conditions'] = array('employee_id'=> $user_id);	   
				    $result = $this->_db->select($data);
			
			while( $row = $result->fetch(PDO::FETCH_ASSOC) ) {
				
				$c++;
                if ($row['status'] == 1){
                	$r++;
                } 
				else{
                	$u++;
                }
              }
			$grievanceRecord["total"]=$c;
			$grievanceRecord["resolved"]=$r;
			$grievanceRecord["unresolved"]=$u;
			return $grievanceRecord;
				
		}
			
		   
		  public function adminresolvedGrievance(){
		      
			        $arrResolved=array();
					$data['columns'] = array('grievances.id','grievances.text','grievances.grievance_time','grievances.checked_time','grievances.response','users.email_id', 'employees.first_name','employees.middle_name','employees.last_name', 'code_master.code_value');
					$data['tables'] = 'employees';
					$data['joins'][] = array(
						'table' => 'grievances', 
						'type'	=> 'left',
						'conditions' => array('grievances.employee_id' => 'employees.id')
					);
					$data['joins'][] = array(
						'table' => 'users', 
						'type'	=> 'left',
						'conditions' => array('employees.user_id' => 'users.id')
					);
					$data['joins'][] = array(
						'table' => 'code_master', 
						'type'	=> 'left',
						'conditions' => array('grievances.grievance_category' => 'code_master.id')
					);

					$data['conditions'] = array('grievances.status'=>'1');
					$result = $this->_db->select($data);
//return $result;
	  
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {	

					$arrResolved[]=$row;

                              	}
				return $arrResolved;

						   
					
			}
			
			public function adminunresolvedGrievance(){
		      
			       $arrUnresolved=array();
					$data['columns'] = array('grievances.id','grievances.text','grievances.grievance_time','users.email_id', 'employees.first_name','employees.middle_name','employees.last_name', 'code_master.code_value');
					$data['tables'] = 'employees';
					$data['joins'][] = array(
						'table' => 'grievances', 
						'type'	=> 'left',
						'conditions' => array('grievances.employee_id' => 'employees.id')
					);
					$data['joins'][] = array(
						'table' => 'users', 
						'type'	=> 'left',
						'conditions' => array('employees.user_id' => 'users.id')
					);
					$data['joins'][] = array(
						'table' => 'code_master', 
						'type'	=> 'left',
						'conditions' => array('grievances.grievance_category' => 'code_master.id')
					);

					$data['conditions'] = array('grievances.status'=>array('0','2'));
					$result = $this->_db->select($data);
//return $result;
	  
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {	

					$arrUnresolved[]=$row;

                              	}
				return $arrUnresolved;

					
			}	
			
			public function adminsearchGrievance($gdetail){
		      
			        $arrSearch=array();
					$data['columns'] = array('grievances.id','grievances.text','grievances.grievance_time','grievances.checked_time','grievances.response','users.email_id', 'employees.first_name','employees.middle_name','employees.last_name', 'code_master.code_value');
					$data['tables'] = 'employees';
					$data['joins'][] = array(
						'table' => 'grievances', 
						'type'	=> 'left',
						'conditions' => array('grievances.employee_id' => 'employees.id')
					);
					$data['joins'][] = array(
						'table' => 'users', 
						'type'	=> 'left',
						'conditions' => array('employees.user_id' => 'users.id')
					);
					$data['joins'][] = array(
						'table' => 'code_master', 
						'type'	=> 'left',
						'conditions' => array('grievances.grievance_category' => 'code_master.id')
					);
					
					$data['conditions'] = array('grievances.id'=> $gdetail[0]);
					  	
						  $result = $this->_db->select($data);
                              while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                                $arrSearch[]=$row;
                              }
						   
						   return $arrSearch;
					
			}
			
			public function launchGrievance(){
			    
					 $arrSearch=array();
					 $data['columns'] = array('code_value');
					 $data['tables'] = 'code_master';
					 $data['conditions'] = array('code_name'=> 'grievance_category');	   
				     $result = $this->_db->select($data);
			
			while($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                                $arrSearch[]=$row;
								
                              }
						   
						   return $arrSearch;
						   
			}	
			
			public function insertGrievance($arrValue){
			    
					 $arrSearch=array();
					 $data['columns'] = array('id');
					 $data['tables'] = 'code_master';
					 $data['conditions'] = array('code_value'=> $arrValue[0]);	   
				     $result = $this->_db->select($data);
					 //$arrValue[1]=mysql_real_escape_string($arrValue[1]);
					 $row = $result->fetch(PDO::FETCH_ASSOC);
					 $grievance_category=$row['id'];
					 $employee_id='2';
					 date_default_timezone_set("Asia/Calcutta");
					 $today = date("y/m/d H:i:s");
					 $insert_row[] = array('employee_id' => $employee_id, 'text' => $arrValue[1], 'grievance_category' => $grievance_category, 'grievance_time' => $today );
	
					 foreach($insert_row as $row) {		
					 	$result = $this->_db->insert('grievances',$row);
					 }
					 
					 return $result;
						   
				}
				
				public function adminSubmitResponse($gno){
		      		
			       $arrUnresolved=array();
					$data['columns'] = array('grievances.id','grievances.text','grievances.grievance_time','users.email_id', 'employees.first_name','employees.middle_name','employees.last_name', 'code_master.code_value');
					$data['tables'] = 'employees';
					$data['joins'][] = array(
						'table' => 'grievances', 
						'type'	=> 'left',
						'conditions' => array('grievances.employee_id' => 'employees.id')
					);
					$data['joins'][] = array(
						'table' => 'users', 
						'type'	=> 'left',
						'conditions' => array('employees.user_id' => 'users.id')
					);
					$data['joins'][] = array(
						'table' => 'code_master', 
						'type'	=> 'left',
						'conditions' => array('grievances.grievance_category' => 'code_master.id')
					);

					$data['conditions'] = array('grievances.id' => $gno);
					$result = $this->_db->select($data);
//return $result;
	  
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {	

					$arrUnresolved[]=$row;

                              	}
								
					
					 $data1['columns'] = array('code_value');
					 $data1['tables'] = 'code_master';
					 $data1['conditions'] = array('code_name'=> 'grievance_category');	   
				     $result1 = $this->_db->select($data1);
			
			while($row1 = $result1->fetch(PDO::FETCH_ASSOC)) { 
                                $arrUnresolved['department'][]=$row1;
								
                              }
				return $arrUnresolved;

					
			}	
			
			public function adminInsertResponse($arrResponse){
					
					
								
                              
				date_default_timezone_set("Asia/Calcutta");
        		$today = date("y/m/d H:i:s");
        		//$k = mysql_query("select * from record where dept='" . $g . "' and (status = 0 or status=2) ");
       //$msg = "Forwarded From : " . " " . $g . " " . " to " . "" . $_POST['dept'] . " " . " with Comment" . " " . $_POST['comment'];
	   
        		//$l = mysql_fetch_array($k);
        		//$s = $l['id'];
				
      //  if (isset($_POST['checkbox1']) && $_POST['checkbox1'] == 'Yes') {
	       		if (isset($arrResponse['department'])){ 
					$data['columns'] = array('id');
					$data['tables'] = 'code_master';
					$data['conditions'] = array('code_value'=> $arrResponse['department']);	   
				    $result = $this->_db->select($data);
			
					$row=$result->fetch(PDO::FETCH_ASSOC);
                                $deptid=$row['id'];
					
					$data1['conditions'] = array('id'=> $arrResponse['id']);	   
				    $update_row[] = array('status' => '2', 'checked_time' => $today, 'grievance_category' => $deptid, 'forwarded_from' => $arrResponse['olddept'] );
            		foreach($update_row as $row) {		
					 	$result = $this->_db->update('grievances',$row,$data1['conditions']);
					 }
					
			
        				$fmsg = "The Complaint Has Been Forwarded To ".$arrResponse['department']." department!!";
        				return $fmsg;
						
						
        		} 
				else { 
		    			if (isset($arrResponse['status']) || isset($arrResponse['response'])) {
            				$data1['conditions'] = array('id'=> $arrResponse['id']);	   
				    		$update_row[] = array('status' => '1', 'checked_time' => $today,'response' => $arrResponse['response']);
            				foreach($update_row as $row) {		
					 	$result = $this->_db->update('grievances',$row,$data1['conditions']);
					 		}
						
						
								$rmsg = "Your Response Has Been Saved!!";
								

        				}
						return $rmsg;
						
				}


       
			
			
		}
			

  
	      
}



