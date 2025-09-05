<?php 
session_start();
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ma Sarada X-RAY Clinic & Laboratory</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #e3f2fd, #ffffff);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    .navbar {
      background: #1565c0; /* Deep Blue */
      padding: 1rem 2rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .navbar-brand {
      font-weight: bold;
      color: #fff !important;
    }
    .navbar .btn-logout {
      background: #0d47a1; 
      color: #fff;
      border-radius: 25px;
      padding: 0.4rem 1rem;
      transition: 0.3s;
    }
    .navbar .btn-logout:hover {
      background: #08306b;
      color: #fff;
    }

    /* Hero Section */
    .hero {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 2rem;
    }
    .hero-card {
      background: #fff;
      padding: 3rem 2rem;
      border-radius: 1.2rem;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      max-width: 600px;
      width: 100%;
      animation: fadeUp 1s ease;
    }
    .hero-card h1 {
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: #1565c0;
    }
    .hero-card p {
      color: #555;
      margin-bottom: 2rem;
    }
    .hero-card .btn-action {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      margin: 0.5rem;
      padding: 0.75rem 1.5rem;
      font-size: 1rem;
      border-radius: 30px;
      transition: 0.3s;
    }
    .btn-report {
      background: #1976d2; 
      color: #fff;
    }
    .btn-report:hover {
      background: #0d47a1;
      color: #fff;
    }
    .btn-invoice {
      background: #0288d1; 
      color: #fff;
    }
    .btn-invoice:hover {
      background: #01579b;
      color: #fff;
    }

    @keyframes fadeUp {
      from {opacity: 0; transform: translateY(30px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="bi bi-hospital"></i>Ma Sarada X-RAY Clinic & Laboratory
      </a>
      <div>
        <?php if($_SESSION['userid']) { ?>
          <a href="action.php?action=logout" class="btn btn-logout">
            <i class="bi bi-box-arrow-right"></i> Logout
          </a>
        <?php } ?>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-card">
      <h1>Welcome to Ma Sarada X-RAY Clinic & Laboratory</h1>
      <p>Please select an option below to continue:</p>
      <div>
        <a href="create_report.php" class="btn btn-action btn-report">
          <i class="bi bi-file-medical"></i> Generate Report
        </a>
        <a href="create_invoice.php" class="btn btn-action btn-invoice">
          <i class="bi bi-receipt"></i> Generate Invoice
        </a>
        <a href="report_list.php" class="btn btn-action btn-report">
          <i class="bi bi-file-medical"></i> Report List
        </a>
        <a href="invoice_list.php" class="btn btn-action btn-invoice">
          <i class="bi bi-receipt"></i> Invoice List
        </a>
      </div>
    </div>
  </section>

</body>
</html>
