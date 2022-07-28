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

    <div class="text">
       
        <div class="divaktivne">
            <h3>aktivne</h3>
            <div id="aktivne" class="aktivne">

            </div>
        </div>
        
        <div class="divizvrsene" id="izvrsene">
            <h3>izvrsene</h3>
            <div id="izvrsene" class="izvrsene">

            </div>
        </div>
        
        <div class="divodbijene" id="odbijene">
            <h3>odbijene</h3>
            <div id="odbijene" class="odbijene">

            </div>
        </div>
    </div>


    <script src="narudzbine.js"> </script>
</body>


</html>
<?php
    } else {
        header('Location: ../../login.php');
    }