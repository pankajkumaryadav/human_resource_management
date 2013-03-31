<?php
/**
* Filename : grievanceModel.php
* Authour : Jasleen Kaur
* Description : authenticate users of application.
* Date_of_creation : 05-March-2013
*/

    class grievanceModel
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
		
		
        public function showGrievance($user_id){
	  
                    $grievanceRecord=array();
                            $c = 0;
                            $r = 0;
                            $u = 0;
                           
					//$user_id=2;
					$data['columns'] = array('status');
					$data['tables'] = 'grievances';
					$data['conditions'] = array('employee_id'=> $user_id);	   
				    $result = $this->_db->select($data);
			
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				
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
			
		   
		  public function resolvedGrievance($user_id){
		      
			        $arrResolved=array();
					$data['columns'] = array('code_master.code_value','grievances.id','grievances.text','grievances.response','grievances.grievance_time','grievances.checked_time');
					$data['tables'] = 'grievances';
					$data['joins'][] = array(
					'table' => 'code_master', 
					'type'	=> '',
					'conditions' => array('grievances.grievance_category' => 'code_master.id'));
					$data['conditions'] = array('grievances.employee_id'=> $user_id,
					'grievances.status'=>1);
				    
					$result = $this->_db->select($data);
                              while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                                $arrResolved[]=$row;
                              }
							
							
						   
						   return $arrResolved;
						   
					
			}
			
			public function unresolvedGrievance($user_id){
		      
			        $arrUnresolved=array();
					$data['columns'] = array('code_master.code_value','grievances.id','grievances.text','grievances.grievance_time');
					$data['tables'] = 'grievances';
					$data['joins'][] = array(
					'table' => 'code_master', 
					'type'	=> '',
					'conditions' => array('grievances.grievance_category' => 'code_master.id'));
					$data['conditions'] = array('grievances.employee_id'=> $user_id,
					'grievances.status'=>array('0','2'));
					
							  
					 
						   
                              $result = $this->_db->select($data);
                              while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
                                $arrUnresolved[]=$row;
                              }
						   
						   return $arrUnresolved;
					
			}	
			
			public function searchGrievance($gdetail){
		      
			        $arrSearch=array();
					$data['columns'] = array('code_master.code_value','grievances.id','grievances.text','grievances.response','grievances.grievance_time','grievances.checked_time');
					$data['tables'] = 'grievances';
					$data['joins'][] = array(
					'table' => 'code_master', 
					'type'	=> '',
					'conditions' => array('grievances.grievance_category' => 'code_master.id'));
					$data['conditions'] = array('grievances.employee_id'=> $gdetail[1],'grievances.id'=> $gdetail[0]);
					  	 
							  
					 
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
					 //$employee_id='2';
					 date_default_timezone_set("Asia/Calcutta");
					 $today = date("y/m/d H:i:s");
					 $insert_row[] = array('employee_id' => $arrValue[2], 'text' => $arrValue[1], 'grievance_category' => $grievance_category, 'grievance_time' => $today );
	
					 foreach($insert_row as $row) {		
					 	$result = $this->_db->insert('grievances',$row);
					 }
					 
					 return $result;
						   
				}
  
	      
}



