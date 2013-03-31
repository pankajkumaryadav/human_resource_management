<?php
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


                    </div>
                </div> <!-- end of header -->

                <div id="templatemo_main_top"></div>
                <div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
                    <div id="templatemo_sidebar">
                        <div id="templatemo_menu">
                            <ul><li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=empProfile"  ><?php echo"View Profile :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=appiledLeaves"  > <?php echo"View Applied Leaves status :" ?> </a></li>
                                <li>  <a href="#" target="_parent" onclick="applyLeave()"> <?php echo"Apply for leave :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=remainingleaves"  > <?php echo"View Leaves Due" ?> </a></li>

                            </ul>    		

                        </div> <!-- end of templatemo_menu -->


                        <div class="cleaner"></div>
                    </div> <!-- end of sidebar -->

                    <div id="templatemo_content">
                        <div style = "  background-color:silver; border:black solid 1px;">
                            <?php if (isset($arrData) && !empty($arrData)) { ?>

                                <table  align="center" cellspacing="10" cellpadding="10">
                                    <tbody>
                                    <tr>
                                        <td><strong>Remaining CL</strong></td>
                                        <td><strong>Remaining EL</strong></td>
                                    </tr>
                                        <tr>
                                            <td> <?php echo $arrData['cl']; ?></td>
                                            <td> <?php echo $arrData['el']; ?></td>
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
