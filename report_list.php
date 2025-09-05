<?php 
session_start();
include('inc/header.php');
include 'report.php';

$report = new report();
$report->checkLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maa Sarada - Report List</title>
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">


    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #fce4ec);
            min-height: 100vh;
        }

        .card-custom {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .card-header {
            background: linear-gradient(135deg, #007bff, #00bcd4);
            color: #fff;
            font-weight: bold;
            font-size: 1.25rem;
            padding: 1rem 1.5rem;
        }

        .report-card {
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .report-card:hover {
            transform: translateY(-5px);
        }

        .report-actions .btn {
            border-radius: 12px;
            margin-right: 5px;
        }

        .add-btn {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: #fff;
            font-weight: 600;
            border-radius: 30px;
            padding: 0.6rem 1.5rem;
            box-shadow: 0 3px 8px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .add-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .search-bar {
            max-width: 400px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm" style="background: linear-gradient(135deg, #007bff, #00bcd4);">
  <div class="container-fluid">
    <!-- Brand / Logo -->
    <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="home.php">
      <i class="fas fa-hospital-user me-2"></i> Maa Sarada
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item mx-1">
          <a class="nav-link text-white fw-semibold" href="home.php">
            <i class="fas fa-tachometer-alt me-1"></i> Dashboard
          </a>
        </li>

        <li class="nav-item dropdown mx-1">
          <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" id="reportsDropdown" role="button"
             data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-file-medical-alt me-1"></i> Reports
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3" aria-labelledby="reportsDropdown">
            <li><a class="dropdown-item" href="create_report.php"><i class="fas fa-plus-circle me-2"></i>Create Report</a></li>
            <li><a class="dropdown-item" href="report_list.php"><i class="fas fa-list me-2"></i>View Reports</a></li>
          </ul>
        </li>

        <li class="nav-item mx-1">
          <a class="nav-link text-white fw-semibold" href="action.php?action=logout">
            <i class="fas fa-sign-out-alt me-1"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Container -->
<div class="container py-5">
    <div class="card card-custom">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Patient Report List</span>
            <input type="text" id="searchInput" class="form-control search-bar" placeholder="Search by patient name...">
        </div>
        <div class="mt-4 text-end">
                <a href="create_report.php" class="add-btn">
                    + Add New Report
                </a>
            </div>
        <div class="card-body p-4">
            <div class="row g-4" id="reportContainer">
                <?php   
                $reportList = $report->getreportList();
                foreach($reportList as $reportDetails){
                    echo '
                    <div class="col-md-6 col-lg-4 report-item">
                        <div class="card report-card p-3 h-100">
                            <h5 class="fw-bold mb-2 report-name">'.htmlspecialchars($reportDetails["clientName"]).'</h5>
                            <p class="mb-1"><i class="fas fa-user-md me-2 text-primary"></i> '.htmlspecialchars($reportDetails["reffering_doctor"]).'</p>
                            <p class="mb-1 report-date"><i class="fas fa-calendar-plus me-2 text-success"></i> Receipt: '.htmlspecialchars($reportDetails["date_of_recipt"]).'</p>
                            <p class="mb-3 report-date"><i class="fas fa-calendar-check me-2 text-info"></i> Report: '.htmlspecialchars($reportDetails["date_of_report"]).'</p>
                            <div class="report-actions d-flex justify-content-start mt-auto">
                                <a href="print_report.php?report_id='.$reportDetails["id"].'" title="Print Report" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-print"></i>
                                </a>
                                <a href="edit_report.php?update_id='.$reportDetails["id"].'" title="Edit Report" class="btn btn-outline-warning btn-sm">
                                    <i class="fas fa-pen-to-square"></i>
                                </a>
                                <a href="delete_report.php?update_id='.$reportDetails["id"].'" id="'.$reportDetails["id"].'" class="btn btn-outline-danger btn-sm deletereport" title="Delete Report">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>';
                }       
                ?>
            </div>
            
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/report.js"></script>

<!-- Search Script -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let reports = document.querySelectorAll('#reportContainer .report-item');
    
    reports.forEach(function(report) {
        let name = report.querySelector('.report-name').textContent.toLowerCase();
        let dates = report.querySelectorAll('.report-date');
        let dateText = '';
        dates.forEach(d => dateText += d.textContent.toLowerCase());

        if (name.includes(filter) || dateText.includes(filter)) {
            report.style.display = "";
        } else {
            report.style.display = "none";
        }
    });
});
</script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.deletereport').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent link from navigating immediately
        const deleteUrl = this.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            background: '#fff',
            customClass: {
                popup: 'rounded-4'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with deletion
                window.location.href = deleteUrl;
            }
        });
    });
});
</script>


</body>
</html>
