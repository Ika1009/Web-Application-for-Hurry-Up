<?php
session_start();
include('db.php');

if(isset($_POST['update'])){
    
    $userNewName = $_POST['updateUserName'];
    $userNewEmail = $_POST['userEmail'];

    if(!empty($userNewName) && !empty($userNewEmail)){ 
        $loggedInUser = $_SESSION['ime_firme'];
        $sql = "UPDATE registracija SET ime_firme = '$userNewName', email ='$userNewEmail' WHERE ime_firme = '$loggedInUser'";
        $results = mysqli_query($conn,$sql);
        $_SESSION['ime_firme'] = $userNewName;
        header('Location:profile.php?success=userUpdated');
        exit;
    }} else if (empty($userNewEmail) || empty($userNewName)) {
        header('Location:profile.php?error=emptyNameAndEmail');
        exit; 
    }
?>