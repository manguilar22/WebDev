<?php

$id = $_GET["id"];
$jobTitle = $_POST["jobTitle"];
$className = $_POST["className"];
$classCRN = $_POST["classCRN"];

include "../oop/databaseConnect.php";
$database = new DatabaseConnector();
$conn=$databaseConnector->SETUP_DATABASE();

if (isset($_POST["submit"]))
{

    $sql = "DELETE FROM Role WHERE id LIKE '$id'";
    $conn->query($sql);
    $sql = "INSERT INTO Role VALUES ('$id','$jobTitle','$classCRN',$className)";
    $conn->query($sql);
    echo "Submitted an update.";
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
<h1><?php echo $jobTitle;?></h1>
<form action="update.php" method="post">
    <input type="text" name="jobTitle" placeholder=<?php echo $jobTitle;?>/>
    <input type="text" name="className" placeholder=<?php echo $className;?>/>
    <input type="text" name="classCRN" placeholder=<?php echo $classCRN;?>/>
    <input type="submit" name="submit" placeholder="submit"/>
</form>
</body>

</html>