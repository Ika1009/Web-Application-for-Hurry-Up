<?php
session_start();
if (isset($_POST['order'])) { 
    include_once("../../db.php");
    $vreme_narucivanja = $_COOKIE['vreme_narucivanja'];
    $konacna_cena = $_COOKIE['narudzbina'];
    $detalji = $_COOKIE['detalji'];
    $ime_firme = $_SESSION['ime_firme'];
    $sql = "INSERT INTO `narudzbine` (ukupna_cena, vreme_narucivanja, broj_stola, ime_firme, detalji, napomena) VALUES ('$konacna_cena', '$vreme_narucivanja', 'qr kod', '$ime_firme', '$detalji', 'nema')";
    if ($conn->query($sql) === TRUE) {
        header('Location: ponuda.php');  
    } else {  
        echo "Greska: " . $sql . "<br>" . $conn->error;  
    }
    $conn->close();  
  }
?> 