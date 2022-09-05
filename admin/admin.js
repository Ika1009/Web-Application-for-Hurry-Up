function toggleMenu() {
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    toggle.classList.toggle('active');
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

let ajax = new XMLHttpRequest();
ajax.open("GET", "admin_db.php", true);
ajax.send();
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        let html = "";
        for (let i = 0; i < data.length; i++) {
            let ime_firme = data[i].ime_firme;
            let email = data[i].email;
            if (ime_firme !== 'Hurry Up') {
                html += "<tr>";
                html += "<td>";
                html += "<h4>";
                html += ime_firme;
                html += "<br>";
                html += "<span>";
                html += email;
                html += "</span>";
                html += "</h4>";
                html += "</td>";
                html += "</tr>";
            }
        }
        document.getElementById("firme").innerHTML += html;
    }
}; 

let ajax2 = new XMLHttpRequest();
ajax2.open("GET", "firme_db.php", true);
ajax2.send();
ajax2.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        document.getElementById("broj_firmi").innerHTML += data.length - 1;
    }
}; 

let ajax3 = new XMLHttpRequest();
ajax3.open("GET", "broj_artikala.php", true);
ajax3.send();
ajax3.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        document.getElementById("broj_artikala").innerHTML += data.length;
    }
}; 

let ukupno = 0;
let ajax4 = new XMLHttpRequest();
ajax4.open("GET", "broj_narudzbina.php", true);
ajax4.send();
ajax4.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        for (let i = 0; i < data.length; i++) {
            let ukupna_cena = data[i].ukupna_cena;
            cena = parseInt(ukupna_cena.slice(0, -3));
            ukupno += cena;
        }
        document.getElementById("broj_narudzbina").innerHTML += data.length;
        document.getElementById("ukupan_profit").innerHTML += ukupno + " RSD";
    }
};