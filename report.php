<?php

require_once 'database.php';

class report extends Database
{
	private $invoiceUserTable = 'invoice_user';
	private $reportTable = 'report';
	private $reportitemTable = 'report_item';

	public function __construct()
	{
		if (!$this->dbConnect) {
			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error());
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($email, $password)
	{
		$sqlQuery = "
			SELECT id, email, first_name, last_name, address, mobile 
			FROM " . $this->invoiceUserTable . " 
			WHERE email='" . $email . "' AND password='" . $password . "'";
		return  $this->getData($sqlQuery);
	}
	public function checkLoggedIn()
	{
		if (!$_SESSION['userid']) {
			header("Location:index.php");
		}
	}
	
	public function savereport()
	{
		// echo "<script>alert('hello good');</script>";	
		// echo "<script>alert('".$_POST['userId'].",".$_POST['clientName'].",".$_POST['age'].", ".$_POST['reffering_doctor'].", ".$_POST['sex'].", ".$_POST['date_of_recipt'].", ".$_POST['date_of_report']."');</script>";
		
		$sqlInsert = "
		INSERT INTO " . $this->reportTable . "
		(user_id,
		clientName, 
		age, 
		sex, 
		reffering_doctor, 
		date_of_recipt, 
		date_of_report,
		delete_status)

		VALUES (
		'" . $_POST['userId'] . "', 
		'" . $_POST['clientName'] . "', 
		'" . $_POST['age'] . "', 
		'" . $_POST['sex'] . "', 
		'" . $_POST['reffering_doctor'] . "', 
		'" . $_POST['date_of_recipt'] . "', 
		'" . $_POST['date_of_report'] . "'
		,0)";

		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);

		for ($i = 0; $i < count($_POST['productCode']); $i++) {
			$extrafield = "";
			echo "<script>alert('1->".$extrafield."<-');</script>";
			if(!empty($_POST['extrafield'])){
				$extrafield = $_POST['extrafield'][$i];
			};

			echo "<script>alert('2->".$extrafield."<-');</script>";
			// echo "<script>alert('" . $lastInsertId . "  --  " . $_POST['productCode'][$i] . "," . $_POST['result'][$i] . "," . $_POST['normal_value'][$i] . "');</script>";

			$sqlInsertItem = "
			INSERT INTO " . $this->reportitemTable . "(
			report_item_id, 
			report_no,
			test_name, 
			result, 
			normal_value,
			EXAMINATION_name,
			extrafield,
			mainexamination
			) 
			VALUES (
				'" . $lastInsertId . "',
				'" . $_POST['productCode'][$i] . "',
				'" . $_POST['test_name'][$i] . "',
				'" . $_POST['result'][$i] . "',
				'" . $_POST['normal_value'][$i] . "',
				'" . $_POST['EXAMINATION_name'][$i] . "',
				'" . $extrafield. "',
				'" . $_POST['mainexamination'][$i] . "'
        	)";

			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		
		
		}
	}


