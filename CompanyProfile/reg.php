<?php
//    $connect = mysql_connect("localhost", "root", "", "placement") ; // Establishing Connection with Server
//   //  $connect = mysql_connect("localhost", "root", "", "placement") or die("Couldn't Connect"); // Establishing Connection with Server
//    mysql_select_db("placement") or die("Cant Connect to database"); // Selecting Database from Server
   
   
// if(isset($_POST['submit']))
// { 
  
//  $Name = $_POST['Fullname'];
//  $USN = $_POST['USN'];
//  $password = $_POST['PASSWORD'];
//  $repassword = $_POST['repassword'];
//  $Email = $_POST['Email'];
//  $Question = $_POST['Question'];
//  $Answer = $_POST['Answer'];
  

//  $check = mysql_query("SELECT * FROM slogin WHERE USN='".$USN."'") or die("Check Query");
//  if(mysql_num_rows($check) == 0) 
//  {
//   if($repassword == $password)
//   {
    
    
//     if($query = mysql_query("INSERT INTO slogin(Name, USN ,PASSWORD,Email,Question,Answer) VALUES ('$Name', '$USN', '$password','$Email','$Question','$Answer')"))
//     {
//                        echo "<center> You have registered successfully...!! Go back to  </center>";
// 					             echo "<center><a href='index.php'>Login here</a> </center>";
					   
//     }
//   }
//    else
//     {
//        echo "<center>Your password do not match</center>";
//     }
//    }
//    else
//    {
//        echo "<center>This USN already exists</center>"; 
//   }
// }

// Establishing Connection with Server using mysqli
$connect = new mysqli("localhost", "root", "", "placement");

// Check for connection errors
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_POST['submit'])) { 
    // Retrieve form data
    $Name = $_POST['Fullname'];
    $USN = $_POST['USN'];
    $password = $_POST['PASSWORD'];
    $repassword = $_POST['repassword'];
    $Email = $_POST['Email'];
    $Question = $_POST['Question'];
    $Answer = $_POST['Answer'];

    // Check if USN already exists
    $stmt = $connect->prepare("SELECT * FROM clogin WHERE USN = ?");
    $stmt->bind_param("s", $USN);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) { // USN doesn't exist
        if ($password === $repassword) { // Passwords match
            // Hash the password
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $stmt = $connect->prepare("INSERT INTO clogin (Name, USN, PASSWORD, Email, Question, Answer) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $Name, $USN, $password, $Email, $Question, $Answer);

            if ($stmt->execute()) {
                echo "<center>You have registered successfully! Go back to</center>";
                echo "<center><a href='index.php'>Login here</a></center>";
            } else {
                echo "<center>Error: " . $stmt->error . "</center>";
            }

            $stmt->close();
        } else {
            echo "<center>Your passwords do not match</center>";
        }
    } else {
        echo "<center>This USN already exists</center>";
    }
}

$connect->close();

?>