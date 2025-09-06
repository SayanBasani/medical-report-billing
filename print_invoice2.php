<?php
session_start();
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();

if (!empty($_GET['invoice_id']) && $_GET['invoice_id']) {
    $invoiceValues = $invoice->getInvoice($_GET['invoice_id']);
    $invoiceItems = $invoice->getInvoiceItems($_GET['invoice_id']);
}

$invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues['order_date']));

$output = '';
$output .= '
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
            font-size: 14px;
        }
        @page {
            size: A4 portrait;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #f2f2f2;
        }
        th, td {
            padding: 6px;
            border: 1px solid #000;
        }
        .title {
            font-size: 18px;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <td colspan="2" class="title"><b>MAA SAREDA X-RAY CLINIC AND LABORATORY</b></td>
    </tr>
    <tr>
        <td colspan="2">
            <table>
                <tr>
                    <td width="65%">
                        <b>To,</b><br />
                        <b>RECEIVER (BILL TO)</b><br />
                        Name: ' . $invoiceValues['order_receiver_name'] . '<br />
                        Billing Address: ' . $invoiceValues['order_receiver_address'] . '<br />
                    </td>
                    <td width="35%">
                        Invoice No.: ' . $invoiceValues['order_id'] . '<br />
                        Invoice Date: ' . $invoiceDate . '<br />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<br/>

<table>
    <thead>
        <tr>
            <th>Sr No.</th>
            <th>Item Code</th>
            <th>Test Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actual Amt.</th>
        </tr>
    </thead>
    <tbody>';

$count = 0;
foreach ($invoiceItems as $invoiceItem) {
    $count++;
    $output .= '
        <tr>
            <td>' . $count . '</td>
            <td>' . $invoiceItem["item_code"] . '</td>
            <td>' . $invoiceItem["item_name"] . '</td>
            <td>' . $invoiceItem["order_item_quantity"] . '</td>
            <td>' . $invoiceItem["order_item_price"] . '</td>
            <td>' . $invoiceItem["order_item_final_amount"] . '</td>
        </tr>';
}

$output .= '
        <tr>
            <td colspan="5" align="right"><b>Sub Total</b></td>
            <td><b>' . $invoiceValues['order_total_before_tax'] . '</b></td>
        </tr>
    </tbody>
</table>

</body>
</html>
';

require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Invoice-' . $invoiceValues['order_id'] . '.pdf', array("Attachment" => false));
?>
