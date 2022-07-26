<?php

include_once("../../../db.php");

$sql = "UPDATE `artikli` SET `ime`=\"$ime\", `cena`=\"$cena\", `opis`=\"$opis\", `popust`=\"$popust\", `kategorija`=\"$kategorija\", `slika`=\"$slikaEkstenzija\" WHERE `id`= " . $_REQUEST['id'];

if ($conn->query($sql) === TRUE) {
    $row_successfully_updated = true;
}
else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();

if ($row_successfully_updated)
    echo "deleted";