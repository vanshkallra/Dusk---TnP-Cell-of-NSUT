<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if USN is set in session
if (!isset($_SESSION['username'])) {
    echo "Session error: USN not found.";
    exit;
}

$usn = $_SESSION['username'];

// Database configuration
$host = 'localhost';    // Replace with your DB host
$user = 'root';         // Replace with your DB username
$pass = '';             // Replace with your DB password
$dbname = 'dbms_project'; // Replace with your DB name

// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch company_id and company_name using USN
$query = "SELECT company_id, company_name FROM Company WHERE usn = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $usn);
$stmt->execute();
$stmt->bind_result($company_id, $company_name);

if (!$stmt->fetch()) {
    echo "No company found with that USN.";
    exit;
}
$stmt->close();

// Fetch applicants who applied to jobs posted by this company
$applicants_query = "
    SELECT a.application_id, s.FirstName, s.LastName, s.usn, s.email, s.Mobile, a.status
    FROM Application a
    JOIN Student s ON a.student_id = s.student_id
    JOIN Job j ON a.job_id = j.job_id
    WHERE j.company_id = ?
";
$applicants_stmt = $conn->prepare($applicants_query);
$applicants_stmt->bind_param('i', $company_id);
$applicants_stmt->execute();
$applicants_stmt->store_result();
$applicants_stmt->bind_result($application_id, $FirstName, $LastName, $student_usn, $email, $Mobile, $status);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Applicants</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .applicant-container {
            width: 60%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Applicants for Company: <?php echo htmlspecialchars($company_name); ?></h2>

<?php
if ($applicants_stmt->num_rows > 0) {
    while ($applicants_stmt->fetch()) {
?>
        <div class="applicant-container">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($FirstName ?? "N/A") . " " . htmlspecialchars($LastName ?? ""); ?></p>
            <p><strong>USN:</strong> <?php echo htmlspecialchars($student_usn ?? "N/A"); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email ?? "N/A"); ?></p>
            <p><strong>Mobile:</strong> <?php echo htmlspecialchars($Mobile ?? "N/A"); ?></p>
            <p><strong>Status:</strong> <?php echo htmlspecialchars($status ?? "Pending"); ?></p>

            <!-- Form to update status -->
            <form method="POST" action="update_status.php">
                <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($application_id); ?>">
                <select name="new_status" class="form-control" required>
                    <option value="">Select Status</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Update Status</button>
            </form>
        </div>

<?php
    }
} else {
    echo "<p class='text-center'>No applicants found for this company.</p>";
}

$applicants_stmt->close();
$conn->close();
?>

</body>
</html>
