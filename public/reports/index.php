<?php session_start();?>
<!DOCTYPE html>
<html>


<head>
    <title>Reports</title>
    <link rel="stylesheet" href="../css/utep.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
</head>


<body>

<h1>Some Report</h1>

<?php
    require_once "../oop/databaseConnect.php";
    $db = new DatabaseConnector();
    $conn = $db->connect();

$summaryOne = "SELECT AVG(Smajor_gpa) AS 'majorGPA',AVG(Sover_all_gpa) AS 'overallGPA' FROM Student";

$fetchOne = $conn->query($summaryOne)->fetch_array();

$summaryTwo = "SELECT COUNT(*) AS 'total' FROM Student";
$fetchTwo = $conn->query($summaryTwo)->fetch_array();

echo "<p>Registered students in the system: ".$fetchTwo["total"]."</p>";
echo "<h4> Averages </h4>";
echo "<p>Major GPA of <b>All</b> Candidates: ".$fetchOne["majorGPA"]."</p>";
echo "<p>Overall GPA of <b>All</b> Candidates: ".$fetchOne["overallGPA"]."</p>";


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
