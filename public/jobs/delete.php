<?php session_start(); ?>
<?php


$id = $_GET["id"];

include "../oop/databaseConnect.php";
$database = new DatabaseConnector();
$conn = $database->DOCKER_CONNECT("root","password","s20am_team10");

$sql = "DELETE FROM Role WHERE id LIKE '$id'";

$conn->query($sql); //->free();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Delete</title>
</head>
<body>
<h1> <a href="adminPage.php">Deleted</a></h1>
</body>

</html>
