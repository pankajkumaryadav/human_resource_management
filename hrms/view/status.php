<?php

/**
* Filename : status.php
* Authour : Megha Sahni
* Description : display status of leave .
* Date_of_creation : 15-March-2013
*/

ini_set("display_errors", "1");
?><html>

    <body>
        <link rel="stylesheet" href="css/jquery-ui.css" />
        <script language="javascript" type="text/javascript" src="jscript/jquery/jquery.js"></script>
        <script src="jscript/jquery/jquery-ui.js"></script>
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
            function applyLeave(){

                           
                $.ajax({ type: "POST",
					
                    url: "<?php echo SITE_PATH ?>index.php?controller=employee&function=empapplyLeave",
					
                    success: function(response){
                                       
                        $("#templatemo_content").html(response);
                                        
                    }
			        
                });
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
                            <ul><li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=empProfile"  ><?php echo"View Profile" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=status"  > <?php echo"View Applied Leaves status" ?> </a></li>
<!--                                <li>  <a href="#" target="_parent" onClick="applyLeave()"> <?php echo"Apply for leave" ?> </a></li>-->
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=empapplyLeave"  >  <?php echo"Apply for leave" ?>  </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=remainingleaves"  > <?php echo"View Leaves Due" ?> </a></li>
                                <?php 
                                if($_SESSION['userInfo']['userType']=="1") { ?>
                                    <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=listing"  ><?php echo"Show Database" ?> </a></li>
                                    <li><a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li>
                                <?php }?>
                                <li><a href="<?php echo SITE_PATH ?>index.php?controller=grievance&function=grievancePage"><?php echo GRIEVANCES; ?></a></li>	
                                <li><a href="<?php echo SITE_PATH; ?>index.php?controller=login&function=logout" target="_parent"><?php echo LOG_OUT; ?></a></li>			
                            </ul>    	

                        </div>
                        <div class="cleaner"></div>
                    </div> <!-- end of sidebar -->

                    <div id="templatemo_content">
                        <div style = "  background-color:silver; border:black solid 1px;">
                            <table>
                                <tr>
                                    <td> <?php echo "Enter date you applied for" ?><em>*</em></td>
                                    <td><input type="text" name="txtsearchdate" id="txtsearchdate" onchange="dvLoadData()"/><br/></td>
                                </tr>	
                            </table>	
                        </div>
                        <div style = "background-color:silver; border:black solid 1px;" id="dvLoadData">
                            
                        </div>
                    </div>

                    <div class="cleaner"></div>    
                </div>

                <div id="templatemo_main_bottom">
                </div>

            </div> <!-- end of wrapper -->
        </div>
        <script>
            $(function() {
                $( "#txtsearchdate" ).datepicker({
                    changeMonth: true,
                    changeYear: true
                });
            });
            $("#txtsearchdate").datepicker({
                changeYear: true,
                dateFormat: 'dd/mm/yy',
              //  maxDate: '-1d'
            });
            
            function dvLoadData(argDate) {
                var argDate = $("#txtsearchdate").val();
                $.ajax({ 
                     type: "POST",
                     url: "<?php echo SITE_PATH?>index.php?controller=employee&function=getleavestatus",                  
                      data: "stdate="+argDate,
                        success: function(data){
                            $("#dvLoadData").html(data);

                        }
                    });
            }
        </script>
    </body>
</html>
