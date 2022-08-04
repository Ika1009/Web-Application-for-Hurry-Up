<?php
session_start();
include('db.php');

if(isset($_POST['update'])){
    $stara_lozinka = $_POST['userPassword'];
    $nova_lozinka = $_POST['userPasswordNew'];
    $potvrdi_novu_lozinku = $_POST['userPasswordNewConfirm'];

    if($nova_lozinka === $potvrdi_novu_lozinku){ 
        $nova_lozinka = password_hash($nova_lozinka, PASSWORD_DEFAULT);
        $potvrdi_novu_lozinku = password_hash($potvrdi_novu_lozinku, PASSWORD_DEFAULT);
        $sql = "UPDATE registracija SET lozinka = '$nova_lozinka' WHERE ime_firme = 'Hurry Up'";
        $results = mysqli_query($conn,$sql);
        header('Location:password.php?success=userUpdated');
        exit;
    } else {
        echo "Sisaj ga milose majmune";
    }}
?>