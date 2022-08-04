<?php
if (isset($_POST['order'])) { 
    include_once("../../db.php");
    $vreme_narucivanja = $_COOKIE['vreme_narucivanja'];
    $konacna_cena = $_COOKIE['narudzbina'];
    $sql = "INSERT INTO `narudzbine` (proizvod, vreme_narucivanja, broj_stola, ime_firme) VALUES ('$konacna_cena', '$vreme_narucivanja', 'qr kod', 'qr kod')";
    if ($conn->query($sql) === TRUE) {
        header('Location: ponuda.php');  
    } else {  
        echo "Greska: " . $sql . "<br>" . $conn->error;  
    }
    $conn->close();  
  }
?> 