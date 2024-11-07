
<?php
session_start();

// Check if the student is logged in
// if (!isset($_SESSION['USN'])) {
//     die("You must be logged in to view your applied jobs.");
// }

// Fetch USN from session
$usn = $_SESSION['username'];


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

// Query to fetch student_id from the Student table based on USN
$student_query = "SELECT student_id FROM Student WHERE usn = ?";
$stmt = $conn->prepare($student_query);
$stmt->bind_param('s', $usn);
$stmt->execute();
$stmt->store_result();

// Check if the student exists
if ($stmt->num_rows > 0) {
    // Get the student_id
    $stmt->bind_result($student_id);
    $stmt->fetch();

    // Now fetch all jobs the student has applied to, including company details
    $query = "
        SELECT c.company_name, j.job_title, j.job_description, j.requirements, j.salary, j.location
        FROM Application a
        JOIN Job j ON a.job_id = j.job_id
        JOIN Company c ON j.company_id = c.company_id
        WHERE a.student_id = ?
    ";

    $stmt->close();
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    
    
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Available Jobs</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .main-jobs{
            padding-left: 60px;
            padding-right: 60px;
            padding-top: 30px;
        }
        h1 {
            padding: 10px;
            text-align: center;
            color: #333;
            padding-bottom: 30px;
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
            font-size: 1.5em;
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
            font-size: 1.2em;
        }
        .register-button {
            padding: 8px 16px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 1.2em;
        }
        .register-button:hover {
            background-color: #218838;
        }
        .job-card {
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 20px;
            margin: 15px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
        }
        /* Hover effect */
        .job-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        /* Center the title */
        h2,h1 {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }
        .card-title{
          margin-botom: 15px;
          
        }
        h3{
          margin-bottom: 20px;
          font-weight: bold;
        }
      
    </style>
  </head>

  <body>
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <div class="square"></div>
		  <?php
		  $Welcome = "Welcome";
          echo "<h1>" . $Welcome . "<br>". $_SESSION['username']. "</h1>";
		  ?>
        </header>
        <div class="profile-photo-container">
          <img src="images/Online-sProfile.jpg" alt="Profile Photo" class="img-responsive">
          <div class="profile-photo-overlay"></div>
        </div>
        <!-- <div class="profile-photo-container">
          <img src="images/Online-sProfile.jpg" alt="Profile Photo" class="img-responsive">
          <div class="profile-photo-overlay"></div>
        </div> -->
        <!-- Search box -->
        <form class="templatemo-search-form" role="search">
          <div class="input-group">
            <button type="submit" class="fa fa-search"></button>
            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
          </div>
        </form>
        <div class="mobile-menu-icon">
          <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">
          <ul>
            <li>
              <a href="login.php"><i class="fa fa-home fa-fw"></i>Dashboard</a>
            </li>
            <!-- <li>
              <a href="#"><i class="fa fa-bar-chart fa-fw"></i>Placement Drives</a>
            </li> -->
            <li>
              <a href="jobs2.php" ><i class="fa fa-bar-chart fa-fw"></i>Apply for Jobs</a>
            </li>
            <li>
              <a href="#.php" class="active"><i class="fa fa-sliders fa-fw"></i>Applied Jobs</a>
            </li>
            <li>
              <a href="student_details.php"><i class="fa fa-sliders fa-fw"></i>Register for Placement</a>
            </li>
            <li>
              <a href="logout.php"><i class="fa fa-eject fa-fw"></i>Sign Out</a>
            </li>
          </ul>
        </nav>
      </div>
      <!-- Main content -->
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li>
                  <a href="../../tnp-dusk/Homepage/index.php">Home NSUT</a>
                </li>
                <li>
                  <a href="../../tnp-dusk/Drives/index.php">Drives Homepage</a>
                </li>
                <li>
                  <a href="Notif.php">Notifications</a>
                </li>
                <li>
                  <a href="Change Password.php">Change Password</a>
                  </li>
              </ul>
            </nav>
          </div>
        </div>
        <?php
            // Check if the student has applied to any jobs
            if ($result->num_rows > 0) {
                echo "<h1>Applied Jobs</h1>";
                echo "<div class='container'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='job-box'>";
                    echo "<h3>" . $row['company_name'] . "</h3>";
                    echo "<p><strong>Job Title:</strong> " . $row['job_title'] . "</p>";
                    echo "<p><strong>Job Description:</strong> " . $row['job_description'] . "</p>";
                    echo "<p><strong>Requirements:</strong> " . $row['requirements'] . "</p>";
                    echo "<p><strong>Salary:</strong> " . $row['salary'] . "</p>";
                    echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>You have not applied to any jobs yet.</p>";
            }
        
            $stmt->close();
        } else {
            echo "No student found with that USN.";
        }
        
        $conn->close();
        ?>

<style>
    .container {
        width: 80%;
        margin: auto;
    }

    .job-box {
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .job-box h3 {
        text-align: center;
    }

    .job-box p {
        font-size: 14px;
    }

    .job-box strong {
        font-weight: bold;
    }
</style>
