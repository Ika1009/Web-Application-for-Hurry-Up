<?php
session_start();
include ('../db.php');

if (isset($_POST['register'])) {  
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $ime_firme= $_POST['ime_firme'];
    $email = $_POST['email'];
    $broj_telefona = $_POST['broj_telefona'];
    $lozinka = $_POST['lozinka'];
    $confirm_password = $_POST['confirm_password'];
    $pin = $_POST['pin'];
    $confirm_pin = $_POST['confirm_pin'];

    $mysql = "SELECT * FROM registracija";
    $gotResuslts = mysqli_query($conn, $mysql);
    $imena_firma = array();
    if ($gotResuslts) {
        if (mysqli_num_rows($gotResuslts) > 0) {
            while ($row = mysqli_fetch_array($gotResuslts)) {
                array_push($imena_firma, $row['ime_firme']);
            }
        }
    }
    
    if (in_array($ime_firme, $imena_firma)) {
        header('Location: registration.php?error=Ime firme već postoji');
    } else if ($confirm_password !== $lozinka) {
        header('Location: registration.php?error=Lozinke se ne poklapaju');
    } else if ($confirm_pin !== $pin) {
        header('Location: registration.php?error=Pinovi se ne poklapaju');
    } else {
        $lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
        $datum_kreiranja = $_COOKIE['createdAt'];

        $stmt=$conn->prepare("INSERT INTO `registracija` (ime, prezime, ime_firme, email, broj_telefona, lozinka, pin, datum_kreiranja) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssss',$ime,$prezime,$ime_firme,$email,$broj_telefona,$lozinka,$pin,$datum_kreiranja);
 
        if ($stmt->execute() === TRUE) {
            header('Location: registration.php?success');  
        } else {  
            echo "Greska: " . $sql . "<br>" . $conn->error;  
        }
    }

    $conn->close();  
  }
?> 