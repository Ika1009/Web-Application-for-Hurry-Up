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
        <script src="script.js" defer></script>
        <style>
            ul {
                display: block; list-style-type: disc; margin-top: 0em; margin-bottom: 0em; margin-left: 0; margin-right: 0; padding-left: 40px; color: red;
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;"> 
            <form class="p-5 rounded shadow" action="registracija.php" method="post" style="width: 30rem;">
                <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?=htmlspecialchars($_GET['error'])?>
                        </div>
                <?php } ?>
                <div><input id="ime" type="text" name="ime" class="form-control" required placeholder="Ime" /></div><br>
                <div><input id="prezime" type="text" name="prezime" class="form-control" required placeholder="Prezime" /></div><br>
                <div><input id="ime_firme" type="text" name="ime_firme" class="form-control" required placeholder="Ime firme" /></div><br>
                <div><input id="email" type="email" name="email" class="form-control" required placeholder="Email" /></div><br>
                <div><input id="broj_telefona" type="text" name="broj_telefona" class="form-control" placeholder="Broj telefona" /></div><br>
                <div><input id="lozinka" type="password" name="lozinka" class="form-control" required placeholder="Lozinka" /></div><br>
                <div><input id="pin" type="password" name="pin" class="form-control" required placeholder="Pin" /></div><br>
                <button type="submit" name="register" onclick="setCookie()" class="btn" style="background-color: #333; color: #ffb266;">Registruj se</button><br><br>
                <p>Već imate nalog? <a style="text-decoration: none; color: #ffb266;" href="login.php">Prijavite se</a></p>
                <hr />
            </form>
        </div>
    </body>
</html>
<?php
    } else {
        header('Location: index.php');
    }