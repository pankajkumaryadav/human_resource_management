<?php 
//session_start(); 
//include '../library/common.inc.php';
?>
<html>
	<head>
	</head>
	<body>
		<form id = "registrationForm">
			<fieldset>
				<legend>Registration Details</legend>
					<table>
						<tr>
							<td><?php echo USERNAME_EMAIL;?></td>
							<td><input type = "text" id = "email" name = "email"/></td>
						</tr>
						<tr>
							<td><?php echo PASSWORD;?></td>
							<td><input type = "password" id = "password" name = "password"/></td>
						</tr>
									<tr>
									<td></td>
							<td><img src="<?php echo SITE_PATH;?>cap/captcha.php" id="captcha" /><br/>


<!-- CHANGE TEXT LINK -->
	<a href="#" onclick="changeCaptcha()" id="change-image">Not readable? Change text.</a>
	</td>
						</tr>
						<tr>
							<td>Enter Text</td>
							<td><input type="text" name="captcha" id="captcha-form" autocomplete="off" /></td>
						</tr>
						<tr>
							<td></td>
							<td><!--<input type="submit" />--></td>
						</tr>
						<tr>
							<td></td>						
							<td><input type = "button" id = "submit" name = "submit" value = "Submit" onclick = "registerRequest()"/>
							<input type = "reset" id = "reset" name = "reset" value = "Reset"/></td>
						</tr>
		
			
					</table>
			</fieldset>
	</body>
	
</html>

<script>
	function changeCaptcha()
	{
		document.getElementById('captcha').src='<?php echo SITE_PATH;?>cap/captcha.php?'+Math.random();
	}

	function registerRequest()
    {
		$.ajax({
			type: "POST",
			url: "<?php echo SITE_PATH?>index.php?controller=captcha&function=validateCaptcha",
			data:$("#registrationForm").serialize(),
			success: function(response) {
				var result = response;
				if (result == 'true')
					{	
						
						$.ajax({
						type: "POST",
						url: "<?php echo SITE_PATH?>index.php?controller=login&function=saveRegistrationDetails",
						data:$("#registrationForm").serialize(),
						success: function(response){
						
		                  	$("#templatemo_content").html(response);
			                     
			 			
							}
					} );
				} else 
					{
					alert("Invalid Captcha");
					changeCaptcha();
					}	
			}
				              
                     
 			});
		}

</script>
