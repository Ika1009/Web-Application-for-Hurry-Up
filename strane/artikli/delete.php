<?php

$image_successfuly_deleted = false;
$row_successfully_deleted = false;
            $ime = $_GET['ime'];
            //za brisanje slike iz file system
            $file_pointer = $_GET['slika'];

            if (unlink($file_pointer)) $image_successfuly_deleted = true;

            //brisanje iz baze
            $servername = "localhost";
            $username   = "hurryupr_milos";
            $password   = "miloskralj";
            $dbname     = "hurryupr_database1";
            // Create connection  
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection  
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "DELETE FROM artikli WHERE ime='$ime'"; //kako sad ja da dobijem bas artikl koji se brise 

            if ($conn->query($sql) === TRUE) {
                $row_successfully_deleted = true;
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            $conn->close();

            if($image_successfuly_deleted && $row_successfully_deleted) echo "deleted";

            ?>