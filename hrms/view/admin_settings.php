<?php
/**
* Filename : admin_settings.php
* Authour : Pankaj Kumar Yadav
* Description : allow admin to change his/her password.
* Date_of_creation : 06-March-2013
*/
       /* session_start();
        
        ini_set("display_errors","1");
        
        if( (!isset($_SESSION['authuser'])) || ($_SESSION['authuser'] != 1)) {
            echo 'Sorry, but you don\'t have permission to view this page!';
            exit();
        }
        
	require_once('../../../languages/lang.en.php');*/
	echo 'admin settings';
?>
<html>
    <head>
        
    </head>
    
    <body>
    <center>
        <h1> <?php echo CHANGE_SETTINGS; ?></h1>
        <form id = "accountSettingForm">
            <table>
                <tr>
                    <td><?php echo PREVIOUS_PASSWORD; ?></td>
                    <td><input type="password" id = "oldPassword" name = "oldPassword"/></td>
                </tr>
                <tr>
                    <td><?php echo NEW_PASSWORD; ?></td>
                    <td><input type="password" id = "newPassword" name = "newPassword"/></td>
                </tr>
                <tr>
                    <td><?php echo CONFIRM_PASSWORD; ?></td>
                    <td><input type="password" id = "confirmPassword" name = "confirmPassword"/></td>
                </tr>
                 <tr>
                    <td><input type="reset" value="<?php echo RESET; ?>" id="reset" name="reset" style="float:right;"/></td>
                    <td><input type="button" value="<?php echo SAVE_CHANGES; ?>" id="submit" name="submit" onclick = "changePassword()" /></td>
                </tr>
                                
            </table>
            
            
        </form>
    </center>
    </body>
</html>
<script>
	function changePassword()
    {
       //alert("rrr");
            $.ajax({
				type: "POST",
				url: "<?php echo SITE_PATH?>index.php?controller=admin&function=changePassword",
				data:$("#accountSettingForm").serialize(),
				success: function(response){
					//alert("adsfasdfasdfasdfsda");
                  	$("#templatemo_content").html(response);
	                     
	 			}
			});
       
    } 
</script>
