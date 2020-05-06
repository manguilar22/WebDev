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
    <link rel="stylesheet" href="../../css/utep.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

<h1> Welcome Admin </h1>

<!-- Logout -->
<button type="button" class="btn btn-link"><a href="../../student/login.php">Log out</a></button>

<!-- Generate Reports -->
<button type="button" class="btn btn-link"><a href="../../reports/index.php">Generate Reports</a></button>


<!-- Create a Job Role as a Admin -->
<?php

$jobTitle = isset($_POST["jobTitle"]) ? $_POST["jobTitle"] : null;
$className = isset($_POST["className"]) ? $_POST["className"] : null;
$classCRN = isset($_POST["classCRN"]) ? $_POST["classCRN"] : null;

$predicate = empty($className) && empty($classCRN);

if( !$predicate && isset($_POST["submit"]) )
{

    $sql = "CALL new_course('$jobTitle','$className','$classCRN')";
    echo $sql;
    if ($conn->query($sql)) { echo "submit";}

}




?>
<h3>Create Role</h3>
<div class="createRole">
<form action="adminPage.php" method="post">

    <label for="Student Title"></label>
    <select class="custom-select custom-select-sm" name="jobTitle">
        <option value="IA">Instructional Assistant (IA)</option>
        <option value="TA">Teacher Assistant (TA)</option>
        <option value="PL">Peer Leader (PL)</option>
    </select>

    <label for="UTEP Class Name"></label>
    <input type="text" class="form-control" name="className" placeholder="UTEP Class Name"/>

    <label for="Class CRN"></label>
    <input type="text" class="form-control" name="classCRN" placeholder="UTEP Class CRN"/>

    <input type="submit" class="btn btn-primary mb-2" name="submit" placeholder="Submit Job"/>
</form>
</div>


<!-- All Jobs in Database Table -->
<h3>Show Jobs</h3>
    <table class="table table-striped">
        <thead>
            <th>Job Title</th>
            <th>Class Name</th>
            <th>CRN</th>
            <th>Edit</th>
        </thead>
        <tr/>
        <tbody>
        <?php


        $sql = "SELECT * FROM Course ORDER BY Cid DESC";
        foreach ($conn->query($sql)as $row)
        {

                    echo "<tr>";
                    echo "<td>".$row["CjobTitle"]."</td>";
                    echo "<td>".$row["CclassName"]."</td>";
                    echo "<td>".$row["CclassCRN"]."</td>";
                    // Create Update and Delete
                    echo '<td width=250>';
                    echo '<a class="btn btn-success" href="update.php?id='.$row['Cid'].'">Update</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="delete.php?id='.$row['Cid'].'">Delete</a>';
                    echo '</td>';
                    echo "</tr>";
        }


        ?>
        </tbody>
    </table>

    <!-- Candidate Pool -->
    <h3>Candidate Pool</h3>
    <table class="table table-striped">
        <thead>Student Profile</thead>
        <tr/>
    <?php

        $sql = "SELECT Aapplication_id,AprofileImage,AprofileImageType FROM Application";
        foreach ($conn->query($sql) as $row)
        {
            $img = base64_encode($row["AprofileImage"]);
            $type = $row["AprofileImageType"];
            //header("Content-type: " . $type);
            $fullPicture = "data:image/png;base64,".$img;
            echo "<td>";
            echo "<img width='350px' height='350px' class='img-thumbnail' src='$fullPicture'/>";
            echo "</td>";
            echo "<tr/>";
        }
        ?>




</body>
</html>