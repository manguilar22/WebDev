<?php session_start(); ?>
<?php
    require "../oop/databaseConnect.php";
    $database = new DatabaseConnector();
    $conn = $database -> DOCKER_CONNECT("root","password","s20am_team10");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>

<body>

<h1> Welcome Admin </h1>


<p><a href="../reports/index.php">Generate Reports</a></p>


<!-- Create a Job Role as a Admin -->
<h4>Create Role</h4>

<form action="adminPage.php" method="post">

    <label for="Student Title"></label>
    <select name="jobTitle">
        <option value="IA">Instructional Assistant (IA)</option>
        <option value="TA">Teacher Assistant (TA)</option>
        <option value="PL">Peer Leader</option>
    </select>
    <label for="UTEP Class Name"></label>
    <input type="text" name="className" placeholder="UTEP Class Name"/>
    <label for="Class CRN"></label>
    <input type="text" name="classCRN" placeholder="UTEP Class CRN"/>
    <input type="submit" name="submit" placeholder="Submit Job"/>

</form>
<?php


$jobTitle = $_POST["jobTitle"];
$className = $_POST["className"];
$classCRN = $_POST["classCRN"];

if ( isset($_POST["submit"]) )
{
    $sql = "INSERT INTO Role(RjobTitle,RclassName,RclassCRN) VALUES (
            '$jobTitle',
            '$className',
            '$classCRN'
            )";
    if ($conn->query($sql)) { echo "submit"; }
    elseif ($conn->error) { echo "CRN Already Used"; }
    else { echo "[-] Should not be here"; }
}
?>


<!-- All Jobs in Database Table -->


</body>
</html>