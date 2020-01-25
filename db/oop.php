<?php

//$host = "172.19.0.2";
$host = "mysqlDB";
$username = "root";
$password = "utep";
$dbName = "utep";

$conn = new mysqli($host,$username,$password,$dbName);

$sql = "create table myGuests(name VARCHAR(200),email VARCHAR(200))";
$sqlInsert = "insert into myGuests values ('dsfd','@email.com'),('dfsdf','@email.com')";
$sqlGetList = "select * from myGuests";

$result = $conn->query($sqlGetList);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["name"]. " - Name: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
