<?php 
session_start();
include('inc/header.php');
include 'Report.php';

$report = new report();
$report->checkLoggedIn();

if (!empty($_POST['clientName']) && $_POST['clientName'] && !empty($_GET['update_id']) && $_GET['update_id']) {	
    $report->updatereport($_GET['update_id']);	
    header("Location:report_list.php");	
}

if (!empty($_GET['update_id']) && $_GET['update_id']) {
    $reportValues = $report->getReport($_GET['update_id']);		
    $reportItems = $report->getReportItems($_GET['update_id']);		
}
?>

<title>Maa Sarada - Edit Report</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/report.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('inc/container.php');?>

<div class="container py-5">
    <h2 class="mb-4 text-primary fw-bold">Edit Patient Report</h2>
    <?php include('menu.php'); ?>	

    <form method="post" id="report-form" class="bg-white p-4 shadow-sm rounded">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Name of Patient</label>
                <input type="text" name="clientName" class="form-control" required value="<?php echo $reportValues['clientName']; ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Age</label>
                <input type="text" name="age" class="form-control" required value="<?php echo $reportValues['age']; ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Gender</label>
                <select name="sex" class="form-select">
                    <option value="Male" <?php if($reportValues['sex']=="Male") echo "selected"; ?>>Male</option>
                    <option value="Female" <?php if($reportValues['sex']=="Female") echo "selected"; ?>>Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Referring Doctor</label>
                <input type="text" name="reffering_doctor" class="form-control" value="<?php echo $reportValues['reffering_doctor']; ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Date of Receipt</label>
                <input type="date" name="date_of_recipt" class="form-control" value="<?php echo $reportValues['date_of_recipt']; ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Date of Report</label>
                <input type="date" name="date_of_report" class="form-control" value="<?php echo $reportValues['date_of_report']; ?>">
            </div>
        </div>

        <hr class="my-4">

        <h5 class="mb-3">Test Details</h5>
        <table class="table table-bordered" id="reportItem">
            <thead class="table-light">
                <tr>
                    <th><input id="checkAll" class="form-check-input" type="checkbox"></th>
                    <th>Test No</th>
                    <th>Test Name</th>
                    <th>Result</th>
                    <th>Normal Value</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $count = 0;
                foreach($reportItems as $reportItem){
                    $count++;
                    echo '
                    <tr>
                        <td><input class="itemRow form-check-input" type="checkbox"></td>
                        <td><input type="text" name="productCode[]" value="'.$reportItem["report_no"].'" class="form-control"></td>
                        <td><input type="text" name="test_name[]" value="'.$reportItem["test_name"].'" class="form-control"></td>
                        <td><input type="text" name="result[]" value="'.$reportItem["result"].'" class="form-control"></td>
                        <td><input type="text" name="normal_value[]" value="'.$reportItem["normal_value"].'" class="form-control"></td>
                        <td class="hidden"><input type="hidden" name="itemId[]" value="'.$reportItem['report_item_id'].'"></td>
                        <td class="hidden"><input type="hidden" name="EXAMINATION_name[]" class="form-control" value="'.$reportItem['EXAMINATION_name'].'"></td>
                        <td style="display:none;"><input type="text" name="extrafield[]" class="form-control" value="'.$reportItem['extrafield'].'"></td>
                        <td style="display:none;"><input type="text" name="mainexamination[]" class="form-control" value="'.$reportItem['mainexamination'].'"></td>

                    </tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="mb-3">
            <button type="button" class="btn btn-danger" id="removeRows">- Delete</button>
            <button type="button" class="btn btn-success" id="addRows">+ Add More</button>
        </div>

        <input type="hidden" name="userId" value="<?php echo $_SESSION['userid']; ?>">
        <input type="hidden" name="reportId" value="<?php echo $reportValues['id']; ?>">

        <div class="text-end">
            <button type="submit" name="report_btn" class="btn btn-primary">Update Report</button>
        </div>
    </form>
</div>

<?php include('inc/footer.php'); ?>
