<?php
require '../core/init.php';
$general->logged_out_protect();

$reportname='RPT001';
$content = "
<html>
<body>
<h1>[RPT001] Ticket Received by Date, Category and Helpdesk Personnel</h1>
<hr/>
<table border=1>
<tr bgcolor=#b9c9fe><td>Post Date</td><td>Headline News</th></tr>
<tr bgcolor=#e8edff><td>28-Jul-2013	</td><td>Internet Smart Fren Sedang Bermasalah</td></tr>
<tr><td>05-Aug-2013	</td><td>Welcome to Helpdesk System</td></tr>
<tr bgcolor=#e8edff><td>28-Jul-2013	</td><td>Internet Smart Fren Sedang Bermasalah</td></tr>
</table>
</body>
</html>
";
	if($_POST['format']=='1')
	{	header('Content-type: application/vnd.ms-word');
		header('Content-Disposition: attachment; Filename="'.$reportname.'.doc"');
		echo $content;
	}
	elseif($_POST['format']=='2')
	{	header('Content-type: application/ms-excel');
		header('Content-Disposition: attachment; filename="'.$reportname.'.xls"');
		echo $content;
	}
	elseif($_POST['format']=='3')
	{	$filename=$reportname.'.pdf';
		define('FPDF_FONTPATH','pdftable/font/');
		require('pdftable/lib/pdftable.inc.php');
		$p = new PDFTable();
		$p->AddPage();
		$p->setfont('times','',12);
		$p->htmltable($content);
		$p->output($filename,'I');
	}
?>
