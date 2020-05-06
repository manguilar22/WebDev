<?php session_start();?>
<!DOCTYPE html>
<html>


<head>
    <title>Reports</title>
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

// Convert to view
$sqlQ = "SELECT Sgender AS gender, COUNT(Sgender) AS gender_count ,Sresidency_status AS residency,COUNT(Sresidency_status) AS total, AVG(Smajor_gpa) AS average_major_GPA, AVG(Sover_all_gpa) AS average_overall_GPA FROM Student GROUP BY Sresidency_status,Sgender";

$tMajor = [];
$tOverall = [];
$tResidency = [];

$test = $conn->query($sqlQ)->fetch_array();

foreach ($test as $e)
{
    echo e["gender"];
}


//$picture = $wolfram->WolframCloudCall(implode(",",$tMajor), implode(",",$tOverall), implode(",",$tResidency));

//$imgData = "data:image/png;base64,".base64_encode($picture);
?>

<img src="<?php echo 0;?>"/>




</body>

</html>
