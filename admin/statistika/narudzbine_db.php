<?php
include("../../db.php");

$ime_firme = $_REQUEST['ime_firme'];
$result = mysqli_query($conn, "SELECT * FROM `narudzbine` WHERE ime_firme = '$ime_firme'");
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();