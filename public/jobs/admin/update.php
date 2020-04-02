
<?php


$id = $_GET["id"];
$jobTitle = $_POST["jjobTitle"];
$className = $_POST["cclassName"];
$classCRN = $_POST["cclassCRN"];

require_once "../oop/databaseConnect.php";
$database = new DatabaseConnector();
$conn = $database->DOCKER_CONNECT("root","password","s20am_team10");

if ( isset($_POST["submit"]) )
{
    $sql = "UPDATE Role SET RjobTitle='$jobTitle',RclassName='$className',RclassCRN='$classCRN' WHERE id LIKE '$id'";

    $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Delete</title>
</head>
<body>
<h1><?php echo $id?></h1>
<h1> <a href="/jobs/adminPage.php">Update</a></h1>
<form action="update.php" method="post">
    <input type="text" name="jjobTitle" placeholder="job title"/>
    <input type="text" name="cclassName" placeholder="class name"/>
    <input type="text" name="cclassCRN" placeholder="class crn"/>
    <input type="submit" name="submit" placeholder="submit"/>
</form>
</body>

</html>