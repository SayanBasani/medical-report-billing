<?php 
session_start();
include('inc/header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();

if (!empty($_POST['companyName']) && $_POST['companyName']) {
    $invoice->saveInvoice($_POST);
    header("Location:invoice_list.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Invoice - Maa Sarada</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6fc;
    }

    .navbar {
      background-color: #fff !important;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .navbar-brand, .navbar-nav .nav-link {
      color: #000 !important;
      font-weight: 500;
    }

    .container {
      margin-top: 80px;
    }

    .form-title {
      font-size: 28px;
      font-weight: 600;
      color: #4a148c;
      margin-bottom: 25px;
      border-bottom: 2px solid #d1c4e9;
      padding-bottom: 10px;
    }

    .invoice-card {
      background-color: #fff;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 6px 24px rgba(0,0,0,0.1);
    }

    .form-label {
      font-weight: 500;
    }

    .table th {
      background-color: #ede7f6;
      color: #4a148c;
      font-weight: 600;
    }

    .btn-main {
      background-color: #7e57c2;
      color: white;
      font-weight: 500;
      border-radius: 30px;
      padding: 10px 30px;
    }

    .btn-main:hover {
      background-color: #512da8;
    }

    .btn-outline-danger, .btn-outline-success {
      border-radius: 30px;
      padding: 8px 20px;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Maa Sarada Invoice System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Invoice</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="invoice_list.php">Invoice List</a></li>
            <li><a class="dropdown-item" href="create_invoice.php">Create Invoice</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Report</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="report_list.php">Report List</a></li>
            <li><a class="dropdown-item" href="create_report.php">Create Report</a></li>
          </ul>
        </li>

        <?php if ($_SESSION['userid']) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            👤 <?php echo $_SESSION['user']; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="action.php?action=logout">Logout</a></li>
          </ul>
        </li>
        <?php } ?>

      </ul>
    </div>
  </div>
</nav>
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

<!-- INVOICE FORM -->
<div class="container">
  <div class="invoice-card">
    <form action="" method="post" id="invoice-form">
      <h2 class="form-title">🧾 Create Invoice</h2>

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Customer Name</label>
          <input type="text" class="form-control" name="companyName" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Customer Address</label>
          <textarea class="form-control" name="address" rows="2"></textarea>
        </div>
      </div>

      <div class="mt-4">
        <table class="table table-bordered text-center align-middle" id="invoiceItem">
          <thead>
            <tr>
              <th><input type="checkbox" id="checkAll" /></th>
              <th>Test No</th>
              <th>Test Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input class="itemRow" type="checkbox"></td>
              <td><input type="text" name="productCode[]" id="productCode_1" class="form-control"></td>
              <td><input type="text" name="productName[]" id="productName_1" class="form-control"></td>
              <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity"></td>
              <td><input type="number" name="price[]" id="price_1" class="form-control price"></td>
              <td><input type="number" name="total[]" id="total_1" class="form-control total" readonly></td>
            </tr>
          </tbody>
        </table>

        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-outline-danger" id="removeRows">🗑 Delete</button>
          <button type="button" class="btn btn-outline-success" id="addRows">➕ Add More</button>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-6">
          <input type="hidden" name="userId" value="<?php echo $_SESSION['userid']; ?>">
        </div>
        <div class="col-md-6 text-end">
          <label class="form-label me-2">Subtotal: ₹</label>
          <input type="number" class="form-control d-inline w-auto" name="subTotal" id="subTotal" readonly>
        </div>
      </div>

      <div class="text-end mt-4">
        <button type="submit" class="btn btn-main">💾 Save Invoice</button>
      </div>
    </form>
  </div>
</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/invoice.js"></script>
<script>
  // Trigger subtotal calculation on load
  $(document).ready(function() {
    calculateTotal();
  });
</script>
</body>
</html>
