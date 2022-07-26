<?php
    session_start();

    if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pocetna</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;"> 
            <i class="bi bi-person-fill" style="font-size: 14rem"></i>
            <h1 class="text-center display-4" style="margin-top: -50px; font-size: 2rem;"><?=$_SESSION['ime_firme']?></h1>
            <a href="logout.php" class="btn btn-warning">Odjava</a>
        </div>
    </body>
</html>
<?php
    } else {
        header('Location: login.php');
    }
