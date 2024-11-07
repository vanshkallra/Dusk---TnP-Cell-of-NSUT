

<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// // Check if the company is logged in
// if (!isset($_SESSION['company_name'])) {
//     die("You must be logged in to add a job.");
// }

$company_id = $_POST['company_id']; // Company ID from the form
$job_title = $_POST['job_title'];
$job_description = $_POST['job_description'];
$requirements = $_POST['requirements'];
$salary = $_POST['salary'];
$location = $_POST['location']; // Get the location

// Database configuration
$host = 'localhost';    // Database host
$user = 'root';         // Database username
$pass = '';             // Database password
$dbname = 'dbms_project'; // Database name

// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the job details along with company_id and location into the Job table
$query = "INSERT INTO Job (company_id, job_title, job_description, requirements, salary, location) 
          VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('isssis', $company_id, $job_title, $job_description, $requirements, $salary, $location);

if ($stmt->execute()) {
    echo "Job has been successfully added!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

<a href="preferences.php">Go back</a>
