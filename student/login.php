<?php

session_start();
require_once("../oop/databaseConnect.php");
$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector -> DOCKER_CONNECT("172.17.0.2","root","password","s20am_team10");
//$conn = $databaseConnector->UTEP_CONNECT();
$_SESSION['logged_in'] = false;


if (!empty($_POST)){
    if (isset($_POST['Submit'])){
        $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
        $input_password = isset($_POST['password']) ? $_POST['password'] : " ";
        $findAdmin = "SELECT * FROM SuperUsers WHERE Susername LIKE '$input_username' AND '$input_password'";
        $findUser = "SELECT COUNT(*) FROM Student WHERE Semail LIKE '$input_username' AND '$input_password'";
        $resultStudent = $conn -> query($findUser) -> fetch_array()[0];
        if ($resultStudent > 0 ) {
            $_SESSION['student_user'] = $input_username;
            $_SESSION['logged_in'] = true;
            $_SESSION["status"] = "Student";
            //echo"User found";
            header("Location: ../jobs/applicantPage.php");
        } else {
            echo "User does not exist. <br/>";
            echo "Click below and create an account. <br/>";
        }
    }
}
?>

<!DOCTYPE HTML>
<head>
    <title>Login</title>
</head>
<body>
<h1>USER LOG IN</h1>
<div id="menu">
    <form action="login.php" method="post">
        username: <input type="text" name="username"><br><br>
        password: <input type="password" name="password"><br><br>
        <input name='Submit' type="submit" value="Submit">
    </form>
</div>
<a href="./create_account.php">Create Account Here</a><br/>
</div>
<a href="../index.php">Back</a><br/>

</body>
</html>