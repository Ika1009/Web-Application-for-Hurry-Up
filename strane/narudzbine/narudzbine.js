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
            let ukupna_cena = data[i].ukupna_cena;
            let vreme_narucivanja = data[i].vreme_narucivanja;
            let broj_stola = data[i].broj_stola;
            let status = data[i].status;
            let detalji = data[i].detalji;
            let napomena = data[i].napomena;
            html += "<tr scope=row>";
            html += "<input class=\"id_reda\" data-id=\"" + id + "\" type=\"hidden\">";
            html += "<td>" + broj_stola + "</td>";
            html += "<td>" + ukupna_cena + "</td> <!--ukupna cena-->";
            html += "<td>" + vreme_narucivanja + "</td>";
            html += "<td><small class=d-block>" + napomena + "</small></td>"
            html += "<td><button id=a class=more onclick=otvoriPopup(this)>detalji</button></td>"
            if (status == "aktivna") {
                html += "<td>"
                html += "<ion-icon class=stik name=checkmark-outline onclick=izvrsiNarudzbinu(this)></ion-icon>";
                html += "<ion-icon class=x name=remove-circle-outline onclick=odbijNarudzbinu(this)></ion-icon>";
                html += "</td>"
                html += "</tr>"
                document.getElementById("aktivne").innerHTML += html;
            } else if (status == "odbijena") {
                html += "</tr>"
                document.getElementById("odbijene").innerHTML += html;
            } else {
                html += "</tr>"
                document.getElementById("izvrsene").innerHTML += html;
            }

        }

    }
};

function addToTable() {
    output.innerHTML += "<tr>" + "<td>" + title.value + "</td>" +
        "<td>" + author.value + "</td>" +
        "<td>" + "<input type='button' onclick='post(this);' id='post' value ='Post'>" +
        "<input type='button' onclick='remove(this);' id='remove'value ='Remove'>" + "</td>" + "</tr>"
}

function removeRow(row) {

    document.getElementById("aktivne").removeChild(row)
}

function izvrsiNarudzbinu(element) {
    /*let nastavitiProvera = confirm("Jel ste sigurni da želite da pošaljete ovu narudžbinu u izvršene?");
    console.log(nastavitiProvera); // OK = true, Cancel = false
    if (nastavitiProvera == false) {
        return;
    }*/

    row = element.parentNode.parentNode
    let row_id = element.parentNode.parentNode.getElementsByTagName("input")[0].getAttribute("data-id");
    // console.log(row_id)
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/updateFinished.php?id=" + row_id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            removeRow(element)
        }
    };

    let tabelaUbaci = document.getElementById("izvrsene")
    row.removeChild(row.children[6])
    tabelaUbaci.appendChild(row)

}

function odbijNarudzbinu(element) {
    /*let nastavitiProvera = confirm("Da li ste sigurni da želite da pošaljete ovu narudžbinu u odbijene");
    console.log(nastavitiProvera); // OK = true, Cancel = false
    if (nastavitiProvera == false) {
        return;
    }*/
    row = element.parentNode.parentNode
    let row_id = element.parentNode.parentNode.getElementsByTagName("input")[0].getAttribute("data-id");
    // console.log(row_id);
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/updateDenied.php?id=" + row_id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            removeRow(row)
        }
    };

    let tabelaUbaci = document.getElementById("odbijene")
    row.removeChild(row.children[6])
    tabelaUbaci.appendChild(row)

}

const navToggler = document.querySelector(".nav-toggler");
navToggler.addEventListener("click", navToggle);

function navToggle() {
    navToggler.classList.toggle("active");
    const nav = document.querySelector(".nav");
    nav.classList.toggle("open");
    if (nav.classList.contains("open")) {
        nav.style.maxHeight = nav.scrollHeight + "px";
    } else {
        nav.removeAttribute("style");
    }
}

okbtn = document.getElementById("ok-btn");
popupbox = document.getElementById("popup-overlay");

function otvoriPopup(element) {
    popupbox.classList.add('aktivanpopup');
    let row_id = element.parentNode.parentNode.getElementsByTagName("input")[0].getAttribute("data-id");
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/dataOneRow.php?id=" + row_id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            console.log(data);
            let html = "";
            let id = data[0].id;
            let detalji = data[0].detalji;

            html += "<div class class=artklimrtvi>";
            let artikli_posebno = detalji.split("RSD ")

            for (i = 0; i < artikli_posebno.length; i++) {
                console.log(artikli_posebno[i]);
                html += "<br><br><div>" + artikli_posebno[i] + "</div><br>";
                
            }
            html += "</div>";

            document.getElementById("ispis").innerHTML += html;
            }
        }
};

okbtn.addEventListener('click', () => {
    popupbox.classList.remove('aktivanpopup');
})