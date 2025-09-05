<?php 
session_start();
include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Maa Sarada - Invoice System</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">

  <!-- JS -->
  <script src="js/invoice.js"></script>
</head>
<body class="bg-light">
 <!-- Background Style -->
    <style>
        body {
            background-image: url('img.jpg'); /* Make sure this path is correct */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7); /* Light overlay for readability */
            z-index: -1;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">Maa Sarada</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="home.php">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="invoiceDropdown" role="button" data-bs-toggle="dropdown">
            Invoices
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="invoiceDropdown">
            <li><a class="dropdown-item" href="create_invoice.php">Create Invoice</a></li>
            <li><a class="dropdown-item" href="#">Manage Invoices</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="action.php?action=logout">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">Invoice List</h2>
    <a href="create_invoice.php" class="btn btn-success">
      <i class="fas fa-plus me-1"></i> New Invoice
    </a>
  </div>

  <div class="table-responsive shadow-sm rounded bg-white p-3">
    <table id="data-table" class="table table-hover table-bordered align-middle">
      <thead class="table-dark">
        <tr>
          <th>Invoice No.</th>
          <th>Create Date</th>
          <th>Customer Name</th>
          <th>Total</th>
          <th class="text-center">Print</th>
          <th class="text-center">Edit</th>
          <th class="text-center">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php		
        $invoiceList = $invoice->getInvoiceList();
        foreach($invoiceList as $invoiceDetails){
          $invoiceDate = date("d M Y, h:i A", strtotime($invoiceDetails["order_date"]));
          echo '
          <tr>
            <td>#'.htmlspecialchars($invoiceDetails["order_id"]).'</td>
            <td>'.htmlspecialchars($invoiceDate).'</td>
            <td>'.htmlspecialchars($invoiceDetails["order_receiver_name"]).'</td>
            <td>₹ '.htmlspecialchars($invoiceDetails["order_total_before_tax"]).'</td>
            <td class="text-center">
              <a href="print_invoice2.php?invoice_id='.$invoiceDetails["order_id"].'" class="btn btn-sm btn-outline-primary" title="Print">
                <i class="fas fa-print"></i>
              </a>
            </td>
            <td class="text-center">
              <a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'" class="btn btn-sm btn-outline-warning" title="Edit">
                <i class="fas fa-pen-to-square"></i>
              </a>
            </td>
            <td class="text-center">
              <a href="#" id="'.$invoiceDetails["order_id"].'" class="btn btn-sm btn-outline-danger deleteInvoice" title="Delete">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
