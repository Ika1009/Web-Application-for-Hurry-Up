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
            color: #ffb266;
            padding: 12px 16px;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background-color: black;
        }

        .fajl {
            margin-top: 0.6em;
            float: left;
            position: relative;
            width: 45%;
            font-size: 1em;
            background-color: #ebebeb;
            height: 250px;
            border-radius: 20px;
        }

        .file {
            position: absolute;
            right: 0px;
            width: 100%;
            height: 250px;
            background-color: red;
            opacity: 0;
            z-index: 5;
        }

        .upload-label {
            position: absolute;
            width: 100%;
            height: 250px;
            border: 1px dashed #333;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-content: center;
            flex-direction: column;
        }

        .upload-label>ion-icon {
            margin: 5px auto;
            color: #333;
            font-size: 50px;
        }

        .drag-text {
            color: #6d6d6d;
            font-weight: bold;
            font-size: 1em;
        }

        .choose-file {
            margin: 30px auto;
            width: 100px;
            height: 37px;
            border: none;
            color: #ffb266;
            background-color: #333;
            border-radius: 13px;
            font-weight: bold;
            pointer-events: none;
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

        .kategorija {
            float: right;
            width: 51%;
            text-align: left;
            cursor: pointer;
            position: relative;
            width: 51%;
            height: 40px;
            margin-top: 0.6em;
            margin-bottom: 0.6em;
            border: none;
            border-radius: 20px;
            background: #ebebeb;
            outline: none;
            transition: 0.4s;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
            font-weight: bold;
            font-size: 1em;
            padding: 0;
            color: #6d6d6d;
        }

        .optgroup {
            color: #333;
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
            color: #ffb266;
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

        .search {
            display: flex;
            margin-top: 1rem;
            margin-right: auto;
            margin-left: auto;
            padding: 15px;
            height: 50px;
            width: 400px;
            border-radius: 15px;
            border-color: #ffb266;
            background-color: #333;
            font-size: 22px;
            font-style: italic;
            color: #FFB266;
        }

        .dugmeZaDodavanje {
            width: 100px;
            height: 100px;
            background-color: #333;
            border-radius: 50%;
            color: #ffb266;
            font-size: 100px;
            border: 0;
            outline: none;
            cursor: pointer;
            margin: 4rem;
        }

        .dugmeZaDodavanje:hover {
            background-color: black;
        }

        .text {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(10rem, 15rem));
            gap: 4rem;
            font-family: Arial, Helvetica, sans-serif;
            margin: auto;
            width: 70%;
            margin-top: 5rem;
        }

        .product {
            text-align: center;
            justify-content: center;
            padding: 3rem 2rem;
            background: #ebebeb;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            outline: .2rem solid #ffb266;
            border-radius: 0.5em;
        }


        .divdugme {
            display: flex;
            justify-content: center;
            align-content: center;
            border: solid #ffb266;
            background: #ebebeb;
            border-radius: 0.5em;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
        }

        .product h3 {
            padding: .5rem 0;
            font-size: 1.5rem;
            color: #333;
        }

        .price {
            font-size: 1rem;
            color: #333;
        }

        .product img {
            height: 5rem;
            border-radius: 0.5em;
            display: fill;
        }

        .product:hover img {
            transform: scale(1.1);
        }

        .popuptext:hover {
            transform: scale(1.05);
        }

        .opis:hover {
            transform: scale(1.05);
        }

        .kategorija:hover {
            transform: scale(1.05);
        }

        .fajl:hover {
            transform: scale(1.05);
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
    <input class="search" type="text" id="search-item" placeholder="Pretraži" onkeyup="search()">
    <div class="text" id="product-list">
        <div class="divdugme">
            <button type="dodaj" class="dugmeZaDodavanje" onclick="otvoriPopup()">
                <ion-icon name="add"></ion-icon></i>
            </button>
        </div>
        <div class="product">
            <img src="../../slike/caesar_salata.jpg" alt="">
            <h3>O moja muda</h3>
            <div class="price">neporcenjivo</div>
        </div>

    </div>

    <div class="popup" id="popup">
        <button class="btn" onclick="ZatvoriPopUp()"><i class="fa fa-close"></i></button>
        <h3 class="naslov">Dodaj novi artikal:</h3>
        <div id="signup-form">
            <form class="forma" name="form1" action="" method="post" enctype="multipart/form-data">
                <div class="fajl">
                    <input class="file" id="file" type="file" name="file">
                    <label for="file" class="upload-label">
                        <ion-icon name="cloud-upload"></ion-icon>
                        <p class="drag_text"> Prevuci da otpremis fajl</p>
                        <button class="choose-file">Izaberi Fajl</button>
                    </label>
                </div>
                <input class="popuptext" id="ime" type="text" name="ime" required placeholder="Ime Artikla" />
                <input class="popuptext" id="cena" type="text" name="cena" required placeholder="Cena" />
                <input class="popuptext" id="popust" type="text" name="popust" required placeholder="Popust" />
                <select class="kategorija" name="kategorija" id="kategorija" required>
                    <option class="kategorija-naslov" value="none" selected disabled hidden>Izaberi kategoriju
                    </option>
                    <optgroup label="Hrana">
                        <option value="burger">Burgeri</option>
                        <option value="pica">Pice</option>
                        <option value="pasta">Paste</option>
                        <option value="gotova_jela">Gotova jela</option>
                    </optgroup>
                    <optgroup label="Piće">
                        <option value="sok">Sokovi</option>
                        <option value="tople_kafe">Tople kafe</option>
                        <option value="hladne_kafe">Hladne kafe</option>
                    </optgroup>
                    <optgroup label="Ostalo">
                        <option value="nesto">Dodajte ne znam</option>
                    </optgroup>
                </select>
                <textarea style="resize: none;" class="opis" id="opis" type="text" name="opis" placeholder="Opis"></textarea>
                <button class="submit" type="submit" name="submit" value="add" onclick="ZatvoriPopUp()">Dodaj</button>
            </form>
        </div>
    </div>
    <script>
        const search = () => {
            const searchbox = document.getElementById("search-item").value.toUpperCase();
            const storeitems = document.getElementById("product-list");
            const product = document.querySelectorAll(".product");
            const productname = storeitems.getElementsByTagName("h3");

            for (let i = 0; i < productname.length; i++) {
                let match = product[i].getElementsByTagName("h3")[0];

                if (match) {
                    let textvalue = match.textContent || match.innerHTML

                    if (textvalue.toUpperCase().indexOf(searchbox) > -1) {
                        product[i].style.display = "";
                    } else {
                        product[i].style.display = "none";
                    }
                }
            }
        }




        let popup = document.getElementById("popup");

        function otvoriPopup() {
            popup.classList.add("otvori-Popup");
        }

        function ZatvoriPopUp() {
            popup.classList.remove("otvori-Popup");
        }
    </script>
    <script src="izvlacenjeIzDB.js"> </script>


    <div class="text" id=>
        <table class="tabelaArtikli" id="data">
            <style type="text/css">
                td {
                    padding: 0 15px;
                }
            </style>
            <tr>
                <th>Ime </th>
                <th>Cena </th>
                <th>Slika </th>
                <th>Opis </th>
                <th>Kategorija </th>
                <th>Opis </th>
            </tr>
            <tbody id="data">
                <style type="text/css">
                    td {
                        padding: 0 15px;
                    }
                </style>
            </tbody>
        </table>
    </div>

</body>


</html>

<?php
      //dodavanje u bazu 
      if (isset($_POST['submit'])) {
        extract($_POST);

        // daje podatke slike
        $slika = $_FILES['file'];
        $slikaIme = $_FILES['file']['name'];
        $slikaVelicina = $_FILES['file']['size'];
        $slikaError = $_FILES['file']['error'];
        $slikaTip = $_FILES['file']['type'];
        // $dozvoljeni = array('jpg', 'jpeg', 'png'); // dozvoljeni tipovi slike

        $target_dir = "";
        $target_file = $target_dir . basename($slikaIme);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["file"]["tmp_name"]); 
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Fajl nije slika!";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Fajl vec postoji.";
            $uploadOk = 0;
        }

        // Check file size
        if ($slikaVelicina > 500000) {
            echo "Fajl je prevelik. Ne sme biti veci od 500 KB.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        ) {
            echo "Dozvoljeni formati su samo PNG, JPG i JPEG";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Doslo je do greske, fajl nije otpremljen.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "Fajl " . htmlspecialchars(basename($_FILES["file"]["name"])) . " je otpremljen.";
            } else {
                echo "Doslo je do greske, fajl nije otpremljen.";
            }

        $path = realpath($slikaIme); // uzima path do slike
        echo $path; // nadams se da radi
        
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

        $sql = "INSERT INTO `artikli` (ime, cena, slika, opis, popust, kategorija) VALUES ('$ime','$cena', '$slikaIme', '$opis', '$popust', '$kategorija')";

        if ($conn->query($sql) === FALSE) {
            echo "Greska: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    ?>
        <script type="text/javascript">
            //location.reload(); // ide u loop (mozda problem zato sto dugme ostane upaljeno ? )
        </script>
<?php

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

        $sql = "DELETE FROM artikli WHERE /*hmmmmm zajebano u picku materinu"; //kako sad ja da dobijem bas artikl koji se brise 
    
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }  
?>