<?php session_start(); ?>
<?php

//include "design_template.html";

// Connect to UTEP Database
require_once "../../oop/databaseConnect.php";
$database = new DatabaseConnector();
$conn = $database->connect();

$username = $_SESSION["user"];

// This will return a row with all attributes associated with the email.
$findStudentQuery = "SELECT * FROM student WHERE Semail LIKE '$username'";


$studentData = $conn -> query($findStudentQuery) -> fetch_array();

// Retrieve what you want.
$firstName  = $studentData["Sfname"];
$middleName = $studentData["Smname"];
$lastName   = $studentData["Slname"];
$classification = $studentData["Sclassification"];
$residency  = $studentData["Sresidency-status"];
$overallGPA = $studentData["Sover_all_gpa"];
$majorGPA   = $studentData["Smajor_gpa"];
$email      = $studentData["Semail"];
$gender     = $studentData["sgender"];



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- LINK STYLESHEET -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/design_style.css"/>
    <link rel="stylesheet" href="../../css/student_profile_style.css"/>
    <title>Profile</title>
</head>

<body>

<div class="box">
<p>Hi <?php echo $firstName . " " . $lastName ?></p>
</div>

<!-- UTEP LOGO ON LEFT SIDE OF HEADER-->
<div class="navigation-bar">
    <img src="../../css/img/utep_logo.png">
</div>
<!-- TITLE IN HEADER -->
<div class="header">
    <h1>STUDENT PROFILE</h1>
</div>

<!-- NAGIVATION BAR -->
<div class="navigation">
    <ul>
        <li><a href="../../student/login.php">LOG OUT<?php session_destroy();?></a></li>
        <li><a href="../../index.php">BACK</a></li>
    </ul>
</div>

<div class="left">
    <h3>RESOURCES</h3><hr></hr>
    <div class="leftBox">
        <div class = "sidenav">
            <div class="links">
                <a href="../application.php">Fill Application</a></br>
            </div>
            <div class="links">
                <a href="./create_account.php">View Status</a>
            </div>
            <div class="links">
                <a href="./create_account.php">Edit Profile</a>
            </div>
        </div>
    </div>
</div>

<div class="div1">

</div>



</body>
</html>
