<?php session_start();?>
<html>


<head>
    <title>Reports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
</head>


<body>

<h1>Reports</h1>

<?php
    require_once "../oop/databaseConnect.php";
    $db = new DatabaseConnector();
    $conn = $db->connect();

$summaryOne = "SELECT AVG(Smajor_gpa) AS 'majorGPA',AVG(Sover_all_gpa) AS 'overallGPA' FROM Student";

$fetchOne = $conn->query($summaryOne)->fetch_array();

$summaryTwo = "SELECT COUNT(*) AS 'total' FROM Student";
$fetchTwo = $conn->query($summaryTwo)->fetch_array();

//require_once "../oop/faas.php";
//$wolfram = new Wolfram();
$queryOne = "SELECT * FROM FullStatMatrix";
$results = $conn->query($queryOne);

$row = $results->fetch_assoc();

/*
while ($row) {

    $picture = $wolfram->WolframCloudCall(implode(",", $row["average_major_GPA"]),
        implode(",", $row["average_overall_GPA"]),
        implode(",", $row["residency"]));
}
$imgData = "data:image/png;base64,".base64_encode($picture);
<img src="<?php echo $imgData;?>"/>
*/
echo "<p>Registered students in the system: ".$fetchTwo["total"]."</p>";
echo "<h4> Averages </h4>";
echo "<p>Major GPA of <b>All</b> Candidates: ".$fetchOne["majorGPA"]."</p>";
echo "<p>Overall GPA of <b>All</b> Candidates: ".$fetchOne["overallGPA"]."</p>";

/*FULL PICTURE*/

$t1 = [];
$t2 = [];
$t3 = [];
if ($res=$conn->query("SELECT * FROM FullStatMatrix"))
{
    while ($row=$res->fetch_assoc())
    {
            array_push($t1,$row["average_major_GPA"]);
            array_push($t2,$row["average_overall_GPA"]);
            array_push($t3,$row["residency"]);
    }
}

require_once "../oop/faas.php";
$wolfram = new Wolfram();
$data = $wolfram->WolframCloudCall(implode(",",$t1),implode(",",$t2),implode(",",$t3));

$imgData = "data:image/png;base64,".base64_encode($data);

?>

<img src="<?php echo $imgData; ?>"/>
<table class="table table-bordered">
    <thead class="thead-light">
    <th>Gender</th>
    <th>Total Count</th>
    <th>Residency Status</th>
    <th>Average Major GPA</th>
    <th>Average Overall GPA</th>
    </thead>
    <tr/>
<?php
$query = "SELECT * FROM FullStatMatrix";
if ($result = $conn->query($query)) {


    while ($row = $result->fetch_assoc()) {
        echo "<td>{$row["gender"]}</td>";
        echo "<td>{$row["total"]}</td>";
        echo "<td>{$row["residency"]}</td>";
        echo "<td>{$row["average_major_GPA"]}</td>";
        echo "<td>{$row["average_overall_GPA"]}</td>";
        echo "<tr/>";
    }

}
?>
</table>

<h3>Honor Students</h3>
<table class="table table-bordered">
    <thead class="thead-light">
        <th>Student Email</th>
        <th>Student Classification</th>
        <th>Residency Status</th>
        <th>Major GPA</th>
        <th>Overall GPA</th>
    </thead>
    <tr/>
<?php
    $sql = "SELECT * FROM HonorStudents ORDER BY Smajor_gpa AND Sover_all_gpa";
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            echo "<td>'{$row["Semail"]}'</td>";
            echo "<td>'{$row["Sclassification"]}'</td>";
            echo "<td>'{$row["Sresidency_status"]}'</td>";
            echo "<td>'{$row["Smajor_gpa"]}'";
            echo "<td>'{$row["Sover_all_gpa"]}'</td>";
            echo "<tr/>";
        }
    }
    ?>
</table>


</body>

</html>
