<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hurry up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="style.css" rel="stylesheet" />
    <style>
        .g-recaptcha {
            display: flex;
            justify-content: center;
            margin-top: 0.6em;
            margin-bottom: 0.6em;
        }
        
        .form-modal form i {
            margin-top: 1.44em;
            left: 90%;
            cursor: pointer;
        }
    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div class="form-modal">

        <div class="form-toggle">
            <button id="login-toggle" onclick="toggleLogin()">Prijavi se</button>
            <button id="signup-toggle" onclick="toggleSignup()">Registruj se</button>
        </div>

        <div id="login-form">
            <form>
                <input type="text" placeholder="Email ili korisnicko ime" />
                <input id="password" type="password" name="password" placeholder="Lozinka" />
                <i class="bi bi-eye-slash" id="togglePassword"></i>
                <button type="button" class="btn login">Prijavi se</button>
                <p><a href="javascript:void(0)">Zaboravili ste lozinku?</a></p>
                <hr />

            </form>
        </div>

        <div id="signup-form">
            <form name="form1" action="" method="post" enctype="multipart/form-data">
                <input id="ime" type="text" name="ime" required placeholder="Ime" />
                <input id="prezime" type="text" name="prezime" required placeholder="Prezime" />
                <input id="ime_firme" type="text" name="ime_firme" required placeholder="Ime firme" />
                <input id="email" type="email" name="email" required placeholder="Email" />
                <input id="broj_telefona" type="text" name="broj_telefona" placeholder="Broj telefona" />
                <input id="lozinka" type="password" name="lozinka" required placeholder="Lozinka" />
                <input id="pin" type="password" name="pin" required placeholder="Pin" />
                <div class="g-recaptcha" data-sitekey="6LdmfMUgAAAAAP-sdISKb56HDx07YOXSvpRGTlo9"></div>
                <button type="submit" name="submit" value="add" class="btn signup">Kreiraj nalog</button>
                <p>Registrovanjem na sajt se slažete sa našim <a target="_blank" href="uslovi_koriscenja.html">uslovima korišćenja</a>.</p>
                <hr />
                
            </form>
        </div>

    </div>

    <script src="script.js"></script>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
            
        });
        
        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
        
        function proveriVreme(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        
        function vreme() {
            let date = new Date();
            let sati = date.getHours();
            let minuti = date.getMinutes();
            let sekunde = date.getSeconds();
            let dan = date.getDate();
            let mesec = date.getMonth();
            let godina = date.getFullYear();
            sati = proveriVreme(sati);
            minuti = proveriVreme(minuti);
            sekunde = proveriVreme(sekunde);
            dan = proveriVreme(dan);
            mesec = proveriVreme(mesec);
            godina = proveriVreme(godina);
            return (dan + "/" + mesec + "/" + godina + " " + sati + ":" + minuti + ':' + sekunde);
        }
        createdAt = vreme();
        console.log(createdAt);
        document.cookie='createdAt = 1';
    </script>
</body>
</html>
<?php  
if (isset($_POST['submit'])) {  
    extract($_POST);  
    $servername = "localhost";  
    $username   = "hurryupr_milos";  
    $password   = "miloskralj";  
    $dbname     = "hurryupr_database1";  
    // Create connection  
    $conn = new mysqli($servername, $username, $password, $dbname);  
    // Check connection  
    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    }
    $lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
    $datum_kreiranja = $_COOKIE['createdAt'];
    $sql = "INSERT INTO `registracija` (ime, prezime, ime_firme, email, broj_telefona, lozinka, pin, datum_kreiranja) VALUES ('$ime','$prezime','$ime_firme','$email','$broj_telefona','$lozinka','$pin','$datum_kreiranja')";
    if ($conn->query($sql) === TRUE) {  ?>
        <script type="text/javascript"> window.location = "http://www.hurryup.rs/dashboard"; </script> <?php
    } else {  
        echo "Greska: " . $sql . "<br>" . $conn->error;  
    }
    $conn->close();  
}  
?> 