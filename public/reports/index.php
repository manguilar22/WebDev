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

    $summaryOne = "SELECT SUM(SoverallGPA) FROM Student";
    $summaryTwo = "SELECT SmajorGPA,SoverallGPA FROM Student";

    $fetchOne = $conn->query($summaryOne)->fetch_array()[0];
    $fetchTwo = $conn->query($summaryTwo)->fetch_assoc();

    ?>

</body>


</html>