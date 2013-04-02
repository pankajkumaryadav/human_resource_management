<?php
/**
* Filename : employeesearchResult.php
* Authour : Megha Sahni
* Description : search teh employee database on basis of id or name .
* Date_of_creation : 11-March-2013
*/
	ini_set("display_errors","1");
	
?>
                

<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="tempaltemo_header">
	
    	 <span id="complaint_icon"></span> 
    	<div id="header_content">
        	<div id="site_title">
			<a href="#" target="_parent"><img src="images/title6.png" alt="LOGO" /></a>            </div>
            <a href="<?php echo SITE_PATH?>index.php?controller=login&function=loginPage" class="detail float_l"><?php echo HOME; ?></a>
			 <a href="#" class="detail float_r"><?php echo ABOUT_US; ?></a>
				
		 <!-- <a href="#" class="detail float_r">Payroll</a>-->
		  
		</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_main_top"></div>
		<div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
			<div id="templatemo_sidebar">
               	<div id="templatemo_menu">
					<ul>
<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchEmployee"  > <?php echo"Show Employee Details :" ?> </a></li>
						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchEmployee"><?php echo "Add Employee" ?></a></li></a></li>
						<li><a onclick="deleteUser()"><?php echo "Delete User :" ?></a></li>
                                                <li><a onclick="updateUser()"><?php echo "Update User :" ?></a></li>
						<li><a onclick=""><?php echo "Log Out :" ?></a></li>
						
					</ul>    	
				</div> <!-- end of templatemo_menu -->
        
				
            
                
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = " width:100%; height:200px; backgroundcolor:black; border:solid 1px;">
					<!--
					This is the best you can get
					-->
					<?php
			
			if(isset($arrData) && !empty($arrData)){ ?>
			
		<table align="center" cellspacing="5" cellpadding="5">
                                    <tbody> 	<?php 
										
										foreach($arrData as $row){ ?>
				
<tr><td><?php echo "************************************************************************************";?></td></tr>		
<tr>
							<td></td><td> <?php echo $row['id']; ?></td>
</tr><tr>
                                                       
                                                         <td>Name</td><td> <?php echo $row['first_name']; ?></td></tr><tr>
                                                        
							<td>Middle Name</td><td> <?php echo $row['middle_name']; ?></td></tr><tr>
                                                        
							<td>Last Name</td><td> <?php echo $row['last_name']; ?></td></tr><tr>
                                                        
                                                        <td>Temporary Address</td><td> <?php echo $row['temporary_address']; ?></td></tr><tr>
                                                        
                                                        
                                                        <td>Mobile Number</td><td> <?php echo $row['mobile_number']; ?></td></tr><tr>
                                                        
                                                         <td>Department Id</td><td> <?php echo $row['department_id']; ?></td></tr><tr>
                                                        
                                                         <td>Employee Type</td><td> <?php echo $row['employee_type']; ?></td></tr><tr>
                                                       
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
                                                         <td>Recent Qualification</td><td> <?php echo $row['recent_qualification']; ?></td>                           </tr><tr>                       
                                                         <td>Status</td><td> <?php echo $row['status']; ?></td>
                                                        </tr><tr>
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
			
			  <?php } 
				 
					else{
						  echo "<strong>INVALID GRIEVANCE NUMBER</strong>";
					}
					?> 
										
                                       
										
				</div>
            </div>
        
			<div class="cleaner"></div>    
		</div>
    
		<div id="templatemo_main_bottom">
    </div>

	</div> <!-- end of wrapper -->
</div>



</body>
</html>
