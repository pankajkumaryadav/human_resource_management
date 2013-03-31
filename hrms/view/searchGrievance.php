<?php
/**
* Filename : grievanceView.php
* Authour : Jasleen kaur
* Description : first page of application.
* Date_of_creation : 10-March-2013
*/
	ini_set("display_errors","1");
	
?>
<head>
<script type="text/javascript">
 

function search_data(gnumber){
  
    

    $.ajax({ 
      type: "POST",
      url: "<?php echo SITE_PATH?>index.php?controller=grievance&function=findGrievance",                  //the script to call to get data          
                            
     data: "gnumber="+gnumber,
       
        success: function(response){
          $('#short_text').html(response);

        }
       
   });
  } 
        </script> 
		</head>              
                

<body>


				<div style = " width:100%; height:200px; backgroundcolor:black; border:solid 1px;">
					<!--
					This is the best you can get
					-->
				<div align="center">	
					 <form name="search"> 
                               
                                    
                      <br/><strong><?php echo ENTER_GRIEVANCE_NUMBER;?></strong><input type="text" name="Gno" size="10" onKeyUp="search_data(this.value)"  />
    
                            </form>
</div>
			<div id="short_text" align="center"></div>
										
                   </div>                    
										
				


</body>
</html>
