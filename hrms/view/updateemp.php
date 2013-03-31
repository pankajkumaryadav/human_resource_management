<?php

//echo 'oye<pre>';
//print_r($arrData);
//die;
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

			<a href="#" class="detail float_l"><?php echo LOG_OUT ;?></a>
			
		 <!-- <a href="#" class="detail float_r">Payroll</a>-->
		  
		</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_main_top"></div>
		<div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
			<div id="templatemo_sidebar">
               	<div id="templatemo_menu">
					<ul>
					<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=myProfile"  ><?php echo"View Profile :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAppiledLeaves"  > <?php echo"View Applied Leaves :" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAcceptedLeaves"  > <?php echo"View Accepted Leaves :" ?> </a></li>
					        <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchDeninedLeaves"  > <?php echo"View Denined Leaves :" ?> </a></li>
 							 <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=listing"  ><?php echo"Show Database :" ?> </a></li>

						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li></a></li>

						
					</ul>    	
				</div> <!-- end of templatemo_menu -->
        
				
            
                
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = " width:100%; min-height:200; backgroundcolor:black; border:solid 1px;">
					<!--
					This is the best you can get
					-->
                                   
					<div id="short_text" align="center">
					 <form name="updateEmp" id="updateEmp" method="post"> 
<input type="hidden" name="id" id="id" value="<?php echo $arrData['id']?>"/>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $arrData['user_id']?>"/>
                               
 <table width="600" align="center" cellspacing="10" cellpadding="10"  border="black solid 2px" >
                                    <tbody style="background-color:#B9DA54"> 
	<tr>
		<td>First Name</td>
		<td><input type="text" name="first_name" id="first_name" value="<?php echo $arrData['first_name']?>"/></td>
	</tr>
	<tr>
		<td>Middle Name</td>
		<td><input type="text" name="middle_name" id="middle_name" value="<?php echo $arrData['middle_name']?>"/></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type="text" name="last_name" id="last_name" value="<?php echo $arrData['last_name']?>"/></td>
	</tr>
	<tr>
		<td>Date of Birth</td>
		<td><input type="text" name="dob" id="dob" value="<?php echo $arrData['empdob']?>"/></td>
	</tr>
	<tr>
		<td>Permanent Address</td>
		<td><input type="text" name="permanent_address" id="permanent_address" value="<?php echo $arrData['permanent_address']?>"/></td>
	</tr>
	<tr>
		<td>Permanent City</td>
		<td><input type="text" name="permanent_city" id="permanent_city" value="<?php echo $arrData['permanent_city']?>"/></td>
	</tr>
	<tr>
		<td>Permanent State</td>
		<td><input type="text" name="permanent_state" id="permanent_state" value="<?php echo $arrData['permanent_state']?>"/></td>
	</tr>
	<tr>
		<td>Permanent Pincode</td>
		<td><input type="text" name="permanent_pin" id="permanent_pin" value="<?php echo $arrData['permanent_pin']?>"/></td>
	</tr>
	<tr>
		<td>Temporary Address</td>
		<td><input type="text" name="temporary_address" id="temporary_address" value="<?php echo $arrData['temporary_address']?>"/></td>
	</tr>
	<tr>
		<td>Temporary City</td>
		<td><input type="text" name="temporary_city" id="temporary_city" value="<?php echo $arrData['temporary_city']?>"/></td>
	</tr>
	<tr>
		<td>Temporary State</td>
		<td><input type="text" name="temporary_state" id="temporary_state" value="<?php echo $arrData['temporary_state']?>"/></td>
	</tr>
	<tr>
		<td>Temporary Pincode</td>
		<td><input type="text" name="temporary_pin" id="temporary_pin" value="<?php echo $arrData['temporary_pin']?>"/></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>
                    <select name="gender" id="gender">
                       <option value="5" <?php if($arrData['gender']=="5") echo "selected";?>>Female</option>
                       <option value="4" <?php if($arrData['gender']=="4") echo "selected";?>>Male</option>
                       </select>
                    </td>
	</tr>
	<tr>
		<td>Mobile Number</td>
		<td><input type="text" name="mobile_number" id="mobile_number" value="<?php echo $arrData['mobile_number']?>"/></td>
	</tr>
        <tr>
		<td>Emergency Number</td>
		<td><input type="text" name="emergency_number" id="emergency_number" value="<?php echo $arrData['emergency_number']?>"/></td>
	</tr>
        <tr>
		<td>Marital Status</td>
		<td>
                    <select name="marital_status" id="marital_status">
                       <option value=6 <?php if($arrData['marital_status']=="6") echo "selected";?>>Single</option>
                       <option value="7" <?php if($arrData['marital_status']=="7") echo "selected";?>>Merried</option>
                      </select>
                </td>
	</tr>
        <tr>
		<td>Recent Qualification</td>
		<td><input type="text" name="recent_qualification" id="recent_qualification" value="<?php echo $arrData['recent_qualification']?>"/></td>
	</tr>
        <tr>
		<td>Salary</td>
		<td><input type="text" name="salary" id="salary" value="<?php echo $arrData['salary']?>"/></td>
	</tr>
        <tr>
		<td>Department</td>
		<td>
                     <select name="department_id" id="department_id">
                  	<option value="1" <?php if($arrData['department_id']=="1") echo "selected";?>>IT</option>
                       <option value="2" <?php if($arrData['department_id']=="2") echo "selected";?>>HR</option>
                       <option value="3" <?php if($arrData['department_id']=="3") echo "selected";?>>Finance</option>
                       
                      </select>
                    
                </td>
	</tr>
        <tr>
		<td>Hire Date</td>
		<td><input type="text" name="hire_date" id="hire_date" value="<?php echo $arrData['hiredate']?>"/></td>
	</tr>
        <tr>
		<td>Termination Date</td>
		<td><input type="text" name="termination_date" id="termination_date" value="<?php echo $arrData['terminationdate']?>"/></td>
	</tr>
        <tr>
		<td>Retire Date</td>
		<td><input type="text" name="retire_date" id="retire_date" value="<?php echo $arrData['retiredate']?>"/></td>
	</tr>
        <tr>
		<td>Account Number</td>
		<td><input type="text" name="account_number" id="account_number" value="<?php echo $arrData['account_number']?>"/></td>
	</tr>
        <tr>
		<td>Designation</td>
		<td>
                    
                     <select name="designation" id="designation">
                  	<option value="13" <?php if($arrData['designation']=="13") echo "selected";?>>Software Engineer</option>
                       <option value="14" <?php if($arrData['designation']=="14") echo "selected";?>>Manager</option>
                       <option value="15" <?php if($arrData['designation']=="15") echo "selected";?>>Project Manager</option>
                       <option value="16" <?php if($arrData['designation']=="16") echo "selected";?>>Assistant</option>
                       <option value="17" <?php if($arrData['designation']=="17") echo "selected";?>>Tester</option>
                       <option value="18" <?php if($arrData['designation']=="18") echo "selected";?>>Merried</option>
                       <option value="19" <?php if($arrData['designation']=="19") echo "selected";?>>Merried</option>
                      </select>
                </td>
	</tr>
	<tr>
		<td><input type="button" name="btnSave" id="btnSave" value="Save" onclick="fncSave()"/></td>
	</tr>
