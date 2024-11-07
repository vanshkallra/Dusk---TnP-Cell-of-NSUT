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
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'dbms_project';

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

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        /* Container styling */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0056b3;
            color: white;
            font-weight: bold;
            text-align: center;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Button styling */
        .status-btn {
            padding: 6px 12px;
            border-radius: 4px;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 0.9em;
        }

        .status-btn.update {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
            font-size: 1.8em;
            color: #333;
            margin-bottom: 20px;
        }

        /* Message styles */
        .message {
            margin-top: 20px;
            padding: 10px;
            background-color: #e0f7fa;
            color: #007bff;
            border-radius: 5px;
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
              <a href="#" class="active"><i class="fa fa-bar-chart fa-fw"></i>Show Applicants</a>
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
    <h2>Applicants for Company: <?php echo htmlspecialchars($company_name); ?></h2>
    
    <?php if ($applicants_stmt->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Student Name</th>
                    <th>USN</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($applicants_stmt->fetch()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($application_id); ?></td>
                        <td><?php echo htmlspecialchars($FirstName . " " . $LastName); ?></td>
                        <td><?php echo htmlspecialchars($student_usn); ?></td>
                        <td><?php echo htmlspecialchars($email); ?></td>
                        <td><?php echo htmlspecialchars($Mobile); ?></td>
                        <td><?php echo htmlspecialchars($status); ?></td>
                        <td>
                            <form method="POST" action="update_status.php" style="display:inline;">
                                <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($application_id); ?>">
                                <select name="new_status" class="form-control" required>
                                    <option value="Pending" <?php echo ($status == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option value="Accepted" <?php echo ($status == 'Accepted' ? 'selected' : ''); ?>>Accepted</option>
                                    <option value="Rejected" <?php echo ($status == 'Rejected' ? 'selected' : ''); ?>>Rejected</option>
                                </select>
                                <button type="submit" class="status-btn update mt-2">Update Status</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class='text-center'>No applicants found for this company.</p>
    <?php endif; ?>

    <?php
    $applicants_stmt->close();
    $conn->close();
    ?>
</div>

</body>
</html>
