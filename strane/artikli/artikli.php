<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artikli</title>
        <link rel="stylesheet" href="artikli.css">
        <link href="../../slike/hurryup_logo2.ico" rel="icon">
        <style type="text/css">
            #popupbox{
                margin: 0; 
                margin-left: 40%; 
                margin-right: 40%;
                margin-top: 50px; 
                padding-top: 10px; 
                width: 20%; 
                height: 250px; 
                position: absolute; 
                background: #FBFBF0; 
                border: solid #000000 2px; 
                z-index: 9; 
                font-family: arial; 
                visibility: hidden; 
            }
            </style>
            <script language="JavaScript" type="text/javascript">
            function login(showhide){
                if(showhide == "show"){
                    document.getElementById('popupbox').style.visibility="visible";
                }else if(showhide == "hide"){
                    document.getElementById('popupbox').style.visibility="hidden"; 
                }
            }
        </script>
    </head>
    <body>
        <nav>
            <div class="header">
                <a href="../../index.html"><img src="../../slike/hurryup_logo2.jpg" alt="Logo firme"></a>
                <h4 class="pocetna">HurryUp</h4>
            </div>
            <ul class="linkovi">
                <li><a href="../narudzbine/narudzbine.html">Narudzbine</a></li>
                <li><a class="aktivan" href="artikli.html">Artikli</a></li>
                <li><a href="../ponuda/ponuda.html">Ponuda</a></li>
            </ul>
        </nav>
        <div class="text">
            <table class="tabelaArtikli">
                <style type="text/css">
                    td {
                      padding: 0 15px;
                    }
                  </style>
                <th>Ime     </th>
                <th>Cena    </th>
                <th>Slika   </th>
                <th>Opis    </th>
                </tr>
                <tbody id="data" >
                    <style type="text/css">
                        td {
                          padding: 0 15px;
                        }
                      </style>
                </tbody>
            </table>
            
            <script src="izvlacenjeIzDB.js"> </script>
        </div>
        <a href="javascript:login('show');">
            <div class="plusDugme" onclick="plusButtonClick"> + </div>
        </a>    
        <div id="popupbox"> 
            <form name="login" action="" method="post" enctype="multipart/form-data">
                <center>Ime Artikla:</center>
                <center><input name="ime" size="14" id="ime"/></center>
                <center>Cena Artikla:</center>
                <center><input name="cena" size="14" id="cena"/></center>
                <center>Cena Artikla:</center>
                <center><input name="opis" size="14" id="opis" /></center>
            </form>
            <br />
            <center><a href="javascript:login('hide');">zatvori</a></center> 
        </div> 
            
    </body>
</html>
<?php
    if (isset($_POST['submit'])) {  
        extract($_POST);  
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
        $sql = "INSERT INTO `artikli` (ime, cena, opis) VALUES ('$ime','$cena','$opis')";
        if ($conn->query($sql) === FALSE) {  
            echo "Greska: " . $sql . "<br>" . $conn->error;      
        }
        $conn->close();  
    }  
?>