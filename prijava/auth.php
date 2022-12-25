<?php
session_start();
include '../db.php';

if (isset($_POST['ime_firme']) && isset($_POST['lozinka'])) {
    $ime_firme = $_POST['ime_firme'];
    $lozinka = $_POST['lozinka'];

    if (empty($ime_firme)) {
        header('Location: login.php?error=Ime firme je obavezno');
        die();
    } if (empty($lozinka)) {
        header("Location: login.php?error=Lozinka je obavezna&ime_firme=$ime_firme");
        die();
    }

    $stmt=$conn->prepare("SELECT * FROM registracija WHERE ime_firme = ?");
    $stmt->bind_param('s',$ime_firme);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (($result->num_rows !== 1) || !password_verify($lozinka, $row['lozinka'])) {
        header("Location: login.php?error=Pogrešno ime firme ili lozinka&ime_firme=$ime_firme");
        die();
    }
    
    $_SESSION['ime_firme'] = $row['ime_firme'];
    if ($ime_firme == "Hurry Up") {
        $_SESSION['admin'] = $row['ime_firme'];
        header('Location: ../admin/admin.php');
    } else {
        $_SESSION['email'] = $row['email'];
        header("Location: ../strane/narudzbine/narudzbine.php");
    }

}