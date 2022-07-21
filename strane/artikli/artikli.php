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
    <link href="../../slike/hurryup_logo2.ico" rel="icon">

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
            margin-top: 2rem;
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
            margin-top: 1em;
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
            width: 30%;
            border-radius: 15px;
            border-color: #ffb266;
            background-color: #333;
            font-size: 22px;
            font-style: italic;
            color: #FFB266;
        }

        .dugmeZaDodavanje {
            display: flex;
            width: 100%;
            background-color: #333;
            border-radius: 50%;
            color: #ffb266;
            font-size: 100px;
            border: 0;
            outline: none;
            cursor: pointer;
            margin: 50%;
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
            margin-top: 3.5rem;
        }

        .product {
            justify-content: center;
            text-align: center;
            max-height: 400px;
            width: 300px;
            background: #ffb266;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            outline: .2rem solid #ffb266;
            border-radius: 0.5em;
            margin-left: 0rem;
            height: 400px;
        }

        .divdugizlaz {
            position: relative;
            width: 100%;
            height: 230px;
        }

        .dugedit {
            position: absolute;
            top: 8%;
            left: 80%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            border: none;
            border-radius: 50%;
            color: #ffb266;
            background: #333;
            padding: 6px 8px;
            font-size: 17px;
            cursor: pointer;
        }

        .dugizlaz {
            position: absolute;
            top: 8%;
            left: 92%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            border: none;
            border-radius: 50%;
            color: #ffb266;
            background: #333;
            padding: 6px 8px;
            font-size: 17px;
            cursor: pointer;
        }

        .product:hover .dugizlaz {
            background: black;
        }

        .product img {
            width: 100%;
            height: 100%;
            border-radius: 0.5rem;
        }

        .product:hover img {
            transform: scale(1.05);
        }

        .imecenakat {
            padding: 8px;
            text-align: left;
        }


        .disc {
            margin-top: 0.5rem;
            text-align: center;
            font-size: 1rem;
            background: #ffb266;
            width: 15%;
            color: #333;
            border: .1rem solid #333;
            border-radius: 0.6rem;
            font-weight: bold;
            box-shadow: 0 .3rem 1rem rgba(0, 0, 0, .1);
            margin-bottom: 0.2rem;
        }

        .product h3 {
            font-size: 1.5rem;
            color: black;
        }


        .cat {
            color: #ebebeb;
            font-size: 0.8rem;
            font-weight: bold;
            font-style: italic;
        }

        .divcena {
            text-align: center;
            align-content: center;
            display: flex;
        }

        .price {
            font-size: 1.5rem;
            color: #333;
            font-weight: bold;
        }

        .priceprecrtano {
            font-size: 1.1rem;
            color: #6d6d6d;
            margin-left: 0.2rem;
            text-decoration: line-through;
        }


        .desc {
            margin-top: 0.5rem;
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
            margin-right: 8%;
            margin-left: 10%;
            background-color: #333;
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
            font-size: 30px;
            color: #ffb266;
            text-transform: capitalize;
        }

        .header .nav ul li {
            display: inline-block;
            margin-left: 100px;
        }

        .header .nav ul li a {
            display: block;
            font-size: 20px;
            line-height: 1;
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
    <script>
        // za cetvorocifreni PIN
        function setCookie(staJeUKeks) {
            let date = new Date();
            let brojac = staJeUKeks;
            date.setTime(date.getTime() + (60 * 60 * 1000));
            let expires = "expires=" + date.toUTCString();
            let cname = "brojac";
            document.cookie = cname + "=" + brojac + ";" + expires;
        }

        function getCookie(imeVarijable) {
            let cname = imeVarijable;
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

        let session = getCookie("brojac");

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
                setCookie(1);
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
                        <li><a href="../narudzbine/narudzbine.php">Narudzbine</a></li>
                        <li><a class="active" href="artikli.php">Artikli</a></li>
                        <li><a href="../ponuda/ponuda.php">Ponuda</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <input class="search" type="text" id="search-item" placeholder="Pretraži" onkeyup="search()">
    <div class="text" id="data">
        <div class="divdugme">
            <button type="dodaj" class="dugmeZaDodavanje" onclick="otvoriPopup('novi_kreiram')">
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
                    <input class="file" id="file" type="file" name="file" multiple>
                    <label for="file" class="upload-label">
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <ion-icon name="cloud-upload"></ion-icon>
                        <p class="drag_text"> Prevuci da otpremis fajl</p>
                        <button class="choose-file">Izaberi Fajl</button>
                    </label>
                </div>
                <input class="popuptext artikl_input_id" id="artikl_input_id" type="hidden" name="id" required placeholder="Id Artikla" />
                <input class="popuptext artikl_input_ime" id="ime" type="text" name="ime" required placeholder="Ime Artikla" />
                <input class="popuptext artikl_input_cena" id="cena" min="0" type="number" name="cena" required placeholder="Cena" />
                <input class="popuptext artikl_input_popust" id="popust" type="number" min="0" name="popust" required placeholder="Popust" />
                <select class="kategorija artikl_input_kategorija" name="kategorija" id="kategorija" required>
                    <option class="kategorija-naslov" value="none" selected disabled hidden>Izaberi kategoriju</option>
                    <option value="burger">Burgeri</option>
                    <option value="pica">Pice</option>
                    <option value="pasta">Paste</option>
                    <option value="gotova_jela">Gotova jela</option>
                    <option value="sok">Sokovi</option>
                    <option value="tople_kafe">Tople kafe</option>
                    <option value="hladne_kafe">Hladne kafe</option>
                    <option value="nesto">Dodajte ne znam</option>
                </select><br>
                <input id=add-box>
                <input type="button" value="dodaj" id="dodajopciju" onclick="add()">
                <input type="button" value="remove" id="rmv" onclick="remove()">
                <textarea style="resize: none;" class="opis artikl_input_opis" id="opis" type="text" name="opis" placeholder="Opis"></textarea>
                <button class="submit" type="submit" name="submit" id="popupDugme" value="add" onclick="proveriSve()">Dodaj</button>
            </form>
        </div>
    </div>

    <script>
        function remove() {
            var x = document.getElementById("kategorija");
            x.remove(x.selectedIndex);
        }

        function add() {
            var txt = document.getElementById("add-box");
            var x = document.getElementById("kategorija");
            var option = document.createElement("option");
            option.text = txt.value;
            x.add(option);
        }
        
    </script>
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

        function otvoriPopup(novi_kreiram) {
            if (novi_kreiram) {
                document.querySelectorAll(".artikl_input_id")[0].value = '';
                document.querySelectorAll(".artikl_input_ime")[0].value = '';
                document.querySelectorAll(".artikl_input_cena")[0].value = '';
                document.querySelectorAll(".artikl_input_popust")[0].value = '';
                document.querySelectorAll(".artikl_input_opis")[0].value = '';
                document.querySelectorAll(".artikl_input_kategorija")[0].value = '';
            }
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
    <script>
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
                    let id = data[i].id;
                    let ime = data[i].ime;
                    let cena = data[i].cena;
                    let slika = data[i].slika;
                    let opis = data[i].opis;
                    let popust = data[i].popust;
                    let kategorija = data[i].kategorija;
                    html += "<div class=product>";
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<div class=divdugizlaz>";
                    html += "<img src=artikliSlike/" + id + "." + slika + ">";
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>";
                    html += "<ion-icon class=dugedit name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>";
                    html += "</div>";
                    html += "<div class=imecenakat>"
                    if (popust != '/') {
                        html += "<div class=disc>" + popust + "%</div>";
                    } else {
                        html += "<div class=disc>" + popust + "%</div>";

                    }
                    html += "<h3>" + ime + "</h3>";
                    html += "<p class=cat>" + kategorija + "</p>";
                    if (popust != '/') {
                        html += "<div class=divcena>"
                        html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                        html += "<div class=priceprecrtano>" + cena + "RSD</div>"; // precrtaj
                        html += "</div>"
                    } else {
                        html += "<div class=price>" + cena + "RSD</div>";
                    }
                    html += "<p class=desc>" + opis + "</p>";
                    html += "</div>"
                    html += "</div>";
                }
                document.getElementById("data").innerHTML += html;
            }
        };
    </script>

    <script>
        // za brisanje
        function onClickDugmeZaBrisanje(element) {
            let nastavitiProvera = confirm("Jel ste sigurni da želite da obrišete ovaj artikal?");
            console.log(nastavitiProvera); // OK = true, Cancel = false
            if (nastavitiProvera == false) {
                return;
            }

            //cookie
            let elementos = element.closest('.product');
            let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
            let id = elementos.getElementsByClassName('id_artikla')[0].getAttribute("data-id");

            let slika = elementos.getElementsByTagName('img')[0].getAttribute("src");
            //let popUpDugme = document.getElementById();
            let ajax = new XMLHttpRequest();
            ajax.open("GET", "delete.php?id=" + id, true);
            ajax.send();
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let data = this.responseText;
                    if (data == "deleted") {
                        elementos.remove();
                    }
                }
            };

            //setCookie(elementos.textContent);
            //console.log(elementos.textContent);

            console.log("kliknuto dugme");


        }
    </script>

    <script>
        // za menjanje
        function dugmeZaMenjanje(element) {

            let elementos = element.closest('.product');

            let id = elementos.getElementsByClassName('id_artikla')[0].getAttribute("data-id");
            let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
            let slika = elementos.getElementsByTagName('img')[0].getAttribute("src");
            let cena = elementos.getElementsByClassName('price')[0].innerHTML;
            let popust = elementos.getElementsByClassName('disc')[0].innerHTML;
            let opis = elementos.getElementsByClassName('desc')[0].innerHTML;

            document.querySelectorAll(".artikl_input_id")[0].value = id;
            document.querySelectorAll(".artikl_input_ime")[0].value = ime;
            document.querySelectorAll(".artikl_input_cena")[0].value = parseInt(cena);
            document.querySelectorAll(".artikl_input_popust")[0].value = parseInt(popust);
            document.querySelectorAll(".artikl_input_opis")[0].value = opis;
            //document.querySelectorAll(".artikl_input_kategorija")[0].value = kategorija;

            otvoriPopup();


            console.log("kliknuto dugme");
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
    $slikaEkstenzija = substr($slikaIme, strrpos($slikaIme, '.') + 1);
    // $dozvoljeni = array('jpg', 'jpeg', 'png'); // dozvoljeni tipovi slike

    $target_dir = "";
    $target_file = $target_dir . basename($slikaIme);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    /*
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
    }*/
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

        if ($_REQUEST['id'] && strlen($_REQUEST['id']) > 0) { // proverava dal updajtuje ili pravi novi
            // UPDATE `artikli` SET `ime`="Coca Cola",`cena`="108",`opis`="U limenci",`popust`="10",`kategorija`="burger" WHERE `id`= 102
            if($slikaVelicina != 0){ 
                $sql = "UPDATE `artikli` SET `ime`=\"$ime\", `cena`=\"$cena\", `opis`=\"$opis\", `popust`=\"$popust\", `kategorija`=\"$kategorija\", `slika`=\"$slikaEkstenzija\" WHERE `id`= " . $_REQUEST['id'];
            }
            else{
                $sql = "UPDATE `artikli` SET `ime`=\"$ime\", `cena`=\"$cena\", `opis`=\"$opis\", `popust`=\"$popust\", `kategorija`=\"$kategorija\" WHERE `id`= " . $_REQUEST['id'];
            }
            
            if ($_REQUEST['id'] && strlen($_REQUEST['id']) > 0 && $slikaVelicina != 0) {
                $mask = 'artikliSlike/' . $_REQUEST['id'] . '.*';
                array_map('unlink', glob($mask));
            }

            if (move_uploaded_file($_FILES["file"]["tmp_name"], "artikliSlike/" . $_REQUEST['id'] . "." . $slikaEkstenzija)) {
                ?>
                    <script type="text/javascript">
                        alert("Fajl je uspešno otpremljen!");
                    </script>
                <?php
                    // echo "Fajl " . htmlspecialchars(basename($_FILES["file"]["name"])) . " je otpremljen.";
                } 
        } else {

            $sql = "INSERT INTO `artikli` (ime, cena, slika, opis, popust, kategorija) VALUES ('$ime','$cena', '$slikaEkstenzija', '$opis', '$popust', '$kategorija')";
        
            if ($conn->query($sql) === FALSE) {
                echo "Greska: " . $sql . "<br>" . $conn->error;
            }

            if (move_uploaded_file($_FILES["file"]["tmp_name"], "artikliSlike/" . $conn->insert_id . "." . $slikaEkstenzija)) {
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
        }

        $conn->close();
        //$path = realpath($slikaIme); // uzima path do slike
        //echo $path; // nadams se da radi
        ?>
        <script type="text/javascript">
            //location.reload(); // ide u loop (mozda problem zato sto dugme ostane upaljeno ? )
        </script>
<?php

    }
}
