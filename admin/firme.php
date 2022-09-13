<?php
    session_start();

    include('../db.php');

    if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Statistika</title>
        <link href="../slike/hurryup_logo2.ico" rel="icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="firme.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="firme.js" defer></script>
    </head>
    <body>
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon"></span>
                            <span class="title"><h2><img src="../slike/hurryup_logo2-removebg-preview.png" alt="Logo"></h2></span>
                        </a>
                    </li>
                    <li>
                        <a href="admin.php">
                            <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="icon"><i class="fa fa-pie-chart" aria-hidden="true"></i></span>
                            <span class="title">Statistika</span>
                        </a>
                    </li>
                    <li>
                        <a href="password.php">
                            <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            <span class="title">Promeni lozinku</span>
                        </a>
                    </li>
                    <li>
                        <a href="../prijava/logout.php">
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

                <div class="details">
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Firme</h2>
                        </div>
                        <table>
                            <tbody id="firme">
                                
                            </tbody>
                        </table>
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
