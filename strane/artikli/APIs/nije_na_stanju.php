<?php

include_once("../../../db.php");

$status = "1";
$sql = "UPDATE `artikli` SET `na_stanju`=\"$status\" WHERE `id`= " . $_REQUEST['id'];

if ($conn->query($sql) === TRUE) {
    $row_successfully_updated = true;
}
else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();

if ($row_successfully_updated)
    echo "updated";