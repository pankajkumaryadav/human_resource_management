<?php
/**
* Filename : searchEmployee.php
* Authour : Megha Sahni
* Description : search the employee database on basis of id or name .
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
						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=addEmployee"><?php echo "Add Employee" ?></a></li></a></li>
						<li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=deleteEmployee"><?php echo "Delete User :" ?></a></li>
                                                <li><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=updateEmployee"><?php echo "Update User :" ?></a></li>
						
					</ul>    	
				</div> <!-- end of templatemo_menu -->
        
				
            
                
                <div class="cleaner"></div>
			</div> <!-- end of sidebar -->
        
			<div id="templatemo_content">
				<div style = " width:100%; height:200px; backgroundcolor:black; border:solid 1px;">
					<!--
					This is the best you can get
					-->
					<div id="short_text" align="center">
					 <form name="search" action="<?php echo SITE_PATH?>index.php?controller=employee&function=findEmployee" method="post"> 
                               
                                    
                      <br/><strong>Employee Id :</strong><input type="text" name="txtID" id="txtID" size="30" alt="Enter Employee Id" />
                                          
                      <br/> <input type="button" value="Search" name="search"  onclick="fncSearchEmp()"/>
                                          

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
function fncSearchEmp() {

	var strVal = $("#txtID").val();
if(strVal=="") { return false;}

    $.ajax({ 
     type: "GET",
     url: "<?php echo SITE_PATH?>index.php?controller=employee&function=fetchEmpDetails&searchval="+strVal,                  
      data: "",
        success: function(data){
$("#dvShow").html(data);
        }
    });
}
  </script>
