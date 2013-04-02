<?php
/**
* Filename : leavesappliedform.php
* Authour : Megha Sahni
* Description : Display the to employee for leave application .
* Date_of_creation : 15-March-2013
*/

ini_set("display_errors", "1");
?><html>
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="jscript/jquery/jquery-ui.js"></script>
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

                        </div><!-- end of templatemo_menu -->


                        <div class="cleaner"></div>
                    </div> <!-- end of sidebar -->

                    <div id="templatemo_content">
                        <form name="newemployee" id="newemployee" action="<?php echo SITE_PATH?>index.php?controller=employee&function=submitLeave" method="POST" >
                          
                               <table>
	
	
			      <tr>       
                                  <td><?php echo "select leave category";?><em>*</em></td>
                                  <td><select name="leave_category" id="leave_category">
                       <option value="27">el</option>
                       <option value="26">cl</option>
                       </select>
                  </td>
	                      </tr>
	                      <tr>
                                 <td><?php echo "Reason For leave:";?></td>
                                 <td><input type="text" id="reason" name="reason"/></td>
                            </tr> 
	             
						
	      <tr>
                   <td><?php echo "Date From:"?><em>*</em> </td>
                   <td><input type="text" name="date_from" id="date_from"/><br/></td>
                        <br/></td>

                   </tr>
	      <tr>
                   <td><?php echo "Till Date:"?> </td>
                   <td><input type="text" name="till_date" id="till_date"/><br/></td>
                   </tr>
	       <tr>
                   <td><?php echo "Total Hours :"?><em>*</em></td>
                   <td><input type="text" name="total_hours" id="total_hours" onClick="count()"/><br/></td>
               </tr>
	       
          
	    <tr>
                <td>  <input type ="submit" name="submit" value="Submit">  
                    <input type="reset" value="reset" />
                </td>
            </tr> 
           
	</table> 
    </form>
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

$(function() {
	$( "#date_from" ).datepicker({
	changeMonth: true,
		dateFormat: 'dd/mm/yy',
	changeYear: true
	});
});


	 
$(function() {
	$( "#till_date" ).datepicker({
	changeMonth: true,
		dateFormat: 'dd/mm/yy',
	changeYear: true
	});
});

	</script>
	
<script>
$(document).ready(function () {
    var selector = function (dateStr) {
            var d1 = $('#date_from').datepicker('getDate');
            var d2 = $('#till_date').datepicker('getDate');
            var diff = 0;
            if (d1 && d2) {
                diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
                if(diff=="0") {
                    $("#total_hours").val(8)
                    
                } else {
                    var nVal = 0;
                    nVal = diff * 8;
                    $("#total_hours").val(nVal+8)
                }
            }
            //$('.calculated').val(diff);
        }
    $("#date_from").datepicker({
        minDate: new Date(2012, 7 - 1, 8),
        maxDate: new Date(2012, 7 - 1, 28)
    });
    $('#till_date').datepicker({
        minDate: new Date(2012, 7 - 1, 9),
        maxDate: new Date(2012, 7 - 1, 28)
    });
    $('#date_from,#till_date').change(selector)
});
</script>