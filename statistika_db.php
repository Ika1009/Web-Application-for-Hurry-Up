<?php
include("../../db.php");

$email = $_REQUEST['email'];
$result = mysqli_query($conn, "SELECT * FROM `registracija` WHERE email = '$email'");
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();