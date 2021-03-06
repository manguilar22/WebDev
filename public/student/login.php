<?php session_start(); ?>
<?php

require_once "../oop/databaseConnect.php";
$databaseConnector = new DatabaseConnector();
$conn = $databaseConnector->connect();
$_SESSION['logged_in'] = false;

if (!empty($_POST)){
    if (isset($_POST['Submit'])){

        // Client's Credentials
        $input_username = isset($_POST['username']) ? $_POST['username'] :  NULL;
        $input_password = isset($_POST['password']) ? $_POST['password'] :  NULL;

        // MYSQL Queries
        $findAdmin = "SELECT COUNT(*) FROM SuperUsers WHERE Susername LIKE '$input_username' AND Spassword LIKE '$input_password' AND Sstatus LIKE 'ADMIN'";
        $findCoordinator = "SELECT COUNT(*) FROM SuperUsers WHERE Susername LIKE '$input_username' AND Spassword LIKE '$input_password' AND Sstatus LIKE 'COORDINATOR'";
        $findUser = "SELECT COUNT(*) FROM Student WHERE Semail LIKE '$input_username' AND Spassword LIKE '$input_password'";

        // Results
        $resultStudent = $conn -> query($findUser) -> fetch_array()[0];
        $resultAdmin = $conn -> query($findAdmin) -> fetch_array()[0];
        $resultCoordinator = $conn -> query($findCoordinator) -> fetch_array()[0];

        // Login Scheme
        if ($resultStudent > 0 ) {
            $_SESSION['user'] = strval($input_username);
            $_SESSION['logged_in'] = true;
            $_SESSION["status"] = "student";
            //echo"User found";
            header("Location: ../jobs/student/student_profile.php");
        } elseif ($resultAdmin > 0) {
            $_SESSION["user"] = $input_username;
            $_SESSION["logged_in"] = true;
            $_SESSION["status"] = "admin";
            //echo "Admin Found";
            header("Location: ../jobs/admin/adminPage.php");
        } elseif ($resultCoordinator > 0) {
            $_SESSION["user"] = $input_username;
            $_SESSION["logged_in"] = true;
            $_SESSION["status"] = "coordinator";
            //echo "Coordinator Found";
            header("Location: ../jobs/coordinator/coordinatorPage.php");
        }else {
			error_reporting(0);
            $errorMsg = "<div class='displayError'>*User does not exist. Click below and create an account. <br/></div>";
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

<div class="box">
	<img src="../css/img/utep_logo.svg" width="500px" height="361px">
	<div class="userInput">
		<h1>USER LOG IN</h1>
		<div>
			<form action="login.php" method="post">
				<!-- <label>User Name</label> -->
				<input class="form-control" type="text" name="username" placeholder="use UTEP email">
				<!-- <small class="form-text text-muted">use UTEP email</small> -->
				<!-- <label>Password</label> -->
				</br><input class="form-control" type="password" name="password" placeholder="password"> <br/>
				<button class="btn btn-primary" name="Submit" type="submit">Submit</button>
			</form>
		</div>
	</div>

	<!-- DISPLAY ERROR MESSAGE HERE IF ANY -->
	<?php
		error_reporting(0);
		echo $errorMsg
	?>

	<div class="links">
		<a href="../index.php" style="float:left">Back</a>
		<a href="create_account.php" style="float:right">Create Account</a>
	</div>
</div>



</body>
</html>
