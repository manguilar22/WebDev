<?php
$host = "mysqlDB";
$username = "root";
$password = "utep";
$dbName = "utep";

$conn = new mysqli($host,$username,$password);

if ($conn->connect_error){
    die("Error Connecting to database");
}
echo "Successful Connection in DOCKER";
$conn->close();