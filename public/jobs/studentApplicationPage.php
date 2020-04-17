<?php session_start(); ?>
<!-- Maintain Applicant's Information-->
<?php
require_once("../oop/databaseConnect.php");

$databaseConnector = new DatabaseConnector();
$conn=$databaseConnector->SETUP_DATABASE();

$username = $_SESSION["user"];
$mysqlQuery = "SELECT (Sclass) FROM Student WHERE Semail LIKE '$username'";
$classification = $conn -> query($mysqlQuery) -> fetch_array()[0];

$jobPostingQuery = "SELECT * FROM Role ORDER BY id DESC";
$jobPostings = $conn -> query($jobPostingQuery);

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

<ol>
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