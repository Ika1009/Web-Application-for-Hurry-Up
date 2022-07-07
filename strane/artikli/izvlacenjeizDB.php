<?php
$servername = "localhost";  
$username   = "hurryupr_milos";  
$password   = "miloskralj";  
$dbname     = "hurryupr_database1";  
// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname);  
// Check connection  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
} 
$result = mysqli_query($conn, "SELECT * FROM `artikli`");
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();