<?php
/**
* Filename : search_candidate.php
* Authour : Pankaj Kumar Yadav
* Description : allow admin to search candidate and fix interviews/tests.
* Date_of_creation : 06-March-2013
*/
       /* session_start();
        
        ini_set("display_errors","1");
        
        if( (!isset($_SESSION['authuser'])) || ($_SESSION['authuser'] != 1)) {
            echo 'Sorry, but you don\'t have permission to view this page!';
            exit();
        }
        
	require_once('../../../languages/lang.en.php');*/
	echo 'candidate search';
	if(!isset($arrData) || empty($arrData)) {
		echo "No candidate found.";
		die();
	}
?>
<html>
	<head>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>paging.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>paging.js"></script>
	</head>
	
	<body>
		<form id = "candidateSearchForm">
			<table>
				<tr>
					<td><?php echo CANDIDATE_ID; ?></td>
					<td><input type = "text" id = "candidateId" name = "candidateId" onkeyup = "search()"/></td>
				</tr>
				
				<tr>
					<td><?php echo JOB_ID; ?></td>
					<td><input type = "text" id = "jobId" name = "jobId" onkeyup = "search()" /></td>
				</tr>
				
			</table>
		</form>
		<div id = "searchResult">
		<div id="main">
    <ul id="holder">
                                        <?php 
										
										foreach($arrData as $value){ 
											//print_r($value);
											?>
										                          
						
					<li>
					Job Id : <?php echo $value['job_id']; ?><br/>
					Candidate Id: <?php echo $value['candidate_id']; ?><br/>
					Select Status : <select id = "select_status" name = "select_status">
            						<?php
										for ($i = 0; $i < count($arrData['status']); $i++) {
											if ($arrData['status'][$i] == $value['select_status']) {
												echo "<option value=" . $arrData['status'][$i]. " selected = " . "selected" . ">". $arrData['status'][$i] ."</option>";
											} else {          		           				    		
            									echo "<option value=" . $arrData['status'][$i]. ">". $arrData['status'][$i] ."</option>";
											}
            							}
            		           				
            						?>
            					</select><br/>
					Submission Date : <?php echo $value['submission_date']; ?><br/>
					<a href = "#" name = "<?php echo $value['id']; ?>" onclick = "changeStatus(this.name)">Change Status</a></li>

				
										<?php 
										} ?>
										
				</ui>
	</div>
		</div>
	</body>
	
</html>
<script>
	function search()
	{
    	$.ajax(
    	    {
				type: "POST",
				url: "<?php echo SITE_PATH?>index.php?controller=admin&function=searchCandidate",
				data: $("#candidateSearchForm").serialize(),
				success: function(response){
				        	$("#searchResult").html(response);
                                        
			        },
			}
		);
	}

	function changeStatus(searchInput)
	{	var status= $("#select_status").val()
    	//alert(status);
    	$.ajax(
    	    {
        	    
				type: "POST",
				url: "<?php echo SITE_PATH?>index.php?controller=admin&function=updateCandidateStatus",
				data: "searchRequest=" + searchInput + "&status="+status,
				success: function(response){
				        	$("#searchResult").html(response);
		        	
                                        
			        },
			}
		);
	}
                          
		</script>