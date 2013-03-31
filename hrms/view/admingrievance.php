<?php
/**
* Filename : grievanceView.php
* Authour : Jasleen kaur
* Description : first page of application.
* Date_of_creation : 10-March-2013
*/
	ini_set("display_errors","1");
	
?><head>
<script>
function resolved(){
                           
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admingrievance&function=adminresolvedPage",
					
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

function unresolved(){
                           
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admingrievance&function=adminunresolvedPage",
					
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

function launchGrievance(){
                           
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admingrievance&function=adminlaunchGrievance",
					
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

function searchGrievance(){

                           
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admingrievance&function=adminsearchGrievance",
					
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
</script>
</head>


<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="tempaltemo_header">
	
    	 <span id="complaint_icon"></span> 
    	<div id="header_content">
        	<div id="site_title">
			<a href="#" target="_parent"><img src="images/title6.png" alt="LOGO" /></a>            </div>
            <a href="<?php echo SITE_PATH?>index.php?controller=login&function=authenticateUser" class="detail float_l"><?php echo HOME; ?></a>
			<a href="<?php echo SITE_PATH?>index.php?controller=admingrievance&function=admingrievancePage" class="detail float_l"><?php echo GRIEVANCES; ?></a>
			
			
		 <!-- <a href="#" class="detail float_r">Payroll</a>-->
		  
		</div>
    </div> <!-- end of header -->
    
    <div id="templatemo_main_top"></div>
		<div id="templatemo_main"><!--<span id="main_top"></span><span id="main_bottom"></span>-->
			<div id="templatemo_sidebar">
               	<div id="templatemo_menu">
					<ul>
						<li><a href="#" target="_parent" onclick="resolved()"><?php echo RESOLVED_GRIEVANCES."(".$arrData["resolved"].")";?> </a></li>
						<li><a href="#" target="_parent" onclick="unresolved()"><?php echo UNRESOLVED_GRIEVANCES."(".$arrData["unresolved"].")"; ?></a></li>
						<li><a href="#" target="_parent" onclick="searchGrievance()"><?php echo SEARCH_GRIEVANCES; ?></a></li>
						<li><a href="<?php echo SITE_PATH;?>index.php?controller=login&function=logout" target="_parent"><?php echo LOG_OUT; ?></a></li>
						
					</ul>    	
				</div> <!-- end of templatemo_menu -->
        
				
            
                
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				
					<!--
					This is the best you can get
					-->
					
			
				<?php 
					if(isset($arrData) && !empty($arrData)){ ?>
					<div id="show" style = " width:100%; height:200px; backgroundcolor:black; border:solid 1px;">
					<table align="center" cellspacing="5" cellpadding="5" >
                        <tbody> <tr>
                                           
                          <th width="30%" align="Left"><?php echo TOTAL_GRIEVANCES; ?></th>
                          <th width="30%" align="left"><?php echo RESOLVED_GRIEVANCES; ?></th>
                          <th width="30%" align="left"><?php echo UNRESOLVED_GRIEVANCES; ?></th>
                                            
                                        </tr>
                                        <tr>
                                         <?php
        
         $grievanceCount=array();
		 $grievanceCount=$arrData;
          ?> 
										 
										 
										   
                                           
                                           <td><?php echo $grievanceCount["total"];?></td>
                                            <td><?php echo $grievanceCount["resolved"]; ?></td>
                                            <td><?php echo $grievanceCount["unresolved"]; ?></td>
                                            
                                         <?php }  ?>
                                        </tr>
										</tbody>
										</table> 
   	
					
					
					
					
					
					
					
					
					
					
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
