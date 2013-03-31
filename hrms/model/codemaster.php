<?php
/**
 * Filename : codeMaster.php
 * Authour : Pankaj Kumar Yadav
 * Description : allow fetch records form code_master table.
 * Date_of_creation : 18-March-2013
 */

ini_set("display_errors","1");
//include_once('cxpdo.php');

class codemasterModel
{
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
	
	public function getCodeValue($codeName)
	{
		$data = array('columns' => array('code_value'), 'tables' => 'code_master', 'conditions' => array('code_name' => "$codeName"));
		$result = $this->db->select($data);
		return $result;
		
	}
	
	public function getCodeId($codeValue)
	{
		$data = array('columns' => array('id'), 'tables' => 'code_master', 'conditions' => array('code_value' => "$codeValue"));
		$result = $this->db->select($data);
		return $result;
	}
	
	public function getCodeValueById($id)
	{
		$data = array('columns' => array('code_value'), 'tables' => 'code_master', 'conditions' => array('id' => "$id"));
		$result = $this->db->select($data);
		return $result;
	
	}
}

?>