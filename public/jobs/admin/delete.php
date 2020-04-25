<?php session_start(); ?>
<?php


$id = $_GET["id"];

require_once "../../oop/databaseConnect.php";
$database = new DatabaseConnector();
$conn = $database->connect();

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
