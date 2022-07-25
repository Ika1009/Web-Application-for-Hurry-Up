
<?php
if (isset($_REQUEST['addNewCategory'])) {

    include_once("../../../db.php");

    $imeKategorije = $_REQUEST['addNewCategory'];


    $sql = "INSERT INTO `kategorije` (ime_kategorije) VALUES ('$imeKategorije')";
    echo "success";

    if ($conn->query($sql) === FALSE) {
        echo "Greska: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}



?>