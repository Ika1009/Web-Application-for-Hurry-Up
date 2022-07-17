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
    
    <link rel="stylesheet" href="./style.css">
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
                    <input class="file" id="file" type="file" name="file">
                    <label for="file" class="upload-label">
                        <ion-icon name="cloud-upload"></ion-icon>
                        <p class="drag_text"> Prevuci da otpremis fajl</p>
                        <button class="choose-file">Izaberi Fajl</button>
                    </label>
                </div>
                <input class="popuptext artikl_input_id" id="artikl_input_id" type="hidden" name="id" required placeholder="Id Artikla" />
                <input class="popuptext artikl_input_ime" id="ime" type="text" name="ime" required placeholder="Ime Artikla" />
                <input class="popuptext artikl_input_cena" id="cena" type="text" name="cena" required placeholder="Cena" />
                <input class="popuptext artikl_input_popust" id="popust" type="text" name="popust" required placeholder="Popust" />
                <select class="kategorija artikl_input_kategorija" name="kategorija" id="kategorija" required>
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
                <textarea style="resize: none;" class="opis artikl_input_opis" id="opis" type="text" name="opis" placeholder="Opis"></textarea>
                <button class="submit" type="submit" name="submit" id="popupDugme" value="add" onclick="ZatvoriPopUp()">Dodaj</button>
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

        function otvoriPopup(novi_kreiram) {
            if(novi_kreiram){
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
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=dugmeZaMenjanje(this)></ion-icon><br><br>"
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)></ion-icon><br><br>"
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<img src=artikliSlike/" + id + "." + slika + ">";
                    html += "<div class=imecenakat>"
                    html += "<h3>" + ime + "</h3>";
                    html += "<div class=price>" + cena + "</div>";
                    html += "<p class=cat>" + kategorija + "</p>";
                    html += "</div>"
                    html += "<div class=disc>" + popust + "</div>";
                    html += "<p class=desc>" + opis + "</p>";
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
            document.querySelectorAll(".artikl_input_cena")[0].value = cena;
            document.querySelectorAll(".artikl_input_popust")[0].value = popust;
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
        if($_GET['id'] && strlen($_GET['id']) > 0){
            //$sql = "INSERT INTO `artikli` (ime, cena, slika, opis, popust, kategorija) VALUES ('$ime','$cena', '$slikaEkstenzija', '$opis', '$popust', '$kategorija')";
        }
        else {
            $sql = "INSERT INTO `artikli` (ime, cena, slika, opis, popust, kategorija) VALUES ('$ime','$cena', '$slikaEkstenzija', '$opis', '$popust', '$kategorija')";
        }
        
        if ($conn->query($sql) === FALSE) {
            echo "Greska: " . $sql . "<br>" . $conn->error;
        }
        
        if($_GET['id'] && strlen($_GET['id']) > 0 && $slikaVelicina != 0){
            $mask = 'artikliSlike/'.$_GET['id'].'.*';
            array_map('unlink', glob($mask));
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
            $conn->close();
            $path = realpath($slikaIme); // uzima path do slike
            echo $path; // nadams se da radi
        ?>
        <script type="text/javascript">
            //location.reload(); // ide u loop (mozda problem zato sto dugme ostane upaljeno ? )
        </script>
<?php

    }
}
