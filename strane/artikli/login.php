<?php
    session_start();
    
    if (!isset($_SESSION['user_pin'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prijava</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; text-align:center;"> 
            <form class="p-5 rounded shadow" action="auth.php" method="post" style="width: 30rem;">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?=htmlspecialchars($_GET['error'])?>
                    </div>
                <?php } ?>
                <i class="bi bi-person-fill" style="font-size: 10rem"></i><br><br>
                <h1 class="text-center display-4" style="margin-top: -50px; font-size: 2rem;"><?=$_SESSION['ime_firme']?></h1> 
                <input type="password" name="pin" class="form-control" placeholder="Pin"></br>      
                <button type="submit" class="btn" style="background-color: #333; color: #ffb266;">OK</button>
            </form>
        </div>
    </body>
</html>
<?php
    } else {
        header('Location: artikli.php');
    }