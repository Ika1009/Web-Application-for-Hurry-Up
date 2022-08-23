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
        <script src="https://kit.fontawesome.com/a572b64406.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Artikli</title>
        <link href="../../slike/hurryup_logo2.ico" rel="icon">
        <link rel="stylesheet" href="artikli.css">
        <style>
            ::-webkit-scrollbar-track {
                border: 5px solid white;
                border-color: transparent;
                background-color: #f9f9f9;
            }

            ::-webkit-scrollbar {
                width: 15px;
                background-color: #f9f9f9;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #ffb266;
                border-radius: 10px;
            }

            .svi {
                background-color: #ffb266;
                color: #fff;
            }
            
            .hide {
                display: none;
            }
            
            .dropdown-content {
            position: absolute;
            left: -100px;
            background-color: #f1f1f1;
            min-width: 160px;
            max-height: 200px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            }
            
            .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            }
            
            .dropdown a:hover {background-color: #ddd;}
            
            .show {
                display: block;
            }
        </style>

    </head>

    <body>
        <header class="header">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="logo">
                        <img src="../../slike/hurryup_logo2.jpg" width="auto" height="57px">
                    </div>
                    <button type="button" class="nav-toggler">
                        <span></span>
                    </button>
                    <nav class="nav">
                        <ul>
                            <li><a href="../narudzbine/narudzbine.php">Narudžbine</a></li>
                            <li><a class="active" href="artikli.php">Artikli</a></li>
                            <li><a href="../ponuda/ponuda.php">Ponuda</a></li>
                            <li><a href="../nalog/profile.php">Moj nalog</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="divfiltersearch">
            <div class="dropdown">
            <button id="dugfilter" role="button"><i class="fa-solid fa-filter" id="filter"></i></button>
            <div id="myDropdown" class="dropdown-content hide">
            </div> 
            </div>
            
            <form>
                <input class="search" type="text" id="search-item" placeholder="Pretraži" onkeyup="search()" />
            </form>
        </div>
        <button class="dugdodajkategoriju">Izmeni kategorije</button>

        <div class="kategorije" id="category">
            <!-- ovde treba kod da sa ubace sve kategorije -->
        </div>

        <div class="text" id="data">
            <div class="divdugme">
                <button type="dodaj" class="dugmeZaDodavanje" onclick="otvoriPopup('novi_kreiram')">
                    <ion-icon name="add"></ion-icon></i>
                </button>
            </div>
        </div>
        
        <div class="popup-box-container">
            <div class="products-container">
                <button class="btn1"><i class="fa fa-close"></i></button>
                <div class="divokbtn">
                    <input class="ok-btn" type="submit" value="Dodaj" id="dugmedodaj" name="dugmeDodaj">
                    <input class="ok-btn" type="button" value="Izbriši" id="dugmeizbrisi" name="dugmeIzbrisi">
                </div>
            </div>
        </div>

        <div class="popup-box-container2">
            <div class="products-container">
                <button class="btn2"><i class="fa fa-close"></i></button>
                <input class="popuptext1" id=add-box name="dodavanjeBox" placeholder="Ime kategorije">
                <div class="divokbtn2">
                    <input class="ok-btn" type="submit" value="dodaj" id="dodajopciju" name="dodajKategoriju">
                </div>
            </div>
        </div>

        <div class="popup-box-container3">
            <div class="products-container">
                <button class="btn3"><i class="fa fa-close"></i></button>
                <select class="kategorija2 artikl_input_kategorija" name="kategorija" id="kategorije" required>
                    <option class="kategorija-naslov" value="" selected disabled hidden>Izaberi kategoriju</option>
                </select>
                <div class="divokbtn2">
                    <input class="ok-btn" type="button" value="remove" id="rmv">
                </div>
            </div>
        </div>

        <div class="popup-overlay1" id="popup-overlay1">
            <div class="popup" id="popup">
                <button class="btn" onclick="ZatvoriPopUp()"><i class="fa fa-close"></i></button>
                <h3 class="naslov"></h3>
                <div id="signup-form">
                    <form id="artikl_form" class="forma" name="form1" action="" method="post" enctype="multipart/form-data">
                        <div class="fajl">
                            <label for="file" class="upload-label">
                                <ion-icon name="cloud-upload"></ion-icon>
                                <p class="drag_text">Prevuci da otpremiš fajl</p>
                            </label>
                            <input class="file" id="file" type="file" name="file" accept=".png, .jpg, .jpeg">
                        </div>
                        <input class="popuptext artikl_input_id" id="artikl_input_id" type="hidden" name="id" required placeholder="Id Artikla" />
                        <input class="popuptext artikl_input_ime" id="ime" type="text" name="ime" required placeholder="Ime Artikla" />
                        <input class="popuptext artikl_input_cena" id="cena" min="0" type="number" name="cena" required placeholder="Cena  (RSD)" />
                        <input class="popuptext artikl_input_popust" id="popust" type="number" min="0" max="100" name="popust" placeholder="Popust  (%)" />
                        <select class="kategorija artikl_input_kategorija2" name="kategorija" id="kategorije2" required>
                            <option class="kategorija-naslov" value="" selected disabled hidden>Izaberi kategoriju</option>
                        </select><br>
                        <textarea style="resize: none;" class="opis artikl_input_opis" id="opis" type="text" name="opis" placeholder="Opis"></textarea>
                        <button class="submit" type="submit" name="article_add" id="popupDugme" value="add">Dodaj</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="artikliFunctionsJS.js"></script>
        <script>
            let popup = document.getElementById("popup-overlay1");
            let poputp = document.getElementById("popup")

            function otvoriPopup(novi_kreiram) {
                if (novi_kreiram) {
                    document.querySelectorAll(".artikl_input_id")[0].value = '';
                    document.querySelectorAll(".artikl_input_ime")[0].value = '';
                    document.querySelectorAll(".artikl_input_cena")[0].value = '';
                    document.querySelectorAll(".artikl_input_popust")[0].value = '';
                    document.querySelectorAll(".artikl_input_opis")[0].value = '';
                    document.querySelectorAll(".artikl_input_kategorija")[0].value = '';
                }
                popup.classList.add("aktivanpopup");
                poputp.classList.add("otvori-Popup");
            }

            function ZatvoriPopUp() {
                popup.classList.remove("aktivanpopup");
                poputp.classList.add("otvori-Popup");
            }

            const naruci = document.querySelector('.dugdodajkategoriju');
            const btn1 = document.querySelector('.btn1');
            const btn2 = document.querySelector('.btn2');
            const btn3 = document.querySelector('.btn3');
            const popupbox = document.querySelector('.popup-box-container');
            const popupbox2 = document.querySelector('.popup-box-container2');
            const popupbox3 = document.querySelector('.popup-box-container3');

            naruci.addEventListener('click', () => {
                popupbox.classList.add('aktivanpopup');
            });

            btn1.addEventListener('click', () => {
                popupbox.classList.remove('aktivanpopup');
            });

            btn2.addEventListener('click', () => {
                popupbox2.classList.remove('aktivanpopup');
            });

            btn3.addEventListener('click', () => {
                popupbox3.classList.remove('aktivanpopup');
            });

            window.addEventListener("load", event => {
                let image = document.querySelectorAll('img');
                for (let i = 0; i < image.length; i++) {
                    let isLoaded = image[i].complete && image[i].naturalHeight !== 0;
                    if (!isLoaded) {
                        let bezSlike = image[i].parentElement;
                        bezSlike.querySelector('img').style.display = "none";
                    }
                }
            });

            let dodajDugme = document.getElementById('dugmedodaj');
            dodajDugme.addEventListener('click', () => {
                popupbox2.classList.add('aktivanpopup');
            });

            let izbrisiDugme = document.getElementById('dugmeizbrisi');
            izbrisiDugme.addEventListener('click', () => {
                popupbox3.classList.add('aktivanpopup');
            });
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: login.php');
}
