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
            html += "<td><button id=a class=more onclick=otvoriPopup()>detalji</button></td>"
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
okbtn = document.getElementById("ok-btn");
popupbox = document.getElementById("popup-overlay");

function otvoriPopup(){
    popupbox.classList.add('aktivanpopup');
}



okbtn.addEventListener('click', () => {
    popupbox.classList.remove('aktivanpopup');
})


function addToTable() {
    output.innerHTML += "<tr>" + "<td>" + title.value + "</td>" +
      "<td>" + author.value + "</td>" +
      "<td>" + "<input type='button' onclick='post(this);' id='post' value ='Post'>" +
      "<input type='button' onclick='remove(this);' id='remove'value ='Remove'>" + "</td>" + "</tr>"
  }

function removeRow(row){

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

