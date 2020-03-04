<!-- Maintain Applicant's Information-->
<?php
require_once("../oop/databaseConnect.php");
session_start();

//echo session.session_save_path();

$databaseConnector = new DatabaseConnector();
$db = $databaseConnector -> DOCKER_CONNECT("172.17.0.2","root","password","s20am_team10");

$username = $_SESSION["user"];
$mysqlQuery = "SELECT (Sclass) FROM Student WHERE Semail LIKE '$username'";
$classification = $db -> query($mysqlQuery) -> fetch_array()[0];

?>
<!DOCTYPE html>

<html>

<head>
    <title>Student</title>
</head>

<body>

    <h1> Welcome Applicant </h1>

    <h1> You are a <?php echo $classification?></h1>

</body>
</html>