<?php

include_once("../../../db.php");

$result = mysqli_query($conn, "SELECT * FROM `narudzbine`");
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
echo json_encode($data);
exit();

?>