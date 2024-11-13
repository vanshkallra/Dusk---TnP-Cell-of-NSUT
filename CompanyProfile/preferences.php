<?php
  session_start();
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  
  if($_SESSION["username"]){

  }
   else {
	   header("location: index.php");
   die("You must be Log in to view this page <a href='index.php'>Click here</a>");}

?>

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

// // Query to fetch companies
// $company_query = "SELECT company_id, company_name FROM Company";
// $company_result = $conn->query($company_query);

$usn = $_SESSION['username'];

// Query to fetch the company name using the USN
$query = "SELECT company_name FROM Company WHERE usn = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $usn);
$stmt->execute();
$stmt->bind_result($company_name);
$stmt->fetch();
$stmt->close();

// echo "USN from session: $usn <br>";
// echo "Company Name from query: " . htmlspecialchars($company_name ?? "N/A") . "<br>";


$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!--favicon-->
        <link rel="shortcut icon" href="favicon.ico" type="image/icon">
        <link rel="icon" href="favicon.ico" type="image/icon">

    <link rel="shortcut icon" href="favicon.ico" type="image/icon">
    <link rel="icon" href="favicon.ico" type="image/icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Jobs</title>
    <meta name="description" content="">
    <meta name="author" content="templatemo">

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
      .form-container{
        padding: 60px;
      }
      /* .form-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        .form-group{
          font-size: 18px;
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
          <img src="images/company_logo.png" alt="Profile Photo" class="img-responsive">
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
            <li>
              <a href="show_apps_extra.php"><i class="fa fa-bar-chart fa-fw"></i>Show Applicants</a>
            </li>
            <li>
              <a href="#" class="active"><i class="fa fa-sliders fa-fw"></i>List Jobs</a>
            </li>
            <li>
              <a href="company_details.php" ><i class="fa fa-sliders fa-fw"></i>Add Company details</a>
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
                  <a href="../../Homepage/index.html" >Home</a>
                </li>
                <li>
                  <a href="">Drives Homepage</a>
                </li>
                <li>
                  <a href="">Overview</a>
                </li>
                <li>
                  <a href="login.php">Change Password</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
    <div class="form-container">
      <!-- Company Name Heading -->
    <h2 class="">Add Job</h2>
    <hr>
    
    <form action="list_jobs1.php" method="POST">
        <!-- Display Company Name at the top of the form -->
        <div class="form-group">
            <!-- <label><strong>Company Name:</strong> <?php echo htmlspecialchars($company_name); ?></label> -->
            <label><strong>Company Name: </strong> </label> <label style="font-weight: 500"><?php echo htmlspecialchars($company_name ?? "N/A"); ?></label>

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
          <!-- <h2>Add Job Details</h2>
          <br>
          <form action="list_jobs1.php" method="POST">
              <div class="form-group">
                  <label for="company_id">Company:</label>
                  <select name="company_id" id="company_id" class="form-control" required>
                      <option value="">Select a company</option>
                      <?php
                      // Populate dropdown with companies
                      // if ($company_result->num_rows > 0) {
                      //     while ($row = $company_result->fetch_assoc()) {
                      //         echo "<option value='" . $row['company_id'] . "'>" . $row['company_name'] . "</option>";
                      //     }
                      // }
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
              <div class="form-group">
                  <label for="location">Location:</label>
                  <input type="text" name="location" id="location" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Job</button>
          </form> -->
      </div>
        <!-- <div class="templatemo-content-container">
          <div class="templatemo-content-widget white-bg">
            <h2 class="margin-bottom-10">Company Details</h2>
            <p>Update Your Details</p>
            <form action="comp1.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="inputFirstName">Company Name</label>
                  <input type="text" name="Fname" class="form-control" id="inputFirstName" placeholder="ABC">
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label for="inputLastName">Last Name</label>
                  <input type="text"  name="Lname" class="form-control" id="inputLastName" placeholder="Kalra">
                </div> -->

				<!-- <div class="col-lg-6 col-md-6 form-group">
                  <label for="usn">Username *</label>
                  <input type="text" name="USN" class="form-control" id="usn" placeholder="technosol" >
                </div>

			 <div class="col-lg-6 col-md-6 form-group">
                  <label for="Phone">Phone:</label>
                  <input type="text" name="Num" class="form-control" id="Phone" placeholder="91xxxxxxxx">
                </div> -->

                <!-- <div class="col-lg-6 col-md-6 form-group">
                  <label for="DOB">Date of Birth</label>
                  <input type="date" name="DOB" class="form-control" id="DOB" placeholder="DD/MM/YYYY">
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Current Semester</label>
                  <select name="Cursem" class="form-control">
                    <option value="select">Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
				  </div>


				  <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Branch of Study</label>
                  <select name="Branch" class="form-control">
                    <option value="select">Branch</option>
                    <option value="BScience">MAC</option>
                    <option value="IT">IT</option>
                    <option value="CSE">CSE</option>
                    <option value="EEE">EE</option>
                    <option value="ECE">ECE</option>
                    <option value="ME">ME</option>
                    <option value="CVE">BT</option>
                  </select>
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="sslc">10th Aggregate</label>
                  <input type="text" name="Percentage" class="form-control" id="sslc" placeholder="">
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="Pu">12th Aggregate</label>
                  <input type="text" name="Puagg" class="form-control" id="Pu" placeholder="">
                </div>
				<div class="col-lg-6 col-md-6 form-group">
                  <label for="BE">CGPA</label>
                  <input type="text" name="Beagg" class="form-control" id="BE" placeholder="">
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Current Backlogs</label>
                  <select name="Backlogs" class="form-control">
                    <option value="select">Numbers</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div> -->
				<!-- <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">History of Backlogs</label>
                  <select name="History" class="form-control">
                    <option value="Y/N">Y/N</option>
                    <option value="Y">Y</option>
                    <option value="N">N</option>
                  </select>
                </div>
                <div class="col-lg-6 col-md-6 form-group">
                  <label class="control-label templatemo-block">Detained Years</label>
                  <select name="Dety" class="form-control">
                    <option value="select">Years</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </div> -->

               
          <footer class="text-right">
           		<p>Copyright &copy; 2024 Dusk
			  </p>
          </footer>
        </div>
      </div>
    </div>
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>
    <!-- http://markusslima.github.io/bootstrap-filestyle/ -->
    <script type="text/javascript" src="js/templatemo-script.js"></script>
    <!-- Templatemo Script -->
  </body>

</html>


<!-- <!DOCTYPE html>
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
// // Database configuration
// $host = 'localhost';    // Database host
// $user = 'root';         // Database username
// $pass = '';             // Database password
// $dbname = 'dbms_project'; // Database name

// // Connect to the database
// $conn = new mysqli($host, $user, $pass, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Query to fetch companies
// $company_query = "SELECT company_id, company_name FROM Company";
// $company_result = $conn->query($company_query);

// $conn->close();
?>

<div class="form-container">
    <h2>Add Job Details</h2>
    <form action="list_jobs1.php" method="POST">
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" id="company_id" class="form-control" required>
                <option value="">Select a company</option>
                <?php
                // // Populate dropdown with companies
                // if ($company_result->num_rows > 0) {
                //     while ($row = $company_result->fetch_assoc()) {
                //         echo "<option value='" . $row['company_id'] . "'>" . $row['company_name'] . "</option>";
                //     }
                // }
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
</html> -->
