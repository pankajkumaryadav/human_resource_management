<?php
/**
* Filename : show.php
* Authour : Megha Sahni
* Description : Display the employee database to admin .
* Date_of_creation : 15-March-2013
*/

ini_set("display_errors", "1");
?><html>

    <body>
        <script language="javascript" type="text/javascript" >
            /* function abc(){
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
            }*/
     
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
                            <ul>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=myProfile"  ><?php echo"View Profile :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=searchAppiledLeaves"  > <?php echo"View Applied Leaves :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=searchAcceptedLeaves"  > <?php echo"View Accepted Leaves :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=searchDeninedLeaves"  > <?php echo"View Denined Leaves :" ?> </a></li>
                                <li> <a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>
                                <li><a href="<?php echo SITE_PATH ?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li></a></li>
   	                          <li><a href="<?php echo SITE_PATH; ?>index.php?controller=login&function=logout" target="_parent"><?php echo LOG_OUT; ?></a></li>			

                            </ul>    	

                        </div> <!-- end of templatemo_menu -->


                        <div class="cleaner"></div>
                    </div> <!-- end of sidebar -->

                    <div id="templatemo_content">
                        <form id="frmSearch" name="frmSearch">
                            <table width="600" align="center" cellspacing="5" cellpadding="10"  border="black solid 2px" >
                                <tbody style="background-color:#B9DA54"> 

                                    <tr>
                                        <td>Search</td>
                                        <td><input type="text" name="txtSearch" id="txtSearch" onkeyup="fncSearch(this.value)"></td>
                                        <td><select id="cmbSearchType" name="cmbSearchType">
                                                <option value="1" selected>ID</search>
                                                <option value="2">Name</search>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div id="dvList" style ="background-color: #B9DA54; border: solid 1px;">

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
    function fncDelete(argId,argEmpId) { 

        if(confirm("Are you sure you want to delete this record")){
            $.ajax({ 
                type: "POST",
                url: '<?php echo SITE_PATH ?>index.php?controller=employee&function=deleteEmp',
                data: "userId="+argId+"&empId="+argEmpId,      
                success: function(data){
                    fncSearch();
                    //alert(data);
                },
            });
        }
    }

    function fncSearch(argValue) {
        var svalue = "";
        if(argValue) {
            var svalue = argValue;
        }
        $("#dvList").html('');
        var sType = $("#cmbSearchType").val();
        $.ajax({ 
            type: "POST",
            url: '<?php echo SITE_PATH ?>index.php?controller=employee&function=searchData',
            data: "searchVal="+svalue+"&stype="+sType,      
            success: function(data){
                $("#dvList").html(data);
            }
        });
    }

    $(function () 
    {
        fncSearch();
    }); 

</script>
