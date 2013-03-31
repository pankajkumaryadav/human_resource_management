<?php
  class productController{
   function __construct() {

   }
   function listing(){
      loadView('header.php');
      $arrValue=loadModel('product','showProductListing');
      loadView('newtest.php',$arrValue);
      loadView('footer.php');
   }

   function detail(){
      loadView('header.php');
      $id=$_GET['id'];
      $arrArgument=array('id'=>$id);
      $arrValue=loadModel('product','productDetails',$arrArgument);
      loadView('product_detail.php',$arrValue);
      loadView('footer.php');
   }

      function listing1(){
      die("i am here");
   }

}
?>