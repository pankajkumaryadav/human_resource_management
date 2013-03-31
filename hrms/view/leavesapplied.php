<?php
ini_set("display_errors","1"); 
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
					<ul><li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=empProfile"  ><?php echo"View Profile :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=appiledLeaves"  > <?php echo"View Applied Leaves status :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAcceptedLeaves"  > <?php echo"Apply for leave :" ?> </a></li>
					        <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchDeninedLeaves"  > <?php echo"View Leaves Due :" ?> </a></li>
  
				       </ul>    	

				</div> <!-- end of templatemo_menu -->
        
            
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = "  background-color:silver; border:black solid 1px;">
<table align="center" cellspacing="5" cellpadding="5">				

<tr>
                  <td> <?php echo "Enter Date You Applied:"?><em>*</em></td>
                  <td><input type="text" name="applied" id="applied"/><br/></td>
                           </tr>
</table>
	
	
		<?php
			
			if(isset($arrData) && !empty($arrData)){ ?>
			
		<table align="center" cellspacing="5" cellpadding="5">
                                    <tbody> 	<?php 
										
										foreach($arrData as $row){ ?>
				
<tr><td><?php echo "************************************************************************************";?></td></tr>		
<tr>
							<td>S.No.</td><td> <?php echo $row['id']; ?></td>
</tr><tr>
                                                       
                                                         <td>Name</td><td> <?php echo $row['first_name']; ?></td></tr><tr>
                                                        
							<td>Middle Name</td><td> <?php echo $row['middle_name']; ?></td></tr><tr>
                                                        
							<td>Last Name</td><td> <?php echo $row['last_name']; ?></td></tr><tr>
                                                        
                                                        <td>Temporary Address</td><td> <?php echo $row['temporary_address']; ?></td></tr><tr>
                                                        
                                                        
                                                        <td>Mobile Number</td><td> <?php echo $row['mobile_number']; ?></td></tr><tr>
                                                        
                                                         <td>Department Id</td><td> <?php echo $row['department_id']; ?></td></tr><tr>
                                                        
                                                         
                                                       
                                                         <td>Designation</td><td> <?php echo $row['designation']; ?></td>	</tr><tr>			                         <td>Permanent Address</td><td> <?php echo $row['permanent_address']; ?></td></tr><tr>
                                                        
                                                       
                                                        <td>Gender</td><td> <?php echo $row['gender']; ?></td>
                                                        </tr><tr>
                                                        <td>Emergency Number</td><td> <?php echo $row['emergency_number']; ?></td>
                                                        </tr><tr>
                                                        <td>User Id</td><td> <?php echo $row['user_id']; ?></td>
                                                       
                                                         </tr><tr><td>DOB</td><td> <?php echo $row['dob']; ?></td>
                                                       </tr><tr>
                                                        <td>Hire Date</td><td> <?php echo $row['hire_date']; ?></td>
                                                       </tr><tr>
                                                        <td>Termination Date</td><td> <?php echo $row['termination_date']; ?></td>
                                                       </tr><tr>
                                                         <td>Recent Qualification</td><td> <?php echo $row['recent_qualification']; ?></td>                           </tr>
                                                         <td>Salary</td><td> <?php echo $row['salary']; ?></td></tr><tr>
                                                        <td>Marital Status</td><td><?php echo $row['marital_status'];?></td>	</tr>                                                     
</tr>
<tr><td><?php echo "************************************************************************************";?></td></tr>
                                                        
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
	$( "#dob" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
});
</script>
</body>
</html>
