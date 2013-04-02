<?php
/**
* Filename : deleteemp.php
* Authour : Megha Sahni
* Description : Delete employee from database.
* Date_of_creation : 10-March-2013
*/

	require_once('../../../languages/lang.en.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Human Resource Management System</title>
		<link href="../../../assets/style_css/templatemo_style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
        <script language="javascript" type="text/javascript" >

         function abc(){
	              var x=prompt("Enter  Employee Id","");
                     window.location.href="showempdb.php?value="+x;
                       }
        function deleteUser()
                        {
				var x=prompt("Enter  Employee Id","");
                     window.location.href="deleteemp.php?value="+x;
                        }
			
        function updateUser()
                        {
                            var x=prompt("Enter  Employee Id","");
                     window.location.href="updateemp.php?value="+x;
                        }
</script>
	<div id="templatemo_body_wrapper">
		<div id="templatemo_wrapper">
			<div id="tempaltemo_header">
				<span id="header_icon"></span>
				<div id="header_content">
				<div id="site_title">
					<a href="http://www.templatemo.com" target="_parent"><img src="../../../assets/images/title6.png" alt="LOGO" /></a>   
					</div>
				<a href="#" class="detail float_r"><?php echo ABOUT_US; ?></a>
				<a href="<?php echo SITE_PATH?>index.php?controller=employee&function=myProfile" class="detail float_r"><?php echo HOME; ?></a>
				
			</div>
		</div> <!-- end of header -->
    
		<div id="templatemo_main_top"></div>
		<div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
			<div id="templatemo_sidebar">
               	<div id="templatemo_menu">
					<ul>
                                                <li> <a href="showdb.php" ><?php echo"Show Database :" ?> </a></li>
						<li> <a onclick="abc();" ><?php echo"Show Employee Details :" ?> </a></li>
						<li><a href="add_emp.php"><?php echo "Add User :" ?></a></li>
						<li><a onclick="deleteUser()"><?php echo "Delete User :" ?></a></li>
                                                <li><a onclick="updateUser()"><?php echo "Update User :" ?></a></li>
						<li><a onclick=""><?php echo "Log Out :" ?></a></li>
				       </ul>    	
				</div> <!-- end of templatemo_menu -->
        
            
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = " width:100%; height:200px; backgroundcolor:black; border:solid 1px;">
				<div id="left">               

<p>database deleted</p>
</div>
				</div>
            </div>
        
			<div class="cleaner"></div>    
		</div>
    
		<div id="templatemo_main_bottom">
    </div>

	</div> <!-- end of wrapper -->
</div>

<!--<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
        Copyright © 2048 <a href="#">Your Company Name</a> | 
        Designed by <a href="http://www.templatemo.com/page/1" target="_parent">Free CSS Templates</a> | 
        Validate <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; 
    		 <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    </div>
</div>-->

</body>
</html>
