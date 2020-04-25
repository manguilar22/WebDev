<?php session_start(); ?> // Has to be decalred in every page to retain session credentials. Best practice is to add this to top of the page on line 1.

$username = $_SESSION["user"];
// This will return a row with all attributes associated with the email.
$findStudentQuery = "SELECT * FROM Student WHERE Semail LIKE '$username'";

// Connect to UTEP Database
require_once("../../oop/databaseConnect.php");
$databaseConnector = new Database();
$conn = $databaseConnector() -> UTEP_CONNECT();

$studentData = $conn -> query($findStudentQuery) -> fetch_array();

// Retrieve what you want.
$firstName  = $studentData["Sfname"];
$middleName = $studentData["Smname"];
$lastName   = $studentData["Slname"];
$classification = $studentData["Sclassification"];
$residency  = $studentData["Sresidency-status"];
$overallGPA = $studentData["SoverallGPA"];
$majorGPA   = $studentData["SmajorGPA"];
$email      = $studentData["Semail"];
$gender     = $studentData["sgender"]
