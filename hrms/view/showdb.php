<?php
/**
* Filename : showdb.php
* Authour : Megha Sahni
* Description : Display the database of employees .
* Date_of_creation : 14-March-2013
*/

    
	require_once('../../../languages/lang.en.php');
        include("cls_dbintereaction.inc.php");
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
       function view()
                      {
                        window.location.href="show.php?value=";
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
	<a href="<?php echo SITE_PATH?>index.php?controller=login&function=loginPage" class="detail float_l"><?php echo HOME; ?></a>
			<a href="#" class="detail float_r"><?php echo ABOUT_US; ?></a>
						
				
			</div>
		</div> <!-- end of header -->
    
		<div id="templatemo_main_top"></div>
		<div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
			<div id="templatemo_sidebar">
               	<div id="templatemo_menu">
					<ul>
 <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>
<!--						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchEmployee"  > <?php echo"Show Employee Details :" ?> </a></li>-->
						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li></a></li>
<!--						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=deleteEmployee">><?php echo "Delete User :" ?></a></li>
                                                <li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=updateEmployee"><?php echo "Update User :" ?></a></li>-->
				       </ul>    	

				</div> <!-- end of templatemo_menu -->
        
            
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = "  background-color:silver; border:black solid 1px;">
					<table style="background-color:silver;float:center;border: black solid 2px;">
                   
                                                    <tr>
                                             <th>ID</th>
                                             <th>Name</th>
                                              <th>Address</th>
                                         <th>Contact</th>
                                        <th>Department</th> 
                                       <th>Type</th>
                                       <th>Designation</th> 
                                       <th colspan=1>Options</th>
                                         </tr>
	
		<?php
			$objDB = new ClsDBInteraction();

			$result = $objDB->select();

			while ($row = mysql_fetch_array($result))
			{
				
		?>


<tr>   
							<td> <?php echo $row['id']; ?></td>
                                                       
							<td> <?php echo $row['first_name'].$row['last_name']; ?></td>
                                                       
							
                                                        
                                                        <td> <?php echo $row['temporary_address'].$row['temporary_city'].$row['temporary_state'].$row['temporary_pin']; ?></td>

                                                       <td> <?php echo $row['mobile_number']; ?></td>
                                                      
                                                         <td> <?php echo $row['department_id']; ?></td>
                                                       
                                                         <td> <?php echo $row['employee_type']; ?></td>
                                                        
                                                         <td> <?php echo $row['designation']; ?></td>							
                                                        <td><input type ="submit" name="viewcompleteprofile"value="complete profile" onclick=<a href="show.php?value="+id;/></td></tr>
                                                    
                                                      
		<?php
			}//while loop ends here
		?>
		 </table>   

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
