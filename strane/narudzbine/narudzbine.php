

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
    <nav>
        <div class="header">
            <a href="../../index.html"><img src="../../slike/hurryup_logo2.jpg" alt="Logo firme"></a>
            <h4 class="pocetna">HurryUp</h4>
        </div>
        <ul class="linkovi">
            <li><a class="aktivan" href="narudzbine.html">Narudzbine</a></li>
            <li><a href="../artikli/artikli.php">Artikli</a></li>
            <li><a href="../ponuda/ponuda.php">Ponuda</a></li>
        </ul>
    </nav>
    <div class="text">
            <table class="tabelaArtikli">
                <style type="text/css">
                    td {
                      padding: 0 15px;
                    }
                  </style>
                <th>Id     </th>
                <th>Ime proizvoda    </th>
                <th>Vreme Narucivanja   </th>
                <th> Broj Stola  </th>
                <th> Status </th>
                </tr>
                <tbody id="data" >
                    <style type="text/css">
                        td {
                          padding: 0 25px;
                        }
                      </style>
                </tbody>
            </table>
        </div>

    <script>
        // dupli kod zato sto cpanel smara
        let ajax = new XMLHttpRequest();
        ajax.open("GET", "data.php", true);
        ajax.send();
        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                console.log(data);
                let html = "";
                for (let i = 0; i < data.length; i++) {
                    let id = data[i].id;
                    let proizvod = data[i].proizvod;
                    let vreme_narucivanja = data[i].vreme_narucivanja;
                    let broj_stola = data[i].broj_stola;
                    let status = data[i].status;
                    html += "<tr>";
                    html += "<td>" + id + "</td>";
                    html += "<td>" + proizvod + "</td>";
                    html += "<td>" + vreme_narucivanja + "</td>";
                    html += "<td>" + broj_stola + "</td>";
                    html += "<td>" + status + "</td>";
                    html += "</tr>";
                }
                document.getElementById("data").innerHTML += html;
            }
        };
        </script>
</body>


</html>