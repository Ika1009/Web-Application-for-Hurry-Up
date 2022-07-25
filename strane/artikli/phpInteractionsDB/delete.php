<?php

//za brisanje slike iz file system
$mask = '../artikliSlike/' . $_GET['id'] . '.*';
array_map('unlink', glob($mask));

//brisanje iz baze
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hurryupr_database1";
// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM artikli WHERE id = " . $_GET['id']; //kako sad ja da dobijem bas artikl koji se brise - evo kako ilija smrdljo

if ($conn->query($sql) === TRUE) {
    $row_successfully_deleted = true;
}
else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();

if ($row_successfully_deleted)
    echo "deleted";

?>