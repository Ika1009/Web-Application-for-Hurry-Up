let ajax = new XMLHttpRequest();
ajax.open("GET", "./APIs/data.php", true);
ajax.send();
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        console.log(data);
        for (let i = 0; i < data.length; i++) {
            let html = "";
            let id = data[i].id;
            let proizvod = data[i].proizvod;
            let vreme_narucivanja = data[i].vreme_narucivanja;
            let broj_stola = data[i].broj_stola;
            let status = data[i].status;
            html += "<tr>";
            html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
            html += "<td>" + proizvod + "</td>";
            html += "<td>" + vreme_narucivanja + "</td>";
            html += "<td>" + broj_stola + "</td>";
            html += "<td>" + status + "</td>";

            if (status == "aktivna") {
                html += "<button onclick=izvrsiNarudzbinu(this)>STIK</button>";
                html += "<button>X</button>";
                html += "</tr>";
                document.getElementById("aktivne").innerHTML += html;
            } else if (status == "odbijena") {
                html += "</tr>";
                document.getElementById("odbijene").innerHTML += html;
            } else {
                html += "</tr>";
                document.getElementById("izvrsene").innerHTML += html;
            }

        }

    }
};
function izvrsiNarudzbinu(element) {
    /*let nastavitiProvera = confirm("Jel ste sigurni da želite da obrišete ovaj artikal?");
    console.log(nastavitiProvera); // OK = true, Cancel = false
    if (nastavitiProvera == false) {
        return;
    }*/

    let elementos = element.closest('#aktivne');
    let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
    let id = elementos.getElementsByClassName('id_artikla')[0].getAttribute("data-id");

    let slika = elementos.getElementsByTagName('img')[0].getAttribute("src");
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/delete.php?id=" + id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "deleted") {
                elementos.remove();
            }
        }
    };

}

function izvrsiNarudzbinu(element) {
    /*let nastavitiProvera = confirm("Jel ste sigurni da želite da obrišete ovaj artikal?");
    console.log(nastavitiProvera); // OK = true, Cancel = false
    if (nastavitiProvera == false) {
        return;
    }*/

    let elementos = element.closest('#aktivne');
    let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
    let id = elementos.getElementsByClassName('id_artikla')[0].getAttribute("data-id");

    let slika = elementos.getElementsByTagName('img')[0].getAttribute("src");
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/delete.php?id=" + id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "deleted") {
                elementos.remove();
            }
        }
    };

}
