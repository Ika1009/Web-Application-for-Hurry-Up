<?php
    session_start();
    include('../../db.php');

    if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                            <li><a href="../artikli/artikli.php">Artikli</a></li>
                            <li><a href="../ponuda/ponuda.php">Ponuda</a></li>
                            <li><a class="active" href="../nalog/profile.php">Moj nalog</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div style="align-items: center;">
        <hr>
            <h3 style="text-align: center;">Izmenite profil</h3>
        <hr>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <?php
                    if(isset($_GET['success'])){
                        if($_GET['success'] == 'userUpdated'){
                            ?>
                            <small class="alert alert-success"> User updated Successfully</small>
                            <hr>
                            <?php
                        }
                    }

                    if(isset($_GET['error'])){

                        if($_GET['error'] == 'emptyNameAndEmail'){
                            ?>
                            <small class="alert alert-danger"> Name and email is required</small>
                            <hr>
                            <?php
                        }
                    }
                    ?>
                    <form action="profile_db.php" method="POST" enctype="multipart/form-data">
                        <?php
                            $currentUser = $_SESSION['ime_firme'];
                            $sql = "SELECT * FROM registracija WHERE ime_firme ='$currentUser'";

                            $gotResuslts = mysqli_query($conn, $sql);

                            if($gotResuslts){
                                if(mysqli_num_rows($gotResuslts)>0){
                                    while($row = mysqli_fetch_array($gotResuslts)){
                                        ?>
                                            <div class="form-group">
                                                <label for="userIme">Ime</label>
                                                <input type="text" name="userIme" class="form-control" value="<?php echo $row['ime']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="userPrezime">Prezime</label>
                                                <input type="text" name="userPrezime" class="form-control" value="<?php echo $row['prezime']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="updateUserName">Ime firme</label>
                                                <input type="text" name="updateUserName" class="form-control" value="<?php echo $row['ime_firme']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="userEmail">Email</label>
                                                <input type="email" name="userEmail" class="form-control" value="<?php echo $row['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="userBrojtelefona">Broj telefona</label>
                                                <input type="text" name="userBrojtelefona" class="form-control" value="<?php echo $row['broj_telefona']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="userPin">Pin</label>
                                                <input type="text" name="userPin" class="form-control" value="<?php echo $row['pin']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="update" class="btn btn-info" value="Update">
                                            </div>
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
        header('Location: ../../login.php');
    }