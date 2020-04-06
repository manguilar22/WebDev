<?php session_start();?>
<!DOCTYPE html>
<html>


<head>
    <title>Reports</title>
</head>


<body>

<h1>Reports</h1>

<?php
    include "../oop/databaseConnect.php";
    $db = new DatabaseConnector();
    $conn = $db->DOCKER_CONNECT("root","password","s20am_team10");
    //$conn = $db->UTEP_CONNECT();

    $summaryOne = "SELECT AVG(SmajorGPA) AS 'majorGPA',AVG(SoverallGPA) AS 'overallGPA' FROM Student";

    $fetchOne = $conn->query($summaryOne)->fetch_array();

    $summaryTwo = "SELECT COUNT(*) AS 'total' FROM Student";
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


    $picture = $wolfram->WolframCloudCall(10,20,30,40);

    $imageData = base64_encode($picture);


    ?>
<img src="data:image/png;base64,<?php echo $imageData?>">

</body>

</html>

