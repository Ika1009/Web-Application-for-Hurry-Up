<?php
if (isset($_POST['register'])) {  
    extract($_POST);  
    include_once("db.php");
    $lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
    $datum_kreiranja = $_COOKIE['createdAt'];
    $sql = "INSERT INTO `registracija` (ime, prezime, ime_firme, email, broj_telefona, lozinka, pin, datum_kreiranja) VALUES ('$ime','$prezime','$ime_firme','$email','$broj_telefona','$lozinka','$pin','$datum_kreiranja')";
    if ($conn->query($sql) === TRUE) {
        echo "Uspesno ste se registrovali!";  
    } else {  
        echo "Greska: " . $sql . "<br>" . $conn->error;  
    }
    $conn->close();  
  }
?> 