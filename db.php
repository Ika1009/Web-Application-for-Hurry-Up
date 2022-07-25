<?php

$servername = "87.250.63.45";
$username = "root";
$password = "gtrdsnetrt";
$dbname = "hurryupr_database1";
$port = "11883";
// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>