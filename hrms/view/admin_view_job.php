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
	
	<div id="searchResult">
		<table width="100%" border="1" cellpadding="0" cellspacing="0"
			id="shubh" class="display">
			<thead>
				<tr>


					<td align="center">Job Id</td>
					<td align="center">Designation</td>
					<td align="center">No. of Vacancies</td>
					<td align="center">High School</td>
					<td align="center">Senior Secondary</td>
					<td align="center">Graduation</td>
					<td align="center">Post Graduation</td>
					<td align="center">Experience</td>
					<td align="center">Offered Salary</td>
					<td align="center">Last Submission Date</td>

				</tr>

			</thead>
			<tbody>
                                        <?php 
										
										foreach($arrData as $value){ ?>
										                          
								        <tr>
					<td align="right"><a href =" #"><?php echo $value['id']; ?></a></td>
					<td><?php echo $value['designation']; ?></td>
					<td align="right"><?php echo $value['no_of_vacancies']; ?></td>
					<td align="right"><?php echo $value['criteria_10th']; ?></td>
					<td align="right"><?php echo $value['criteria_12th']; ?></td>
					<td align="right"><?php echo $value['criteria_grad']; ?></td>
					<td align="right"><?php echo $value['criteria_post_grad']; ?></td>
					<td align="right"><?php echo $value['experience']; ?></td>
					<td align="right"><?php echo $value['offered_salary']; ?></td>
					<td><?php echo $value['last_submission_date']; ?></td>

				</tr>
										<?php 
										} ?>
										
										</tbody>
		</table>
	</div>

</body>
</html>
<script>
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
                          
		</script>