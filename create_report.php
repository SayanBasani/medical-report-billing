<?php
session_start();
include('report.php');

$report = new Report();
$report->checkLoggedIn();

if (!empty($_POST['clientName'])) {
    $report->savereport();
    header("Location: report_list.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Maa Sarada - Create Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <!-- Custom Styles -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      min-height: 100vh;
    }

    /* Navbar */
    .navbar {
      background: linear-gradient(90deg, #2575fc, #6a11cb);
      box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: #fff !important;
    }

    .navbar-nav .nav-link {
      color: #f0f0f0 !important;
      font-weight: 500;
      margin-left: 15px;
      transition: all 0.3s;
    }

    .navbar-nav .nav-link:hover {
      color: #ffe082 !important;
      transform: translateY(-2px);
    }

    .dropdown-menu {
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    /* Form Container */
    .report-card {
      background: #fff;
      border-radius: 20px;
      padding: 35px;
      margin-top: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: 0.3s;
    }

    .report-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
    }

    .report-card h2 {
      font-weight: 700;
      background: linear-gradient(90deg, #2575fc, #6a11cb);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 25px;
    }

    /* Floating labels */
    .form-floating input,
    .form-floating select {
      border-radius: 12px;
      border: 1px solid #ddd;
      transition: 0.3s;
    }

    .form-floating input:focus,
    .form-floating select:focus {
      border-color: #2575fc;
      box-shadow: 0 0 0 0.2rem rgba(37, 117, 252, 0.25);
    }

    /* Table */
    .table thead {
      background: linear-gradient(90deg, #2575fc, #6a11cb);
      color: #fff;
    }

    .table tbody tr:hover {
      background-color: rgba(37, 117, 252, 0.05);
    }

    /* Buttons */
    .btn {
      border-radius: 12px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-danger {
      border: 2px solid #e53935;
      color: #e53935;
    }

    .btn-outline-danger:hover {
      background: #e53935;
      color: #fff;
    }

    .btn-outline-primary {
      border: 2px solid #2575fc;
      color: #2575fc;
    }

    .btn-outline-primary:hover {
      background: #2575fc;
      color: #fff;
    }

    .btn-success {
      background: linear-gradient(90deg, #43cea2, #185a9d);
      border: none;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">🏥 Maa Sarada Diagnostics</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav ms-auto">
          <!-- Home -->
          <li class="nav-item"><a class="nav-link" href="home.php">🏠 Home</a></li>
          <!-- Invoice -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="invoiceDropdown" data-bs-toggle="dropdown">🧾 Invoice</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="invoice_list.php">📃 Invoice List</a></li>
              <li><a class="dropdown-item" href="create_invoice.php">➕ Create Invoice</a></li>
            </ul>
          </li>
          <!-- Report -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="reportDropdown" data-bs-toggle="dropdown">📑 Report</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="report_list.php">📄 Report List</a></li>
              <li><a class="dropdown-item" href="create_report.php">📝 Create Report</a></li>
            </ul>
          </li>
          <!-- User -->
          <?php if (isset($_SESSION['userid'])) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown">
                👤 <?php echo htmlspecialchars($_SESSION['user']); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">⚙️ Account</a></li>
                <li><a class="dropdown-item" href="action.php?action=logout">🚪 Logout</a></li>
              </ul>
            </li>
          <?php else : ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main container -->
  <div class="container">
    <div class="report-card">
      <form action="" id="report-form" method="post" novalidate>
        <h2>🧾 Create Patient Report</h2>
        <input type="hidden" id="currency" value="$">

        <!-- Patient Info -->
        <div class="row g-4">
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" name="clientName" id="clientName" class="form-control" placeholder="Patient Name" required>
              <label for="clientName">Name of Patient</label>
            </div>
            <div class="form-floating mt-3">
              <input type="number" name="age" id="age" class="form-control" placeholder="Age" required>
              <label for="age">Age</label>
            </div>
            <div class="form-floating mt-3">
              <select name="sex" id="sex" class="form-select" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <label for="sex">Gender</label>
            </div>
          </div>

          <!-- Report Info -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" name="reffering_doctor" class="form-control" placeholder="Doctor Name" required>
              <label for="reffering_doctor">Referring Doctor</label>
            </div>
            <div class="form-floating mt-3">
              <input type="date" name="date_of_recipt" id="date_of_recipt" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
              <label for="date_of_recipt">Date of Receipt</label>
            </div>
            <div class="form-floating mt-3">
              <input type="date" name="date_of_report" id="date_of_report" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
              <label for="date_of_report">Date of Report</label>
            </div>
          </div>

          <!-- Select report type -->
          <div class="col-md-6">
            <div class="form-floating mt-3">
              <select name="report_type" id="report_type" class="form-select" required>
                <option value="">-- Select Report Type --</option>
              </select>
              <label for="report_type">Report Type</label>
            </div>
          </div>
        </div>

        <!-- Report Items -->
        <div class="table-responsive mt-5">
          <table class="table table-bordered text-center align-middle" id="reportItem">
            <thead>
              <tr>
                <th><input id="checkAll" type="checkbox"></th>
                <th>Report No</th>
                <th>Test Name</th>
                <th>Result</th>
                <th>Normal Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input class="itemRow" type="checkbox"></td>
                <td><input type="text" name="productCode[]" class="form-control"></td>
                <td><input type="text" name="test_name[]" class="form-control"></td>
                <td><input type="text" name="result[]" class="form-control"></td>
                <td><input type="text" name="normal_value[]" class="form-control"></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex gap-3 mt-3">
          <button type="button" class="btn btn-outline-danger" id="removeRows">
            <i class="fas fa-minus-circle me-1"></i> Delete Row
          </button>
          <button type="button" class="btn btn-outline-primary" id="addRows">
            <i class="fas fa-plus-circle me-1"></i> Add Row
          </button>
          <input type="hidden" name="userId" value="<?php echo isset($_SESSION['userid']) ? htmlspecialchars($_SESSION['userid']) : ''; ?>">
          <button type="submit" name="report_btn" class="btn btn-success">
            <i class="fas fa-save me-1"></i> Save Report
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Add/Remove Row Script -->
  <script>
    document.getElementById('addRows').addEventListener('click', function() {
      const tableBody = document.querySelector('#reportItem tbody');
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td><input class="itemRow" type="checkbox"></td>
        <td><input type="text" name="productCode[]" class="form-control"></td>
        <td><input type="text" name="test_name[]" class="form-control"></td>
        <td><input type="text" name="result[]" class="form-control"></td>
        <td><input type="text" name="normal_value[]" class="form-control"></td>
      `;
      tableBody.appendChild(newRow);
    });

    document.getElementById('removeRows').addEventListener('click', function() {
      const rows = document.querySelectorAll('.itemRow:checked');
      if (rows.length === 0) {
        alert('Please select at least one row to delete.');
        return;
      }
      rows.forEach(checkbox => {
        checkbox.closest('tr').remove();
      });
    });

    document.getElementById('checkAll').addEventListener('change', function() {
      const checked = this.checked;
      document.querySelectorAll('.itemRow').forEach(chk => {
        chk.checked = checked;
      });
    });
  </script>
</body>
</html>


    <!-- sayan -->

    <script>

        const reportTests = {
            "LipidProfile": [
                {
                    "code": "L1",
                    "test": "Total Cholesterol",
                    "result": "mg/dL",
                    "normal": "Up to 200 mg/dL",
                    "mainexamination": "LipidProfile"
                },
                {
                    "code": "L2",
                    "test": "HDL",
                    "result": "mg/dL",
                    "normal": "30 - 60 mg/dL",
                    "mainexamination": "LipidProfile"
                },
                {
                    "code": "L3",
                    "test": "LDL",
                    "result": "mg/dL",
                    "normal": "110 - 160 mg/dL",
                    "mainexamination": "LipidProfile"
                },
                {
                    "code": "L4",
                    "test": "VLDL",
                    "result": "mg/dL",
                    "normal": "18 - 20 mg/dL",
                    "mainexamination": "LipidProfile"
                },
                {
                    "code": "L3",
                    "test": "TRIGLYCERIDE(SERUM)",
                    "result": "mg/dL",
                    "normal": "Up to 170 Mg/dl",
                    "mainexamination": "LipidProfile"
                },,
                {
                    "code": "L3",
                    "test": "SUGAR(FASTING)",
                    "result": "Mg%",
                    "normal": "(65-110) Mg%",
                    "mainexamination": "LipidProfile"
                },,
                {
                    "code": "L3",
                    "test": "SUGAR(P.P.)",
                    "result": "Mg%",
                    "normal": "(80-140 )Mg%",
                    "mainexamination": "LipidProfile"
                },,
                {
                    "code": "L3",
                    "test": "UREA (SERUM)",
                    "result": "Mg/dl",
                    "normal": "Up to 45 Mg/dl",
                    "mainexamination": "LipidProfile"
                },,
                {
                    "code": "L3",
                    "test": "CREATININE (SERUM)",
                    "result": "Mg/dl",
                    "normal": "1(0.6-1.4) Mg/dl",
                    "mainexamination": "LipidProfile"
                },,
                {
                    "code": "L3",
                    "test": "AMYLASE (SERUM)",
                    "result": "U/I",
                    "normal": "(Up to 90) U/I",
                    "mainexamination": "LipidProfile"
                },,
                {
                    "code": "L3",
                    "test": "LIPASE(SERUM)",
                    "result": "IU/L",
                    "normal": "(13-60)IU/L",
                    "mainexamination": "LipidProfile"
                },

            ],
             "Pregnancy Profile": [
                {
                    "code": "P1",
                    "test": "HAEMOGLOBIN(HB%)",
                    "result": "Gm%",
                    "normal": "(11-16) Gm%.",
                    "mainexamination": "Pregnancy Profile"
                },
                 {
                    "code": "P2",
                    "test": "SUGAR (FASTING )",
                    "result": "Mg%",
                    "normal": "(65 -110) Mg%",
                    "mainexamination": "Pregnancy Profile"
                },
                 {
                    "code": "P3",
                    "test": "SUGAR (P.P.)",
                    "result": "Mg%",
                    "normal": "(80-140) Mg%.",
                    "mainexamination": "LipidProfile"
                },
                 {
                    "code": "P4",
                    "test": "A BO GROUPING",
                    "result": "",
                    "normal": "",
                    "mainexamination": "LipidProfile"
                },
                 {
                    "code": "P5",
                    "test": "RH TYPING",
                    "result": "Positive/Negative",
                    "normal": "NULL",
                    "mainexamination": "LipidProfile"
                },
                 {
                    "code": "P6",
                    "test": "VDRL (SERUM)",
                    "result": "NON REACTIVE/REACTIVE",
                    "normal": "NULL",
                    "mainexamination": "LipidProfile"
                },
                 {
                    "code": "P7",
                    "test": "HB s A g(SERUM)",
                    "result": "NON REACTIVE/REACTIVE",
                    "normal": "NULL",
                    "mainexamination": "LipidProfile"
                },
                 {
                    "code": "P8",
                    "test": "HIV(I&II) (SERUM)",
                    "result": "NON REACTIVE/REACTIVE",
                    "normal": "NULL",
                    "mainexamination": "LipidProfile"
                },
                 {
                    "code": "P9",
                    "test": "HCV (SERUM)",
                    "result": "NON REACTIVE/REACTIVE",
                    "normal": "NULL",
                    "mainexamination": "LipidProfile"
                },

            ],
            "SUGAR PAD": [
                {
                    "code": "S1",
                    "test": "SUGAR (FASTING)",
                    "result": "",
                    "normal": "(65-110)Mg%",
                    "mainexamination": "SUGAR PAD"
                },
                {
                    "code": "S2",
                    "test": "SUGAR (P.P)",
                    "result": "",
                    "normal": "(80-140) Mg %",
                    "mainexamination": "SUGAR PAD"
                }
            ],

            "LipidProfile 2": [
                {
                    "code": "L1",
                    "test": "Total Cholesterol",
                    "result": "",
                    "normal": "Up to 200 mg/dL",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "L2",
                    "test": "HDL",
                    "result": "",
                    "normal": "30 - 60 mg/dL",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "L3",
                    "test": "LDL",
                    "result": "",
                    "normal": "110 - 160 mg/dL",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "L4",
                    "test": "VLDL",
                    "result": "",
                    "normal": "18 - 20 mg/dL",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F1",
                    "test": "Serum Bilirubin Total",
                    "result": "",
                    "normal": "0.1 - 1.2 mg%",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F2",
                    "test": "Conjugated (Direct)",
                    "result": "",
                    "normal": "0.0 - 0.3 mg%",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F3",
                    "test": "Unconjugated (Indirect)",
                    "result": "",
                    "normal": "",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F4",
                    "test": "SGPT (ALT)",
                    "result": "",
                    "normal": "Up to 40 U/L",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F5",
                    "test": "SGOT (AST)",
                    "result": "",
                    "normal": "Up to 35 U/L",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F6",
                    "test": "Alkaline Phosphatase",
                    "result": "",
                    "normal": "108 - 306 IU/L",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F7",
                    "test": "Total Protein",
                    "result": "",
                    "normal": "5.7 - 7.9 gm%",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F8",
                    "test": "Albumin",
                    "result": "",
                    "normal": "2.8 - 4.8 gm%",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F9",
                    "test": "Globulin",
                    "result": "",
                    "normal": "2.0 - 3.5 gm%",
                    "mainexamination": "LipidProfile 2"
                },
                {
                    "code": "F10",
                    "test": "Albumin/Globulin Ratio",
                    "result": "",
                    "normal": "",
                    "mainexamination": "LipidProfile 2"
                }
            ],

            "LipidProfile 3": [
                {
                    "code": "L1",
                    "test": "Total Cholesterol",
                    "result": "",
                    "normal": "Up to 200 mg/dL",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "L2",
                    "test": "HDL",
                    "result": "",
                    "normal": "30 - 60 mg/dL",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "L3",
                    "test": "LDL",
                    "result": "",
                    "normal": "110 - 160 mg/dL",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "L4",
                    "test": "VLDL",
                    "result": "",
                    "normal": "18 - 20 mg/dL",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F1",
                    "test": "Serum Bilirubin Total",
                    "result": "",
                    "normal": "0.1 - 1.2 mg%",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F2",
                    "test": "Conjugated (Direct)",
                    "result": "",
                    "normal": "0.0 - 0.3 mg%",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F3",
                    "test": "Unconjugated (Indirect)",
                    "result": "",
                    "normal": "",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F4",
                    "test": "SGPT (ALT)",
                    "result": "",
                    "normal": "Up to 40 U/L",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F5",
                    "test": "SGOT (AST)",
                    "result": "",
                    "normal": "Up to 35 U/L",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F6",
                    "test": "Alkaline Phosphatase",
                    "result": "",
                    "normal": "108 - 306 IU/L",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F7",
                    "test": "Total Protein",
                    "result": "",
                    "normal": "5.7 - 7.9 gm%",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F8",
                    "test": "Albumin",
                    "result": "",
                    "normal": "2.8 - 4.8 gm%",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F9",
                    "test": "Globulin",
                    "result": "",
                    "normal": "2.0 - 3.5 gm%",
                    "mainexamination": "LipidProfile 3"
                },
                {
                    "code": "F10",
                    "test": "Albumin/Globulin Ratio",
                    "result": "",
                    "normal": "",
                    "mainexamination": "LipidProfile 3"
                }
            ],

            "LiverFunction": [
                {
                    "code": "F1",
                    "test": "Serum Bilirubin Total",
                    "result": "",
                    "normal": "0.1 - 1.2 mg%",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F2",
                    "test": "Conjugated (Direct)",
                    "result": "",
                    "normal": "0.0 - 0.3 mg%",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F3",
                    "test": "Unconjugated (Indirect)",
                    "result": "",
                    "normal": "",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F4",
                    "test": "SGPT (ALT)",
                    "result": "",
                    "normal": "Up to 40 U/L",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F5",
                    "test": "SGOT (AST)",
                    "result": "",
                    "normal": "Up to 35 U/L",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F6",
                    "test": "Alkaline Phosphatase",
                    "result": "",
                    "normal": "108 - 306 IU/L",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F7",
                    "test": "Total Protein",
                    "result": "",
                    "normal": "5.7 - 7.9 gm%",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F8",
                    "test": "Albumin",
                    "result": "",
                    "normal": "2.8 - 4.8 gm%",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F9",
                    "test": "Globulin",
                    "result": "",
                    "normal": "2.0 - 3.5 gm%",
                    "mainexamination": "LiverFunction"
                },
                {
                    "code": "F10",
                    "test": "Albumin/Globulin Ratio",
                    "result": "",
                    "normal": "",
                    "mainexamination": "LiverFunction"
                }
            ],

            "BloodRoutine": [
                {
                    "code": "B1",
                    "test": "TC",
                    "result": "",
                    "extrafield": "/Cumm",
                    "normal": "5000-10000/-cumm",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B2",
                    "test": "DC",
                    "result": "",
                    "extrafield": "% Neuta",
                    "normal": "40 - 75%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B3",
                    "test": "",
                    "result": "",
                    "extrafield": "% Lympho",
                    "normal": "20 - 45%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B4",
                    "test": "",
                    "result": "",
                    "extrafield": "% Eos",
                    "normal": "1 - 6%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B5",
                    "test": "",
                    "result": "",
                    "extrafield": "% Mano",
                    "normal": "2 - 10%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B6",
                    "test": "",
                    "result": "",
                    "extrafield": "% Beso",
                    "normal": "0 - 0.5%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B7",
                    "test": "Hb-(Cy.Hb Mest)",
                    "result": "",
                    "extrafield": "gm %",
                    "normal": "M -13-18 gm%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B8",
                    "test": "ESR",
                    "result": "",
                    "extrafield": "mm in 1st hr.",
                    "normal": "F -11-16 gm%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B9",
                    "test": "",
                    "result": "",
                    "extrafield": "mm 2st hr.",
                    "normal": "",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B10",
                    "test": "",
                    "result": "",
                    "extrafield": "mean",
                    "normal": "5-10 mm (Westeargren)",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B11",
                    "test": "Platelet Count",
                    "result": "",
                    "extrafield": "/Cumm",
                    "normal": "15000-4,00,000/cummn",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B12",
                    "test": "RBC (TC)",
                    "result": "",
                    "extrafield": "Cells/UL",
                    "normal": "M-(4.5-6.0) X 10^5 Cells/UL",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B13",
                    "test": "",
                    "result": "",
                    "extrafield": "Cells/UL",
                    "normal": "F-(4.0-4.5) X 10^5 Cells/UL",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B14",
                    "test": "PCV",
                    "result": "",
                    "extrafield": "%",
                    "normal": "M(40-54)%,F(36-47)%",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B15",
                    "test": "MCV",
                    "result": "",
                    "normal": "[86-100 fL]",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B15",
                    "test": "MCH",
                    "result": "",
                    "extrafield": "",
                    "normal": "[29 ± 2.5 Pg.]",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B15",
                    "test": "MCHC",
                    "result": "",
                    "normal": "32.5 ± 2 g/dL",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B16",
                    "test": "RBC",
                    "result": "",
                    "extrafield": "",
                    "normal": "Normal",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B17",
                    "test": "Malaria Parasite",
                    "result": "",
                    "extrafield": "",
                    "normal": "",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B18",
                    "test": "BT",
                    "result": "",
                    "extrafield": "Mit",
                    "normal": "Sec",
                    "mainexamination": "BloodRoutine"
                },
                {
                    "code": "B19",
                    "test": "CT",
                    "result": "",
                    "extrafield": "Mit",
                    "normal": "Sec",
                    "mainexamination": "BloodRoutine"
                }
            ],

            "KFT_Electrolytes": [
                {
                    "code": "K1",
                    "test": "Sugar (Fasting)",
                    "result": "",
                    "normal": "65 - 110 mg%",
                    "mainexamination": "KFT_Electrolytes"
                },
                {
                    "code": "K2",
                    "test": "Sugar (Post-Prandial)",
                    "result": "",
                    "normal": "80 - 140 mg%",
                    "mainexamination": "KFT_Electrolytes"
                },
                {
                    "code": "K3",
                    "test": "Sodium",
                    "result": "",
                    "normal": "135 - 155 mmol/L",
                    "mainexamination": "KFT_Electrolytes"
                },
                {
                    "code": "K4",
                    "test": "Potassium",
                    "result": "",
                    "normal": "3.5 - 5.5 mmol/L",
                    "mainexamination": "KFT_Electrolytes"
                },
                {
                    "code": "K5",
                    "test": "Urea",
                    "result": "",
                    "normal": "Up to 45 mg/dL",
                    "mainexamination": "KFT_Electrolytes"
                },
                {
                    "code": "K6",
                    "test": "Creatinine",
                    "result": "",
                    "normal": "0.6 - 1.2 mg/dL",
                    "mainexamination": "KFT_Electrolytes"
                },
                {
                    "code": "K7",
                    "test": "Uric Acid",
                    "result": "",
                    "normal": "3.6 - 7.2 mg/dL",
                    "mainexamination": "KFT_Electrolytes"
                },
                {
                    "code": "K8",
                    "test": "Chloride",
                    "result": "",
                    "normal": "98 - 115 mmol/L",
                    "mainexamination": "KFT_Electrolytes"
                }
            ],

            "SEMEN ANALYSIS": [
                {
                    "code": "S1",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Quantity",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S2",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Color",
                    "result": "",
                    "normal": "WHITISH",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S3",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Odor",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S4",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Ph",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S5",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Sugar",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S6",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Total count",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S7",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "RBC",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S8",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Epi Cell",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S9",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Pus count",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "SEMEN ANALYSIS"
                },
                {
                    "code": "S10",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Mitility",
                    "result": "",
                    "normal": "NIL",
                    "field": "textArea",
                    "mainexamination": "SEMEN ANALYSIS"
                }
            ],

            "STOOL PROFILE": [
                {
                    "code": "S1",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Color",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S2",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Mucus",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S3",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Parasite if Found",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S4",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Blood",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S5",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Appearance",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S6",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Other",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S7",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Vegetible Cell",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S8",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Starch",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S9",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Cyst",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S10",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "R.B.C",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S11",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Ova",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S12",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "W.B.C",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S13",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Undigested food/Partices",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S14",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Pus Cells",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S15",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Other",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S16",
                    "examination": "MICROSCOPICAL EXAMINATION",
                    "test": "Epithelial Call",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S17",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "PH",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S18",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "OBT",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                },
                {
                    "code": "S19",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Reducing Substance",
                    "result": "",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "STOOL PROFILE"
                }
            ],

            "UrineRoutine": [
                {
                    "code": "U1",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Quantity",
                    "result": "20 ml",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U2",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Appearance",
                    "result": "HAZZY",
                    "normal": "Clear",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U3",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Colour",
                    "result": "PALE YELLOW",
                    "normal": "Straw to yellow",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U4",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Sp. Gr",
                    "result": "1010",
                    "normal": "1.005 - 1.030",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U5",
                    "examination": "PHYSICAL EXAMINATION",
                    "test": "Deposit",
                    "result": "NIL",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U6",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Reaction (pH)",
                    "result": "6.5",
                    "normal": "4.6 - 8.0",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U7",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Bile Salt",
                    "result": "Negative",
                    "normal": "Negative",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U8",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Bile Pigment",
                    "result": "Negative",
                    "normal": "Negative",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U9",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Urobilinogen",
                    "result": "Normal",
                    "normal": "Normal",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U10",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Sugar",
                    "result": "NIL",
                    "normal": "Negative",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U11",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Protein(Albumin)",
                    "result": "TRACE",
                    "normal": "Negative",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U12",
                    "examination": "CHEMICAL EXAMINATION",
                    "test": "Ketone Bodies",
                    "result": "NIL",
                    "normal": "Negative",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U13",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Micro-organism",
                    "result": "Present",
                    "normal": "Absent",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U14",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "RBC",
                    "result": "NIL",
                    "normal": "0 - 2 /HPF",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U15",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Pus Cell",
                    "result": "25 - 30 /HPF",
                    "normal": "0 - 5 /HPF",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U16",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Epithelial Cell",
                    "result": "3 - 4 /HPF",
                    "normal": "0 - 5 /HPF",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U17",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Fat Droplets",
                    "result": "NIL",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U18",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Mucus",
                    "result": "NIL",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U19",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Casts",
                    "result": "NIL",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U20",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Crystals",
                    "result": "NIL",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U21",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Parasite",
                    "result": "NIL",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U22",
                    "examination": "MICROSCOPIC EXAMINATION",
                    "test": "Other",
                    "result": "NIL",
                    "normal": "NIL",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U23",
                    "examination": "PREGNANCY TEST",
                    "test": "PERGNANCY",
                    "result": "",
                    "normal": "",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                },
                {
                    "code": "U23",
                    "examination": "PREGNANCY TEST",
                    "test": "HOME SAMPLE",
                    "result": "",
                    "normal": "",
                    "field": "text",
                    "mainexamination": "UrineRoutine"
                }
            ],
            "Culture no Grouth": [
                {
                    "code": "n1",
                    "test": "CULTURE & SENSITIVITY OF URINE",
                    "result": "CULTURE SHOWED NO GROWTH AFTER 48 HOURS INCUBATION AT 37 DEG.C",
                    "normal": "",
                    "examination": "URINE CULTURE TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                }
            ],
            "Mantu": [
                {
                    "code": "M1",
                    "test": "MESERMENT IN MM",
                    "result": "",
                    "normal": "",
                    "examination": "MANTU TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "M2",
                    "test": "ERYTHEMA IN MM",
                    "result": "",
                    "normal": "",
                    "examination": "MANTU TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "M3",
                    "test": "INDURATION IN MM",
                    "result": "",
                    "normal": "",
                    "examination": "MANTU TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "M4",
                    "test": "REMARK",
                    "result": "NON REACTIVE/REACTIVE",
                    "normal": "",
                    "examination": "MANTU TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
            ],
            "Widal": [
                {
                    "code": "n1",
                    "test": "S Typhi H Positive up to",
                    "result": "",
                    "normal": "1/160",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n2",
                    "test": "S Typhi O Positive up to",
                    "result": "",
                    "normal": "1/80",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n3",
                    "test": "S Paratyphi A(H)",
                    "result": "",
                    "normal": "NEGATIVE",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n4",
                    "test": "S Paratyphi B(H)",
                    "result": "",
                    "normal": "NEGATIVE",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
            ],

            "Widal_Malaria And Dengue": [
                {
                    "code": "n1",
                    "test": "S Typhi H Positive up to",
                    "result": "",
                    "normal": "1/160",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n2",
                    "test": "S Typhi O Positive up to",
                    "result": "",
                    "normal": "1/80",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n3",
                    "test": "S Paratyphi A(H)",
                    "result": "",
                    "normal": "NEGATIVE",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n4",
                    "test": "S Paratyphi B(H)",
                    "result": "",
                    "normal": "NEGATIVE",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n5",
                    "test": "A Diagnostic Titer of",
                    "result": "",
                    "normal": "160 & 180",
                    "examination": "WIDAL TEST",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n6",
                    "test": "M.P.(MALARIA PARASITE) Test",
                    "result": "",
                    "normal": "",
                    "examination": "MALARIA PARASITE",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n7",
                    "test": "N S - 1",
                    "result": "",
                    "normal": "NON REACTIVE",
                    "examination": "DENGUE",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n8",
                    "test": "I g G",
                    "result": "",
                    "normal": "NON REACTIVE",
                    "examination": "DENGUE",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n9",
                    "test": "I g M",
                    "result": "",
                    "normal": "NON REACTIVE",
                    "examination": "DENGUE",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n10",
                    "test": "SCRUB TYPHUS ANTIBODY",
                    "result": "",
                    "normal": "NON REACTIVE",
                    "examination": "DENGUE",
                    "mainexamination": "WidalAndInfectionPanel"
                },
                {
                    "code": "n11",
                    "test": "C R P (SERUM)",
                    "result": "",
                    "normal": "Up to 6.0 mg/L",
                    "examination": "DENGUE",
                    "mainexamination": "WidalAndInfectionPanel"
                }
            ],

            "CultureGrowth": [
                {
                    "code": "s1",
                    "test": "Azithromycin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s2",
                    "test": "Amikacin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s3",
                    "test": "Amoxycillin",
                    "result": "",
                    "normal": "R",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s4",
                    "test": "Augmentin",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s5",
                    "test": "Cefadroxil",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s6",
                    "test": "Cefaclor",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s7",
                    "test": "Cefazolin",
                    "result": "",
                    "normal": "R",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s8",
                    "test": "Cefotaxime",
                    "result": "",
                    "normal": "MS",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s9",
                    "test": "Ceftazidime",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s10",
                    "test": "Ceftriaxone",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s11",
                    "test": "Cefuroxime sodium",
                    "result": "",
                    "normal": "R",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s12",
                    "test": "Cephalexin",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s13",
                    "test": "Cefdinir",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s14",
                    "test": "Ciprofloxacin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s15",
                    "test": "Cefoperazone",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s16",
                    "test": "Cefixime",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s17",
                    "test": "Cotrimoxazole",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s18",
                    "test": "Erythromycin",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s19",
                    "test": "Gentamycin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s20",
                    "test": "Levofloxacin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s21",
                    "test": "Lomofloxacin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s22",
                    "test": "Moxifloxacin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s23",
                    "test": "Nitrofurantoin",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s24",
                    "test": "Norfloxacin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s25",
                    "test": "Ofloxacin",
                    "result": "",
                    "normal": "S",
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s26",
                    "test": "Roxithromycin",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s27",
                    "test": "Streptomyces",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s28",
                    "test": "Tetracycline",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s29",
                    "test": "Tobramycin",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s30",
                    "test": "Meropenem",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s31",
                    "test": "Ceftizoxime",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                },
                {
                    "code": "s32",
                    "test": "Lincomycin",
                    "result": "",
                    "normal": null,
                    "examination": "CultureGrowth",
                    "mainexamination": "CultureGrowth"
                }
            ],
        };

        const reportTypeSelect = document.getElementById('report_type');
        for (const key in reportTests) {
            const option = document.createElement('option');
            option.value = key;
            option.textContent = key;
            reportTypeSelect.appendChild(option);
        }

        document.getElementById('report_type').addEventListener('change', function() {
            const selected = this.value;
            const tableBody = document.querySelector('#reportItem tbody');

            // Clear old rows
            tableBody.innerHTML = '';

            // Load test rows
            if (reportTests[selected]) {
                reportTests[selected].forEach(item => {
                    const row = document.createElement('tr');

                    let resultInput = '';
                    if (item.field === "textArea") {
                        resultInput = `<textarea name="result[]" rows="2" class="form-control">${item.result}</textarea>`;
                    } else {
                        const inputType = item.field || "text";
                        resultInput = `<input type="${inputType}" name="result[]" class="form-control" value="${item.result}">`;
                    }


                    row.innerHTML = `
                        <td><input class="itemRow" type="checkbox"></td>
                        <td><input type="text" name="productCode[]" class="form-control" value="${item.code}"></td>
                        <td><input type="text" name="test_name[]" class="form-control" value="${item.test}"></td>
                        <td>${resultInput}</td>
                        <td><input type="text" name="normal_value[]" class="form-control" value="${item.normal}"></td>
                        <td style="display:none;"><input type="text" name="EXAMINATION_name[]" class="form-control" value="${item.examination}"></td>
                        <td style="display:none;"><input type="text" name="extrafield[]" class="form-control" value="${item.extrafield || ''}"></td>
                        <td style="display:none;"><input type="text" name="mainexamination[]" class="form-control" value="${item.mainexamination || ''}"></td>
                    `;
                    tableBody.appendChild(row);
                });
            }
        });

    </script>

    <!-- !sayan -->

</body>

</html>