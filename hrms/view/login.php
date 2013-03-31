<?php
/**
* Filename : index.php
* Authour : Pankaj Kumar Yadav
* Description : first page of application.
* Date_of_creation : 04-March-2013
*/
	ini_set("display_errors","1");
	//require_once('application/languages/lang.en.php');
	
?>
<html>
<head></head>
<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="tempaltemo_header">
	
    	<span id="header_icon"></span>
    	<div id="header_content">
        	<div id="site_title">
			<a href="#" target="_parent"><img src="images/title6.png" alt="LOGO" /></a>            </div>
                        <a href="#" class="detail float_l"><?php echo HOME; ?></a>
			<a href="#" class="detail float_l" onclick = "career()"><?php echo CAREER; ?></a>
			<a href="#" class="detail float_l"><?php echo ABOUT_US; ?></a>
			
		 <!-- <a href="#" class="detail float_r">Payroll</a>-->
		  
		</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
    	
        <div id="templatemo_sidebar">
        
        <!--	<div id="templatemo_menu">
                <ul>
                    <li><a href="http://www.templatemo.com" target="_parent" class="current">Home</a></li>
                    <li><a href="http://www.webdesignmo.com" target="_parent">Web Design</a></li>
                    <li><a href="http://www.flashmo.com/page/1" target="_parent">Flash Files</a></li>
                    <li><a href="http://www.templatemo.com/page/1" target="_parent">Website Templates</a></li>
                    <li><a href="http://www.templatemo.com/page/2" target="_parent">Our Company</a></li>
                    <li><a href="http://www.templatemo.com/page/3" target="_parent">Contact Information</a></li>
              </ul>    	
            </div> <!-- end of templatemo_menu -->
        
        	<div class="sidebar_box">
            	<div class="sb_title"><?php echo CLIENT_LOGIN ?></div>
                <div class="sb_content">
                	<div id="login_form">
                        <form id="loginForm" action = "<?php echo SITE_PATH?>index.php?controller=login&function=authenticateUser" method="POST">
                        	<p><span><?php echo USERNAME; ?>:</span>
                            <input type="text" id="username" name="email_id" class="login_input" />
                            </p>
                            <p><span><?php echo PASSWORD; ?>:</span>
                            <input type="password" id="password" name="password" class="login_input" />
                            </p>
                            <input type="submit" name="submit" id="login_submit" value=""/>
			    		<input type="button" name="register" id="register" onclick = "userRequest(this.id)" value="" />
                        </form>
					</div>                 
                </div>
                <div class="sb_bottom"></div>            
            </div>
            
                       
            
            
            <div class="cleaner"></div>
        </div> <!-- end of sidebar -->
        
        <div id="templatemo_content">
        	<div style = " width:100%; height:200px; backgroundcolor:black; border:solid 1px;">
        	<?php 
				if(isset($arrData) && !empty($arrData)) {
					echo $arrData;         	
				} else {
					echo "This is the best you can get.";
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

                <script>

		function userRequest(requestType)
                       {
                           //alert(pagingType1);
                           
                           if (requestType == 'login_submit') {
                               $.ajax({
					type: "POST",
					url: "application/modules/login/controller/login_controller.php",
					data: $("#loginForm").serialize()+"&request="+requestType,
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
                           else if (requestType == 'register'){
                              // alert("register");
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=login&function=registerCandidate",
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

        function career()
        {              
        
          
            $.ajax({
				type: "POST",
				url: "<?php echo SITE_PATH?>index.php?controller=admin&function=fetchJobDetails",
				data: '',
			     success: function(response){
          
                             	$("#templatemo_content").html(response);
                                    
		        }
		     
		    });
        }                  
                      
                       
                      

		</script>
		

