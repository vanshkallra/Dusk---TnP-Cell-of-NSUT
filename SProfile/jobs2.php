<?php
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

// Get companies and jobs
$query = "SELECT Company.company_id, Company.company_name, Job.job_id, Job.job_title, Job.job_description 
          FROM Company 
          JOIN Job ON Company.company_id = Job.company_id";
$result = $conn->query($query);

// Check for application submission
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['apply'])) {
//     $job_id = $_POST['job_id'];
//     $student_id = $_POST['student_id'];  // Use session or form to get student ID

//     // Insert into Application table
//     $application_query = "INSERT INTO Application (job_id, student_id, application_date, status) VALUES (?, ?, NOW(), 'Pending')";
//     $stmt = $conn->prepare($application_query);
//     $stmt->bind_param("ii", $job_id, $student_id);

//     if ($stmt->execute()) {
//         echo "<p>Application submitted successfully!</p>";
//     } else {
//         echo "<p>Error: " . $stmt->error . "</p>";
//     }
    
//     // Insert into Apply relation table (optional if separate relation is used)
//     $apply_query = "INSERT INTO Apply (student_id, job_id) VALUES (?, ?)";
//     $apply_stmt = $conn->prepare($apply_query);
//     $apply_stmt->bind_param("ii", $student_id, $job_id);
//     $apply_stmt->execute();

//     $stmt->close();
//     $apply_stmt->close();
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Jobs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .company {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .company h2 {
            margin: 0;
            color: #333;
            font-size: 1.2em;
        }
        .job {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .job p {
            margin: 0;
            color: #555;
        }
        .register-button {
            padding: 8px 16px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 0.9em;
        }
        .register-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Available Jobs</h1>

    <!-- PHP to dynamically generate job listings -->
    <?php if ($result->num_rows > 0): ?>
        <?php
        // Group jobs by company
        $current_company_id = null;
        while ($row = $result->fetch_assoc()):
            if ($current_company_id != $row['company_id']):
                if ($current_company_id != null) echo "</div>";  // Close previous company div
                $current_company_id = $row['company_id'];
        ?>
                <div class="company">
                    <h2><?php echo htmlspecialchars($row['company_name']); ?></h2>
            <?php endif; ?>
            
            <!-- Job for current company -->
            <div class="job">
                <p><strong>Job Title:</strong> <?php echo htmlspecialchars($row['job_title']); ?></p>
                <form method="post" action="jobs_register.php">
                    <input type="hidden" name="job_id" value="<?php echo $row['job_id']; ?>">
                    <input type="hidden" name="student_id" value="STUDENT_ID_HERE"> <!-- Replace with actual student ID -->
                    <button type="submit" name="apply" class="register-button">Register</button>
                </form>
            </div>

        <?php endwhile; ?>
        </div> <!-- Close last company div -->
    <?php else: ?>
        <p>No jobs available at the moment.</p>
    <?php endif; ?>

</div>

<?php $conn->close(); ?>

</body>
</html>
