<?php
require "../oop/databaseConnect.php";
require "../oop/safetyChecks.php";

$sanitizer = new Sanitizer();

$databaseConnector = new DatabaseConnector();
$db = $databaseConnector -> DOCKER_CONNECT("root","password","s20am_team10");
//$db = $databaseConnector -> UTEP_CONNECT();

$fName = $sanitizer->cleanInput($_POST["firstName"]);
$mName = isset($_POST["middleName"])?$_POST["middleName"]:"N/A";
$lName = $sanitizer->cleanInput($_POST["lastName"]);
$uEmail = $sanitizer->cleanInput($_POST["utepEmail"]);
$class = $_POST["classification"];
$status = isset($_POST["status"]) ?  $_POST["status"] : "N/A";
$majorGPA = isset($_POST["majorGPA"]) ? $sanitizer->checkGPA($_POST["majorGPA"]) : 0.0;
$overallGPA = isset($_POST["overallGPA"]) ? $sanitizer->checkGPA($_POST["overallGPA"]) : 0.0;
$password = $_POST["password"];
//$password = password_hash($_POST["password"],PASSWORD_DEFAULT);

$submitButton = $_POST["submit"];

if(isset($submitButton))
{
    // Create New Account
    $sql = "INSERT INTO Student(
                    SfirstName,
                    SmiddleName,
                    SlastName,
                    Semail,
                    Sclass,
                    SResidencyStatus,
                    SmajorGPA,
                    SoverallGPA,
                    Spassword
            ) 
            VALUES (
            '$fName',
            '$mName',
            '$lName',
            '$uEmail',
            '$class',
            '$status',
            '$majorGPA',
            '$overallGPA',
            '$password') ";

    // Count Query
    $testQuery = "SELECT COUNT(*) FROM Student WHERE Semail LIKE '$uEmail'";
    $count = $db->query($testQuery)->fetch_array()[0];

    if ($count >= 1)
    {
        echo "Account Already Exists";
    } elseif ($db -> query($sql) === TRUE)
    {
        echo "Successful Submission";
    } elseif ($db->error){
        echo "Account already exists because of the email.";
    } else {
        echo "[-] An error has occurred:\t".$db->error;
    }
}



?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../css/student.css"/>
    <title>Account</title>
</head>

<body>

    <h1>Create an Account</h1>

    <!-- Student Account -->
    <div class="studentForm">
    <form method="post" action="create_account.php">
        <label>Name</label> <br/>
        <input class="form-control" type="text" name="firstName" placeholder="First Name Goes Here"/> <br/>
        <input class="form-control" type="text" name="middleName" placeholder="Middle Name goes here. Type N/A if not applicable"/> <br/>
        <input class="form-control" type="text" name="lastName" placeholder="Last Name Goes Here"/> <br/>
        <label>UTEP Email</label> <br/>
        <input class="form-control" type="text" name="utepEmail" placeholder="Use student email, please"/> <br/>
        <label>Classification</label> <br/>
        <!-- SELECT GOES HERE -->
        <select class="form-control" name="classification">
            <option value="Undergraduate">Undergraduate</option>
            <option value="Graduate">Graduate</option>
            <option value="Doctorate">Doctorate</option>
        </select> <br/>
        <label>Residency Status</label> <br/>
        <select class="form-control" name="status">
            <option value="In-state">Instate</option>
            <option value="International">International</option>
            <option value="Out-state">Out of State</option>
        </select> <br/>
        <label>Major GPA</label> <br/>
        <input class="form-control" type="text" name="majorGPA" placeholder="Major GPA"/> <br/>
        <label>Overall GPA</label> <br/>
        <input class="form-control" type="text" name="overallGPA" placeholder="Overall GPA"/> <br/>
        <label>Password</label> <br/>
        <input class="form-control" type="password" name="password" placeholder="type a secret password"/><br/>
        <input class="btn btn-primary" name='submit' type="submit" value="Create Account"/>
    </form>
    </div>

</body>

</html>