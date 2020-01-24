<?php

// Credentials
$servername = "mysqlDB"; // Docker HOST
$username = "root";
$password = "utep";

// Test Connection to MYSQL

// Create connection
$conn = mysqli_connect($servername, $username, $password);
if (!$conn){
    echo "Error: Unable to Connect to MYSQL.". PHP_EOL;
    echo "Debugging errno:".mysqli_connect_errno();
    echo "Debugging error:".mysqli_connect_error();
    exit;
}
echo "Successful, connection to the database";
echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;
mysqli_close($conn);
