<?php
session_start();
include 'db_conn.php';
if (isset($_POST['ime_firme']) && isset($_POST['lozinka'])) {
    $ime_firme = $_POST['ime_firme'];
    $lozinka = $_POST['lozinka'];

    if (empty($ime_firme)) {
        header('Location: login.php?error=Ime firme je obavezno');
    } else if (empty($lozinka)) {
        header("Location: login.php?error=Lozinka je obavezna&ime_firme=$ime_firme");
    } else {
        $stmt = $conn->prepare("SELECT * FROM registracija WHERE ime_firme=?");
        $stmt->execute([$ime_firme]);
        
        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            $user_email = $user['email'];
            $user_password = $user['lozinka'];
            $user_ime_firme = $user['ime_firme'];

            if ($ime_firme === $user_ime_firme && password_verify($lozinka, $user_password)) {
                $_SESSION['user_email'] = $user_email;
                $_SESSION['user_ime_firme'] = $user_ime_firme;
                header('Location: index.php');
            } else {
                header("Location: login.php?error=Pogresno ime firme ili lozinka&ime_firme=$ime_firme");
            }
        } else {
            header("Location: login.php?error=Pogresno ime firme ili lozinka&ime_firme=$ime_firme");
        }
    }
}