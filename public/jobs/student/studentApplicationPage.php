<?php session_start(); ?>
<!-- Maintain Applicant's Information-->
<?php
require_once "../../oop/databaseConnect.php";

$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector->connect();

$username = $_SESSION["user"];

$mysqlQuery = "SELECT * FROM Student WHERE Semail LIKE '$username'";
$results = $conn -> query($mysqlQuery) -> fetch_array();

$classification = $results["Sclassification"];

$fullData = [];

switch ($classification)
{
    case $classification==="undergraduate":
        // Undergraduate can only be Peer Leader or Instructional Assistant
        $jobPostingQuery = "SELECT * FROM Course WHERE CjobTitle LIKE 'IA' UNION SELECT * FROM Course WHERE CjobTitle LIKE 'PL' ORDER BY Cid DESC";
        $jobPostings = $conn->query($jobPostingQuery);
        break;

    case $classification==="graduate" or $classification==="doctorate":
        $jobPostingQuery = "SELECT * FROM Course WHERE CjobTitle LIKE 'TA' ORDER BY Cid DESC";
        $jobPostings = $conn->query($jobPostingQuery);
        break;
}


?>
<!DOCTYPE html>

<html>

<head>
    <title>Student</title>
    <link href="../../css/utep.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

    <h1> Welcome, <?php echo $results["Sfname"]." ".$results["Slname"];?> </h1>

    <h2> You are a <?php echo $classification?></h2>

    <h3>Apply</h3>

    <!-- Insert all data -->
    <form action="studentApplicationPage.php" method="post" enctype="multipart/form-data">
        <table class="table table-striped">
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

    <!-- (Advanced) Information of student -->
        <div class="custom-file">
            <label class="custom-file-label" for="file">Upload Image</label>
            <input class="custom-file-input" type="file" name="file">
            <?php
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $imgData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                $imageProperties = getimageSize($_FILES['file']['tmp_name']);

                $fullData["profileImageType"] = $imageProperties["mime"];
                $fullData["profileImage"] = $imgData;

                //$sql = "INSERT INTO output_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}')";
                //$current_id = $conn -> query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
                if (isset($current_id)) {
                    echo "successful";
                        $sql = "SELECT imageType,imageData FROM output_images WHERE imageId=" . 5;
                    echo $sql;
                        //$result = $conn->query($sql)->fetch_array() or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
                        $picture = base64_encode($result["imageData"]);
                        $type = $results["imageType"];
                    header("Content-type: " . $type);
                    $fullPicture = "data:image/png;base64,".$picture;
                    echo "<img src='$fullPicture' alt='Student Picture'/>";
                }
            }
        }
        ?>
        </div>


        <!-- Upload Transcript -->
        <div class="custom-file">
            <label class="custom-file-label" for="transcript">Upload transcript</label>
            <input class="custom-file-input" type="file" name="transcript"/>
            <?php
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
            $imageProperties = getimageSize($_FILES['file']['tmp_name']);

            $fullData["transcript"] = $imgData;

            //$sql = "INSERT INTO output_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}')";
            //$current_id = $conn->query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
            if (isset($current_id)) {

                echo "Successful Submission of Transcript";

            }
        }
    }
    ?>
        </div>

        <div class="custom-file">
            <label class="custom-file-label" for="resume">Upload Resume</label>
            <input class="custom-file-input" type="file" name="resume">
            <?php
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['resume']['tmp_name'])) {
                $imgData = addslashes(file_get_contents($_FILES['resume']['tmp_name']));
                $imageProperties = getimageSize($_FILES['resume']['tmp_name']);

                $fullData["resume"] = $imgData;
                //$sql = "INSERT INTO output_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}')";
                //$current_id = $conn->query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
                if (isset($current_id)) {

                    echo "Successful Submission of Resume";

                }
            }
        }
        ?>
        </div>

        <div class="custom-file">
        <label class="custom-file-label" for="letter">Reference Letters</label>
            <input class="custom-file-input" type="file" name="letter"/>
            <?php
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['letter']['tmp_name'])) {
            $imgData = addslashes(file_get_contents($_FILES['letter']['tmp_name']));
            $imageProperties = getimageSize($_FILES['letter']['tmp_name']);

            $fullData["letter"] = $imgData;
            //$sql = "INSERT INTO output_images(imageType ,imageData) VALUES('{$imageProperties['mime']}', '{$imgData}')";
            // $current_id = $conn->query($sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
            if (isset($current_id)) {

                echo "Successful Submission of Letter";

            }
        }
    }
    ?>
        </div>


        <label for="creditHours">Credit Hours</label>
        <input class="form-control form-control-sm" type="text" name="creditHours" placeholder="Ex. 88"/>

        <label for="numberOfHours">Number of Hours Per Semester of Application</label>
        <input class="form-control form-control-sm" type="text" name="numberOfHours" placeholder="Ex. 12"/>

        <label for="applicationPeriod">Application Term To Consider</label>
        <select class="form-control form-control-sm" name="applicationPeriod">
            <option value="Fall" selected>Fall</option>
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
        </select>

        <label for="currentPosition">Current Position</label>
        <select select class="form-control form-control-sm" name="currentPosition">
            <option value="unemployed" selected>Unemployed</option>
            <option value="TA">Teacher Assistant</option>
            <option value="IA">Instructional Assistant</option>
            <option value="PL">Peer Leader</option>
        </select>

        <label for="submitApplication">Apply Now!</label>
        <input class="btn btn-primary mb-2" type="submit" name="submitApplication" placeholder="Submit"/>
        <?php
        $appliedJobs = [];
        if ( isset($_POST["submitApplication"]) )
        {
            if ( ! empty($_POST["apply_list"]) )
            {
                foreach ($_POST["apply_list"] as $e)
                {
                    array_push($appliedJobs,$e); // store all jobs student has applied for
                }
            }
            $totalJobs = implode(",",$appliedJobs);
            $studentID = $results["Sid"];
            $creditHours = isset($_POST["creditHours"])?$_POST["creditHours"]:0; //M
            $numberOfHours = isset($_POST["numberOfHours"])? $_POST["numberOfHours"]: 0; //M
            $applicationPeriod = isset($_POST["applicationPeriod"]) ? $_POST["applicationPeriod"] : 0; //M
            $currentPosition = isset($_POST["currentPosition"]) ? 0 : "unemployed"; //M
            $resume =$fullData["resume"];
            $transcript = $fullData["transcript"];
            $referenceLetter = $fullData["letter"];
            $profilePicture = $fullData["profileImage"];
            $profilePictureType = $fullData["profileImageType"];

            // Calling Procedure
            /*
            $createApplication = "CALL create_application(
           '$studentID',
           '$creditHours',
           '$numberOfHours',
           '$applicationPeriod',
           '$currentPosition',
           '$resume',
           '$transcript',
           '$referenceLetter',
           '$profilePicture', 
           '$profilePictureType'
        )";
            */
            $createApplication="INSERT INTO Application(
        Astudent_id,
        AstudentJobs,
        Acredit_hours,
        Anumber_of_hours,
        Aapplication_period,
        Acurrent_position,
        Aresume,
        Atranscript,
        Areference_letter,
        AprofileImage,
        AprofileImageType
    ) VALUES (
        '$studentID',
        '$totalJobs',
           '$creditHours',
           '$numberOfHours',
           '$applicationPeriod',
           '$currentPosition',
           '$resume',
           '$transcript',
           '$referenceLetter',
           '$profilePicture', 
           '$profilePictureType'
    );";
            $conn->query($createApplication);
            echo "Congrats, you did it";

            $newTable = "INSERT INTO VALUES ('$studentID',NOW())";

        }
        ?>

    </form>



</body>
</html>