<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'dbms_project';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if data is received
if (!isset($_POST['application_id']) || !isset($_POST['new_status'])) {
    echo "Error: Required data not received.";
    exit;
}

$application_id = $_POST['application_id'];
$new_status = $_POST['new_status'];

// Debugging statements to verify data
// var_dump($application_id, $new_status);

// Validate non-null values
if (empty($application_id) || empty($new_status)) {
    echo "Error: Missing application ID or new status.";
    exit;
}

// Prepare the update query
$update_query = "UPDATE Application SET status = ? WHERE application_id = ?";
$stmt = $conn->prepare($update_query);
$stmt->bind_param('si', $new_status, $application_id);

if ($stmt->execute()) {
    echo "Status updated successfully!";
} else {
    echo "Error updating status: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<a href="show_apps_extra.php" class="goback">Go back</a>
