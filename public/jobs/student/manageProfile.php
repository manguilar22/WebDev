<?php session_start(); ?>
<?php

include "../../css/design_template.html";

require_once "../../oop/databaseConnect.php";

$database = new DatabaseConnector();
$conn = $database -> connect();

$username = $_SESSION["user"];
// This will return a row with all attributes associated with the email.
$findStudentQuery = "SELECT * FROM Student WHERE Semail LIKE '$username'";


$studentData = $conn -> query($findStudentQuery) -> fetch_array();

// enhanced if-else  ( return true ? true : false )
$newLName = isset($_POST["lastName"])?$_POST["lastName"]:$studentData["Slname"];
$newFName = isset($_POST["firstName"])?$_POST["firstName"]:$studentData["Sfname"];
$newMName = isset($_POST["middleName"])?$_POST["middleName"]:$studentData["Smname"];
$newClass = isset($_POST["classification"])?$_POST["classification"]:$studentData["Sclassification"];
$newStatus = isset($_POST["status"])?$_POST["status"]:$studentData["Sresidency_status"];
$newMajorGPA = isset($_POST["majorGPA"])?$_POST["majorGPA"]:$studentData["Smajor_gpa"];
$newOverallGPA = isset($_POST["overallGPA"])?$_POST["overallGPA"]:$studentData["Sover_all_gpa"];

// with the code above.

$updateQuery = "UPDATE Student SET Sfname = '$newFName',
                                   Slname = '$newLName',
                                   Smname = '$newMName',
                                   Sclassification   = '$newClass',
                                   Sresidency_status = '$newStatus',
                                   Smajor_gpa    = '$newMajorGPA',
                                   Sover_all_gpa = '$newOverallGPA'
                                   WHERE Sid='$id'";


if ( isset($_POST["submit"]) )
{
    $conn->query($updateQuery);
    echo "info updated";
}


?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../css/student_profile_style.css"/>
</head>

<body>


<!-- Student Application FORM INSIDE OF BOX-->
<div class="box">
    <div class="studentForm">
        <form method="post" action="">
            <!-- NAME INFO -->
            <!-- IN LINE INFORMATION FOR NAME -->
            <div class="horizontalBox">
                <input class="form-control" type="text" name="firstName" placeholder="<?php echo $studentData["Sfname"] ?>"/>
            </div>
            <div class="horizontalBox">
                <input class="form-control" type="text" name="middleName" placeholder="<?php echo $studentData["Smname"] ?>"/>
            </div>
            <div class="horizontalBox">
                <input class="form-control" type="text" name="lastName" placeholder="<?php echo $studentData["Slname"] ?>"/>
            </div>

            <!-- CLASSIFICATION -->

            <!-- SELECT GOES HERE -->
            <select class="form-control" name="classification">
                <option selected disabled>Classification</option>
                <option value="undergraduate">Undergraduate</option>
                <option value="graduate">Graduate</option>
                <option value="doctorate">Doctorate</option>
            </select> <br/>

            <!-- RESIDENCY -->

            <select class="form-control" name="status">
                <option selected disabled>Residency</option>
                <option value="in-state">Instate</option>
                <option value="international">International</option>
                <option value="out-state">Out of State</option>
            </select> <br/>

            <!-- GENDER -->

            <select class="form-control" name="gender">
                <option selected disabled>Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select> <br/>

            <!-- MAPE GPA SIDE BY SIDE TO EACH OTHER -->
            <div class="horizontalBox">
                <!-- MAJOR GPA TEXT-->
                <input class="form-control" type="text" name="majorGPA" placeholder="<?php echo $studentData["Smajor_gpa"] ?>"/>
            </div>
            <div class="horizontalBox">
                <!-- OVERALL GPA TEXT -->
                <input class="form-control" type="text" name="overallGPA" placeholder="<?php echo $studentData["Sover_all_gpa"] ?> "/> <br/>
            </div>

            <input class="btn btn-primary" name='submit' type="submit" value="Update Profile"/>

        </form>
        </br></br></br>
    </div>
</div> </br></br>
</body>

</html>
