<?php
    session_start();

    if (!isset($_SESSION['user_email'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prijava</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;"> 
            <form class="p-5 rounded shadow" action="auth.php" method="post" style="width: 30rem;">
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?=htmlspecialchars($_GET['error'])?>
                    </div>
                <?php } ?>
                <input type="text" name="ime_firme" value="<?php if (isset($_GET['ime_firme']))echo(htmlspecialchars($_GET['ime_firme'])) ?>" class="form-control" aria-describedby="emailHelp" placeholder="Ime firme"><br>  
                <input type="password" name="lozinka" class="form-control" placeholder="Lozinka"></br>      
                <button type="submit" class="btn" style="background-color: #333; color: #ffb266;">Prijavi se</button><br><br>
                <p>Nemate nalog? <a style="text-decoration: none; color: #ffb266;" href="registration.php">Registrujte se</a></p>
            </form>
        </div>
    </body>
</html>
<?php
    } else {
        header('Location: index.php');
    }