<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikli</title>
    <link rel="stylesheet" href="artikli.css">
    <link href="../../slike/hurryup_logo2.ico" rel="icon">
    <script src="artikli.js"></script>
</head>
<body>
    <nav>
        <div class="header">
            <a href="../../index.html"><img src="../../slike/hurryup_logo2.jpg" alt="Logo firme"></a>
            <h4 class="pocetna">HurryUp</h4>
        </div>
        <ul class="linkovi">
            <li><a href="../narudzbine/narudzbine.html">Narudzbine</a></li>
            <li><a class="aktivan" href="artikli.html">Artikli</a></li>
            <li><a href="../ponuda/ponuda.html">Ponuda</a></li>
        </ul>
    </nav>
    <div class="text">
        <div class="kutija">
            <button type="dodaj" class="dugmeZaDodavanje" onclick="otvoriPopup()">Dodaj</button>
                <div class="popup" id="popup">
                <h3 class="naslov">Dodaj novi artikal:</h3>
                <div id="signup-form">
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <input class="file" id="file" type="file" name="file" required>
                        <input class="popuptext" id="ime" type="text" name="ime" required placeholder="Ime Artikla" />
                        <input class="popuptext" id="cena" type="text" name="cena" required placeholder="Cena" />
                        <input class="popuptext" id="popust" type="text" name="popust" required placeholder="Popust" />
                        <input class="opis" id="opis" type="text" name="opis" required placeholder="Opis" />
                        <button type="submit" name="submit" value="add"  onclick="ZatvoriPopUp()">Dodaj</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        let popup = document.getElementById("popup");
        function otvoriPopup(){
            popup.classList.add("otvori-Popup");
        }
        function ZatvoriPopUp(){
            popup.classList.remove("otvori-Popup");
        }
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
        $sql = "INSERT INTO `artikli` (ime, cena, slika, opis) VALUES ('$ime','$cena', '', '$opis')";
        if ($conn->query($sql) === FALSE) {  
            echo "Greska: " . $sql . "<br>" . $conn->error;      
        }
        $conn->close();  
    }  
?>
