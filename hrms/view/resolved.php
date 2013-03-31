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
		<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>

		<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#shubh').dataTable();
			} );
		</script>
</head>                

<body>

				<div style = " width:100%; backgroundcolor:black;">
					<!--
					This is the best you can get
					-->

		<?php 
					if(isset($arrData) && !empty($arrData)){ ?>
					<table width="89%" border="1" cellpadding="0" cellspacing="0" id="shubh" class="display" >
<thead>
  <tr>
								<td align="left"><?php echo GRIEVANCE_NUMBER; ?></td>
								<td align="left"><?php echo GRIEVANCE_CATEGORY; ?></td>
								<td align="left"><?php echo GRIEVANCES; ?></td>   
								<td align="left"><?php echo RESPONSES; ?></td>
                    			<td align="left"><?php echo GRIEVANCE_TIME; ?></td>
                    			<td align="left"><?php echo CHECKED_TIME; ?></td>
                                           
                                        
                                        
                                        </tr>
										 
  										</thead>
  										<tbody>
                                        <?php 
										
										foreach($arrData as $resolved){ ?>
										                          
								        <tr>
                                        <td><?php echo $resolved['id']; ?></td>
										<td><?php echo $resolved['code_value']; ?></td>
										<td><?php echo $resolved['text']; ?></td>
									    <td><?php echo $resolved['response']; ?></td>
                                        <td><?php echo $resolved['grievance_time']; ?></td>
									    <td><?php echo $resolved['checked_time']; ?></td>
									    
                                        </tr>
										<?php 
										} ?>
										
										</tbody>
										</table>
			<?php	} 
				 
					else{
						  echo "<strong>".RGMSG1."</strong>";
					}
					?> 
										
                                       
										
				</div>
           


</body>
</html>
