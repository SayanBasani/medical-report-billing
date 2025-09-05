<?php
// Test database connection and data
include('report.php');

try {
    $report = new Report();
    echo "<h3>Database Connection: ✅ SUCCESS</h3>";
    
    // Test 1: Check report_type table
    echo "<h4>Report Types:</h4>";
    $reportTypes = $report->getData("SELECT * FROM report_type");
    if (!empty($reportTypes)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Code</th><th>Name</th></tr>";
        foreach ($reportTypes as $type) {
            echo "<tr><td>{$type['id']}</td><td>{$type['code']}</td><td>{$type['name']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'>⚠️ No data in report_type table</p>";
    }
    
    echo "<br>";
    
    // Test 2: Check report_field table
    echo "<h4>Report Fields:</h4>";
    $reportFields = $report->getData("SELECT * FROM report_field");
    if (!empty($reportFields)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Report Code</th><th>Test Code</th><th>Test Name</th><th>Normal Range</th></tr>";
        foreach ($reportFields as $field) {
            echo "<tr><td>{$field['id']}</td><td>{$field['report_code']}</td><td>{$field['test_code']}</td><td>{$field['test_name']}</td><td>{$field['normal_range']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: orange;'>⚠️ No data in report_field table</p>";
    }
    
    // Test 3: Test the get_report_fields functionality
    if (!empty($reportTypes)) {
        $firstReportCode = $reportTypes[0]['code'];
        echo "<br><h4>Testing get_report_fields for code: {$firstReportCode}</h4>";
        $testFields = $report->getData("SELECT test_code AS code, test_name AS test, normal_range AS normal FROM report_field WHERE report_code = '{$firstReportCode}'");
        echo "<pre>" . json_encode($testFields, JSON_PRETTY_PRINT) . "</pre>";
    }
    
} catch (Exception $e) {
    echo "<h3 style='color: red;'>❌ Database Connection Failed:</h3>";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>";
}
?>
