<?php session_start(); ?>
<?php

include "design_template.html";

// Connect to UTEP Database
require_once("../oop/databaseConnect.php");
$database = new DatabaseConnector();
$conn = $database->connect();

$username = $_SESSION["user"];
// This will return a row with all attributes associated with the email.
$findStudentQuery = "SELECT * FROM Student WHERE Semail LIKE '$username'";


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
	<link rel="stylesheet" href="../css/student_profile_style.css">
</head>

<body>

<div class="box">
<p>Hi <?php echo $firstName . " " . $lastName ?></p>
</div>

</body>
</html>
