<?php
    session_start();
    include('db.php');

    if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div align="center">
        <hr>
            <h3>Update User Information</h3>
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
                                                <input type="text" name="updateUserName" class="form-control" value="<?php echo $row['ime_firme']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="userEmail" class="form-control" value="<?php echo $row['email']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="update"  class="btn btn-info" value="Update">
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
        header('Location: login.php');
    }