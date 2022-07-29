<?php
session_start();

if (isset($_SESSION['email'])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Narudzbine</title>
        <link rel="stylesheet" href="narudzbine.css">
        <link href="../../slike/hurryup_logo2.ico" rel="icon">
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
                            <li><a class="active" href="../narudzbine/narudzbine.html">Narudzbine</a></li>
                            <li><a href="../artikli/login.php">Artikli</a></li>
                            <li><a href="../ponuda/ponuda.php">Ponuda</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>





        <div class="form-modal">

            <div class="form-toggle">
                <button id="aktivne-toggle" onclick="toggleAktivne()">Aktivne</button>
                <button id="izvrsene-toggle" onclick="toggleIzvrsene()">Izvrsene</button>
                <button id="odbijene-toggle" onclick="toggleOdbijene()"> Odbijene</button>
            </div>
                <div id="divaktivne" class="divaktivne">
                    <div class="content">

                        <div class="container">


                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Broj Stola</th>
                                            <th scope="col">Ukupna Cena</th>
                                            <th scope="col">Vreme narudzbine</th>
                                            <th scope="col">Napomena</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody id="aktivne">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="divizvrsene" class="divizvrsene">
                    <div class="content">

                        <div class="container">


                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Broj Stola</th>
                                            <th scope="col">Ukupna Cena</th>
                                            <th scope="col">Vreme narudzbine</th>
                                            <th scope="col">Napomena</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody id="izvrsene">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="divodbijene" class="divodbijene">

                    <div class="content">

                        <div class="container">


                            <div class="table-responsive">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Broj Stola</th>
                                            <th scope="col">Ukupna Cena</th>
                                            <th scope="col">Vreme narudzbine</th>
                                            <th scope="col">Napomena</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>

                                    <tbody id="odbijene">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            <script src="narudzbine.js"> </script>





            <script>
                function toggleIzvrsene() {
                    document.getElementById("aktivne-toggle").style.backgroundColor = "#f9f9f9";
                    document.getElementById("aktivne-toggle").style.color = "#333";
                    document.getElementById("izvrsene-toggle").style.backgroundColor = "#333";
                    document.getElementById("izvrsene-toggle").style.color = "#ffb266";
                    document.getElementById("odbijene-toggle").style.backgroundColor = "#f9f9f9";
                    document.getElementById("odbijene-toggle").style.color = "#333";
                    document.getElementById("divaktivne").style.display = "none";
                    document.getElementById("divizvrsene").style.display = "block";
                    document.getElementById("divodbijene").style.display = "none";
                }

                function toggleAktivne() {
                    document.getElementById("aktivne-toggle").style.backgroundColor = "#333";
                    document.getElementById("aktivne-toggle").style.color = "#ffb266";
                    document.getElementById("izvrsene-toggle").style.backgroundColor = "#f9f9f9";
                    document.getElementById("izvrsene-toggle").style.color = "#333";
                    document.getElementById("odbijene-toggle").style.backgroundColor = "#f9f9f9";
                    document.getElementById("odbijene-toggle").style.color = "#333";
                    document.getElementById("divaktivne").style.display = "block";
                    document.getElementById("divizvrsene").style.display = "none";
                    document.getElementById("divodbijene").style.display = "none";
                }

                function toggleOdbijene() {
                    document.getElementById("aktivne-toggle").style.backgroundColor = "#f9f9f9";
                    document.getElementById("aktivne-toggle").style.color = "#333";
                    document.getElementById("izvrsene-toggle").style.backgroundColor = "#f9f9f9";
                    document.getElementById("izvrsene-toggle").style.color = "#333";
                    document.getElementById("odbijene-toggle").style.backgroundColor = "#333";
                    document.getElementById("odbijene-toggle").style.color = "#ffb266";
                    document.getElementById("divaktivne").style.display = "none";
                    document.getElementById("divizvrsene").style.display = "none";
                    document.getElementById("divodbijene").style.display = "block";
                }
            </script>
    </body>


    </html>
<?php
} else {
    header('Location: ../../login.php');
}
