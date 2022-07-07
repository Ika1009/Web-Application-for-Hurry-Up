<?php  

if (isset($_POST['submit'])) {  
    extract($_POST);  
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
    $sql = "INSERT INTO `artikli` (ime, cena, slika, opis) VALUES ('$ime','$cena','$slika','$opis')";
    if ($conn->query($sql) === FALSE) {  
        echo "Greska: " . $sql . "<br>" . $conn->error;      
    }
    $conn->close();  
}  

?>