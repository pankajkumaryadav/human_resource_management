	<head>
		
	</head>
	
	<body>



<link rel="stylesheet" href="css/jquery-ui.css" />

    <script language="javascript" type="text/javascript" src="jscript/jquery/jquery.js"></script>
<script src="jscript/jquery/jquery-ui.js"></script>


<script language="javascript" type="text/javascript" >
        
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
					<a href="http://www.templatemo.com" target="_parent"><img src="../../../assets/images/title6.png" alt="LOGO" /></a>            
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
<!--						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchEmployee"  > <?php echo"Show Employee Details :" ?> </a></li>-->
						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li></a></li>
<!--						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=deleteEmployee"><?php echo "Delete User :" ?></a></li>
                                                <li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=updateEmployee"><?php echo "Update User :" ?></a></li>-->
				       </ul>    	
				</div> <!-- end of templatemo_menu -->
        
				
            
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
			<div style = "  background-color:#B9DA54; border:black solid 1px;">
				
                                 <form name="newemployee" id="newemployee" method="POST" action = "<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee1">
                              
                               <table>
			      <tr>       
                                  <td><?php echo "First Name:";?><em>*</em></td>
                                  <td><input type="text" id="first_name" name="first_name"/></td>
                                  <td><span id="firstError"></td>
	                      </tr>
	                      <tr>
                                 <td><?php echo "Middle Name:";?></td>
                                 <td><input type="text" id="middle_name" name="middle_name"/></td>
                                 <td><span id="middleError"></td>
                             </tr> 
	                    <tr>
                                <td><?php echo "Last Name:";?><em>*</em></td>
                                <td><input type="text" id="last_name" name="last_name"/></td>
                                <td><span id="lastError"></td>
                           </tr>
						   <tr>
                                <td><?php echo "Email:";?><em>*</em></td>
                                <td><input type="text" id="email_id" name="email_id"/></td>
                                <td><span id="lastError"></td>
                           </tr>
	                   <tr>
                              <td><?php echo "Enter Your Permanent Address";?></td>
                           </tr>
	                   <tr>
                             <td><?php echo "Address";?>:<em>*</em></td>
                             <td><input type="text" id="permanent_address" name="permanent_address"/></td>
                             <td><span id="addressError"></td>
                          </tr>
	                  <tr>
                             <td><?php echo "City:"?><em>*</em></td>
                             <td><input type="text" id="permant_city" name="permant_city"/><br/></td>
                            <td><span id="cityError"></td>
                         </tr>
                     	<tr>
                            <td><?php echo "State:"?><em>*</em></td>
                            <td><input type="text" id="permanent_state" name="permanent_state"/><br/></td>
                            <td><span id="stateError"></td>
                       </tr>
                      <tr>
                            <td><?php echo"Pin Code:"?><em>*</em></td>
                           <td><input type="text" id="permanent_pin" name="permanent_pin"/><br/></td>
                           <td><span id="pinError"></td>
                     </tr>
                     <tr> 
                         <td colspan=2><?php echo "Enter Your Temporary Address."?></td>
                     </tr>
	             <tr>
                        <td colspan=2><input type="checkbox" name="billingtoo" onclick="FillBilling(this.form)">
                        <em>Check this box if Billing Address and Mailing Address are the same.</em>
                        </td>
                    </tr>
	           <tr>
                        <td><?php echo "Address:"?><em>*</em></td>
                        <td><input type="text" name="temporary_address" id="temporary_address"/><br/></td>
                        <td><span id="taddressError"></td> 
                  </tr>
	         <tr>
                    <td><?php echo "City:"?><em>*</em></td>
                    <td><input type="text" name="temporary_city" id="temporary_city"/><br/></td>
                    <td><span id="tcityError"></td>
                 </tr>
	         <tr>
                    <td><?php echo "State:"?><em>*</em></td>
                    <td><input type="text" name="temporary_state" id="temporary_state"/><br/></td>
                    <td><span id="tstateError"></td>
                </tr>
	        <tr>
                    <td><?php echo "Pin Code:"?><em>*</em></td>
                    <td><input type="text" name="temporary_pin" id="temporary_pin" /><br/></td>
                    <td><span id="tpinError"></td>
                </tr>
	       <tr>
                   <td><?php echo "Gender:"?><em>*</em></td>
                   <td><select name="gender" id="gender">
                       <option value="5">Female</option>
                       <option value="4">Male</option>
                       </select>
                  </td>
               </tr>
	       <tr>
                  <td><?php echo "Mobile Number:"?><em>*</em></td>
                  <td><input type="text" name="mobile_number" id="mobile_number" /><br/></td>
                  <td><span id="phoneError"></td>
               </tr>
        	<tr>
                   <td><?php echo "Emergency contact Number:"?><em>*</em></td>
                   <td><input type="text" name="emergency_number" id="emergency_number"/><br/></td>
                   <td><span id="ephoneError"></td>
               </tr>
		<tr>
                  <td> <?php echo "Date Of Birth:"?><em>*</em></td>
                  <td><input type="text" name="dob" id="dob"/><br/></td>
                  <td><span id="dobError"></td>
               </tr>
	      <tr>
                   <td><?php echo "Hiredate :"?><em>*</em> </td>
                   <td><input type="text" name="hire_date" id="hire_date"/><br/></td>
                        <br/></td>

                   <td><span id="hiredateError"></td>
              </tr>
	      <tr>
                   <td><?php echo "Termination date:"?> </td>
                   <td><input type="text" name="termination_date" id="termination_date"/><br/></td>
                   </tr>
	       <tr>
                   <td><?php echo "Marital Status :"?><em>*</em></td>
                   <td><select name="marital_status" id="marital_status">
                       <option value=6>Single</option>
                       <option value="7">Merried</option>
                      </select><br/></td>
               </tr>
	       <tr>
                  <td><?php echo "Designation :"?><em>*</em></td>
                  <td>
                  <select name="designation" id="designation">
                  	<option value="13">Software Engineer</option>
                       <option value="14">Manager</option>
                       <option value="15">Project Manager</option>
                       <option value="16">Assistant</option>
                       <option value="17">Tester</option>
                       <option value="18">Merried</option>
                       <option value="19">Merried</option>
                      </select>
                  
