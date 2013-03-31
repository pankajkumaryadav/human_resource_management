<?php
/**
* Filename : grievanceView.php
* Authour : Jasleen kaur
* Description : first page of application.
* Date_of_creation : 10-March-2013
*/
	ini_set("display_errors","1");
	
?>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css" title="currentStyle">
			
			@import "media/css/demo_table.css";
			
		</style>
        <link rel="stylesheet" type="text/css" href="layout.css" />
</head>                
                

<body>


				<div style = "backgroundcolor:black;">
					<!--
					This is the best you can get
					-->
					<?php 
					if(isset($arrData) && !empty($arrData)){ ?>
					<table border="1" cellpadding="0" cellspacing="0" id="shubh" class="display" >
						<thead>
  							<tr>
					
                                           
                   				<td align="left"><?php echo GRIEVANCE_NUMBER; ?></td>
								<td align="left"><?php echo EMPLOYEE_NAME; ?></td>
								<td align="left"><?php echo EMPLOYEE_EMAIL_ID; ?></td>
								<td align="left"><?php echo GRIEVANCE_CATEGORY; ?></td>
								<td align="left"><?php echo GRIEVANCES; ?></td>   
								<td align="left"><?php echo GRIEVANCE_TIME; ?></td>
                              </tr>
										 
  						</thead>
  						<tbody>
                    <?php 
										
					foreach($arrData as $unresolved){ ?>     
					<tr>
                    <td><?php echo $unresolved['id']; ?></td>
					<td><?php echo $unresolved['first_name']." ".$unresolved['middle_name']." ".$unresolved['last_name']; ?></td>
					<td><?php echo $unresolved['email_id']; ?></td>
					<td><?php echo $unresolved['code_value']; ?></td>
					<td><a href="#" onClick="submit1(<?php echo $unresolved['id']; ?>)"><?php echo $unresolved['text']; ?></a></td>
					<td><?php echo $unresolved['grievance_time']; ?></td>
				
                   </tr>
										<?php 
										} ?>
										
					</tbody>
				</table>
										
			<?php	} 
				 
					else{
						  echo "<strong>".UGMSG1."</strong>";
					}
					?> 
										
                                       
										
				</div>
           


</body>
</html>

		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>

		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#shubh').dataTable();
			} );
			
			
			
			function submit1(id){
                               $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admingrievance&function=adminSubmitResponse",
				
				data: "id="+id,
			        success: function(response){
                                        
                                     	$("#templatemo_content").html(response);
                                        
			        },
			     
			    });
                           } 
			
			
		</script>

