

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Artikli</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        .text {
            display: flex;
            font-family: Arial, Helvetica, sans-serif;
            align-items: center;
            justify-content: left;
            margin: auto;
            max-width: 70%;
            max-height: 100%;
        }

        .dugmeZaDodavanje {
            width: 50px;
            height: 50px;
            justify-items: center;
            background-color: #333;
            border-radius: 50%;
            color: #ffb266;
            font-size: 50px;
            border: 0;
            outline: none;
            cursor: pointer;
            margin-top: 0.6em;
            margin-bottom: 0.6em;
        }
        .dugmeZaDodavanje:hover {
            background-color: black;
        }

        .naslov {
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            font-weight: bold;
        }

        .btn {
            float: right;
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            margin-right: auto;
            background-color: #333;
            border: none;
            border-radius: 50%;
            color: #f9f9f9;
            padding: 12px 16px;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background-color: black;
        }

        .file {
            float: left;
            position: relative;
            width: 40%;
            font-size: 1em;
            padding: 1.2em 1.7em 1.2em 1.7em;
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            border-radius: 20px;
            border: none;
            font-weight: bold;
            transition: 0.4s;
        }

        .popuptext {
            float: right;
            position: relative;
            width: 51%;
            height: 40px;
            font-size: 1em;
            padding: 1.2em 1.7em 1.2em 1.7em;
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            border-radius: 20px;
            border: none;
            background: #ebebeb;
            outline: none;
            font-weight: bold;
            transition: 0.4s;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        .opis {
            position: relative;
            width: 100%;
            height: 150px;
            font-size: 1.4em;
            padding: 1.2em 1.7em 1.2em 1.7em;
            margin-top: 2em;
            border-radius: 20px;
            border: none;
            background: #ebebeb;
            outline: none;
            font-weight: bold;
            transition: 0.4s;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        .popup input:focus,
        .popup input:active {
            transform: scaleX(1.02);
        }

        .opis::-webkit-input-placeholder {
            vertical-align: top;
        }


        .popup {
            text-align: center;
            padding: 0 15px 15px;
            width: 500px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
            background-color: #FFB266;
            border-radius: 6px;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.1);
            color: #333;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }

        .otvori-Popup {
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
        }

        .submit {
            width: 100%;
            margin-top: 50px;
            padding: 10px 0;
            background-color: #333;
            color: #f9f9f9;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }
        .submit:hover {
            background-color: black;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            min-height: 8vh;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .linkovi {
            display: flex;
            justify-content: space-around;
            width: 30%;
        }

        .linkovi li {
            list-style: none;
        }

        .header {
            color: #ffb266;
            letter-spacing: 5px;
            font-size: 20px;
        }

        .linkovi a {
            color: #ffb266;
            text-decoration: none;
            letter-spacing: 3px;
            font-weight: bold;
            font-size: 14px;
            padding: 14px 16px;
        }

        .linkovi li a.hover:not(.aktivan) {
            background-color: #ffb266;
        }

        .linkovi li a.aktivan {
            background-color: #f9f9f9;
            color: #333;
            font-weight: bolder;
        }

        img {
            width: 100px;
            height: 70px;
        }

        .pocetna {
            float: right;
            padding-top: 30px;
        }
    </style>
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
            <button type="dodaj" class="dugmeZaDodavanje" onclick="otvoriPopup()"><ion-icon name="add"></ion-icon></i></button>
            <div class="popup" id="popup">
                <button class="btn" onclick="ZatvoriPopUp()"><i class="fa fa-close"></i></button>
                <h3 class="naslov">Dodaj novi artikal:</h3>
                <div id="signup-form">
                    <form name="form1" action="" method="post" enctype="multipart/form-data">
                        <input class="file" id="file" type="file" name="file" required>
                        <input class="popuptext" id="ime" type="text" name="ime" required placeholder="Ime Artikla" />
                        <input class="popuptext" id="cena" type="text" name="cena" required placeholder="Cena" />
                        <input class="popuptext" id="popust" type="text" name="popust" required placeholder="Popust" />
                        
                        <textarea style="resize: none;" class="opis" id="opis" type="text" name="opis" placeholder="Opis"></textarea>
                        <button class="submit" type="submit" name="submit" value="add" onclick="ZatvoriPopUp()">Dodaj</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        let popup = document.getElementById("popup");
        function otvoriPopup() {
            popup.classList.add("otvori-Popup");
        }
        function ZatvoriPopUp() {
            popup.classList.remove("otvori-Popup");
        }
    </script>
</body>


</html>

<?php
    //dodavanje u bazu 
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

        // daje podatke slike
        $slika = $_FILES['file'];
        $slikaIme = $_FILES['file']['name'];
        $slikaVelicina = $_FILES['file']['size'];
        $slikaError = $_FILES['file']['error'];
        $slikaTip = $_FILES['file']['type'];
        $slikaZaUbacivanje = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        
        $slikaEkstNiz = explode('.', $slikaIme);
        $slikaEkstenzija = strtolower(end($slikaEkstNiz));  // daje ekstenziju fajla
        
        $dozvoljeni = array('jpg', 'jpeg', 'png'); // dozvoljeni tipovi slike

        if (in_array($slikaEkstenzija, $dozvoljeni)) {
            if($slikaError === 0)
            {
                if($slikaVelicina < 1000000){ // promenjivo - sad je manje od 1MB
                    
                    $sql = "INSERT INTO `artikli` (ime, cena, slika, opis) VALUES ('$ime','$cena', '$slikaZaUbacivanje', '$opis')";
                    if ($conn->query($sql) === FALSE) {  
                        echo "Greska: " . $sql . "<br>" . $conn->error;      
                    }
                    
                    $conn->close(); 
                    
                    /*
                    ?>
                    <script type="text/javascript"> location.reload(); </script>
                    <?php
                    */
                } 
                else{
                    echo "Fajl ne sme biti veci od 1MB";
                } 

            } 
            else {
                echo "BIlo je gresaka tokom otpremanja fajla";
            }
        } 
        else {
            echo "Ne moze se ubaciti fajlovi ovog tipa!";
        }

    }

    //brisanje iz baze
    if (isset($_POST['dugmeZaBrisanje'])) {  
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
        
        $sql = "DELETE FROM artikli WHERE /*hmmmmm zajebano u picku materinu*/"; //kako sad ja da dobijem bas artikl koji se brise 

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();  
    }
    //menjanje iz baze
    //ne treba nego ce samo kad se napravi nova proslu ce obrisemo i tolko


?>