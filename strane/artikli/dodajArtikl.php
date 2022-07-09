<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dodaj Artikal</title>
        <link rel="stylesheet" href="dodajArtikl.css">
        <link href="../../slike/hurryup_logo2.ico" rel="icon">
    </head>
    <body>
        <div id="signup-form">
            <form name="form1" action="" method="post" enctype="multipart/form-data">
                <input id="ime" type="text" name="ime" required placeholder="Ime Artikla" />
                <input id="cena" type="text" name="cena" required placeholder="Cena" />
                <input id="opis" type="text" name="opis" required placeholder="Opis" />
                <button type="submit" name="submit" value="add" class="btn signup">Dodaj Artikal</button>
                <hr />
            </form>
        </div>  



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
