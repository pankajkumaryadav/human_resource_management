<?php
/**
* Filename : candidate_home_page.php
* Authour : Pankaj Kumar Yadav
* Description : candidate home page when he/she login to the application
* Date_of_creation : 05-March-2013
*/
   //session_start();
       
ini_set("display_errors","1");
        
if( (!isset($_SESSION['userInfo']['userType'])) || ($_SESSION['userInfo']['userType'] != '3')) {
    echo 'Sorry, but you don\'t have permission to view this page!';
    exit();
}
        
	//require_once('../../../languages/lang.en.php');*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Human Resource Management System</title>
<script>
function career()
{
  
    $.ajax({
		type: "POST",
		url: "<?php echo SITE_PATH?>index.php?controller=candidate&function=fetchNewJob",
		data: '',
	     success: function(response){
  
                     	$("#templatemo_content").html(response);
                            
        }
     
    });
}            

		function candidateRequest(requestType)
                       {

                            if (requestType == 'logOut' ) {
                             //alert("clicked on logout");
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH;?>index.php?controller=login&function=logout",
					data: '',
				   			      
			    });
                           }
                           else {
                            $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=candidate&function=requestHandler&requestedPage="+requestType,
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
						<a href="http://www.templatemo.com" target="_parent"><img
							src="../../../assets/images/title6.png" alt="LOGO" /></a>
					</div>

					<a href="#" class="detail float_r"><?php echo ABOUT_US; ?></a> <a
						href="#" class="detail float_r" onclick = "career()"><?php echo CAREER; ?></a> <a
						href="#" class="detail float_r"><?php echo HOME; ?></a>
					<!-- <a href="#" class="detail float_r">Payroll</a>-->
				</div>
			</div>
			<!-- end of header -->

			<div id="templatemo_main_top"></div>
			<div id="templatemo_main">
				<!--<span id="main_top"></span><span id="main_bottom"></span>-->
				<div id="templatemo_sidebar">
					<div id="templatemo_menu">
						<ul>
							<li><a href="#" id="profile" onclick="candidateRequest(this.id)"
								target="_parent"><?php echo CANDIDATE_PROFILE; ?></a></li>
							<li><a href="#" id="jobApplied"
								onclick="candidateRequest(this.id)" target="_parent"><?php echo JOB_APPLIED; ?></a></li>
							<li><a href="#" id="accountSettings"
								onclick="candidateRequest(this.id)" target="_parent"><?php echo ACCOUNT_SETTING; ?></a></li>
							<li><a href="<?php echo SITE_PATH;?>" id="logOut" onclick="candidateRequest(this.id)" target="_parent"><?php echo LOG_OUT; ?></a></li>
							<!--    <li><a href="http://www.templatemo.com/page/1" target="_parent">Website Templates</a></li>
						<li><a href="http://www.templatemo.com/page/2" target="_parent">Our Company</a></li>
						<li><a href="http://www.templatemo.com/page/3" target="_parent">Contact Information</a></li>-->
						</ul>
					</div>
					<!-- end of templatemo_menu -->

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
				</div>
				<!-- end of sidebar -->

				<div id="templatemo_content">
					<div
						style="width: 100%; height: 200px; backgroundcolor: black; border: solid 1px;">
						This is the best you can get</div>
				</div>

				<div class="cleaner"></div>
			</div>

			<div id="templatemo_main_bottom"></div>

		</div>
		<!-- end of wrapper -->
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