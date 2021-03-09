<?php
require '../core/init.php';
$general->logged_out_protect();
$ticket_list = $tickets->count_tickets_by_customer();
$i=0;$color[0]='FF0000';$color[1]='00FF00';$color[2]='FFFF00';$color[3]='0000FF';$color[4]='FF00FF';
foreach ($ticket_list as $ticket) 
{	$customer  = $customers->customer_data($ticket['idcustomer']);
	@$value .= $ticket['total'].'#'; 
	@$name .= $customer['namacustomer'].'#';
}
$arr_value = explode("#", $value);
$arr_name = explode("#", $name);
$ticket_list2 = $tickets->count_tickets_by_status();
foreach ($ticket_list2 as $ticket2) 
{
	@$value2 .= $ticket2['total'].'#'; 
	@$name2 .= $ticket2['ticketstatus'].'#';
}
$arr_value2 = explode("#", $value2);
$arr_name2 = explode("#", $name2);

$ResolvedBulan=Array(0,0,0,0,0,0,0,0,0,0,0,0,0);
$ticket_list3 = $tickets->count_resolved_tickets_by_month();
foreach ($ticket_list3 as $ticket3) 
{	@$ResolvedBulan[$ticket3['Bulan']]=$ticket3['Total'];
}
$InProgressBulan=Array(0,0,0,0,0,0,0,0,0,0,0,0,0);
$ticket_list4 = $tickets->count_inprogress_tickets_by_month();
foreach ($ticket_list4 as $ticket4) 
{	@$InProgressBulan[$ticket4['Bulan']]=$ticket4['Total'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Helpdesk Statistic</title>
<link rel="stylesheet" type="text/css" href="chartstyle.css" /> 
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.fusioncharts.js"></script>
</head>
<body bgcolor="#003566">
<table width="100%">
<tr><td width="50%">
	<div style="background-color:#b9c9fe;" class="border-radius" id="Chart1">Loading FusionCharts!</div>
	</td>
	<td width="50%">
	<div style="background-color:#b9c9fe;" class="border-radius" id="Chart2">Loading FusionCharts!</div>
	</td>
</tr>
<tr><td colspan="2">
	<div style="background-color:#b9c9fe;" class="border-radius" id="Chart3">Loading FusionCharts!</div>
	</td>
</tr>
</table>

<script type="text/javascript">	
	$('#Chart1').insertFusionCharts({
		swfPath: "charts/",
		type: "Pie2D",
		data:	"<graph caption='Top 5 Ticket Received By Company' subcaption='This Year' decimalPrecision='0'" +
				"bgColor='b9c9fe' baseFontSize='12' Bold='1' showNames='1' showPercentageInLabel='1'>" +
				"<set value='<?php echo $arr_value[0];?>' name='<?php echo $arr_name[0];?>' color='FF00FF' />" +
				"<set value='<?php echo $arr_value[1];?>' name='<?php echo $arr_name[1];?>' color='00FFFF' />" +
				"<set value='<?php echo $arr_value[2];?>' name='<?php echo $arr_name[2];?>' color='990000' />" +
				"<set value='<?php echo $arr_value[3];?>' name='<?php echo $arr_name[3];?>' color='660099' />" +
				"<set value='<?php echo $arr_value[4];?>' name='<?php echo $arr_name[4];?>' color='FF9900' /> </graph>",
		dataFormat: "XMLData",
		width: "520",
		height: "300"
	});
	$('#Chart2').insertFusionCharts({
		swfPath: "charts/",
		type: "Pie2D",
		data:	"<graph caption='Ticket Received By Status' subcaption='This Year' decimalPrecision='0'" +
				"bgColor='b9c9fe' baseFontSize='12' Bold='1' showNames='1' showPercentageInLabel='1'>" +
				"<set value='<?php echo $arr_value2[0];?>' name='<?php echo $arr_name2[0];?>' color='<?php echo $color[0];?>' />" +
				"<set value='<?php echo $arr_value2[1];?>' name='<?php echo $arr_name2[1];?>' color='<?php echo $color[1];?>' />" +
				"<set value='<?php echo $arr_value2[2];?>' name='<?php echo $arr_name2[2];?>' color='<?php echo $color[2];?>' />" +
				"<set value='<?php echo $arr_value2[3];?>' name='<?php echo $arr_name2[3];?>' color='<?php echo $color[3];?>' /> </graph>",
		dataFormat: "XMLData",
		width: "520",
		height: "300"
	});
	$('#Chart3').insertFusionCharts({
		swfPath: "charts/",
		type: "MSColumn3D",
		data:	"<graph bgColor='b9c9fe' canvasBgColor='c0c0c0' subcaption='This Year' canvasBaseColor='c0c0c0' divLineColor='f0f0f0'" +
				"baseFontSize='12' Bold='1' caption='SLA Incident' xAxisName='Month' yAxisName='Ticket' showValues='1'" +
				"decimalPrecision='0' formatNumberScale='0' decimalSeparator=',' thousandSeparator='.'>" +
		    "<categories>" +
			  "<category name='Jan' />" +
			  "<category name='Feb' />" +
			  "<category name='Mar' />" +
			  "<category name='Apr' />" +
			  "<category name='May' />" +
			  "<category name='Jun' />" +
			  "<category name='Jul' />" +
			  "<category name='Aug' />" +
			  "<category name='Sep' />" +
			  "<category name='Oct' />" +
			  "<category name='Nov' />" +
			  "<category name='Dec' />" +
		   "</categories>" +
		   "<dataset seriesName='Resolved' color='00ff00'>" +
			  "<set value='<?php echo $ResolvedBulan[1]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[2]?>'/>" +
			  "<set value='<?php echo $ResolvedBulan[3]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[4]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[5]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[6]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[7]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[8]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[9]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[10]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[11]?>' />" +
			  "<set value='<?php echo $ResolvedBulan[12]?>' />" +
		   "</dataset>" +
		   "<dataset seriesName='In Progress' color='ff0000'>" +
			  "<set value='<?php echo $InProgressBulan[1]?>' />" +
			  "<set value='<?php echo $InProgressBulan[2]?>'/>" +
			  "<set value='<?php echo $InProgressBulan[3]?>' />" +
			  "<set value='<?php echo $InProgressBulan[4]?>' />" +
			  "<set value='<?php echo $InProgressBulan[5]?>' />" +
			  "<set value='<?php echo $InProgressBulan[6]?>' />" +
			  "<set value='<?php echo $InProgressBulan[7]?>' />" +
			  "<set value='<?php echo $InProgressBulan[8]?>' />" +
			  "<set value='<?php echo $InProgressBulan[9]?>' />" +
			  "<set value='<?php echo $InProgressBulan[10]?>' />" +
			  "<set value='<?php echo $InProgressBulan[11]?>' />" +
			  "<set value='<?php echo $InProgressBulan[12]?>' />" +
		   "</dataset>" +
		"</graph>" ,
		dataFormat: "XMLData",
		width: "1000",
		height: "300"
	});
</script>
</body>
</html>