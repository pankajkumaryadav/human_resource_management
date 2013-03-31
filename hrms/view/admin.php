<?php
/**
 * Filename : admin.php
 * Authour : Pankaj Kumar Yadav
 * Description : admin's main page.
 * Date_of_creation : 06-March-2013
 */
        /*session_start();
        
        ini_set("display_errors","1");
        
        if($_SESSION['authuser'] != 1) {
            echo 'Sorry, but you don\'t have permission to view this page!';
            exit();
        }
        
	require_once('../../../languages/lang.en.php');*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Human Resource Management System</title>
		<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
                
                <script>
                function career()
                {
                  
                    $.ajax({
                		type: "POST",
                		url: "<?php echo SITE_PATH?>index.php?controller=candidate&function=fetchAllJobs",
                		data: '',
                	     success: function(response){
                  
                                     	$("#templatemo_content").html(response);
                                            
                        }
                     
                    });
                }      

		function adminRequest(requestType)
                       {
					   //alert("top");
                           //alert(pagingType1);
                          /* if (requestType == 'profile') {
                               $.ajax({
					type: "POST",
					url: "../controller/candidate_controller.php",
					data: "request="+requestType,
				 beforeSend: function() {
					
			        },
			        success: function(response){
                                       // alert(response);
                                     	$("#templatemo_content").html(response);
                                        
			        },
			        complete: function () {
			            
			       },
			        error: function(){
			           
			       }
			    });
                           }
                           else if (requestType == 'accountSetting' ) {
                               $.ajax({
					type: "POST",
					url: "../controller/candidate_controller.php",
					data: "request="+requestType,
				 beforeSend: function() {
					
			        },
			        success: function(response){
                                       // alert(response);
                                     	$("#templatemo_content").html(response);
                                        
			        },
			        complete: function () {
			            
			       },
			        error: function(){
			           
			       }
			    });
                           }
                           else if (requestType == 'jobApplied' ) {
                               $.ajax({
					type: "POST",
					url: "../controller/candidate_controller.php",
					data: "request="+requestType,
				 beforeSend: function() {
					
			        },
			        success: function(response){
                                       // alert(response);
                                     	$("#templatemo_content").html(response);
                                        
			        },
			        complete: function () {
			            
			       },
			        error: function(){
			           
			       }
			    });
                           }
                           else */
                            if (requestType == 'logOut' ) {
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH;?>index.php?controller=login&function=logout",
					data:'',
			    });
                           }
                           else {
						  // alert(requestType);
                            $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admin&function=requestHandler&requestedPage="+requestType,
					data: "request="+requestType,
				 beforeSend: function() {
					
			        },
			        success: function(response){
                                      // alert(response);
                                     	$("#templatemo_content").html(response);
                                        
			        },
			        complete: function () {
			            
			       },
			        error: function(){
			           
			       }
			    });
                           }
                           
                           
                       }
                       
                      
                       
                      

		</script>
	</head>
	
	<body>
	<div id="templatemo_body_wrapper">
		<div id="templatemo_wrapper">
			<div id="tempaltemo_header">
				<span id="header_icon"></span>
				<div id="header_content">
				<div id="site_title">
					<a href="http://www.templatemo.com" target="_parent"><img src="../../../assets/images/title6.png" alt="LOGO" /></a>            
				</div>
				
				<a href="#" class="detail float_r"><?php echo ABOUT_US; ?></a>
				<a href="#" class="detail float_r" onclick = "career()"><?php echo CAREER; ?></a>
				<a href="#" class="detail float_r"><?php echo HOME; ?></a>
				<!-- <a href="#" class="detail float_r">Payroll</a>-->
			</div>
		</div> <!-- end of header -->
    
		<div id="templatemo_main_top"></div>
		<div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
			<div id="templatemo_sidebar">
               	<div id="templatemo_menu">
					<ul>
						<li>Recruitment</li>
						<li><a href="#" id = "postJob" onclick = "adminRequest(this.id)"  target="_parent" ><?php echo POST_JOB; ?></a></li>
						<li><a href="#" id = "viewJob" onclick = "adminRequest(this.id)"  target="_parent" ><?php echo VIEW_JOB; ?></a></li>
						<li><a href="#" id = "SearchCandidate" onclick = "adminRequest(this.id)" target="_parent"><?php echo SEARCH_CANDIDATE; ?></a></li>
						<li>Employee</li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=myProfile"  ><?php echo"View Profile" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAppiledLeaves"  > <?php echo"View Applied Leaves" ?> </a></li>
						<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchAcceptedLeaves"  > <?php echo"View Accepted Leaves" ?> </a></li>
					        <li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=searchDeninedLeaves"  > <?php echo"View Denined Leaves" ?> </a></li>
<li> <a href="<?php echo SITE_PATH?>index.php?controller=employee&function=listing"  ><?php echo"Show Database" ?> </a></li>
<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li></a></li>
						<li><a href="<?php echo SITE_PATH?>index.php?controller=admingrievance&function=admingrievancePage" id = "grievance" target="_parent"><?php echo GRIEVANCES;?></a></li>
						<li>Account</li>
						<li><a href="#" id = "accountSettings" onclick = "adminRequest(this.id)" target="_parent"><?php echo ACCOUNT_SETTING; ?></a></li>
						<li><a href="<?php echo SITE_PATH;?>" id = "logOut" onclick = "adminRequest(this.id)"  target="_parent"><?php echo LOG_OUT; ?></a></li>
						
						<!--    <li><a href="http://www.templatemo.com/page/1" target="_parent">Website Templates</a></li>
						<li><a href="http://www.templatemo.com/page/2" target="_parent">Our Company</a></li>
						<li><a href="http://www.templatemo.com/page/3" target="_parent">Contact Information</a></li>-->
					</ul>    	
				</div> <!-- end of templatemo_menu -->
        
				<!--<div class="sidebar_box">
					<div class="sb_title">Client Login</div>
						<div class="sb_content">
							<div id="login_form">
								<form method="post" action="#">
									<p>
										<span>User Name:</span>
										<input type="text" id="username" name="username" class="login_input" />
									</p>
									<p>
										<span>Password:</span>
										<input type="password" id="password" name="password" class="login_input" />
									</p>
								
									<input type="submit" name="submit" id="login_submit" value=" " />
								</form>
							</div>                 
						</div>
					<div class="sb_bottom"></div>            
				</div>-->
            
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = " width:100%; height:200px; backgroundcolor:black; border:solid 1px;">
                                    <h1>admin page</h1>This is the best you can get
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
        Copyright � 2048 <a href="#">Your Company Name</a> | 
        Designed by <a href="http://www.templatemo.com/page/1" target="_parent">Free CSS Templates</a> | 
        Validate <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; 
    		 <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    </div>
</div>-->

</body>
</html>
