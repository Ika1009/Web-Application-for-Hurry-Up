
<?php
if (isset($_REQUEST['addNewCategory'])) {

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

    $imeKategorije = $_REQUEST['addNewCategory'];


    $sql = "INSERT INTO `kategorije` (ime_kategorije) VALUES ('$imeKategorije')";
    echo "success";

    if ($conn->query($sql) === FALSE) {
        echo "Greska: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}



?>