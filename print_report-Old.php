<?php
session_start();
include 'report.php';

$invoice = new report();
$invoice->checkLoggedIn();

if (empty($_GET['report_id'])) {
    echo "<h1>There is some Problem! </h1>";
    die;
}

$reportItems = $invoice->getreportItems($_GET['report_id']);
$reportValues = $invoice->getreport($_GET['report_id']);
$invoiceDate = $currentDate = date('m/d/Y');

$reportFileName = 'report-' . $reportValues['clientName'] . '.pdf';

$output = '<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 18px;
            background-image: url("img2.png");

            background-size: cover;
            background-repeat: no-repeat;

            background-position: center;
        }
        @page {
            size: A4 portrait;
            margin: 20px;
        }
        .top-header {
            text-align: center;
            color: black;
        }
        .clinic-name {
            font-size: 26px;
            font-weight: 900;
            color: #20247b;
            margin-bottom: 10px;
        }
        .contact-info {
            height: 50px;
        }
        .contact-info div {
            margin-top: 45px;
            font-size: 14px;
            color: #20247b;
            line-height: 1.4;
        }
        .mobile_no1 {
            position: absolute;
            top: -20px;
            left: 0px;
        }
        .mobile_no2 {
            position: absolute;
            top: -60px;
            right: 0px;
        }
        .address {
            position: absolute;
            top: -45px;
        }
        .email {
            position: absolute;
            right: 0px;
            top: 0px;
        }
        .badge {
            color: white;
            font-size: 16px;
            padding: 6px 20px;
            display: inline-block;
            border-radius: 20px;
            font-weight: 600;
            margin-top: 55px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 6px;
        }
        th {
            background-color: #eee;
        }
        table:nth-child(1) {
            margin-top: 80px;
        }
        .footer-right {
            text-align: right;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header class="top-header">
        <h2 style="font-weight: 900; color:rgba(5, 194, 227, 0.86); font-size: 25px; margin: 5px 0 15px;">
            MAA SAREDA X-RAY CLINIC AND LABORATORY
        </h2><br />
        <h5 style="font-weight: 700; color:rgb(5, 194, 227 , 0.86); font-size: 15px; margin-bottom: 10px;">
            Bajkul:: P.O-Krismat Bajkul::Dist- Purba Medinipur
        </h5><br />
        <h5 style="font-weight: 700; color:rgb(0, 162, 255); font-size: 14px; margin-bottom: 10px;">
            Email::bajkulmaasarada@gmail.com
        </h5><br /><br /><br /><br />
        <div class="contact-info">
            <div class="mobile_no1">Mob: 9732698096</div>
            <div class="mobile_no2">Mob: 9732665138</div>
        </div>
    </header>
    <br />
    <div class="bodyelement">
        <table>
            <tr>
                <td width="50%">
                    Name of Patient: ' . $reportValues['clientName'] . '<br />
                    Age: ' . $reportValues['age'] . '<br />
                    Sex: ' . $reportValues['sex'] . '<br />
                </td>
                <td width="50%">
                    Reffering Doctor: ' . $reportValues['reffering_doctor'] . '<br />
                    Date of Report: ' . $reportValues['date_of_report'] . '<br />
                    Date of Recipt: ' . $reportValues['date_of_recipt'] . '<br />
                </td>
            </tr>
        </table>

        <header class="top-header">
            <div class="clinic-name">MAA SAREDA X-RAY CLINIC AND LABORATORY</div>
        </header>

        <table>
            <tr>
                <th>Lab No.</th>
                <th>Test No.</th>
                <th>Test Name</th>
                <th>Report Value</th>
                <th>Normal Value</th>
            </tr>';

$count = 0;
foreach ($reportItems as $reportItem) {
    $count++;
    $output .= '
            <tr>
                <td>' . $count . '</td>
                <td>' . htmlspecialchars($reportItem['report_no']) . '</td>
                <td>' . htmlspecialchars($reportItem['test_name']) . '</td>
                <td>' . htmlspecialchars($reportItem['result']) . '</td>
                <td>' . htmlspecialchars($reportItem['normal_value']) . '</td>
            </tr>';
}

$output .= '
        </table>

        <div class="footer-right">
            <p><img src="sign.png" width="170" style="margin-bottom: 5px;"></p>                                        
            <p><strong>Consultant Pathologist</strong><br>
            Dr. Ramesh Ch Patra <br>
            M.B.B.S (Cal), D.C.P</p>
        </div>
    </div>
</body>
</html>';

// Generate PDF
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($output);
$dompdf->setPaper('A4', 'portrait'); // Use portrait or landscape as needed
$dompdf->render();

ob_end_clean();
$dompdf->stream($reportFileName, array("Attachment" => false));
exit;
?>
