<?php
session_start();
if($_SESSION["username"]){

}
 else {
    //  header("location: index.php");
  header("location: tnp-dusk/SProfile/index.php");
}

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
// $query = "SELECT Company.company_id, Company.company_name, Job.job_id, Job.job_title, Job.job_description 
//           FROM Company 
//           JOIN Job ON Company.company_id = Job.company_id";
// $result = $conn->query($query);

$query = "SELECT Company.company_name, Company.location, Job.job_title, Job.job_description, Job.requirements, Job.salary, Job.job_id 
          FROM Company 
          INNER JOIN Job ON Company.company_id = Job.company_id";
$result = $conn->query($query);

// // Get the 'usn' from the session
// $usn = $_SESSION['USN'];
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
        }
        .card-title{
          margin-botom: 15px;
          
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
              <a href="#" class="active"><i class="fa fa-bar-chart fa-fw"></i>Apply for Jobs</a>
            </li>
            <li>
              <a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>List Jobs</a>
            </li>
            <li>
              <a href="company_details.php"><i class="fa fa-sliders fa-fw"></i>Add Company Details</a>
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

        <div class="container">
        <h1 class="text-center">Available Companies and Jobs</h1>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="job-card">';
                    echo '<h4 class="card-title"><strong>Location:</strong>' . htmlspecialchars($row['company_name']) . '</h4>';
                    echo '<p class="card-text"><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>';
                    echo '<p class="card-text"><strong>Job Title:</strong> ' . htmlspecialchars($row['job_title']) . '</p>';
                    echo '<p class="card-text"><strong>Description:</strong> ' . htmlspecialchars($row['job_description']) . '</p>';
                    echo '<p class="card-text"><strong>Requirements:</strong> ' . htmlspecialchars($row['requirements']) . '</p>';
                    echo '<p class="card-text"><strong>Salary:</strong> $' . htmlspecialchars($row['salary']) . '</p>';
                    echo '<form method="POST" action="jobs_register.php">';
                    echo '<input type="hidden" name="job_id" value="' . $row['job_id'] . '">';
                    echo '<button type="submit" class="btn btn-primary">Register</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p class="text-center">No jobs available at the moment.</p>';
            }
            ?>
        </div>
    </div>

      </div>
    </div>
    <!-- JS -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <!-- jQuery Migrate Plugin -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <!-- Templatemo Script -->
  </body>

</html>

