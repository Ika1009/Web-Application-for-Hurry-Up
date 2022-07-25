function dugmeZaMenjanje(element) {

    let elementos = element.closest('.product');

    let id = elementos.getElementsByClassName('id_artikla')[0].getAttribute("data-id");
    let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
    let slika = elementos.getElementsByTagName('img')[0].getAttribute("src");
    let cena = elementos.getElementsByClassName('price')[0].innerHTML;
    let popust = elementos.getElementsByClassName('disc')[0].innerHTML;
    let opis = elementos.getElementsByClassName('desc')[0].innerHTML;

    document.querySelectorAll(".artikl_input_id")[0].value = id;
    document.querySelectorAll(".artikl_input_ime")[0].value = ime;
    document.querySelectorAll(".artikl_input_cena")[0].value = parseInt(cena);
    document.querySelectorAll(".artikl_input_popust")[0].value = parseInt(popust);
    document.querySelectorAll(".artikl_input_opis")[0].value = opis;
    //document.querySelectorAll(".artikl_input_kategorija")[0].value = kategorija;

    otvoriPopup();


    console.log("kliknuto dugme");
}
// za brisanje
function onClickDugmeZaBrisanje(element) {
    let nastavitiProvera = confirm("Jel ste sigurni da želite da obrišete ovaj artikal?");
    console.log(nastavitiProvera); // OK = true, Cancel = false
    if (nastavitiProvera == false) {
        return;
    }

    //cookie
    let elementos = element.closest('.product');
    let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
    let id = elementos.getElementsByClassName('id_artikla')[0].getAttribute("data-id");

    let slika = elementos.getElementsByTagName('img')[0].getAttribute("src");
    //let popUpDugme = document.getElementById();
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./phpInteractionsDB/delete.php?id=" + id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "deleted") {
                elementos.remove();
            }
        }
    };

    //setCookie(elementos.textContent);
    //console.log(elementos.textContent);

    console.log("kliknuto dugme");


}
const search = () => {
    const searchbox = document.getElementById("search-item").value.toUpperCase();
    const storeitems = document.getElementById("data");
    const product = document.querySelectorAll(".product");
    const productname = storeitems.getElementsByTagName("h3");

    for (let i = 0; i < productname.length; i++) {
        let match = product[i].getElementsByTagName("h3")[0];

        if (match) {
            let textvalue = match.textContent || match.innerHTML

            if (textvalue.toUpperCase().indexOf(searchbox) > -1) {
                product[i].style.display = "";
            } else {
                product[i].style.display = "none";
            }
        }
    }
}




let popup = document.getElementById("popup");

function otvoriPopup(novi_kreiram) {
    if (novi_kreiram) {
        document.querySelectorAll(".artikl_input_id")[0].value = '';
        document.querySelectorAll(".artikl_input_ime")[0].value = '';
        document.querySelectorAll(".artikl_input_cena")[0].value = '';
        document.querySelectorAll(".artikl_input_popust")[0].value = '';
        document.querySelectorAll(".artikl_input_opis")[0].value = '';
        document.querySelectorAll(".artikl_input_kategorija")[0].value = '';
    }
    popup.classList.add("otvori-Popup");
}

function ZatvoriPopUp() {
    popup.classList.remove("otvori-Popup");
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

document.querySelector("#rmv").addEventListener("click", function(event)
{
    var kategorije = document.getElementById("kategorije")
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./phpInteractionsDB/deleteKategorija.php?obrisiKategoriju=" + kategorije.getElementsByTagName("option")[kategorije.selectedIndex].innerHTML, true);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "deleted") {
                kategorije.remove(kategorije.selectedIndex);
            }
        }
    };
});

document.querySelector("#dodajopciju").addEventListener("click", function(event)
{
    event.preventDefault();
    console.log("alo");
    var txt = document.getElementById("add-box");
    var kategorije = document.getElementById("kategorije");
    var option = document.createElement("option");
    option.text = txt.value;
    kategorije.add(option);
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./phpInteractionsDB/dodajKategoriju.php?addNewCategory=" + txt.value, true);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "success") {
                
            }
        }
    };
});


function setCookie(staJeUKeks) {
    let date = new Date();
    let brojac = staJeUKeks;
    date.setTime(date.getTime() + (60 * 60 * 1000));
    let expires = "expires=" + date.toUTCString();
    let cname = "brojac";
    document.cookie = cname + "=" + brojac + ";" + expires;
}

function getCookie(imeVarijable) {
    let cname = imeVarijable;
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}