<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session to access session variables
session_start();

// Check if the 'usn' is stored in the session
if (!isset($_SESSION["username"])) {
    echo "You must be logged in to apply for jobs.";
    exit;
}

// Get the 'usn' from the session
$USN = $_SESSION["username"];


// Database configuration
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'dbms_project';


// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the job_id from the form submission
$job_id = $_POST['job_id'];

// Query to fetch student_id based on usn
$query = "SELECT student_id FROM Student WHERE USN = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $USN); // Bind the 'usn' parameter
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($student_id);
    $stmt->fetch();

    // Check if the student has already applied for this job
    $check_query = "SELECT * FROM Apply WHERE student_id = ? AND job_id = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param('ii', $student_id, $job_id);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "You have already applied for this job.";
    } else {
        // Start a transaction to insert into both Application and Apply tables
        $conn->begin_transaction();

        try {
            // Register the student for the job (Insert into Application table)
            $application_query = "INSERT INTO Application (student_id, job_id, application_date, status) VALUES (?, ?, NOW(), 'Pending')";
            $application_stmt = $conn->prepare($application_query);
            $application_stmt->bind_param('ii', $student_id, $job_id);

            if (!$application_stmt->execute()) {
                throw new Exception("Error applying for job: " . $application_stmt->error);
            }

            // Insert into Apply table (Create relation between student and job)
            $apply_query = "INSERT INTO Apply (student_id, job_id) VALUES (?, ?)";
            $apply_stmt = $conn->prepare($apply_query);
            $apply_stmt->bind_param('ii', $student_id, $job_id);

            if (!$apply_stmt->execute()) {
                throw new Exception("Error creating application relation: " . $apply_stmt->error);
            }

            // Commit the transaction
            $conn->commit();
            echo "You have successfully applied for the job.";
        } catch (Exception $e) {
            // Rollback transaction in case of error
            $conn->rollback();
            echo $e->getMessage();
        } finally {
            // Close statements
            $application_stmt->close();
            $apply_stmt->close();
        }
    }

    $check_stmt->close();
} else {
    echo "First register for placement, then only are you eligible for applying to a job";
}

$stmt->close();
$conn->close();

// // Check if the student exists
// if ($stmt->num_rows > 0) {
//     // Bind the result to get student_id
//     $stmt->bind_result($student_id);
//     $stmt->fetch();
    
//     // Insert the application into the Application table
//     $application_query = "INSERT INTO Application (student_id, job_id, application_date, status) 
//                           VALUES (?, ?, NOW(), 'Pending')";
//     $application_stmt = $conn->prepare($application_query);
//     $application_stmt->bind_param('ii', $student_id, $job_id);  // Bind student_id and job_id
//     if ($application_stmt->execute()) {
//         echo "You have successfully applied for the job.";
//     } else {
//         echo "Error: Could not apply for the job.";
//     }

//     // Insert into Apply table (Create relation between student and job)
//     $apply_query = "INSERT INTO Apply (student_id, job_id) VALUES (?, ?)";
//     $apply_stmt = $conn->prepare($apply_query);
//     $apply_stmt->bind_param('ii', $student_id, $job_id);

//     if (!$apply_stmt->execute()) {
//         throw new Exception("Error creating application relation: " . $apply_stmt->error);
//     }

//     $application_stmt->close();
// } else {
//     echo "No student found with that USN.";
// }

// // Close the statement and connection
// $stmt->close();
// $conn->close();

?>

<!-- Redirect back to the job listing page -->
<a href="jobs1.php">Back to Job Listings</a>
