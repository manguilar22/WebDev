<?php session_start(); ?>
<!-- Maintain Applicant's Information-->
<?php
require_once "../../oop/databaseConnect.php";

$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector->connect();

$username = $_SESSION["user"];

$mysqlQuery = "SELECT * FROM student WHERE Semail LIKE '$username'";
$results = $conn -> query($mysqlQuery) -> fetch_array();

$classification = $results["Sclassification"];

switch ($classification)
{
    case $classification==="undergraduate":
        // Undergraduate can only be Peer Leader or Instructional Assistant
        $jobPostingQuery = "SELECT * FROM course WHERE CjobTitle LIKE 'IA' UNION SELECT * FROM course WHERE CjobTitle LIKE 'PL' ORDER BY Cid DESC";
        $jobPostings = $conn->query($jobPostingQuery);
        break;

    case $classification==="graduate" or $classification==="doctorate":
        $jobPostingQuery = "SELECT * FROM course WHERE CjobTitle LIKE 'TA' ORDER BY Cid DESC";
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

    <h1> Welcome, <?php echo $results["Sfname"]." ".$results["Slname"];?> </h1>

    <h1> You are a <?php echo $classification?></h1>

    <h1>Positions</h1>

    <form action="studentApplicationPage.php" method="post">
    <table>
        <th>Job ID</th>
        <th>Job Position</th>
        <th>Class Name</th>
        <th>Class CRN</th>
        <tr/>
        <?php
            foreach ($jobPostings as $item) {
                $id = $item["Cid"];
                $jobTitle = $item["CjobTitle"];
                $className = $item["CclassName"];
                $classCRN = $item["CclassCRN"];

                    echo "<td>";
                    echo "<input type='checkbox' name='apply_list[]' value='$id'>";
                    echo $id;
                    echo "</input>";
                    echo "</td>";

                    echo "<td>";
                    echo $jobTitle;
                    echo "</td>";

                    echo "<td>";
                    echo $className;
                    echo "</td>";

                    echo "<td>";
                    echo $classCRN;
                    echo "</td>";

                    echo "<tr/>";

            }
        ?>
    </table>

        <input type="submit" name="submitApplication" placeholder="Apply Now"/>
        <?php
        $appliedJobs = array();
            if ( isset($_POST["submitApplication"]) )
            {
                if ( ! empty($_POST["apply_list"]) )
                {
                    foreach ($_POST["apply_list"] as $e)
                    {
                        array_push($appliedJobs,$e);
                        echo "Chosen:\t".$e;
                    }
                }
            }

        ?>
    </form>

    <!-- (Advanced) Information of student -->
    <h3>Upload Image</h3>
    <form action="studentApplicationPage.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submitImage" value="Upload">
        <?php
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $imgData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                $imageProperties = getimageSize($_FILES['file']['tmp_name']);

                $sql = "INSERT INTO output_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}')";
                $current_id = $conn -> query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
                if (isset($current_id)) {
                    echo "successful";
                        $sql = "SELECT imageType,imageData FROM output_images WHERE imageId=" . 5;
                    echo $sql;
                        $result = $conn->query($sql)->fetch_array() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
                        $picture = base64_encode($result["imageData"]);
                        $type = $results["imageType"];
                    header("Content-type: " . $type);
                    $fullPicture = "data:image/png;base64,".$picture;
                    echo "<img src='$fullPicture' alt='Student Picture'/>";
                }
            }
        }
        ?>
    </form>

    <!-- Upload Transcript -->
    <h3>Upload transcript</h3>

    <form action="studentApplicationPage.php" method="post" enctype="multipart/form-data">
        <label for="transcript">Transcript</label>
        <input type="file" name="transcript"/>
        <input type="submit" name="submitTranscript" placeholder="Submit Transcript"/>
    </form>

    <?php
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
            $imageProperties = getimageSize($_FILES['file']['tmp_name']);

            $sql = "INSERT INTO output_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}')";
            $current_id = $conn->query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
            if (isset($current_id)) {

                echo "Successful Submission of Transcript";

            }
        }
    }
    ?>

    <h3>Reference Letters</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="letter"/>
        <input type="submit" name="letterSubmit" placeholder="submit"/>
    </form>

    <?php
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['letter']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['letter']['tmp_name']));
            $imageProperties = getimageSize($_FILES['letter']['tmp_name']);

            $sql = "INSERT INTO output_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}')";
            $current_id = $conn->query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
            if (isset($current_id)) {

                echo "Successful Submission of Letter";

            }
        }
    }
    ?>




</body>
</html>