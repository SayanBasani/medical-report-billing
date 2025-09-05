<?php
session_start();
require_once 'Invoice.php';

$invoice = new Invoice();
$invoice->checkLoggedIn();

if (empty($_GET['invoice_id'])) {
    die('Missing invoice_id');
}

$invoiceValues = $invoice->getInvoice($_GET['invoice_id']);
$invoiceItems  = $invoice->getInvoiceItems($_GET['invoice_id']);

$invoiceDate = !empty($invoiceValues['order_date'])
    ? date('d/M/Y, H:i', strtotime($invoiceValues['order_date']))
    : date('d/M/Y, H:i');

$html = '
<html>
<head>
  <meta charset="UTF-8">
  <style>
    * { box-sizing: border-box; }
    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 11px;
      margin: 0;
      padding: 0;
    }
    @page {
      /* 80mm wide, long page */
      size: 80mm 300mm;
      margin: 5mm;
    }

    /* Layout tables (no borders) keep flow stable in dompdf */
    table { width: 100%; border-collapse: collapse; }
    .no-border td { border: none; padding: 0; }
    .spacer { height: 6px; }

    /* Header */
    .header-name {
      text-align: center;
      font-weight: 700;
      font-size: 13px;
      line-height: 1.25;
      padding: 0;
      margin: 0;
    }

    /* Info box (Bill to + meta) */
    .info td {
      vertical-align: top;
      padding: 4px;
      border: 1px solid #000;
      font-size: 10.5px;
      word-wrap: break-word;
      overflow-wrap: break-word;
    }

    /* Items table */
    .items th, .items td {
      border: 1px solid #000;
      padding: 4px;
      text-align: left;
      font-size: 10.5px;
    }
    .items th { background: #f2f2f2; }

    .right { text-align: right; }
    .center { text-align: center; }
    .bold { font-weight: bold; }

    .footer {
      text-align: center;
      margin-top: 14px;
      font-size: 11px;
    }

    /* Avoid weird page breaks in dompdf */
    .avoid-break { page-break-inside: avoid; }
  </style>
</head>
<body>

  <!-- Header -->
  <table class="no-border avoid-break">
    <tr><td class="header-name">
      MAA SAREDA X-RAY CLINIC<br/>AND LABORATORY
    </td></tr>
  </table>

  <div class="spacer"></div>

  <!-- Bill-to + Invoice meta -->
  <table class="info avoid-break">
    <tr>
      <td style="width:60%">
        <span class="bold">Receiver (Bill To)</span><br/>
        Name: ' . htmlspecialchars($invoiceValues["order_receiver_name"] ?? "") . '<br/>
        Address: ' . nl2br(htmlspecialchars($invoiceValues["order_receiver_address"] ?? "")) . '
      </td>
      <td style="width:40%">
        <span class="bold">Invoice No:</span> ' . htmlspecialchars($invoiceValues["order_id"] ?? "") . '<br/>
        <span class="bold">Date:</span> ' . htmlspecialchars($invoiceDate) . '
      </td>
    </tr>
  </table>

  <div class="spacer"></div>

  <!-- Items -->
  <table class="items">
    <thead>
      <tr>
        <th style="width:10%">Sr</th>
        <th style="width:40%">Item</th>
        <th style="width:15%">Qty</th>
        <th style="width:17%">Price</th>
        <th style="width:18%">Total</th>
      </tr>
    </thead>
    <tbody>';

$sr = 1;
foreach ($invoiceItems as $row) {
    $html .= '
      <tr>
        <td class="center">'. $sr .'</td>
        <td>'. htmlspecialchars($row["item_name"]) .'</td>
        <td class="center">'. htmlspecialchars($row["order_item_quantity"]) .'</td>
        <td class="right">'. number_format((float)$row["order_item_price"], 2) .'</td>
        <td class="right">'. number_format((float)$row["order_item_final_amount"], 2) .'</td>
      </tr>';
    $sr++;
}

$html .= '
      <tr class="bold">
        <td colspan="4" class="right">Sub Total</td>
        <td class="right">'. number_format((float)($invoiceValues["order_total_before_tax"] ?? 0), 2) .'</td>
      </tr>
    </tbody>
  </table>

  <div class="footer">---- Thank You ----</div>

</body>
</html>';

require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();

use Dompdf\Dompdf;

$dompdf = new Dompdf();

/* Let Dompdf render our narrow receipt correctly */
$dompdf->loadHtml($html);

/* 80mm wide, very tall page to mimic a mall/electric-bill slip */
$customPaper = array(0, 0, 226.77, 1133.86); // 80mm x 400mm (height big enough)
$dompdf->setPaper($customPaper, 'portrait');

$dompdf->render();
$dompdf->stream('Invoice-' . ($invoiceValues['order_id'] ?? 'NA') . '.pdf', ['Attachment' => false]);
exit(0);
?><?php