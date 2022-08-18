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
    <script src="https://kit.fontawesome.com/a572b64406.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="ponuda.js" defer></script>
    <title>Ponuda</title>
    <link href="../../slike/hurryup_logo2.ico" rel="icon">
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
                        <li><a href="../artikli/login.php">Artikli</a></li>
                        <li><a class="active" href="../ponuda/ponuda.php">Ponuda</a></li>
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

    <div class="form-modal">
        <div class="text" id="data">
            <!-- nalaze se ovde produkti -->
        </div>
    </div>


    <div class="divdugmenaruci" id="sakrij" hidden>
        <button class="button-27" role="button">Naruči za <span>0</span></button>
    </div>
    <div class="popup-overlay">
        <div class="popup-box-container">
            <div class="cart">
                <ion-icon name="close-outline" class="exit"></ion-icon><br>
                <h2 class="cart-title">Rezime narudžbine</h2>

                <div class="wrapper">
                    <div class="cart-content">
                        <div class="cart-box">
                            <img hidden class="cart-img">
                            <div class="detail-box">
                                <div hidden class="cart-product-title"></div>
                                <div hidden class="cart-price">0</div>
                                <input hidden type="number" min="0" value="1" class="cart-quantity" font-family="Roobert, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="ok2-btn">Napomena</button>

                <div class="popup-box-container2">
                <ion-icon name="arrow-back-outline" class="exit2"></ion-icon><br>
                    <textarea style="resize: none;" class="napomena2" id="napomena" type="text" name="napomena" placeholder="Napomena"></textarea>
                </div>

                <div class="total">
                    <div class="total-title">Ukupno:</div>
                    <div class="total-price" id="ukupno">0 RSD</div>
                </div>
            </div>
            <form action="narudzbina.php" method="post">
                <button type="submit" name="order" onclick="setCookie()" class="ok-btn">Potrvdi narudžbinu</button>
            </form>
        </div>
    </div>
    </div>
    
</body>

</html>