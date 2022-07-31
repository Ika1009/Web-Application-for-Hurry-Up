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
            html += "<tr scope=row>";
            html += "<input class=\"id_reda\" data-id=\"" + id + "\" type=\"hidden\">";
            html += "<td>" + broj_stola + "</td>";
            html += "<td>" + proizvod + "</td> <!--ukupna cena-->";
            html += "<td>" + vreme_narucivanja + "</td>";
            html += "<td><small class=d-block>Far far away, behind the word mountains</small></td>>"
            html += "<td><a href=# class=more>Detalji</a></td>"
            if (status == "aktivna") {
                html += "<td>"
                html += "<button onclick=izvrsiNarudzbinu(this)>STIK</button>";
                html += "<button onclick=odbijNarudzbinu(this)>X</button>";
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

function removeRow(dugme){

    row = dugme.parentNode.parentNode
    document.getElementById("aktivne").removeChild(row)
}

function izvrsiNarudzbinu(element) {
    /*let nastavitiProvera = confirm("Jel ste sigurni da želite da pošaljete ovu narudžbinu u izvršene?");
    console.log(nastavitiProvera); // OK = true, Cancel = false
    if (nastavitiProvera == false) {
        return;
    }*/
    
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

}

function odbijNarudzbinu(element) {
    /*let nastavitiProvera = confirm("Da li ste sigurni da želite da pošaljete ovu narudžbinu u odbijene");
    console.log(nastavitiProvera); // OK = true, Cancel = false
    if (nastavitiProvera == false) {
        return;
    }*/
    
    let row_id = element.parentNode.parentNode.getElementsByTagName("input")[0].getAttribute("data-id");
    // console.log(row_id);
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/updateDenied?id=" + row_id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            removeRow(element)
        }
    };

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

const naruci = document.querySelector('.button-27');
const okbtn = document.querySelector('.ok-btn');
const popupbox = document.querySelector('.popup-overlay');

function toggleIzvrsene() {
    document.getElementById("aktivne-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("aktivne-toggle").style.color = "#333";
    document.getElementById("izvrsene-toggle").style.backgroundColor = "#333";
    document.getElementById("izvrsene-toggle").style.color = "#ffb266";
    document.getElementById("odbijene-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("odbijene-toggle").style.color = "#333";
    document.getElementById("divaktivne").style.display = "none";
    document.getElementById("divizvrsene").style.display = "block";
    document.getElementById("divodbijene").style.display = "none";
}

function toggleAktivne() {
    document.getElementById("aktivne-toggle").style.backgroundColor = "#333";
    document.getElementById("aktivne-toggle").style.color = "#ffb266";
    document.getElementById("izvrsene-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("izvrsene-toggle").style.color = "#333";
    document.getElementById("odbijene-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("odbijene-toggle").style.color = "#333";
    document.getElementById("divaktivne").style.display = "block";
    document.getElementById("divizvrsene").style.display = "none";
    document.getElementById("divodbijene").style.display = "none";
}

function toggleOdbijene() {
    document.getElementById("aktivne-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("aktivne-toggle").style.color = "#333";
    document.getElementById("izvrsene-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("izvrsene-toggle").style.color = "#333";
    document.getElementById("odbijene-toggle").style.backgroundColor = "#333";
    document.getElementById("odbijene-toggle").style.color = "#ffb266";
    document.getElementById("divaktivne").style.display = "none";
    document.getElementById("divizvrsene").style.display = "none";
    document.getElementById("divodbijene").style.display = "block";
}