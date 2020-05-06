<?php session_start(); ?>
<?php

// Connect to Database
require_once("../../oop/databaseConnect.php");
$database = new DatabaseConnector();
$conn = $database -> connect();

$username = $_SESSION["user"];
// This will return a row with all attributes associated with the email.
$findStudentQuery = "SELECT * FROM student WHERE Semail LIKE '$username'";


$studentData = $conn -> query($findStudentQuery) -> fetch_array();

// Retrieve what you want.
$firstName  = $studentData["Sfname"];
$middleName = $studentData["Smname"];
$lastName   = $studentData["Slname"];
$classification = $studentData["Sclassification"];
$residency  = $studentData["Sresidency_status"];
$overallGPA = $studentData["Sover_all_gpa"];
$majorGPA   = $studentData["Smajor_gpa"];
$email      = $studentData["Semail"];
$gender     = $studentData["Sgender"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- LINK STYLESHEET -->
</head>

<body>


<!-- (BASIC) INFORMATION OF STUDENT GOES HERE -->

<div class="studentInfo">
    <table>
        <tr>
            <th>Student Full Name</th>
            <td> <?php echo $firstName . " " . $middleName . " " . $lastName ?> </td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $gender ?></td>
        </tr>
        <tr>
            <th>E-Mail Address</th>
            <td><?php echo $email ?></td>
        </tr>
        <tr>
            <th>Classification</th>
            <td><?php echo $classification ?></td>
        </tr>
        <tr>
            <th>Residency Status</th>
            <td><?php echo $residency ?></td>
        </tr>
        <tr>
            <th>Overall GPA</th>
            <td><?php echo $overallGPA ?></td>
        </tr>
        <tr>
            <th>Major GPA</th>
            <td><?php echo $majorGPA ?></td>
        </tr>
    </table>
</div>




</body>
</html>