<?php 
require '../core/init.php';
$general->logged_out_protect();
$closetickets =  $tickets->get_tickets_by_status("Closed");
$tickets_count  = count($closetickets);
$period1        = date('d-M-Y',strtotime("-1 month",time()));
$period2        = date('d-M-Y',time());
$p1 = strtotime($period1);
$p2 = strtotime($period2);
$listtickets = $tickets->search_closed_ticket($p1, $p2);
?>
<!DOCTYPE html>
<html>
<head>
<title>Helpdesk Pivot</title>
<style type="text/css">
	body{background-image:url('../images/corner.jpg');background-repeat:no-repeat;background-attachment:fixed;font:12px arial,sans-serif;}
	.breadcrumb{font-size:12px;color:#0000A0;font-family: Arial, Helvetica, sans-serif;}
</style>
<!-- <link rel="stylesheet" href="css/datatable.css" /> -->
<!-- <link rel="stylesheet" href="css/jquery-ui.css" /> -->
<!-- <script src="js/jquery.js"></script> -->
<!-- <script src="js/jquery-ui.js"></script> -->
<!-- <script src="js/jquery.dataTables.js"></script> -->
<link rel="stylesheet" type="text/css" href="pivot.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="pivot.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
</style>
<body >
	<hr />
	<h2>Helpdesk Statistic Pivot Table</h2>
    <!-- <form name="searchform" method="post" action="">
        <p> Period: <input type="text" id="period1" name="period1" readonly="readonly" value="<?php echo $period1; ?>"> to 
            <input type="text"  id="period2" name="period2" readonly="readonly"  value="<?php echo $period2; ?>"> 
            <input type="submit" name='submit' value="Search" /> 
        </p>
    </form> -->
    <div id="output" style="margin: 10px;"></div>
    <script type="text/javascript">
        $(function(){
            var derivers = $.pivotUtilities.derivers;
            $.getJSON("json.php", function(mps) {
                $("#output").pivotUI(mps, {
                    derivedAttributes: {
                    //    "Warranty Period": derivers.bin("Warranty", 10)
                    },
                    rows: ["Company"],
                    cols: ["Status"],
                    // effectsName: "None"
                });
            });
         });
    </script>
    <!-- <script type="text/javascript"> 
            $(document).ready(function(){
                $("#period1,#period2").datepicker({
                dateFormat  : "dd-M-yy",
                changeMonth : true,
                changeYear  : true, 
                });
            });
        </script> -->
 <!--  <a href="test_pdf.php" target="_blank"><button>CETAK</button></a> -->

</body>
</html>
