<?php
    session_start();

    if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link href="../../slike/hurryup_logo2.ico" rel="icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="statistika.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="statistika.js" defer></script>
    </head>
    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon"></span>
                            <span class="title"><h2><img src="../../slike/hurryup_logo2-removebg-preview.png" alt="Logo"></h2></span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin.php">
                            <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="../firme.php">
                            <span class="icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></span>
                            <span class="title">Statistika</span>
                        </a>
                    </li>
                    <li>
                        <a href="../password.php">
                            <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <span class="title">Promeni lozinku</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../prijava/logout.php">
                            <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                            <span class="title">Odjavi se</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu()"></div>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Pretraži">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </label>
                    </div>
                </div>
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers" id="broj_artikala"></div>
                            <div class="cardName">Broj artikala</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers" id="broj_narudzbina"></div>
                            <div class="cardName">Broj narudžbina</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers" id="broj_izvrsenih"></div>
                            <div class="cardName">Broj izvršenih narudžbina</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers" id="ukupan_profit"></div>
                            <div class="cardName">Ukupan profit</div>
                        </div>
                        <div class="iconBox">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    } else {
        header('Location: login.php');
    }
