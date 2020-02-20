<html>

<head>
    <link rel="stylesheet" href="../css/student.css"/>
</head>

<body>

    <!-- Student Account -->
    <div class="studentForm">
    <form method="post" action="index.php">
        <label>Name</label> <br/>
        <input type="text" name="firstName" placeholder="First Name Goes Here"/> <br/>
        <input type="text" name="middleName" placeholder="Middle Name goes here. Type N/A if not applicable"/> <br/>
        <input type="text" name="lastName" placeholder="Last Name Goes Here"/> <br/>
        <label>UTEP Email</label> <br/>
        <input type="text" name="utepEmail" placeholder="Use student email, please"/> <br/>
        <label>Classification</label> <br/>
        <!-- SELECT GOES HERE -->
        <select name="classification">
            <option value="Undergraduate">Undergraduate</option>
            <option value="Graduate">Graduate</option>
            <option value="Doctorate">Doctorate</option>
        </select> <br/>
        <label>Major GPA</label> <br/>
        <input type="text" name="majorGPA" placeholder="Major GPA"/> <br/>
        <label>Overall GPA</label> <br/>
        <input type="text" name="overallGPA" placeholder="Overall GPA"/> <br/>
        <label>Password</label> <br/>
        <input type="password" name="password" placeholder="type a secret password"/><br/>
        <button type="submit">Create Account</button>
    </form>
    </div>

    <?php
    require "../oop/databaseConnect.php";
    require "../oop/safetyChecks.php";
    $databaseConnector = new DatabaseConnector();
    $sanitizer = new Sanitizer();
    //$db -> UTEP_CONNECT("maguilar15","*utep2020!","maguilar15_db");
    $db = $databaseConnector -> DOCKER_CONNECT("172.17.0.2","root","password","test");

        $fName = $_POST["firstName"];
        $mName = $_POST["middleName"];
        $lName = $_POST["lastName"];
        $uEmail = $_POST["utepEmail"];
        $class = $_POST["classification"];
        $majorGPA = $_POST["majorGPA"];
        $overallGPA = $_POST["overallGPA"];

        $password = $_POST["password"];
        // Data too long for column 'Spassword' at row 1
        //$password = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql = "INSERT INTO Student VALUES ('$fName','$mName','$lName','$uEmail','$class','$majorGPA','$overallGPA','$password') ";


    $testQuery = "SELECT COUNT(*) FROM Student WHERE Semail LIKE 'aass' ";

    $count = $db -> query($testQuery) ->fetch_array()[0]; // HACKY

    if ($count === 0) {
        if ($db->query($sql) === TRUE) {
            echo "Successful Insertion";
        } else {
            print "Fail Code:" . $db->connect_errno;
            print "[-] Status [-] Fail Message:\t" . $db->error;

        }
    } else {
        echo "Account Already Exists";
    }


    ?>

</body>

</html>