
<?php
include('report.php');
$report = new Report();

if (isset($_GET['report_code'])) {
    $result = $report->getReportFields($_GET['report_code']);
    if ($result) {
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    }
}

header('Content-Type: application/json');
echo json_encode([]);
?>