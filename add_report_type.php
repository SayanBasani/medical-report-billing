<?php
    session_start();
    include('report.php');
    $report = new Report();
    $report->checkLoggedIn();

    // Save on POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $report->addReportTypeWithFields($_POST);
        echo "<script>alert('Report Type Added Successfully!');</script>";
        header("Location: create_report.php");
        // header("Location: add_report_type.php?success=1");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Report Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">➕ Add New Report Type</h2>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">✅ Report Type Added Successfully!</div>
        <?php endif; ?>
        <form method="POST">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <input type="text" name="report_code" class="form-control" placeholder="Report Code (e.g. LFT1)" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="report_name" class="form-control" placeholder="Report Name (e.g. Liver Function Test)" required>
                </div>
            </div>

            <h5 class="mt-4">🧪 Test Fields</h5>
            <table class="table table-bordered" id="testTable">
                <thead>
                    <tr>
                        <th>Test Code</th>
                        <th>Test Name</th>
                        <th>Normal Range</th>
                        <th><button type="button" class="btn btn-success btn-sm" id="addRow">➕</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="test_code[]" class="form-control" required></td>
                        <td><input type="text" name="test_name[]" class="form-control" required></td>
                        <td><input type="text" name="normal_range[]" class="form-control" required></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">💾 Save Report Type</button>
        </form>
    </div>

    <script>
        document.getElementById('addRow').addEventListener('click', function () {
            const tbody = document.querySelector('#testTable tbody');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="text" name="test_code[]" class="form-control" required></td>
                <td><input type="text" name="test_name[]" class="form-control" required></td>
                <td><input type="text" name="normal_range[]" class="form-control" required></td>
                <td><button type="button" class="btn btn-danger btn-sm removeRow">❌</button></td>
            `;
            tbody.appendChild(row);
        });

        // Remove row
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('removeRow')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
</body>
</html>
