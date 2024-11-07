<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Available Jobs</title>
    <!-- <title>Student Profile Home</title> -->
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
              <a href="login.php" class="fa fa-home fa-fw"><i class="fa fa-home fa-fw"></i>Dashboard</a>
            </li>
            <!-- <li>
              <a href="#"><i class="fa fa-bar-chart fa-fw"></i>Placement Drives</a>
            </li> -->
            <li>
              <a href="#"><i class="active"></i>Placement Drives</a>
            </li>
            <li>
              <a href="preferences.php"><i class="fa fa-sliders fa-fw"></i>Preferences</a>
            </li>
            <li>
              <a href="student_details.php"><i class="fa fa-sliders fa-fw"></i>Add details</a>
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