</tbody>
</table>              
                      
                                          

                            </form>
										
                   </div> 
<div id="dvShow"></div>                   
										
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

<script id="source" language="javascript" type="text/javascript">
function fncSave() {
	
    $.ajax({ 
     type: "POST",
     url: "<?php echo SITE_PATH?>index.php?controller=employee&function=saveupdateEmployee",                  
      data: $("#updateEmp").serialize(),
        success: function(data){
		window.location.href = "<?php echo SITE_PATH?>index.php?controller=employee&function=listing";
        }
    });
}

function FillBilling(f) {
  if(f.billingtoo.checked == true) {
  f.temporary_address.value = f.permanent_address.value;
    f.temporary_city.value = f.permant_city.value;
    f.temporary_state.value = f.permanent_state.value;
    f.temporary_pin.value = f.permanent_pin.value;
  
}
}
$(function() {
	$( "#dob" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
        
        $( "#hire_date" ).datepicker({
	changeMonth: true,
	changeYear: true
	});
        
        
        $( "#termination_date" ).datepicker({
	changeMonth: true,
	changeYear: true
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
        
});


//function fncSubmitEmp() {
//	var strVal1 = $("#txtID").val();
//if(strVal1=="") { return false;}

  //  $.ajax({ 
   //  type: "GET",
    // url: "<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee1&searchval1="+strVal1,                  
     // data: "",
      //  success: function(data){
//$("#dvShow").html(data);
  //      }
    //});
//}
//$("input#dob").datepicker({ altField: 'input#dob', altFormat: 'yyyy-mm-dd' }); 
</script>
