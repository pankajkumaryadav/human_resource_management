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
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>paging.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>paging.js"></script>

</head>
<body>
<form id = "searchForm">
<table>
	<tr>
		<td>Job Id :</td>
		<td><input type = "text" id = "jobId" name = "jobId" onkeyup = "search(this.value)" /></td>
	</tr>
</table>
</form>
	
	<div id="searchResult">
	<div id="main">
    <ul id="holder">
                                        <?php 
										
										foreach($arrData as $value){ ?>
										                          
								        
					<li> Job Id : <?php echo $value['id']; ?><br/>
					Designation : <?php echo $value['designation']; ?><br/>
					No. of Vacancies: <?php echo $value['no_of_vacancies']; ?><br/>
					High School : <?php echo $value['criteria_10th']; ?><br/>
					Senior Secondary : <?php echo $value['criteria_12th']; ?><br/>
					Graduation : <?php echo $value['criteria_grad']; ?><br/>
					Post Graduation : <?php echo $value['criteria_post_grad']; ?><br/>
					Experience : <?php echo $value['experience']; ?><br/>
					Offered Salary : <?php echo $value['offered_salary']; ?><br/>
					Last Submission Date : <?php echo $value['last_submission_date']; ?><br/>
					<a href = "#" name = "<?php echo $value['id']; ?>" onclick = "editJob(this.name)">Edit</a>
					<a href = "#" name = "<?php echo $value['id']; ?>" onclick = "deleteJob(this.name)">   Delete</a></li></li>

				
										<?php 
										} ?>
										
				</ui>
	</div>
	</div>
</body>
</html>
<script>
	function changeValue()
	{
		
	}
	function search(searchInput)
                       {
                      $.ajax({
					type: "POST",
					url: "<?php echo SITE_PATH?>index.php?controller=admin&function=fetchJobDetails",
					data: "searchRequest="+searchInput,
				     success: function(response){
					                  // redirect("../../../../index.php");
                                       //alert(response);
                                     	$("#searchResult").html(response);
                                        
			        },
			     
			    });
		              }
	function editJob(searchInput)
    {
   $.ajax({
	type: "POST",
	url: "<?php echo SITE_PATH?>index.php?controller=admin&function=editJob",
	data: "searchRequest="+searchInput,
  success: function(response){
	                  // redirect("../../../../index.php");
                    //alert(response);
                  	$("#searchResult").html(response);
                     
 },

});
   }
	function deleteJob(searchInput)
    {
   $.ajax({
	type: "POST",
	url: "<?php echo SITE_PATH?>index.php?controller=admin&function=deleteJob",
	data: "searchRequest="+searchInput,
  success: function(response){
	                  // redirect("../../../../index.php");
                    //alert(response);
                  	$("#searchResult").html(response);
                     
 },

});
   }
                          
		</script>