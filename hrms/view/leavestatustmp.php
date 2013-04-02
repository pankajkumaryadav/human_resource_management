<?php
	/**
* Filename : leavestatustmp.php
* Authour : Megha Sahni
* Description :  show the  status of leave according to employee date entered.
* Date_of_creation : 20-March-2013
*/
	if (isset($arrData) && !empty($arrData)) { ?>

    <table width="600" border=0 align="center" cellspacing="5" cellpadding="5">
        <tbody> 	
            <tr>
                <td><span style="font-weight: bold;">Employee ID</span></td>
                <td><span style="font-weight: bold;">Reason</span></td>
                <td><span style="font-weight: bold;">Date From</span></td>
                <td><span style="font-weight: bold;">Till Date</span></td>
                <td><span style="font-weight: bold;">Status</span></td>
            </tr> 


    <?php
    foreach ($arrData as $row => $value) {
        ?>
                <tr>
                    <td> <?php echo $value['employee_id']; ?></td>
                    <td> <?php echo $value['reason']; ?></td>
                    <td> <?php echo $value['stDate']; ?></td>
                    <td> <?php echo $value['stTillDate']; ?></td>
                    <td> <?php echo $value['status']; ?></td>
                </tr>

        <?php
    }//foreach
    ?>
        </tbody>
    </table>
<?php } else { ?>
        <table width="600" align="center" cellspacing="5" cellpadding="10"  border="black solid 1px" >
            <tbody style="background-color:#B9DA54"> 
                <tr>
                    <td align="center"><strong>No record found.</strong></td>
                </tr>
            </tbody>
        </table>
<?php }?>
