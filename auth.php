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
        $stmt = $conn->query("SELECT * FROM registracija");
        $rowCount = $stmt->num_rows;
        echo $rowCount;
        if ($rowCount >= 1) {
            $user = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
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