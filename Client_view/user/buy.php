<?php
session_start();
if(@$_SESSION["autoriser"]!="oui"){
	header("location:../login.php");
	exit();
}
require ("../config.php"); 
use Dompdf\Dompdf;
require ("../dompdf/vendor/autoload.php"); 
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled',TRUE);

$dompdf->loadHtml('<img src="../images/about-01.jpg">');

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('IzzyShop');