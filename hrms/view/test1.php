<?php
			
			if(isset($arrData) && !empty($arrData)){ ?>
			
		<table width="600" border=0 align="center" cellspacing="5" cellpadding="5">
                                    <tbody> 	
<tr>
    <td><span style="font-weight: bold;">S.No.</span></td>
<td><span style="font-weight: bold;">First Name</span></td>
<td><span style="font-weight: bold;">Last Name</span></td>
<td><span style="font-weight: bold;">Email</span></td>
<td><span style="font-weight: bold;">Options</span></td>
</tr> 


<?php 
foreach($arrData as $row => $value){
$nEmpId = $value['id'];
$nUserId = $value['user_id'];
 ?>
<tr>
	<td> <?php echo $value['id']; ?></td>
	<td> <?php echo $value['first_name']; ?></td>
	<td> <?php echo $value['last_name']; ?></td>
	<td> <?php echo $value['email_id']; ?></td>
	<td>
		<table>
		<tr>
			<td><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=fetchEmpDetails&id=<?php echo base64_encode($nEmpId);?>">View</a></td>
			<td><a href="<?php echo SITE_PATH?>index.php?controller=employee&function=updateEmployee&id=<?php echo base64_encode($nEmpId);?>">Update</a></td>
			<td><a onclick="fncDelete('<?php echo $nUserId;?>','<?php echo $nEmpId;?>')" href="javascript:void(0)">Delete</a></td>
		</tr>
		</table>
	</td>
	</tr>
                                                        
		<?php
			}//foreach
		?>
		</tbody>
		</table>
<?php } ?>
