<?php
    session_start();
    include('../../db.php');
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
        <link rel="stylesheet" href="informacije.css">
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="informacije.js" defer></script>
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
                <div class="d-flex justify-content-center align-items-center" style="min-height: 85vh;">
                    <form class="p-5 rounded shadow" action="informacije_db.php" method="POST" enctype="multipart/form-data" style="width: 30rem; background-color: #fff;">
                        <?php
                        $currentUser = $_COOKIE['ime_firme'];
                        $sql = "SELECT * FROM registracija WHERE ime_firme ='$currentUser'";

                        $gotResuslts = mysqli_query($conn, $sql);

                        if ($gotResuslts) {
                            if (mysqli_num_rows($gotResuslts) > 0) {
                                while ($row = mysqli_fetch_array($gotResuslts)) {
                        ?>
                                    <ion-icon name="arrow-back-outline" style="margin-top: -5%; float: left; font-size: 22px; cursor: pointer" class="exit"></ion-icon><br><br>
                                    <?php if (isset($_GET['error'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= "Morate popuniti sva polja!" ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($_GET['success'])) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= "Profil je ažuriran" ?>
                                        </div>
                                    <?php } ?>
                                    <label for="userIme">Ime</label><br><br>
                                    <input type="text" name="userIme" id="ime" class="form-control" value="<?php echo $row['ime']; ?>"><br>
                                    <label for="userPrezime">Prezime</label><br><br>
                                    <input type="text" name="userPrezime" id="prezime" class="form-control" value="<?php echo $row['prezime']; ?>"><br>
                                    <label for="updateUserName">Ime firme</label><br><br>
                                    <input type="text" disabled name="updateUserName" id="ime_firme" class="form-control" value="<?php echo $row['ime_firme']; ?>" style="background: #dddddd;"><br>
                                    <label for="userEmail">Email</label><br><br>
                                    <input type="email" name="userEmail" class="form-control" id="email" value="<?php echo $row['email']; ?>"><br>
                                    <label for="userBrojtelefona">Broj telefona</label><br><br>
                                    <input type="text" name="userBrojtelefona" class="form-control" id="broj_telefona" value="<?php echo $row['broj_telefona']; ?>"><br>
                                    <label for="userPin">Pin</label><br><br>
                                    <input type="password" name="userPin" class="form-control" id="pin" value="<?php echo $row['pin']; ?>"><br><br>
                                    <input type="submit" name="update" id="submit-btn" class="btn2" value="Ažuriraj">
                        <?php
                                }
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    } else {
        header('Location: login.php');
    }