	// gpt sayan . Now Working for the User Normel details/ not for the dinamic data 
	public function updatereport()
	{
		echo "<script>alert(" . $_GET['update_id'] . $_POST['clientName'] . $_POST['age'] . $_POST['reffering_doctor'] . ");</script>";

		if (!empty($_GET['update_id'])) {
			// Update the main report details
			$sqlInsert = "
				UPDATE " . $this->reportTable . " 
				SET clientName = '" . $_POST['clientName'] . "', 
					age = '" . $_POST['age'] . "', 
					reffering_doctor = '" . $_POST['reffering_doctor'] . "', 
					sex = '" . $_POST['sex'] . "', 
					date_of_recipt = '" . $_POST['date_of_recipt'] . "', 
					date_of_report = '" . $_POST['date_of_report'] . "'
				WHERE user_id = '" . $_POST['userId'] . "' 
				  AND id = '" . $_GET['update_id'] . "'
			";
			echo "<script>alert('" . $sqlInsert . "');</script>";
			mysqli_query($this->dbConnect, $sqlInsert);
		}

		// Delete old report items
		$this->deletereportItems($_GET['update_id'], "report_item_id");

		// Insert updated report items
		for ($i = 0; $i < count($_POST['test_name']); $i++) {
			$testName = $_POST['test_name'][$i];
			$result = $_POST['result'][$i];
			$normalValue = $_POST['normal_value'][$i];
			$EXAMINATION_name = $_POST['EXAMINATION_name'][$i];

			$sqlInsertItem = "
			INSERT INTO " . $this->reportitemTable . "(
					report_item_id, 
					report_no,
					test_name, 
					result, 
					normal_value,
					EXAMINATION_name,
					extrafield,
					mainexamination
				) 
				VALUES (
					'" . $_GET['update_id'] . "', 
					'" . $_POST['productCode'][$i] . "',
					'" . $testName . "', 
					'" . $result . "', 
					'" . $normalValue . "',
					'" . $EXAMINATION_name . "',
					'" . $_POST['extrafield'][$i]. "',
					'" . $_POST['mainexamination'][$i] . "'
				)
			";
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}
	}
	// 
	// !gpt sayan 
	public function getreportList()
	{
		$sqlQuery = "
			SELECT * FROM " . $this->reportTable . " 
			WHERE user_id = '" . $_SESSION['userid'] . "'";
		return  $this->getData($sqlQuery);
	}
	public function getreport($reportID)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->reportTable . " 
			WHERE user_id = '" . $_SESSION['userid'] . "' AND id = '$reportID'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}

	public function getreportItems($reportID)
	{
		$sqlQuery = "
			SELECT * FROM " . $this->reportitemTable . "  
			WHERE report_item_id = '" . $reportID . "'";
		// echo "<script>alert('".$sqlQuery."');</script>";
		return  $this->getData($sqlQuery);
	}
	public function deletereportItems($reportID, $col_Name = "id")
	{
		$sqlQuery = "
			DELETE FROM " . $this->reportitemTable . " 
			WHERE " . $col_Name . " = '" . $reportID . "'";
		mysqli_query($this->dbConnect, $sqlQuery);
	}
	public function deletereport($reportID)
	{
		$sqlQuery = "
			DELETE FROM " . $this->reportTable . " 
			WHERE id = '" . $reportID . "'";
		mysqli_query($this->dbConnect, $sqlQuery);
		$this->deletereportItems($reportID);
		return 1;
	}
	// sayan
	public function getReportTypes()
	{
		$sqlQuery = "SELECT code, name FROM report_type";
		return $this->getData($sqlQuery);
	}
	public function addReportTypeWithFields($data)
	{
		$reportCode = mysqli_real_escape_string($this->dbConnect, $data['report_code']);
		$reportName = mysqli_real_escape_string($this->dbConnect, $data['report_name']);

		// Insert the report type
		$sql = "INSERT INTO report_type (code, name) VALUES ('$reportCode', '$reportName')";
		mysqli_query($this->dbConnect, $sql);

		// Now insert all test fields
		if (!empty($data['test_code']) && is_array($data['test_code'])) {
			for ($i = 0; $i < count($data['test_code']); $i++) {
				$testCode = mysqli_real_escape_string($this->dbConnect, $data['test_code'][$i]);
				$testName = mysqli_real_escape_string($this->dbConnect, $data['test_name'][$i]);
				$normalRange = mysqli_real_escape_string($this->dbConnect, $data['normal_range'][$i]);

				$sqlInsert = "INSERT INTO report_field (report_code, test_code, test_name, normal_range) 
                          VALUES ('$reportCode', '$testCode', '$testName', '$normalRange')";
				mysqli_query($this->dbConnect, $sqlInsert);
			}
		}
	}


	public function escapeString($string)
	{
		return mysqli_real_escape_string($this->dbConnect, $string);
	}

	public function getReportFields($reportCode)
	{
		$reportCode = mysqli_real_escape_string($this->dbConnect, $reportCode);
		$sqlQuery = "SELECT test_code AS code, test_name AS test, normal_range AS normal 
		             FROM report_field 
		             WHERE report_code = '$reportCode'";
		return $this->getData($sqlQuery);
	}
	// end of sayan
	// search invoice
	public function searchReportByInvoice($invoice)
	{
		$invoice = $this->escapeString($invoice);
		$sqlQuery = "
        SELECT * FROM " . $this->reportTable . " 
        WHERE user_id = '" . $_SESSION['userid'] . "' 
          AND invoice LIKE '%" . $invoice . "%' 
        ORDER BY id DESC";
		return $this->getData($sqlQuery);
	}
}
