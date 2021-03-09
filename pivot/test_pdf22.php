<!-- <?php
 //Define relative path from this script to mPDF
 $nama_file='Surat Jalan'; //Beri nama file PDF hasil.
define('_MPDF_PATH','mpdf60/');
//define("_JPGRAPH_PATH", '../mpdf60/graph_cache/src/');

//define("_JPGRAPH_PATH", '../jpgraph/src/'); 
 
include(_MPDF_PATH . "mpdf.php");
//include(_MPDF_PATH . "graph.php");

//include(_MPDF_PATH . "graph_cache/src/");

$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start(); 

$mpdf->useGraphs = true;

require '../core/init.php';
} 

?>
<!DOCTYPE html>
<html>
<head>
    <title>MPDF Printout</title>
    <style>
        *
        {
            margin:0;
            padding:0;
            font-family: calibri;
            font-size:10pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family: calibri;
            font-size:8pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
            margin-left: 200px;
        }
         
        #wrapper
        {
            width:200mm;
            margin:0 5mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #fff;
            border-top: 1px solid #fff;
            font-family: calibri; 
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #fff;
            border-bottom: 1px solid #fff;
            padding: 2mm;
            
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:10pt;
            color:#000;
            font-weight:normal;
            font-style: italic;
        }
         
        h2.heading
        {
            font-size:10pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: auto;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:8pt;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            text-align:right;
            padding-right:3mm;
            font-size:8pt;
        }
         
        #footer
        {   
            width:200mm;
            margin:0 5mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="wrapper">
     <?php
     //require_once 'connect/database.php';
     ?>
   
    <table class="heading" style="width:100%;">
        <tr>
        <td> <center><p style="text-align:center; font-size: 16px; font-weight:bold;">LAPORAN NILAI SISWA</p></center></td>
        </tr>
    </table>
         
         
    <div id="content">
         
        <div id="invoice_body">
            <?php 
                $query1="SELECT b.namacustomer, problemsummary, resolvedby, ticketstatus FROM tickets a INNER JOIN customers b ON b.idcustomer =a.idcustomer ";
        
            $tampil=mysqli_query($config, $query1) or die(mysqli_error());
            ?>
            <table border="1">
            <tr>
                <td style="width:10%;"><b>Company</b></td>
                <td style="width:10%;"><b>Problem</b></td>
                <td style="width:10%;"><b>Assignee</b></td>
                <td style="width:10%;"><b>Status</b></td>
                <td style="width:10%;"><b>Total</b></td>
            </tr>
            <?php
            // $no=0;
                     while($data1=mysqli_fetch_array($tampil))
                    { //$no++; ?>
           <tr>
                <td style="width:10%;" class="mono"><b><?php echo $data1['namacustomer']; ?></b></td>
                <td style="width:10%;" class="mono"><b><?php echo $data1['problemsummary']; ?></b></td>
                <td style="width:10%;" class="mono"><b><?php echo $data1['resolvedby']; ?></b></td>
                <td style="width:10%;" class="mono"><b><?php echo $data1['ticketstatus']; ?></b></td>
                <td style="width:10%;" class="mono"><b><?php echo $data1['total']; ?></b></td>
             <?php   
              } 
              ?>
        </table>
        </div>
       
     <?php

$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);

$mpdf->Output($nama_file."-".$data['no_sj'].".pdf" ,'I');

 


exit; 
?>
</body>
</html> -->

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
<tr bgcolor=#e8edff><td>28-Jul-2013 </td><td>Internet Smart Fren Sedang Bermasalah</td></tr>
<tr><td>05-Aug-2013 </td><td>Welcome to Helpdesk System</td></tr>
<tr bgcolor=#e8edff><td>28-Jul-2013 </td><td>Internet Smart Fren Sedang Bermasalah</td></tr>
</table>
</body>
</html>
";
    if($_POST['format']=='1')
    {   header('Content-type: application/vnd.ms-word');
        header('Content-Disposition: attachment; Filename="'.$reportname.'.doc"');
        echo $content;
    }
    elseif($_POST['format']=='2')
    {   header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename="'.$reportname.'.xls"');
        echo $content;
    }
    elseif($_POST['format']=='3')
    {   $filename=$reportname.'.pdf';
        define('FPDF_FONTPATH','pdftable/font/');
        require('pdftable/lib/pdftable.inc.php');
        $p = new PDFTable();
        $p->AddPage();
        $p->setfont('times','',12);
        $p->htmltable($content);
        $p->output($filename,'I');
    }
?>