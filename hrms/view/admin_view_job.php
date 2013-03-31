<?php
/**
 * Filename : admin_view_job.php
 * Authour : Pankaj Kumar Yadav
 * Description : allow admin to view and update the job posted.
 * Date_of_creation : 20-March-2013
 */
echo "view job";
if(!isset($arrData) || empty($arrData)) {
	echo "No Job is posted.";
	die();
}
//print_r($arrData)
?>
<html>
<head>
</head>
<body>
<form id = "searchForm">
<table>
	<tr>
		<td>Enter job Id :</td>
		<td><input type = "text" id = "jobId" name = "jobId" onkeyup = "search(this.value)" /></td>
		<td>designation :</td>
		<td><input type = "text" id = "designation" name = "designation" onkeyup = "search(this.value)" /></td>
	</tr>
</table>
</form>
	
	<div id="searchResult">
	</div>
</body>
</html>
<script>
	function search(searchInput)
                       {
        
                       $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admin&function=fetchJobDetails",
					data: $("#searchForm").serialize(),
				     success: function(response){
					                  // redirect("../../../../index.php");
                                       //alert(response);
                                     	$("#searchResult").html(response);
                                        
			        },
			     
			    });
		              }
                          
		</script>