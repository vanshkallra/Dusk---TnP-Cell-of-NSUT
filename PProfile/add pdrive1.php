// $connect = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
// mysql_select_db("details"); // Selecting Database from Server
// if(isset($_POST['submit']))
// { 
// $cname = $_POST['compny'];
// $date = $_POST['date'];
// $campool = $_POST['campool'];
// $poolven = $_POST['pcv'];
// $per = $_POST['sslc'];
// $puagg = $_POST['puagg'];
// $beaggregate = $_POST['beagg'];
// $back = $_POST['curback'];
// $hisofbk = $_POST['hob'];
// $breakstud = $_POST['break'];
// $otherdet = $_POST['odetails'];
// if($cname !=''||$date !='')
// {
//     if($query = mysql_query("INSERT INTO addpdrive(CompanyName, Date, campusPool, poolcampusVenue, SSLCAgg, PUDIPLOMAgg, BEAgg, CurrentBacklogs, HistoryBacklogs, BreakStudies, otherDetails)
// 		VALUES ('$cname', '$date', '$campool', '$poolven', '$per', '$puagg', '$beaggregate', '$back', '$hisofbk', '$breakstud', '$otherdet')")){
//                       echo "<center>Drive Inserted successfully</center>";
// 		}
// 		else die("FAILED");
// }
// }
?>

<?php
// Establishing Connection with the Database
$connect = mysqli_connect("localhost", "root", "", "details");

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) { 
    // Retrieving form data
    $cname = $_POST['compny'];
    $date = $_POST['date'];
    $campool = $_POST['campool'];
    $poolven = $_POST['pcv'];
    $per = $_POST['sslc'];
    $puagg = $_POST['puagg'];
    $beaggregate = $_POST['beagg'];
    $back = $_POST['curback'];
    $hisofbk = $_POST['hob'];
    $breakstud = $_POST['break'];
    $otherdet = $_POST['odetails'];

    // Check if required fields are filled
    if ($cname != '' && $date != '') {
        // Preparing the SQL query
        $query = "INSERT INTO addpdrive (CompanyName, Date, campusPool, poolcampusVenue, SSLCAgg, PUDIPLOMAgg, BEAgg, CurrentBacklogs, HistoryBacklogs, BreakStudies, otherDetails) 
                  VALUES ('$cname', '$date', '$campool', '$poolven', '$per', '$puagg', '$beaggregate', '$back', '$hisofbk', '$breakstud', '$otherdet')";

        // Executing the query
        if (mysqli_query($connect, $query)) {
            echo "<center>Drive Inserted successfully</center>";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        echo "<center>Company Name and Date are required fields</center>";
    }
}

// Closing the connection
mysqli_close($connect);
?>
