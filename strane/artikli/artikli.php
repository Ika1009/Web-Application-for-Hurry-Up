<?php
session_start();

if (isset($_SESSION['user_pin'])) {
?>
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
        <link rel="stylesheet" href="artikli.css">

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
                            <li><a href="../nalog/profile.php">Moj nalog</a></li>
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
                    <form id="artikl_form" class="forma" name="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="fajl">
                            <input class="file" id="file" type="file" name="file" accept=".png, .jpg, .jpeg" required>
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
                        <input class="popuptext artikl_input_cena" id="cena" min="0" type="number" name="cena" required placeholder="Cena  (RSD)" />
                        <input class="popuptext artikl_input_popust" id="popust" type="number" min="0" name="popust" required placeholder="Popust  (%)" />
                        <select class="kategorija artikl_input_kategorija" name="kategorija" id="kategorije" required>
                            <option class="kategorija-naslov" value="" selected disabled hidden>Izaberi kategoriju</option>
                        </select><br>
                        <input id=add-box name="dodavanjeBox">
                        <input type="submit" value="dodaj" id="dodajopciju" name="dodajKategoriju">
                        <input type="button" value="remove" id="rmv">
                        <textarea style="resize: none;" class="opis artikl_input_opis" id="opis" type="text" name="opis" placeholder="Opis"></textarea>
                        <button class="submit" type="submit" name="article_add" id="popupDugme" value="add">Dodaj</button>
                    </form>
                </div>
            </div>
        <script src="artikliJS.js"></script>
        <script src="artikliFunctionsJS.js"></script>
    </body>

    </html>
<?php
} else {
    header('Location: login.php');
}
