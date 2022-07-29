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
            html += "<div>";
            html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
            html += "<h3>" + broj_stola + "</h3>";
            html += "<h3>" + proizvod + "</h3>";
            html += "<h3>" + vreme_narucivanja + "</h3>";
            html += "<h3>" + status + "</h3>";

            if (status == "aktivna") {
                html += "<button onclick=izvrsiNarudzbinu(this)>STIK</button>";
                html += "<button>X</button>";
                html += "</div>"
                document.getElementById("aktivne").innerHTML += html;
            } else if (status == "odbijena") {
                html += "</div>"
                document.getElementById("odbijene").innerHTML += html;
            } else {
                html += "</div>"
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
            if (data == "updated") {
                
            } else { alert("Doslo je do greske!");}
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
            if (data == "updated") {
                
            } else { alert("Doslo je do greske!");}
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
