<?php

session_start();
require_once("../oop/databaseConnect.php");
$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector -> DOCKER_CONNECT("172.17.0.2","root","password","s20am_team10");
//$conn = $databaseConnector->UTEP_CONNECT();
$_SESSION['logged_in'] = false;


if (!empty($_POST)){
    if (isset($_POST['Submit'])){

        // Client's Credentials
        $input_username = isset($_POST['username']) ? $_POST['username'] : " ";
        $input_password = isset($_POST['password']) ? $_POST['password'] : " ";

        // MYSQL Queries
        $findAdmin = "SELECT COUNT(*) FROM SuperUsers WHERE Susername LIKE '$input_username' AND Spassword LIKE '$input_password' AND Sstatus LIKE 'ADMIN'";
        $findCoordinator = "SELECT COUNT(*) FROM SuperUsers WHERE Susername LIKE '$input_username' AND Spassword LIKE '$input_password' AND Sstatus LIKE 'COORDINATOR'";
        $findUser = "SELECT COUNT(*) FROM Student WHERE Semail LIKE '$input_username' AND Spassword LIKE '$input_password'";

        // Results
        $resultStudent = $conn -> query($findUser) -> fetch_array()[0];
        $resultAdmin = $conn -> query($findAdmin) -> fetch_array()[0];
        $resultCoordinator = $conn -> query($findCoordinator) -> fetch_array()[0];

        if ($resultStudent > 0 ) {
            $_SESSION['user'] = strval($input_username);
            $_SESSION['logged_in'] = true;
            $_SESSION["status"] = "student";
            //echo"User found";
            header("Location: ../jobs/studentApplicationPage.php");
        } elseif ($resultAdmin > 0) {
            $_SESSION["user"] = $input_username;
            $_SESSION["logged_in"] = true;
            $_SESSION["status"] = "admin";
            //echo "Admin Found";
            header("Location: ../jobs/adminPage.php");
        } elseif ($resultCoordinator > 0) {
            $_SESSION["user"] = $input_username;
            $_SESSION["logged_in"] = true;
            $_SESSION["status"] = "coordinator";
            //echo "Coordinator Found";
            header("Location: ../jobs/coordinatorPage.php");
        }else {
            echo "User does not exist. <br/>";
            echo "Click below and create an account. <br/>";
        }
    }
}
?>

<!DOCTYPE HTML>
<head>
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>

</head>
<body>
<h1>USER LOG IN</h1>
<div id="menu">
    <form action="login.php" method="post">
        <label>User Name</label>
        <input class="form-control" type="text" name="username">
        <small class="form-text text-muted">use UTEP email</small>
        <label>Password</label>
        <input class="form-control" type="password" name="password"> <br/> <!-- TODO: -->
        <button class="btn btn-primary" name="Submit" type="submit">Submit</button>
    </form>
</div>
<a href="./create_account.php">Create Account Here</a><br/>
</div>
<a href="../index.php">Back</a><br/>

</body>
</html>