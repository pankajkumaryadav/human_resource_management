<?php
ini_set("display_errors","1"); 
?><html>
	
	<body>
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
					
					url: "<?php echo SITE_PATH?>index.php?controller=employee&function=empapplyLeave",
					
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
				
				
			</div>
		</div> <!-- end of header -->
    
		<div id="templatemo_main_top"></div>
		<div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
			<div id="templatemo_sidebar">
               	<div id="templatemo_menu">
					<ul><li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=empProfile"  ><?php echo"View Profile :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=status"  > <?php echo"View Applied Leaves status :" ?> </a></li>
						<li>  <a href="#" target="_parent" onclick="applyLeave()"> <?php echo"Apply for leave :" ?> </a></li>
					        <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=remainingleaves"  > <?php echo"View Leaves Due" ?> </a></li>
                              <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>
                    <li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li>
				       </ul>    	

				</div> <!-- end of templatemo_menu -->
        
            
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = "  background-color:silver; border:black solid 1px;">
<table>
			    <tr>
                  <td> <?php echo "Enter date you applied for"?><em>*</em></td>
                  <td><input type="text" name="app" id="app"/><br/></td>
                  </tr>	</table>	
	
		<?php
			
			if(isset($arrData) && !empty($arrData)){ ?>
			
		<table border="black solid 2px">
                                    <tbody> 	<?php 
										
										foreach($arrData as $row){ ?>
	
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
                  <td> <?php echo "Applied Date"?><em>*</em></td>
                  <td><input type="text" name="applied_date " id="applied_date "/><br/></td>
                 </tr>
	      <tr>
                   <td><?php echo "date_from :"?><em>*</em> </td>
                   <td><input type="text" name="date_from" id="date_from"/><br/></td>
                        <br/></td>

                   </tr>
	      <tr>
                   <td><?php echo "till_date:"?> </td>
                   <td><input type="text" name="till_date" id="till_date"/><br/></td>
                   </tr>
	       <tr>
                   <td><?php echo "total hours :"?><em>*</em></td>
                   <td><input type="text" name="designation" id="designation" onClick="count()"/><br/></td>
               </tr>
	       
          
	    <tr>
                <td> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=submitLeave"  >
<?php echo"Submit Details" ?> </a>
                    <input type="reset" value="reset" />
                </td>
            </tr> 
           
	</table> 

                                                        
		<?php
			}//foreach
		?>
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
<script>
$(function() {
	$( "#app" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
});
$("#app").datepicker({
    changeYear: true,
    dateFormat: 'dd/mm/yy',
    maxDate: '-1d'
});
</script>
</body>
</html>
