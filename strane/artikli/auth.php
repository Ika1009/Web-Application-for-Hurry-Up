<?php
session_start();
include '../../db_conn.php';
if (isset($_POST['pin'])) {
    $pin = $_POST['pin'];
    $ime_firme = $_SESSION['user_ime_firme'];
    
    if (empty($pin)) {
        header('Location: login.php?error=Pin je obavezan');
    } else {
        $stmt = $conn->prepare("SELECT * FROM registracija WHERE ime_firme=?");
        $stmt->execute([$ime_firme]);
        
        if ($stmt->rowCount() === 1) {
            $user = $stmt->fetch();
            $user_pin = $user['pin'];

            if ($pin === $user_pin) {
                $_SESSION['user_pin'] = $user_pin;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (0.1 * 60);
                header('Location: artikli.php');
            } else {
                header("Location: login.php?error=Pogresan pin&ime_firme=$ime_firme");
            }
        } else {
            header("Location: login.php?error=Pogresan pin&ime_firme=$ime_firme");
        }
    }
}