<?php
ini_set("display_errors","1"); 
?><html>
	
	<body>
<link rel="stylesheet" href="css/jquery-ui.css" />

    <script language="javascript" type="text/javascript" src="jscript/jquery/jquery.js"></script>
<script src="jscript/jquery/jquery-ui.js"></script>


        <script language="javascript" type="text/javascript" >
     
</script>
				
				<div style = " width:100%; backgroundcolor:black">
                   <form name="newemployee" id="newemployee" action="<?php echo SITE_PATH?>index2.php?controller=employee&function=submitLeave" method="POST" >
                          
                               <table>
	
	
			      <tr>       
                                  <td><?php echo "select leave category";?><em>*</em></td>
                                  <td><select name="leave_category" id="leave_category">
                       <option value="27">el</option>
                       <option value="26">cl</option>
                       </select>
                  </td>
	                      </tr>
	                      <tr>
                                 <td><?php echo "Reason For leave:";?></td>
                                 <td><input type="text" id="reason" name="reason"/></td>
                            </tr> 
	             
						
	      <tr>
                   <td><?php echo "Date From:"?><em>*</em> </td>
                   <td><input type="text" name="date_from" id="date_from"/><br/></td>
                        <br/></td>

                   </tr>
	      <tr>
                   <td><?php echo "Till Date:"?> </td>
                   <td><input type="text" name="till_date" id="till_date"/><br/></td>
                   </tr>
	       <tr>
                   <td><?php echo "Total Hours :"?><em>*</em></td>
                   <td><input type="text" name="total_hours" id="total_hours" onClick="count()"/><br/></td>
               </tr>
	       
          
	    <tr>
                <td>  <input type ="submit" name="submit" value="Submit">  
                    <input type="reset" value="reset" />
                </td>
            </tr> 
           
	</table> 
    </form>

				</div>
    <script>

$(function() {
	$( "#date_from" ).datepicker({
	changeMonth: true,
		dateFormat: 'dd/mm/yy',
	changeYear: true
	});
});


	 
$(function() {
	$( "#till_date" ).datepicker({
	changeMonth: true,
		dateFormat: 'dd/mm/yy',
	changeYear: true
	});
});

	</script>
	
<script>
$(document).ready(function () {
    var selector = function (dateStr) {
            var d1 = $('#date_from').datepicker('getDate');
            var d2 = $('#till_date').datepicker('getDate');
            var diff = 0;
            if (d1 && d2) {
                diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000); // ms per day
                if(diff=="0") {
                    $("#total_hours").val(8)
                    
                } else {
                    var nVal = 0;
                    nVal = diff * 8;
                    $("#total_hours").val(nVal+8)
                }
            }
            //$('.calculated').val(diff);
        }
    $("#date_from").datepicker({
        minDate: new Date(2012, 7 - 1, 8),
        maxDate: new Date(2012, 7 - 1, 28)
    });
    $('#till_date').datepicker({
        minDate: new Date(2012, 7 - 1, 9),
        maxDate: new Date(2012, 7 - 1, 28)
    });
    $('#date_from,#till_date').change(selector)
});
</script>

</body>
</html>
