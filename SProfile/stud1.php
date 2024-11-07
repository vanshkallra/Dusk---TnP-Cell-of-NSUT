<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION["username"])) {
    header("location: index.php");
    exit("You must be logged in to view this page. <a href='index.php'>Click here</a>");
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connect = new mysqli("localhost", "root", "", "dbms_project");

// Check for connection error
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture data from form fields
    $fname = $_POST['Fname'] ?? '';
    $lname = $_POST['Lname'] ?? '';
    $USN = $_POST['USN'] ?? '';
    $sun = $_SESSION["username"];
    $phno = $_POST['Num'] ?? '';
    $email = $_POST['Email'] ?? '';
    $date = $_POST['DOB'] ?? '';
    $cursem = $_POST['Cursem'] ?? '';
    $branch = $_POST['Branch'] ?? '';
    $per = $_POST['Percentage'] ?? '';
    $puagg = $_POST['Puagg'] ?? '';
    $beaggregate = $_POST['Beagg'] ?? '';
    $back = $_POST['Backlogs'] ?? '';
    // $hisofbk = $_POST['History'] ?? '';
    // $detyear = $_POST['Dety'] ?? '';

    // Check for valid USN and email
    if (!empty($USN) && !empty($email)) {
        if ($USN === $sun) {
            if (isset($_POST['submit'])) {  // Insert data
                // $stmt = $connect->prepare("INSERT INTO basicdetails (FirstName, LastName, USN, Mobile, Email, DOB, Sem, Branch, SSLC, PU/Dip, BE, Backlogs, HofBacklogs, DetainYears, Approve) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '0')");
				$stmt = $connect->prepare("INSERT INTO Student (FirstName, LastName, USN, Mobile, Email, DOB, Sem, Branch, SSLC, `PU/Dip`, BE, Backlogs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssssssssss", $fname, $lname, $USN, $phno, $email, $date, $cursem, $branch, $per, $puagg, $beaggregate, $back);

                if ($stmt->execute()) {
                    echo "<center>Details have been received successfully!</center>";
                } else {
                    echo "<center>Failed to insert data. Error: " . $stmt->error . "</center>";
                }
                $stmt->close();

            } elseif (isset($_POST['update'])) {  // Update data
                // $stmt = $connect->prepare("UPDATE basicdetails SET FirstName=?, LastName=?, Mobile=?, Email=?, DOB=?, Sem=?, Branch=?, SSLC=?, PU/Dip=?, BE=?, Backlogs=?, HofBacklogs=?, DetainYears=?, Approve='0' WHERE USN=?");
				$stmt = $connect->prepare("UPDATE Student SET FirstName=?, LastName=?, Mobile=?, Email=?, DOB=?, Sem=?, Branch=?, SSLC=?, `PU/Dip`=?, BE=?, Backlogs=? WHERE USN=?");
                $stmt->bind_param("ssssssssssss", $fname, $lname, $phno, $email, $date, $cursem, $branch, $per, $puagg, $beaggregate, $back, $USN);

                if ($stmt->execute()) {
                    echo "<center>Data updated successfully!</center>";
                } else {
                    echo "<center>Failed to update data. Error: " . $stmt->error . "</center>";
                }
                $stmt->close();
            }
        } else {
            echo "<center>Please enter your Roll No. only.</center>";
        }
    } else {
        echo "<center>Roll No. and Email are required.</center>";
    }
}

$connect->close();
?>

<a href="student_details.php" style="display: block; text-align: center; margin: 0 auto;">Go back</a>
