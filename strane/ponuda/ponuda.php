<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="ponuda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="ponuda.js" defer></script>
    <title>Ponuda</title>
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
                        <li><a href="../artikli/login.php">Artikli</a></li>
                        <li><a class="active" href="../ponuda/ponuda.php">Ponuda</a></li>
                        <li><a href="../nalog/profile.php">Moj nalog</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <form>
        <input class="search" type="text" id="search-item" placeholder="Pretraži" onkeyup="search()" />
    </form>
    <div class="kategorije">
        <!-- ovde treba kod da sa ubace sve kategorije -->
    </div>

    <div class="text" id="data">
        <!-- nalaze se ovde produkti -->
    </div>

    <div class="divdugmenaruci">
        <button class="button-27" role="button">Naruči</button>
    </div>
    <div class="popup-overlay">
        <div class="popup-box-container">
            <div class="cart">
                <h2 class="cart-title">Rezime narudžbine</h2>
                
                <div class="cart-content">
                    <div class="cart-box">
                        <img src="../artikli/artikliSlike/82.jpg" alt="Naravno da nije povezano" class="cart-img">

                        <div class="detail-box">
                            <div class="cart-product-title">Nesto</div>
                            <div class="cart-price">210</div>
                            <input type="number" value="1" class="cart-quantity">
                        </div>

                        <ion-icon name="trash-outline" class="cart-remove"></ion-icon>
                    </div>
                </div>

                <div class="total">
                    <div class="total-title">Ukupno</div>
                    <div class="total-price">0 RSD</div>
                </div>
            </div>
            <button class="ok-btn">
                <span>Potrvdi narudzbinu</span>
            </button>
            </div>
        </div>
    </div>
</body>
</html>