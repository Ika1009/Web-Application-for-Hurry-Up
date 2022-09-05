<?php 
include('../db.php');

$sql = mysqli_query($conn, "SELECT * FROM narudzbine");
$data = array();
while ($row = mysqli_fetch_object($sql))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();