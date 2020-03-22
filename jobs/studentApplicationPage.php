<?php session_start(); ?>
<!-- Maintain Applicant's Information-->
<?php
require_once("../oop/databaseConnect.php");

$databaseConnector = new DatabaseConnector();
$db = $databaseConnector -> DOCKER_CONNECT("127.0.0.1","root","password","s20am_team10");
//$db = $databaseConnector->UTEP_CONNECT();

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

    <!-- Job Application -->
    <form action="studentApplicationPage.php" method="post">

    </form>


</body>
</html>