<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hurry up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="prijava.css" rel="stylesheet" />
    <script src="script.js" defer></script>
</head>
<body>
    <div class="form-modal">
        <div class="form-toggle">
            <button id="login-toggle" onclick="toggleLogin()">Prijavi se</button>
            <button id="signup-toggle" onclick="toggleSignup()">Registruj se</button>
        </div>
        <div id="login-form">
            <form>
                <input type="text" placeholder="Ime firme" required/>
                <div><input id="password" name="password" type="password" placeholder="Lozinka" required/></div>
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <button type="submit" class="btn login">Prijavi se</button>
                <p><a href="javascript:void(0)">Zaboravili ste lozinku?</a></p>
                <hr />
            </form>
        </div>
        <div id="signup-form">
            <form name="form1" action="registracija.php" method="post" enctype="multipart/form-data">
                <div><input id="ime" type="text" name="ime" required placeholder="Ime" /></div>
                <div><input id="prezime" type="text" name="prezime" required placeholder="Prezime" /></div>
                <div><input id="ime_firme" type="text" name="ime_firme" required placeholder="Ime firme" /></div>
                <div><input id="email" type="email" name="email" required placeholder="Email" /></div>
                <div><input id="broj_telefona" type="text" name="broj_telefona" placeholder="Broj telefona" /></div>
                <div><input id="lozinka" type="password" name="lozinka" required placeholder="Lozinka" /></div>
                <i style="position: absolute; left: 90%; top: 63.3%; transform: translateX(-10%) translateY(-50%);" class="bi bi-eye-slash" id="togglepassword"></i>
                <div><input id="pin" type="password" name="pin" required placeholder="Pin" /></div>
                <button type="submit" name="register" value="add" onclick="setCookie()" class="btn signup">Kreiraj nalog</button>
                <p>Registrovanjem na sajt se slažete sa našim <a target="_blank" href="uslovi_koriscenja.html">uslovima korišćenja</a>.</p>
                <hr />
            </form>
        </div>
    </div>
</body>
</html>