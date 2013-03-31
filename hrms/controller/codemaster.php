<?php
/**
 * Filename : admin_settings.php
 * Authour : Pankaj Kumar Yadav
 * Description : allow control on fetching records from code_master table.
 * Date_of_creation : 18-March-2013
 */
ini_set("display_errors","1");
include_once($_SERVER['DOCUMENT_ROOT'].'/human_resource_management/trunk/hrms/library/common.inc.php');

class codemasterController
{
	public function getCodeValue($codeName)
	{	loadView('header.php');
		$result = loadModel('codemaster','getCodeValue',$codeName);
		return $result;
	}
	
	public function getCodeId($codeValue)
	{	loadView('header.php');
		$result = loadModel('codemaster','getCodeId',$codeValue);
		return $result;
	}
	
	public function getCodeValueById($id)
	{	loadView('header.php');
		$result = loadModel('codemaster','getCodeValueById',$id);
		return $result;
	}
}

?>