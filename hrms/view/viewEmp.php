<?php

/**
* Filename : viewEmp.php
* Authour : Megha Sahni
* Description : Display employee's details .
* Date_of_creation : 15-March-2013
*/

ini_set("display_errors", "1");
?><html>

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
                            <a href="http://www.templatemo.com" target="_parent"><img src="images/title6.png" alt="LOGO" /></a>            
                        </div>
 <a href="<?php echo SITE_PATH?>index.php?controller=login&function=loginPage" class="detail float_l"><?php echo HOME; ?></a>
             <a href="#" class="detail float_r"><?php echo ABOUT_US; ?></a>
			

                    </div>
                </div> <!-- end of header -->

                <div id="templatemo_main_top"></div>
                <div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
                    <div id="templatemo_sidebar">
                        <div id="templatemo_menu">
                            <ul><li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=myProfile"  ><?php echo"View Profile :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAppiledLeaves"  > <?php echo"View Applied Leaves :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAcceptedLeaves"  > <?php echo"View Accepted Leaves :" ?> </a></li>
					        <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchDeninedLeaves"  > <?php echo"View Denined Leaves :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>
                                <li><a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li></a></li>
   	                          <li><a href="<?php echo SITE_PATH; ?>index.php?controller=login&function=logout" target="_parent"><?php echo LOG_OUT; ?></a></li>			

                            </ul>    	

                        </div> <!-- end of templatemo_menu -->


                        <div class="cleaner"></div>
                    </div> <!-- end of sidebar -->

                    <div id="templatemo_content">
                        <div id="dvList" style = "background-color: #C6DEFF; border:black solid 1px;">


                            <?php if (isset($arrData) && !empty($arrData)) { ?>
                                <span style="font-weight: bold;">Employee Details</span>
                                <table width="600" align="center" cellspacing="5" cellpadding="10"  border="black solid 2px" >
                                    <tbody style="background-color:#B9DA54"> 
                                	

    <?php
    $nUserId = $arrData['user_id'];

    $strPermentAddress = $arrData['permanent_address'] . " " . $arrData['permanent_city'] . " " . $arrData['permanent_state'] . " " . $arrData['permanent_pin'];
    $strTempAddress = $arrData['temporary_address'] . " " . $arrData['temporary_city'] . " " . $arrData['temporary_state'] . " " . $arrData['temporary_pin'];
    ?>
                                        <tr>
                                            <td> Employee ID</td>
                                            <td> <?php echo $arrData['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> First Name</td>
                                            <td> <?php echo $arrData['first_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Middle Name</td>
                                            <td> <?php echo $arrData['middle_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Last Name</td>
                                            <td> <?php echo $arrData['last_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Date of Birth</td>
                                            <td> <?php echo $arrData['empdob']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Permanent Address</td>
                                            <td> <?php echo $strPermentAddress; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Temporary Address</td>
                                            <td> <?php echo $strTempAddress; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Gender</td>
                                            <td> <?php echo $arrData['gend']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Mobile Number</td>
                                            <td> <?php echo $arrData['mobile_number']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Emergency Number</td>
                                            <td> <?php echo $arrData['emergency_number']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Marital Status</td>
                                            <td> <?php echo $arrData['maritalstatus']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Recent Qualification</td>
                                            <td> <?php echo $arrData['recent_qualification']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Salary</td>
                                            <td> <?php echo $arrData['salary']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Department</td>
                                            <td> <?php echo $arrData['deptname']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Hire Date</td>
                                            <td> <?php echo $arrData['hiredate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Termination Date</td>
                                            <td> <?php echo $arrData['terminationdate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Retire Date</td>
                                            <td> <?php echo $arrData['retiredate']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Account Number</td>
                                            <td> <?php echo $arrData['account_number']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Designation</td>
                                            <td> <?php echo $arrData['desig']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
<?php } ?>



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
<script>
    function fncDelete(argId) { 

        if(confirm("Are you sure you want to delete this record")){
            $.ajax({ 
                type: "POST",
                url: '<?php echo SITE_PATH ?>index.php?controller=employee&function=deleteEmp',
                data: "userId="+argId,      
                success: function(data){
                    //alert(data);
                },
            });
        }
    }


</script>
