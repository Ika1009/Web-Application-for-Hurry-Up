<?php
session_start();
include('../../db.php');

if(isset($_POST['update'])){
    $userNewIme = $_POST['userIme'];
    $userNewPrezime = $_POST['userPrezime']; 
    $userNewEmail = $_POST['userEmail'];
    $userNewBrojTelefona = $_POST['userBrojtelefona'];
    $userNewPin = $_POST['userPin'];

    if(!empty($userNewEmail) && !empty($userNewIme) && !empty($userNewPrezime) && !empty($userNewPin) && !empty($userNewBrojTelefona) && strlen($userNewPin) === 4){ 
        $loggedInUser = $_COOKIE['ime_firme'];
        $sql = "UPDATE registracija SET ime_firme = '$loggedInUser', email ='$userNewEmail', ime = '$userNewIme', prezime = '$userNewPrezime', broj_telefona = '$userNewBrojTelefona', pin = '$userNewPin' WHERE ime_firme = '$loggedInUser'";
        $results = mysqli_query($conn,$sql);
        header('Location:info.php?success=userUpdated');
        exit;
    } else {
        header('Location:info.php?error=emptyNameAndEmail');
        exit;
    }}
?>