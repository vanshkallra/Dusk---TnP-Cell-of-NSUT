<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .form-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<?php
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

// Query to fetch companies
$company_query = "SELECT company_id, company_name FROM Company";
$company_result = $conn->query($company_query);

$conn->close();
?>

<div class="form-container">
    <h2>Add Job Details</h2>
    <form action="add_job_handler.php" method="POST">
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value="">Select a company</option>
                <?php
                // Populate dropdown with companies
                if ($company_result->num_rows > 0) {
                    while ($row = $company_result->fetch_assoc()) {
                        echo "<option value='" . $row['company_id'] . "'>" . $row['company_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="job_title">Job Title:</label>
            <input type="text" name="job_title" id="job_title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="job_description">Job Description:</label>
            <textarea name="job_description" id="job_description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="requirements">Requirements:</label>
            <textarea name="requirements" id="requirements" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Job</button>
    </form>
</div>

</body>
</html>
