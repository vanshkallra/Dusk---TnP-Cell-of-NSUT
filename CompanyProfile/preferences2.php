<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if USN is set in the session
if (!isset($_SESSION['username'])) {
    echo "Session error: USN not found.";
    exit;
}

$usn = $_SESSION['username'];

// Database configuration
$host = 'localhost';    // Database host
$user = 'root';         // Database username
$pass = '';             // Database password
$dbname = 'dbms_project'; // Database name

// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the company name using the USN
$query = "SELECT company_name FROM Company WHERE usn = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $usn);
$stmt->execute();
$stmt->bind_result($company_name);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <!-- Company Name Heading -->
    <h2 class="">Add Job <?php echo htmlspecialchars($company_name); ?></h2>
    <hr>
    
    <form action="list_jobs1.php" method="POST">
        <!-- Display Company Name at the top of the form -->
        <div class="form-group">
            <label><strong>Company Name:</strong> <?php echo htmlspecialchars($company_name); ?></label>
        </div>

        <!-- Job Title Input -->
        <div class="form-group">
            <label for="job_title">Job Title:</label>
            <input type="text" name="job_title" id="job_title" class="form-control" required>
        </div>

        <!-- Job Description Input -->
        <div class="form-group">
            <label for="job_description">Job Description:</label>
            <textarea name="job_description" id="job_description" class="form-control" required></textarea>
        </div>

        <!-- Requirements Input -->
        <div class="form-group">
            <label for="requirements">Requirements:</label>
            <textarea name="requirements" id="requirements" class="form-control" required></textarea>
        </div>

        <!-- Salary Input -->
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" class="form-control" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Job</button>
    </form>
</div>

</body>
</html>
