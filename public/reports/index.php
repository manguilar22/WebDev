<?php session_start();?>
<!DOCTYPE html>
<html>


<head>
    <title>Reports</title>
</head>


<body>

<h1>Some Report</h1>

<?php
    require_once "../oop/databaseConnect.php";
    $db = new DatabaseConnector();
    $conn = $db->connect();

$summaryOne = "SELECT AVG(Smajor_gpa) AS 'majorGPA',AVG(Sover_all_gpa) AS 'overallGPA' FROM student";

$fetchOne = $conn->query($summaryOne)->fetch_array();

$summaryTwo = "SELECT COUNT(*) AS 'total' FROM student";
$fetchTwo = $conn->query($summaryTwo)->fetch_array();

echo "<p>Registered students: ".$fetchTwo["total"]."</p>";
echo "<h4> Averages </h4>";
echo "<p>Major GPA of Candidates: ".$fetchOne["majorGPA"]."</p>";
echo "<p>Overall GPA of Candidates: ".$fetchOne["overallGPA"]."</p>";


?>


<h4>Graphics</h4>

<?php
require_once "../oop/faas.php";
$wolfram = new Wolfram();


//$picture = $wolfram->WolframCloudCall(10,20,30,40);

//$imageData = base64_encode($picture);

// <img src="data:image/png;base64,<?php echo $imageData">
?>



</body>

</html>
