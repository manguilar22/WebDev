<?php session_start(); ?>
<?php
    require "../../oop/databaseConnect.php";
    $database = new DatabaseConnector();
    $conn = $database -> DOCKER_CONNECT("root","password","s20am_team10");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
</head>

<body>

<h1> Welcome Admin </h1>


<p><a href="../reports/index.php">Generate Reports</a></p>


<!-- Create a Job Role as a Admin -->
<h4>Create Role</h4>
<div class="createRole">
<form action="adminPage.php" method="post">

    <label for="Student Title"></label>
    <select name="jobTitle">
        <option value="IA">Instructional Assistant (IA)</option>
        <option value="TA">Teacher Assistant (TA)</option>
        <option value="PL">Peer Leader</option>
    </select>
    <label for="UTEP Class Name"></label>
    <input type="text" name="className" placeholder="UTEP Class Name"/>
    <label for="Class CRN"></label>
    <input type="text" name="classCRN" placeholder="UTEP Class CRN"/>
    <input type="submit" name="submit" placeholder="Submit Job"/>
</form>
<?php

$jobTitle = $_POST["jobTitle"];
$className = $_POST["className"];
$classCRN = $_POST["classCRN"];

$predicate = empty($className) && empty($classCRN);

if( !$predicate && isset($_POST["submit"]) )
{
    $sql = "INSERT INTO Role(RjobTitle,RclassName,RclassCRN) VALUES (
            '$jobTitle',
            '$className',
            '$classCRN'
            )";
    if ($conn->query($sql)) { echo "submit";}
    else { echo "CRN Already Used"; }

} elseif ($predicate)
{
    echo "Empty Values Not Accepted";
}




?>
</div>


<!-- All Jobs in Database Table -->
<h4>Show Jobs</h4>
<div class="showTable">
    <table>
        <thead>
            <th>Job Title</th>
            <th>Class Name</th>
            <th>CRN</th>
            <th>Delete</th>
        </thead>
        <tr/>
        <tbody>
        <?php


        $sql = "SELECT * FROM Role ORDER BY id DESC";
        foreach ($conn->query($sql)as $row)
        {

                    echo "<tr>";
                    echo "<td>".$row["RjobTitle"]."</td>";
                    echo "<td>".$row["RclassName"]."</td>";
                    echo "<td>".$row["RclassCRN"]."</td>";
                    // Create Update and Delete
                    echo '<td width=250>';
                    echo '<a class="btn btn-success" href="./update.php?id='.$row['id'].'">Update</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="./delete.php?id='.$row['id'].'">Delete</a>';
                    echo '</td>';
                    echo "</tr>";
        }


        ?>
        </tbody>
    </table>
</div>

</body>
</html>