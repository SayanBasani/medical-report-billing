<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Maa Sarada Diagnostics</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Custom Styles -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
    }

    .navbar {
      background-color: #ffffff !important;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .navbar-brand {
      color: #212529 !important;
      font-weight: bold;
      font-size: 1.5rem;
    }

    .navbar-nav .nav-link {
      color: #212529 !important;
      font-weight: 500;
      margin-right: 15px;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      color: #0d6efd !important;
    }

    .dropdown-menu {
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      font-size: 15px;
    }

    .dropdown-item {
      font-weight: 500;
      color: #212529;
      font-size: 15px;
    }

    .dropdown-item:hover {
      background-color: #e9ecef;
      color: #0d6efd;
      font-size: 15px;
    }
  </style>
</head>

<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">🏥 Maa Sarada Diagnostics</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">

          <!-- Home Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="homeDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              🏠 Home
            </a>
            <ul class="dropdown-menu" aria-labelledby="homeDropdown">
              <li><a class="dropdown-item" href="home.php">🏡 Back to Home</a></li>
            </ul>
          </li>

          <!-- Invoice Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="invoiceDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              🧾 Invoice
            </a>
            <ul class="dropdown-menu" aria-labelledby="invoiceDropdown">
              <li><a class="dropdown-item" href="invoice_list.php">📃 Invoice List</a></li>
              <li><a class="dropdown-item" href="create_invoice.php">➕ Create Invoice</a></li>
            </ul>
          </li>

          <!-- Report Dropdown -->
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="home.php" id="reportsDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            Reports
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="reportsDropdown">
            <li><a class="dropdown-item" href="create_report.php">Create Report</a></li>
            <li><a class="dropdown-item" href="report_list.php">View Reports</a></li>
          </ul>
        </li>

          <!-- Logged-in Dropdown -->
          <?php if (isset($_SESSION['userid'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                👤 <?php echo htmlspecialchars($_SESSION['user']); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">⚙️ Account</a></li>
                <li><a class="dropdown-item" href="action.php?action=logout">🚪 Logout</a></li>
              </ul>
            </li>
          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>