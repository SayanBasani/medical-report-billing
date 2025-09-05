<?php
session_start();
include 'report.php';

$invoice = new report();
$invoice->checkLoggedIn();

echo $_GET['update_id'];
$invoice->deletereport($_GET['update_id']);
$invoice->deletereportItems($_GET['update_id'],"report_item_id");

header('Location: ./report_list.php');
?>