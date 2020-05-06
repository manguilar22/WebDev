<?php session_start(); ?>
<?php
    require_once "../../oop/databaseConnect.php";
    $database = new DatabaseConnector();
    $conn = $database->connect();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Coordinator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
</head>

<body>

<h1> Welcome Coordinator </h1>

<!-- Candidate Pool -->
<h3>Candidate Pool</h3>
<table class="table table-striped">
    <th>Student Profile</th>
    <th>Student ID</th>
    <th>Total Number of Hours</th>
    <th>Credit Hours Per Semester</th>
    <th>Semester Applied For</th>
    <th>Applicant Comments</th>
    <tr/>
    <?php

    $sql = "SELECT Aapplication_period,Anumber_of_hours,Acredit_hours,Aapplication_id,AprofileImage,AprofileImageType FROM Application";
    foreach ($conn->query($sql) as $row)
    {
        $img = base64_encode($row["AprofileImage"]);
        $type = $row["AprofileImageType"];
        //header("Content-type: " . $type);
        $fullPicture = "data:image/png;base64,".$img;
        echo "<td>";
        echo "<img width='350px' height='350px' class='img-thumbnail' src='$fullPicture'/>";
        echo "</td>";
        echo "<td>";
        echo $row["Aapplication_id"];
        echo "</td>";

        echo "<td>";
        echo $row["Acredit_hours"];
        echo "</td>";

        echo "<td>";
        echo $row["Anumber_of_hours"];
        echo "</td>";

        echo "<td>";
        echo $row["Aapplication_period"];
        echo "</td>";

        echo "<td>";
        echo "<textarea>Comments .....</textarea>";
        echo "</td>";

        echo "<tr/>";
    }
    ?>





</body>
</html>