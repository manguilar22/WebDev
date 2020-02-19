<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css"/>
    <meta charset="UTF-8">
    <title>UTEP</title>
</head>
<body>

    <div class="banner">
        <h1>UTEP TA/IA Applicants</h1>
    </div>

    <div class="navigation">
        <ol>
            <li><a href="/student/index.php">Create an Account</a></li>
        </ol>
    </div>


    <?php
    require "./oop/databaseConnect.php";
    $db = new DatabaseConnector();
    $db -> DOCKER_CONNECT("172.17.0.2","root","password","test");
    echo "print if work";
    ?>

</body>

<!-- Javascript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" />
</html>
