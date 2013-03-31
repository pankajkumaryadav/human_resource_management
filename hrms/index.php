<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/human_resource_management/trunk/hrms/library/common.inc.php');
include_once(LANGUAGE_PATH.'/lang.en.php');
include('cxpdo/cxpdo.php');
if(isset($_GET['controller']) && !empty($_GET['controller'])){
      $controller =$_GET['controller'];
}else{
      $controller ='login';  //default controller
}


if(isset($_GET['function']) && !empty($_GET['function'])){
      $function =$_GET['function'];

}else{
      $function ='loginPage';    //default function
}

$controller=strtolower($controller);

$fn = SITE_ROOT.'controller/'.$controller . '.php';

if(file_exists($fn)){
      require_once($fn);
      $controllerClass=$controller.'Controller';
      if(!method_exists($controllerClass,$function)){
          die($function .' function not found');
      }

      $obj=new $controllerClass;
      $obj-> $function();

}else{
      die($controller .' controller not found');
}
?>
