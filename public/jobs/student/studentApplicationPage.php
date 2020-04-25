<?php session_start(); ?>
<!-- Maintain Applicant's Information-->
<?php
require_once "../../oop/databaseConnect.php";

$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector->connect();

$username = $_SESSION["user"];
$mysqlQuery = "SELECT (Sclass) FROM Student WHERE Semail LIKE '$username'";
$classification = $conn -> query($mysqlQuery) -> fetch_array()[0];

switch ($classification)
{
    case $classification==="undergraduate":
        // Undergraduate can only be Peer Leader or Instructional Assistant
        $jobPostingQuery = "SELECT * FROM Role WHERE RjobTitle LIKE 'IA' UNION SELECT * FROM Role WHERE RjobTitle LIKE 'PL' ORDER BY id DESC";
        $jobPostings = $conn->query($jobPostingQuery);
        break;

    case $classification==="Graduate" or $classification==="Doctorate":
        $jobPostingQuery = "SELECT * FROM Role WHERE RjobTitle LIKE 'TA' ORDER BY id DESC";
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

    <h1> You are a <?php echo $classification?></h1>

    <!-- Job Application -->
    <form action="studentApplicationPage.php" method="post">

    </form>

    <h1>Positions</h1>

    <ol style="list-style-type: square">
        <?php
            foreach ($jobPostings as $item)
            {
                echo "<li>";
                echo $item["RjobTitle"];
                echo "</li>";
            }
            ?>
    </ol>



</body>
</html>