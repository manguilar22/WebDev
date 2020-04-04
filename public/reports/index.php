<?php session_start();?>
<!DOCTYPE html>
<html>


<head>
    <title>Reports</title>
</head>


<body>

<h1>Some Report</h1>

<?php
    include "../oop/databaseConnect.php";
    $db = new DatabaseConnector();
    $conn = $db->DOCKER_CONNECT("root","password","s20am_team10");
    //$conn = $db->UTEP_CONNECT();

    $summaryOne = "SELECT AVG(SmajorGPA) AS 'majorGPA',AVG(SoverallGPA) AS 'overallGPA' FROM Student";

    $fetchOne = $conn->query($summaryOne)->fetch_array();


    echo "<h4>Major GPA of Candidates:".$fetchOne["majorGPA"]."</h4>";
    echo "<h4>Overall GPA of Candidates:".$fetchOne["overallGPA"]."</h4>";
    

    ?>


</body>


</html>