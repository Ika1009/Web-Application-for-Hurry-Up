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

        .divdugme {
            width: 300px;
            display: flex;
            justify-content: center;
            align-content: center;
            border: solid #ffb266;
            background: #ebebeb;
            border-radius: 0.5em;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            margin-right: 0;
        }








        .text {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(7rem, 14rem));
            gap: 6rem;
            font-family: Arial, Helvetica, sans-serif;
            margin: auto;
            width: 85%;
            margin-top: 5rem;
        }

        .product {
            text-align: left;
            max-height: 100%;
            width: 300px;
            padding: 8px 8px 5px;
            background: #ebebeb;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            outline: .2rem solid #ffb266;
            border-radius: 0.5em;
            margin-left: 0;
        }

        .dugizlaz {
            float: right;
            border: none;
            border-radius: 50%;
            color: #ffb266;
            background: #333;
            padding: 6px 8px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .product:hover .dugizlaz {
            background: black;
        }

        .product img {
            width: 50%;
            height: 35%;
            border-radius: 20%;
            margin-top: 0.8rem;
        }

        .product:hover img {
            transform: scale(1.1);
        }

        .imecenakat {
            float: right;
            margin-left: 3%;
            width: 45%;
            height: 35%;
            margin-top: 0.5rem;
        }



        .product h3 {
            padding: .5rem 0;
            font-size: 1.2rem;
            color: #333;
        }

        .price {
            font-size: 1rem;
            color: #333;
        }

        .cat {
            padding: .5rem 0;
        }

        .disc {
            display: flex;
            margin-top: 0.5rem;
            margin-left: 1.5rem;
            padding: .5rem 0;
            font-size: 1.2rem;
            background: #ffb266;
            justify-content: center;
            align-content: center;
            width: 30%;
            color: #333;
            border-radius: 1rem;
            font-weight: bold;
        }

        .desc {
            padding: .5rem 0;
            margin-top: 0.5rem;
            height: 33%;
            font-size: 0.9rem;
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

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
        }

        .container {
            max-width: 100%;
            margin-right: 4%;
            margin-left: 8%;
            background-color: #333;
            min-height: 8vh;
            font-family: Arial, Helvetica, sans-serif;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        /*header*/
        .header {
            padding: 12px 0;
            line-height: normal;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header .logo,
        .header .nav {
            padding: 0 15px;
        }

        .header .logo a {
            font-size: 40px;
            color: #ffb266;
            text-transform: capitalize;
        }

        .header .nav ul li {
            display: inline-block;
            margin-left: 100px;
        }

        .header .nav ul li a {
            display: block;
            font-size: 30px;
            line-height: 2;
            text-transform: capitalize;
            color: #ebebeb;
            padding: 10px 0;
            transition: all 0.5s ease;
        }

        .header .nav ul li a.active,
        .header .nav ul li a:hover {
            color: #ffb266;
        }

        .nav-toggler {
            height: 34px;
            width: 44px;
            color: #ffb266;
            background-color: #ffb266;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            display: none;
            margin-right: 15px;
        }

        .nav-toggler:focus {
            outline: none;
            box-shadow: 0 0 15px black;
        }

        .nav-toggler span {
            height: 2px;
            width: 20px;
            background-color: #333;
            display: block;
            margin: auto;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-toggler.active span {
            background-color: transparent;
        }

        .nav-toggler span::before,
        .nav-toggler span::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #333;
            transition: all 0.3s ease;
        }

        .nav-toggler span::before {
            transform: translateY(-6px);
        }

        .nav-toggler.active span::before {
            transform: rotate(45deg);
        }

        .nav-toggler span::after {
            transform: translateY(6px);
        }

        .nav-toggler.active span::after {
            transform: rotate(135deg);
        }

        @media(max-width:991px) {
            .nav-toggler {
                display: block;
            }

            .header .nav {
                width: 100%;
                padding: 0;
                max-height: 0px;
                overflow: hidden;
                visibility: hidden;
                transition: all 0.5s ease;
            }

            .header .nav.open {
                visibility: visible;
            }

            .header .nav ul {
                padding: 12px 15px 0;
                margin-top: 12px;
                border-top: 1px solid rgba(255, 255, 255, 0.2);
            }

            .header .nav ul li {
                display: block;
                margin: 0;
            }
        }
    </style>
    <link href="../../slike/hurryup_logo2.ico" rel="icon">
    <script src="artikli.js"></script>
    <script>
        function setCookie() {
            let date = new Date();
            let brojac = 1;
            date.setTime(date.getTime() + (60 * 60 * 1000));
            let expires = "expires=" + date.toUTCString();
            let cname = "brojac";
            document.cookie = cname + "=" + brojac + ";" + expires;
        }

        function getCookie() {
            let cname = "brojac";
            let name = cname + "=";
            let ca = document.cookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) === 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        let session = getCookie();

        if (session === "") {
            let pin = prompt("Unesite pin:");
            if (pin === "") {
                alert("Neispravan unos! Pokusajte ponovo!");
                location.reload();
            } else if (pin === null) {
                location.href = "https://hurryup.rs/dashboard"
            } else if (pin.length !== 4) {
                alert("Pin mora biti cetvorocifren");
                location.reload();
            } else {
                setCookie();
            }
        }
    </script>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="logo">
                    <a href="#">Hurry Up</a>
                </div>
                <button type="button" class="nav-toggler">
                    <span></span>
                </button>
                <nav class="nav">
                    <ul>
                        <li><a href="../narudzbine/narudzbine.html">Narudzbine</a></li>
                        <li><a class="active" href="artikli.html">Artikli</a></li>
                        <li><a href="../ponuda/ponuda.html">Ponuda</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <input class="search" type="text" id="search-item" placeholder="Pretraži" onkeyup="search()">
    <div class="text" id="data">
        <div class="divdugme">
            <button type="dodaj" class="dugmeZaDodavanje" onclick="otvoriPopup()">
                <ion-icon name="add"></ion-icon></i>
            </button>
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
            const storeitems = document.getElementById("data");
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

        const navToggler = document.querySelector(".nav-toggler");
        navToggler.addEventListener("click", navToggle);

        function navToggle() {
            navToggler.classList.toggle("active");
            const nav = document.querySelector(".nav");
            nav.classList.toggle("open");
            if (nav.classList.contains("open")) {
                nav.style.maxHeight = nav.scrollHeight + "px";
            } else {
                nav.removeAttribute("style");
            }
        }
    </script>
    <script async>
        // dupli kod zato sto cpanel smara
        let ajax = new XMLHttpRequest();
        ajax.open("GET", "data.php", true);
        ajax.send();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                console.log(data);
                let html = "";
                for (let i = 0; i < data.length; i++) {
                    let ime = data[i].ime;
                    let cena = data[i].cena;
                    let slika = data[i].slika;
                    let opis = data[i].opis;
                    let popust = data[i].popust;
                    let kategorija = data[i].kategorija;
                    html += "<div class=product name="+ime+">";
                    html += "<button class=dugizlaz  name=" + ime + " onClick =" + onClickDugmeZaBrisanje(this.ime) + "><ion-icon class=izlaz name=close-outline></ion-icon></button><br><br>"
                    html += "<img src=" + slika + " name="+ime+">";
                    html += "<div class=imecenakat name="+ime+">"
                    html += "<h3 name="+ime+">" + ime + "</h3>" ;
                    html += "<div class=price name="+ime+">" + cena + "</div>";
                    html += "<p class=cat name="+ime+">" + kategorija + "</p>";
                    html += "</div>"
                    html += "<div class=disc name="+ime+">" + popust + "</div>";
                    html += "<p class=desc name="+ime+">" + opis + "</p>";
                    html += "</div>";
                }
                document.getElementsById("data").innerHTML += html;
            }
        };
    </script>

    <script>
        function onClickDugmeZaBrisanje(ime) {
            // let dugme = document.getElementById(dugme_id);
            // let elementos = dugme.closest(h1); // zavisi od imena artikla, dal je h1, h2...
            kveri = document.getElementsByName(ime);
            kveri.foreach(element =>{
                element.parentNode.removeChild(element);a
            })
        }
    </script>

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
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
?>
        <script type="text/javascript">
            alert("Fajl nije slika!");
        </script>
    <?php
        // echo "Fajl nije slika!";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    ?>
        <script type="text/javascript">
            alert("Fajl već postoji!");
        </script>
    <?php
        // echo "Fajl vec postoji.";
        $uploadOk = 0;
    }

    // Check file size
    if ($slikaVelicina > 5000000) { // 5MB
    ?>
        <script type="text/javascript">
            alert("Fajl je prevelik. Ne sme biti veci od 5 MB.");
        </script>
    <?php
        // echo "Fajl je prevelik. Ne sme biti veci od 500 KB.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    ) {
    ?>
        <script type="text/javascript">
            alert("Dozvoljeni formati su samo PNG, JPG i JPEG");
        </script>
    <?php
        // echo "Dozvoljeni formati su samo PNG, JPG i JPEG";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    ?>
        <script type="text/javascript">
            alert("Došlo je do greške, fajl nije otpremljen.");
        </script>
        <?php
        // echo "Doslo je do greske, fajl nije otpremljen.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        ?>
            <script type="text/javascript">
                alert("Fajl je uspešno otpremljen!");
            </script>
        <?php
            // echo "Fajl " . htmlspecialchars(basename($_FILES["file"]["name"])) . " je otpremljen.";
        } else {
        ?>
            <script type="text/javascript">
                alert("Došlo je do greške, fajl nije otpremljen.");
            </script>
        <?php
            // echo "Doslo je do greske, fajl nije otpremljen.";
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