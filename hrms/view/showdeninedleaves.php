<?php

/**
* Filename : showdeninedleaves.php
* Authour : Megha Sahni
* Description : Display the leaves denined by admin .
* Date_of_creation : 15-March-2013
*/

ini_set("display_errors", "1");
?><html>

    <body>
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
                            <ul>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=myProfile"  ><?php echo"View Profile :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=searchAppiledLeaves"  > <?php echo"View Applied Leaves :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=searchAcceptedLeaves"  > <?php echo"View Accepted Leaves :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=searchDeninedLeaves"  > <?php echo"View Denined Leaves :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>
                                <li><a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li>
								 <li><a href="<?php echo SITE_PATH; ?>index.php?controller=login&function=logout" target="_parent"><?php echo LOG_OUT; ?></a></li>			
                            </ul>    	

                        </div> <!-- end of templatemo_menu -->


                        <div class="cleaner"></div>
                    </div> <!-- end of sidebar -->

                    <div id="templatemo_content">
                        <div style = " background-color:silver; border:black solid 1px;">


                            <?php if (isset($arrData) && !empty($arrData)) { ?>
                                <table width="600" align="center" cellspacing="5" cellpadding="5"  border="black solid 1px" >
                                    <tbody style="background-color:#B9DA54"> 	   
                                        <tr>
											<td><b>Leave Id</b></td>
											<td><b>First Name</b></td>
											<td><b>Last Name</b></td>
                                            <td><b>Category</b></td>
                                            <td><b>Reason</b></td>
                                            <td><b>Applied_Date</b></td>
                                            <td><b>Date_From</b></td>
                                            <td><b>Till_Date</b></td>
                                            <td><b>Total_Hours</b></td>
                                         <!--   <td>Status</td> -->
                                        </tr>
    <?php foreach ($arrData as $row) { ?>

                                            <tr>	<td> <?php echo $row['id']; ?></td>

                                                                             <td><b> <?php echo $row['fname']; ?></b></td>
								<td><b> <?php echo $row['lname']; ?></b></td>

                                                <td> <?php echo $row['leavecat']; ?></td>

                                                <td> <?php echo $row['reason']; ?></td>

                                                <td> <?php echo $row['applied_date']; ?></td>

                                                <td> <?php echo $row['date_from']; ?></td>

                                                <td> <?php echo $row['till_date']; ?></td>

                                                <td> <?php echo $row['total_hours']; ?></td>

                                            <!--    <td> <?php echo $row['status']; ?></td> -->
                                            </tr>

        <?php
    }//foreach
    ?>
                                    </tbody>
                                </table>
<?php } else { ?>
        <table width="600" align="center" cellspacing="5" cellpadding="10"  border="black solid 1px" >
            <tbody style="background-color:#B9DA54"> 
                <tr>
                    <td align="center"><strong>No Denied Leave found.</strong></td>
                </tr>
            </tbody>
        </table>
<?php }?>

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
        <script id="source" language="javascript" type="text/javascript">
    function fncSearchEmp() {
	var strVal1 = $row['id'] ;
        if(strVal1=="") { return false;}

        $.ajax({ 
            type: "GET",
            url: "SITE_PATH?>index.php?controller=employee&function=acceptLeave&searchval1="+strVal1,                  
            data: "",
            success: function(data){
                $("#dvShow").html(data);
            }
        });
    }
        </script>
    </body>
</html>
