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
							<td><input type = "button" id = "submit" name = "submit" value = "Submit" onclick = "registerRequest()"/></td>
							<td><input type = "reset" id = "reset" name = "reset" value = "Reset"/></td>
						</tr>
			
					</table>
			</fieldset>
		</form>
	</body>
	
</html>

<script>
	function registerRequest()
    {
       //alert("rrr");
            $.ajax({
				type: "POST",
				url: "<?php echo SITE_PATH?>index.php?controller=login&function=saveRegistrationDetails",
				data:$("#registrationForm").serialize(),
				success: function(response){
					//alert("adsfasdfasdfasdfsda");
                  	$("#templatemo_content").html(response);
	                     
	 			}
			});
       
    } 
</script>
