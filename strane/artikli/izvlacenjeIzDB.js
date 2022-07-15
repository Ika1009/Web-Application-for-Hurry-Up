let ajax = new XMLHttpRequest();
ajax.open("GET", "data.php", true);
ajax.send();
ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        console.log(data);
        let html = "";
        for (let i = 0; i < data.length; i++) {
            let ime = data[i].ime;
            let cena = data[i].cena;
            let slika = data[i].slika;
            let opis = data[i].opis;
            let popust = data[i].popust;
            let kategorija = data[i].kategorija;
            html += "<tr>";
                html += "<td>" + ime + "</td>";
                html += "<td>" + cena + "</td>";
                html += "<td>" + slika + "</td>";
                html += "<td>" + opis + "</td>";
                html += "<td>" + popust + "</td>";
                html += "<td>" + kategorija + "</td>";
            html += "</tr>";
        }
        document.getElementById("data").innerHTML += html;
    }
};