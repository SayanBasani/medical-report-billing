<?php
session_start();
include 'report.php';
$invoice = new reoirt();
if($_POST['action'] == 'delete_report' && $_POST['id']) {
	$invoice->deletereport($_POST['id']);	
	$jsonResponse = array(
		"status" => 1	
	);
	echo json_encode($jsonResponse);	
}
if($_GET['action'] == 'logout') {
session_unset();
session_destroy();
header("Location:report_list.php");
}

