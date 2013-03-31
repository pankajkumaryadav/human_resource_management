<?php
/**
 * Filename : admin_search_result.php
 * Authour : Pankaj Kumar Yadav
 * Description : allow admin to search job posted.
 * Date_of_creation : 31-March-2013
 */
if(!isset($arrData) || empty($arrData)) {
	echo "No Job is posted.";
	die();
}
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
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>paging.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>paging.js"></script>

</head>

<body>
<div id="main">
    <ul id="holder">
                                        <?php 
										
										foreach($arrData as $value){ ?>
										                          
								        
					<li> Job Id :<?php echo $value['id']; ?><br/>
					Designation :<?php echo $value['designation']; ?><br/>
					No. of Vacancies: <?php echo $value['no_of_vacancies']; ?><br/>
					High School : <?php echo $value['criteria_10th']; ?><br/>
					Senior Secondary : <?php echo $value['criteria_12th']; ?><br/>
					Graduation : <?php echo $value['criteria_grad']; ?><br/>
					Post Graduation : <?php echo $value['criteria_post_grad']; ?><br/>
					Experience : <?php echo $value['experience']; ?><br/>
					Offered Salary : <?php echo $value['offered_salary']; ?><br/>
					Last Submission Date : <?php echo $value['last_submission_date']; ?></li>

				
										<?php 
										} ?>
										
				</ui>
	</div>
<!-- 		<table width="100%" border="1" cellpadding="0" cellspacing="0" -->
<!-- 			id="shubh" class="display"> -->
<!-- 			<thead> -->
<!-- 				<tr> -->


<!-- 					<td align="center">Job Id</td> -->
<!-- 					<td align="center">Designation</td> -->
<!-- 					<td align="center">No. of Vacancies</td> -->
<!-- 					<td align="center">High School</td> -->
<!-- 					<td align="center">Senior Secondary</td> -->
<!-- 					<td align="center">Graduation</td> -->
<!-- 					<td align="center">Post Graduation</td> -->
<!-- 					<td align="center">Experience</td> -->
<!-- 					<td align="center">Offered Salary</td> -->
<!-- 					<td align="center">Last Submission Date</td> -->

<!-- 				</tr> -->

<!-- 			</thead> -->
<!-- 			<tbody> -->
                                        <?php 
										
// 										foreach($arrData as $value){ ?>
										                          
<!-- 								        <tr> -->
					<td align="right"><a href =" #"><?php //echo $value['id']; ?></a></td>
					<td><?php //echo $value['designation']; ?></td>
					<td align="right"><?php //echo $value['no_of_vacancies']; ?></td>
					<td align="right"><?php //echo $value['criteria_10th']; ?></td>
					<td align="right"><?php //echo $value['criteria_12th']; ?></td>
					<td align="right"><?php //echo $value['criteria_grad']; ?></td>
					<td align="right"><?php //echo $value['criteria_post_grad']; ?></td>
					<td align="right"><?php //echo $value['experience']; ?></td>
					<td align="right"><?php //echo $value['offered_salary']; ?></td>
					<td><?php //echo $value['last_submission_date']; ?></td>

<!-- 				</tr> -->
										<?php 
// 										} ?>
										
<!-- 										</tbody> -->
<!-- 		</table> -->
</body>
</html>