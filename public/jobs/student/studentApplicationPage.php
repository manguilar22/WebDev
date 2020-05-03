<?php session_start(); ?>
<!-- Maintain Applicant's Information-->
<?php
require_once "../../oop/databaseConnect.php";

$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector->connect();

$username = $_SESSION["user"];
$mysqlQuery = "SELECT Sclassification FROM student WHERE Semail LIKE '$username'";
$classification = $conn -> query($mysqlQuery) -> fetch_array()[0];

switch ($classification)
{
    case "undergraduate":
        // Undergraduate can only be Peer Leader or Instructional Assistant
        $jobPostingQuery = "SELECT * FROM role WHERE RjobTitle LIKE 'IA' UNION SELECT * FROM role WHERE RjobTitle LIKE 'PL' ORDER BY id DESC";
        $jobPostings = $conn->query($jobPostingQuery);
        break;
    default:
        $jobPostingQuery = "SELECT * FROM role WHERE RjobTitle LIKE 'TA' ORDER BY id DESC";
        $jobPostings = $conn->query($jobPostingQuery);
        break;
}


?>
<!DOCTYPE html>

<html>

<head>
    <title>Student</title>
</head>

<body>

    <h1> Welcome Applicant </h1>

    <h2> You are a <?php echo $classification?></h2>

    <h3> Apply for job</h3>

    <form action="">
        <?php
            foreach ($jobPostings as $item)
            {
                $e = $item["id"];
                echo $e;
                echo "<br/>";
            }
        ?>
    </form>

    <h2>Positions</h2>

<table>
    <th>Job ID</th>
    <th>Job Position</th>
    <th>Class Name</th>
    <tr/>
    <?php
    foreach ($jobPostings as $item)
    {
        echo "<td>".$item["id"]."</td>";
        echo "<td>".$item["RjobTitle"]."</td>";
        echo "<td>".$item["RclassName"]."</td>";
        echo "<tr/>";
    }
    ?>
</table>



</body>
</html>