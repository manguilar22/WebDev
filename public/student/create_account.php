<?php
require_once "../oop/databaseConnect.php";
require_once "../oop/safetyChecks.php";

$sanitizer = new Sanitizer();

$databaseConnector = new DatabaseConnector();
$conn=$databaseConnector->connect();

$fName = $sanitizer->cleanInput($_POST["firstName"]);
$mName = isset($_POST["middleName"])?$_POST["middleName"]:"N/A";
$lName = $sanitizer->cleanInput($_POST["lastName"]);
$uEmail = $sanitizer->cleanInput($_POST["utepEmail"]);
$class = $_POST["classification"];
$status = isset($_POST["status"]) ?  $_POST["status"] : "N/A";
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "N";
$majorGPA = isset($_POST["majorGPA"]) ? $sanitizer->checkGPA($_POST["majorGPA"]) : 0.0;
$overallGPA = isset($_POST["overallGPA"]) ? $sanitizer->checkGPA($_POST["overallGPA"]) : 0.0;
$password = $_POST["password"];
//$password = password_hash($_POST["password"],PASSWORD_DEFAULT);

$submitButton = $_POST["submit"];

if(isset($submitButton))
{
    // Create New Account
    $pSql= "CALL new_student(
            '$fName',
            '$mName',
            '$lName',
            '$uEmail',
            '$class',
            '$status',
            '$gender',
            '$majorGPA',
            '$overallGPA',
            '$password'
            )";

    // Count Query
    $testQuery = "SELECT COUNT(*) FROM student WHERE Semail LIKE '$uEmail'";
    $count = $conn->query($testQuery)->fetch_array()[0];

    if ($count >= 1)
    {

        echo "Account Already Exists";

    } elseif ($conn -> query($pSql) === TRUE)
    {
        echo "Successful Submission";

    } else {

        echo "[-] An error has occurred:\t".$conn->error;

    }
}
?>
<!DOCTYPE html>
<html>

<head>
	<!--
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/> -->
    <link rel="stylesheet" href="../css/create_account_style.css"/>
    <title>Create Account</title>
</head>

<body>

<!-- UTEP LOGO ON LEFT SIDE OF HEADER-->
<div class="navigation-bar">
		<img src="../css/img/utep_logo.png">
</div>

<!-- TITLE IN HEADER -->
<div class="header">
    <h1>CREATE AN ACCOUNT</h1>
</div>

<!-- NAGIVATION BAR -->
<div class="navigation">
	<ul>
		<li><a href="lo">LOG IN</a></li>
		<li><a href="../index.php">BACK</a></li>
	</ul>
</div>


    <!-- Student Account FORM INSIDE OF BOX-->
	<div class="box">
    <div class="studentForm">
    <form method="post" action="create_account.php">
        <!-- NAME INFO -->
		<!-- IN LINE INFORMATION FOR NAME -->
		<div class="horizontalBox">
			<input class="form-control" type="text" name="firstName" placeholder="First Name"/>
		</div>
		<div class="horizontalBox">
			<input class="form-control" type="text" name="middleName" placeholder="Middle Name"/>
		</div>
		<div class="horizontalBox">
			<input class="form-control" type="text" name="lastName" placeholder="Last Name"/>
		</div>

        <!-- UTEP EMAIL -->
        <input class="form-control" type="text" name="utepEmail" placeholder="UTEP e-mail"/> </br>

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
			<input class="form-control" type="text" name="majorGPA" placeholder="Major GPA"/>
		</div>
		<div class="horizontalBox">
			<!-- OVERALL GPA TEXT -->
			<input class="form-control" type="text" name="overallGPA" placeholder="Overall GPA"/> <br/>
        </div>

		<!-- USER CREATES PASSWORD -->
        <input class="form-control" type="password" name="password" placeholder="Create a Password"/><br/>
        <input class="btn btn-primary" name='submit' type="submit" value="Create Account"/>

    </form>
	</br></br></br>
    </div>
	</div> </br></br>
</body>

</html>