<!--                   <input type="text" name="designation" id="designation"/> -->
                  <br/></td> 
                  <td><span id="desigError"></td>
              </tr>
	      <tr>
                 <td><?php echo "Department :"?><em>*</em></td>
                 <td>
                 
                 <select name="department_id" id="department_id">
                  	<option value="1">IT</option>
                       <option value="2">HR</option>
                       <option value="3">Finance</option>
                       
                      </select>
<!--                  <input type="text" name="department_id" id="department_id"/> -->
                 
                 
                 <br/></td>
                 <td><span id="departmentError"></td>
              </tr>
	      <tr>
                 <td><?php echo "Most Recent Qualification :"?><em>*</em></td>
                <td><input type="text" name="recent_qualification" id="recent_qualification" /></td>
                 <td><span id="qualificationError"></td>
             </tr>
	         
            <tr>
                <td><?php echo "Account Number :"?><em>*</em></td>
                <td><input type="text" name=" account_number" id=" account_number" /><br/></td>
                <td><span id="accountError"></td>
            </tr> 
	    <tr>
                <td><?php echo "Salary :"?><em>*</em></td>
                <td><input type="text" name="salary" id="salary" /><br/></td>
                <td><span id="salaryError"></td>
            </tr>
          
	    <tr>
                <td> 
                <input type="submit" name="btnSubmit" value="Submit"/> 

                    <input type="reset" value="reset" />
                </td>
            </tr> 
           
	</table> 
    </form>

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
<script>function FillBilling(f) {
  if(f.billingtoo.checked == true) {
  f.temporary_address.value = f.permanent_address.value;
    f.temporary_city.value = f.permant_city.value;
    f.temporary_state.value = f.permanent_state.value;
    f.temporary_pin.value = f.permanent_pin.value;
  
}
}</script>

 <script>
$(function() {
	$( "#dob" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
});
$(function() {
	$( "#hire_date" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
});
$(function() {
	$( "#termination_date" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
});
$("#dob").datepicker({
    changeYear: true,
    dateFormat: 'dd/mm/yy',
    minDate: new Date('1960/01/01'),
    maxDate: new Date('1995/01/01')
});
$("#hire_date").datepicker({
    changeYear: true,
    dateFormat: 'dd/mm/yy',
    minDate: new Date('1960/01/01'),
    maxDate: '-1d'
});
$("#termination_date").datepicker({
    changeYear: true,
    dateFormat: 'dd/mm/yy',
    minDate: new Date('1960/01/01'),
    maxDate: '-1d'
});

</script>

</body>
</html>
