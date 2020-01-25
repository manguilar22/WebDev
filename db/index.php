<?php

// Credentials
//$host = "mysqlDB"; // Docker HOST
$host = "mysqlDB";
//$host = "172.19.0.2";
$username = "root";
$password = "utep";
$dbName = "utep";

// Connect to Database
$conn = mysqli_connect($host,$username,$password);

// Create database
/*
$sql = "CREATE DATABASE ".$dbName;
if (mysqli_query($conn,$sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);
*/

// Create a Table
$sqlCreateTable = "CREATE TABLE database_management(firstName VARCHAR(200), email VARCHAR(200))";
$conn = mysqli_connect($host,$username,$password,$dbName);
$status = mysqli_query($conn,$sqlCreateTable);

// Insert into Table
$sqlInsertToTable = "INSERT INTO database_management VALUES ('djjjkd','333jjj'),('ddfs','gwg'),('fsd','gsd')";

if (mysqli_query($conn, $sqlInsertToTable)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sqlInsertToTable . "<br>" . mysqli_error($conn);
}

// Count Elements in a Table
$count = "SELECT COUNT(*) FROM database_management";
$str = mysqli_query($conn,$count);
echo "Count:\t".$str;
mysqli_close($conn);

