<?php session_start(); ?>
<?php

require_once "../../oop/databaseConnect.php";
$database = new DatabaseConnector();
$conn = $database->DOCKER_CONNECT("root","password","s20am_team10");

$id = $_GET["id"];
if (isset($id) )
{



    $query = "SELECT * FROM Role WHERE id LIKE '$id'";

    $result = $conn->query($query)->fetch_assoc();

    if (count($result) != 0)
    {
        $jobTitleTMP = $result["RjobTitle"];
        $classNameTMP = $result["RclassName"];
        $classCRNTMP = $result["RclassCRN"];

    }


}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Update</title>
</head>
<body>

<form action="update.php" method="post">

    <label>Job Title</label>
    <input type="text" name="jobTitle" value=<?php echo $jobTitleTMP;?>/>
    <label>Class Name</label>
    <input type="text" name="jobClass" value=<?php echo $classNameTMP;?>/>
    <label>Class CRN</label>
    <input type="text" name="jobCRN" value=<?php echo $classCRNTMP;?>/>
    <input type="submit" name="submit" placeholder="submit"/>
</form>

<?php
if (isset($_POST["submit"]))
{
    $jobTitle = $_POST['jobTitle'];
    $className = $_POST['jobClass'];
    $classCRN = $_POST["jobCRN"];
    $editQuery = "UPDATE Role SET RjobTitle='$jobTitle',RclassName='$className',RclassCRN='$classCRN' WHERE id LIKE '$id'";
    $conn->query($editQuery) or die("Error Updating");
    //echo "Submitted:".$jobTitle.$classCRN.$className;
    header("location: adminPage.php");
}

?>



</body>
</html>

