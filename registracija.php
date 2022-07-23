<?php
session_start();
if (isset($_POST['register'])) {  
    extract($_POST);  
    $servername = "localhost";  
    $username   = "root";  
    $password   = "";  
    $dbname     = "hurryupr_database1";  
    // Create connection  
    $conn = new mysqli($servername, $username, $password, $dbname);  
    // Check connection  
    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    }
    $lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
    $datum_kreiranja = $_COOKIE['createdAt'];
    $sql = "INSERT INTO `registracija` (ime, prezime, ime_firme, email, broj_telefona, lozinka, pin, datum_kreiranja) VALUES ('$ime','$prezime','$ime_firme','$email','$broj_telefona','$lozinka','$pin','$datum_kreiranja')";
    if ($conn->query($sql) === TRUE) {  

    } else {  
        echo "Greska: " . $sql . "<br>" . $conn->error;  
    }
    $conn->close();  
  }
?> 