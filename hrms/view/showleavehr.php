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
					<ul><li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=myProfile"  ><?php echo"View Profile :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAppiledLeaves"  > <?php echo"View Applied Leaves :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAcceptedLeaves"  > <?php echo"View Accepted Leaves :" ?> </a></li>
					        <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchDeninedLeaves"  > <?php echo"View Denined Leaves :" ?> </a></li>
                          <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>
                    <li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li>
				       </ul>    	

				</div> <!-- end of templatemo_menu -->
        
            
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = "  background-color:#B9DA54; border:black solid 1px;">
					
	
		<?php
			
			if(isset($arrData) && !empty($arrData)){ ?>
			
		<table align="center" cellspacing="15" cellpadding="10"  border="black solid 2px" >
                                    <tbody style="background-color:FloralWhite"> 	
                                    <?php 
										
										foreach($arrData as $row){ ?>
				
							<td><b>S.No.</b></td><td><b> <?php echo $row['id']; ?></b></td>
</tr><tr>
                                                       
                                                         <td><b>Name</b></td><td> <b><?php echo $row['first_name']; ?></b></td></tr><tr>
                                                        
							<td><b>Middle Name</b></td><td><b> <?php echo $row['middle_name']; ?></b></td></tr><tr>
                                                        
							<td><b>Last Name</b></td><td> <b><?php echo $row['last_name']; ?></b></td></tr><tr>
                                                        
                                                        <td><b>Temporary Address</b></td><td><b> <?php echo $row['temporary_address']; ?></b></td></tr><tr>
                                                        
                                                        
                                                        <td><b>Mobile Number</b></td><td> <b><?php echo $row['mobile_number']; ?></b></td></tr><tr>
                                                        
                                                         <td><b>Department Id</b></td><td> <b><?php echo $row['dname']; ?></b></td></tr><tr>
                                                        
                                                         <td><b>Employee Type</b></td><td><b> <?php echo $row['usrtype']; ?></b></td></tr><tr>
                                                       
                                                         <td><b>Designation</b></td><td> <b><?php echo $row['cname']; ?></b></td>	</tr><tr>			                         <td><b>Permanent Address</b></td><td> <b><?php echo $row['permanent_address']; ?></b></td></tr><tr>
                                                        
                                                       
                                                        <td><b>Gender</b></td><td> <b><?php echo $row['gname']; ?></b></td>
                                                        </tr><tr>
                                                        <td><b>Emergency Number</b></td><td> <b><?php echo $row['emergency_number']; ?></b></td>
                                                        </tr><tr>
                                                        <td><b>User Id</b></td><td><b> <?php echo $row['user_id']; ?></b></td>
                                                       
                                                         </tr><tr><td><b>DOB</b></td><td><b> <?php echo $row['dob']; ?></b></td>
                                                       </tr><tr>
                                                        <td><b>Hire Date</b></td><td> <b><?php echo $row['hire_date']; ?></b></td>
                                                       </tr><tr>
                                                        <td><b>Termination Date</b></td><td><b> <?php echo $row['termination_date']; ?></b></td>
                                                       </tr><tr>
                                                         <td><b>Recent Qualification</b></td><td> <b><?php echo $row['recent_qualification']; ?></b></td>                           </tr><tr>                       
                                                         <td><b>Status</b></td><td> <b><?php echo $row['status']; ?></b></td>
                                                        </tr><tr>
                                                         <td><b>Salary</b></td><td> <b><?php echo $row['salary']; ?></b></td></tr><tr>
                                                        <td><b>Marital Status</b></td><td><b><?php echo $row['marital'];?></b></td>	</tr>                                              
                                                        
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

</body>
</html>
