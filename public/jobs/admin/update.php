<?php session_start(); ?>
<?php

require_once "../../oop/databaseConnect.php";
$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector->connect();

$id = $_GET["id"];

$getJobRole = "SELECT  * FROM role WHERE id LIKE '$id'";

$results = $conn->query($getJobRole)->fetch_array();

$submit = $_POST["submit"];



$jobTitle = isset($_POST["jobTitle"]) ? $_POST["jobTitle"] : $results["RjobTitle"];
$className = isset($_POST["className"]) ? $_POST["className"] : $results["RclassName"];
$classCRN = isset($_POST["classCRN"]) ? $_POST["classCRN"] : $results["RclassCRN"];
$jobID = isset($_GET["id"]) ? $_GET["id"] : $results["id"];

$updateQuery = "UPDATE role SET  RjobTitle = '$jobTitle', RclassName = '$className' , RclassCRN = '$classCRN' WHERE id LIKE '$jobID'";

if(isset($submit)) {
    $conn->query($updateQuery);
    $message = "Record Modified Successfully";
}
$result = $conn->query("SELECT * FROM role WHERE id LIKE '$id'");
$row= mysqli_fetch_array($result);

if (isset($submit)) {
    $conn->query($updateQuery);
    header("location: adminPage.php");
}


?>
<html>
<head></head>

<body>

<h1> Control Panel </h1>

<form action="" method="post">
    <select name="jobTitle">
        <option value="IA">Instructional Assistant (IA)</option>
        <option value="PL">Peer Leader (PL)</option>
        <option value="TA">Teacher Assistant (TA)</option>
    </select>
    <input type="text" name="className" value=<?php echo $results["RclassName"];?>/>
    <input type="text" name="classCRN" value=<?php echo $results["RclassCRN"];?>/>
    <input type="submit" name="submit" placeholder="submit"/>
</form>

<h2> Updating Record <?php echo $jobID?> </h2>

<table>
    <th>Job Title</th>
    <th>Class Name</th>
    <th>Class CRN</th>
    <tr/>
    <td><?php echo $jobTitle; ?></td>
    <td><?php echo $className; ?></td>
    <td><?php echo $classCRN; ?></td>
</table>


</body>
</html>

