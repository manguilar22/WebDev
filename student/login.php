<?php
/**
 * CS 4342 Database Management
 * @author Kevin Apodaca
 * @since 2/12/20
 * @version 1.0
 * Description: The purpose of this file is to serve as simple login system that validates username and password.
 */

session_start();
require_once("../oop/databaseConnect.php");
$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector -> DOCKER_CONNECT("172.17.0.2","root","password","test");

$_SESSION['logged_in'] = false;


if (!empty($_POST)){
    if (isset($_POST['Submit'])){
        $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
        $input_password = isset($_POST['password']) ? $_POST['password'] : " ";
        $resultStudent = $conn -> query("SELECT COUNT(*) FROM Student WHERE Semail LIKE '$input_username' AND '$input_password'")
        -> fetch_array()[0];
        if ($resultStudent > 0 ) {
            $_SESSION['student_user'] = $input_username;
            $_SESSION['logged_in'] = true;
            echo"User found";
        } else {
            echo "User not found.".$resultStudent;
        }
    }
}
?>

<!DOCTYPE HTML>
<head>
    <title>CS 4342 Test Login</title>
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
<a href="index.html">CREATE USER ACCOUNT</a><br>

<br>
</div>
<a href="index.php">Back</a><br>

</body>
</html>