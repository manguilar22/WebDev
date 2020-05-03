<?php session_start(); ?>
<?php
    require "../../oop/databaseConnect.php";
    $database = new DatabaseConnector();
    $conn = $database -> connect();

    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <!--<link type="text/css" rel="stylesheet" href="../../css/style.css"/>-->

</head>

<body>

<h1> Welcome Admin </h1>


<p><a href="../../reports/index.php">Generate Reports</a></p>


<!-- Create a Job Role as a Admin -->
<?php

$jobTitle = isset($_POST["jobTitle"]) ? $_POST["jobTitle"] : null;
$className = isset($_POST["className"]) ? $_POST["className"] : null;
$classCRN = isset($_POST["classCRN"]) ? $_POST["classCRN"] : null;

$predicate = empty($className) && empty($classCRN);

if( !$predicate && isset($_POST["submit"]) )
{
    $sql = "CALL new_jobRole('$jobTitle','$className','$classCRN')";

    if ($conn->query($sql)) { echo "submit";}
    else { echo "CRN Already Used"; }

} elseif ($predicate)
{
    echo "Empty Values Not Accepted";
}




?>
<h4>Create Role</h4>
<div class="createRole">
<form action="adminPage.php" method="post">

    <label for="Student Title"></label>
    <select name="jobTitle">
        <option value="IA">Instructional Assistant (IA)</option>
        <option value="TA">Teacher Assistant (TA)</option>
        <option value="PL">Peer Leader (PL)</option>
    </select>
    <label for="UTEP Class Name"></label>
    <input type="text" name="className" placeholder="UTEP Class Name"/>
    <label for="Class CRN"></label>
    <input type="text" name="classCRN" placeholder="UTEP Class CRN"/>
    <input type="submit" name="submit" placeholder="Submit Job"/>
</form>
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


        $sql = "SELECT * FROM role ORDER BY id DESC";
        foreach ($conn->query($sql)as $row)
        {

                    echo "<tr>";
                    echo "<td>".$row["RjobTitle"]."</td>";
                    echo "<td>".$row["RclassName"]."</td>";
                    echo "<td>".$row["RclassCRN"]."</td>";
                    // Create Update and Delete
                    echo '<td width=250>';
                    echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                    echo '</td>';
                    echo "</tr>";
        }


        ?>
        </tbody>
    </table>

</div>

</body>
</html>