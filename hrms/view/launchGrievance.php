<?php
/**
* Filename : grievanceView.php
* Authour : Jasleen kaur
* Description : first page of application.
* Date_of_creation : 10-March-2013
*/
	ini_set("display_errors","1");
	
?>
<body>


				<div style = " width:100%; backgroundcolor:black; border:solid 1px;">
					<!--
					This is the best you can get
					-->
					 <form name="send" id="send">
                                <table width="60%" align="center">

                                    <tbody>
                                     
                                        <tr>
                                           
                                            <td width="10%"><strong><?php echo CATEGORY;?></strong></td>
                                            <td width="40%"><select name="category">
										    <?php if(isset($arrData) && !empty($arrData)){
											          foreach($arrData as $category){ ?> 
                                                    <option><?php echo $category['code_value'];?></option>
                                                   <?php } } ?>
                                                </select></td>
                                            
                                        </tr>
										<tr>
										<td width="10%"><strong><?php echo GRIEVANCE;?></strong> </td>
                                        <td width="40%"><textarea name="grievance" id="grievance" rows="8" cols="23"></textarea></td>
										</tr>
					
							</tbody>
							</table>
							<div align="center"><input type="button" value="Submit" name="button" onClick="validate_form(this)" /></div>
							</form>			
				</div>
            <script type="text/javascript">
 function validategrievance(fld)
            {
                var error = "";
                if (fld.value == "")
                {
                    error = "You didn't enter a grievance.\n";
                    fld.style.background = 'Yellow';
                    alert(error);
                    return false;
                }
                else
                {
                    fld.style.background = 'white';
                }
            }

            function validate_form(thisform)
            {
                with (thisform)
                {
                   
                    if (validategrievance(grievance)==false)
                    {grievance.focus();}
                    else
                    {
                        $.ajax({
    					type: "POST",
    					url: "<?php echo SITE_PATH?>index.php?controller=grievance&function=insertGrievance",
    					data: $('#send').serialize(),
    			        success: function(response){

                        alert("Your grievance has been inserted");
                        window.location.href="index.php?controller=grievance&function=grievancePage";
                                            
    			        },
    			     
    			    	});
                	}
                }
  
  
            }
        </script> 



</body>
</html>
