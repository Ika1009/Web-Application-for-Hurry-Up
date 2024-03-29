function ajaxCall() {
    $.ajax({

        // Our sample url to make request 
        url: './APIs/data.php',

        // Type of Request
        type: "GET",

        async: false,

        // Function to call when to
        // request is ok 
        success: function (data) {
            data = JSON.parse(data);
            let html = "";
            for (let i = 0; i < data.length; i++) {
                let id = data[i].id;
                let ime = data[i].ime;
                let cena = data[i].cena;
                let slika = data[i].slika;
                let opis = data[i].opis;
                let popust = data[i].popust;
                let kategorija = data[i].kategorija;
                let na_stanju = data[i].na_stanju;
                if (na_stanju == "1") {
                    // console.log("jeste na stanju")
                    html += "<div class=product>";
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<div class=divdugizlaz>";
                    html += "<img src=artikliSlike/" + id + "." + slika + ">";
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>";
                    html += "<ion-icon class=dugedit name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>";
                    html += "</div>";
                    html += "<div class=imecenakat>"
                    html += "<h3>" + ime + "</h3>";
                    html += "<p class=cat>" + kategorija + "</p>";
                    if (popust != '0') {
                        html += "<div class=divcena>"
                        html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                        html += "<div class=priceprecrtano>" + cena + " RSD</div>"; // precrtaj
                        html += "</div>"
                    } else {
                        html += "<div class=price>" + cena + " RSD</div>";
                    }
                    html += "<strong class=popust hidden>" + popust + "</strong>";
                    html += "<p class=desc>" + opis + "</p>";
                    html += "</div>"
                    html += "</div>";
                } else {
                    // console.log("nije na stanju")
                    html += "<div class=product>";
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<div class=divdugizlaz>";
                    html += "<img src=artikliSlike/" + id + "." + slika + ">";
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>";
                    html += "<ion-icon class=dugedit name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>";
                    html += "</div>";
                    html += "<div class=imecenakat>"
                    html += "<h3>" + ime + "</h3>";
                    html += "<h2> NIJE NA STANJU <h2>";
                    html += "<p class=cat>" + kategorija + "</p>";
                    if (popust != '0') {
                        html += "<div class=divcena>"
                        html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                        html += "<div class=priceprecrtano>" + cena + " RSD</div>"; // precrtaj
                        html += "</div>"
                    } else {
                        html += "<div class=price>" + cena + " RSD</div>";
                    }
                    html += "<div class=popust type=hidden>" + popust + "</div>";
                    html += "<p class=desc>" + opis + "</p>";
                    html += "</div>"
                    html += "</div>";
                }

            }
            document.getElementById("data").innerHTML += html;
        },

        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}
ajaxCall();

let elementos = document.getElementById("kategorije");
let elementos2 = document.getElementById("kategorije2");

function ajaxCall2() {
    $.ajax({

        // Our sample url to make request 
        url: './APIs/kategorijeDobivanje.php',

        // Type of Request
        type: "GET",

        async: false,

        // Function to call when to
        // request is ok 
        success: function (data) {
            data = JSON.parse(data);
            for (let i = 0; i < data.length; i++) {
                let kategorija = data[i].ime_kategorije;
                let option = document.createElement("option");
                let option2 = document.createElement("option");
                option.text = kategorija;
                option2.text = kategorija;
                elementos.add(option);
                elementos2.add(option2);
            }
            let html = "";
            html += "<a class=kategorisani onclick=kategorije(this)>Svi</a>";
            for (let i = 0; i < data.length; i++) {
                let kategorija = data[i].ime_kategorije;
                html += "<a class=kategorisani onclick=kategorije(this)>" + kategorija + "</a>";
            }
            document.getElementById("myDropdown").innerHTML += html;
        },

        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}
ajaxCall2();

function ispisArtikala() {
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/data.php", true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);
            let html = "";

            for (let i = document.getElementsByClassName("product").length - 1; i >= 0; i--) {
                document.getElementById("data").removeChild(document.getElementsByClassName("product")[i]);
            }
            for (let i = 0; i < data.length; i++) {
                let id = data[i].id;
                let ime = data[i].ime;
                let cena = data[i].cena;
                let slika = data[i].slika;
                let opis = data[i].opis;
                let popust = data[i].popust;
                let kategorija = data[i].kategorija;
                let na_stanju = data[i].na_stanju;
                if (na_stanju) {
                    html += "<div class=product>";
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<div class=divdugizlaz>";
                    html += "<img src=artikliSlike/" + id + "." + slika + ">";
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>";
                    html += "<ion-icon class=dugedit name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>";
                    html += "</div>";
                    html += "<div class=imecenakat>"
                    html += "<h3>" + ime + "</h3>";
                    html += "<p class=cat>" + kategorija + "</p>";
                    if (popust != '0') {
                        html += "<div class=divcena>"
                        html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                        html += "<div class=priceprecrtano>" + cena + " RSD</div>"; // precrtaj
                        html += "</div>"
                    } else {
                        html += "<div class=price>" + cena + " RSD</div>";
                    }
                    html += "<strong class=popust hidden>" + popust + "</strong>";
                    html += "<p class=desc>" + opis + "</p>";
                    html += "</div>"
                    html += "</div>";
                }

                else {
                    // console.log("nije na stanju")
                    html += "<div class=product>";
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<div class=divdugizlaz>";
                    html += "<img src=artikliSlike/" + id + "." + slika + ">";
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>";
                    html += "<ion-icon class=dugedit name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>";
                    html += "</div>";
                    html += "<div class=imecenakat>"
                    html += "<h3>" + ime + "</h3>";
                    html += "<h2> NIJE NA STANJU <h2>";
                    html += "<p class=cat>" + kategorija + "</p>";
                    if (popust != '0') {
                        html += "<div class=divcena>"
                        html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                        html += "<div class=priceprecrtano>" + cena + " RSD</div>"; // precrtaj
                        html += "</div>"
                    } else {
                        html += "<div class=price>" + cena + " RSD</div>";
                    }
                    html += "<div class=popust type=hidden>" + popust + "</div>";
                    html += "<p class=desc>" + opis + "</p>";
                    html += "</div>"
                    html += "</div>";
                }
            }
            document.getElementById("data").innerHTML += html;
        }
    };
}

function dugmeZaMenjanje(element) {
    let elementos = element.closest('.product');
    let id = elementos.getElementsByClassName('id_artikla')[0].getAttribute("data-id");
    let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
    let slika = elementos.getElementsByTagName('img')[0].getAttribute("src");
    let cena;
    let popust;

    if (typeof (elementos.getElementsByClassName('priceprecrtano')[0]) == "undefined") {
        cena = elementos.getElementsByClassName('price')[0].innerHTML;
        popust = 0;
    } else {
        cena = elementos.getElementsByClassName('priceprecrtano')[0].innerHTML;
        popust = elementos.getElementsByClassName('popust')[0].innerHTML;
    }

    let opis = elementos.getElementsByClassName('desc')[0].innerHTML;
    let kategorija = elementos.getElementsByClassName('cat')[0].innerHTML;

    document.querySelectorAll(".artikl_input_id")[0].value = id;
    document.querySelectorAll(".artikl_input_ime")[0].value = ime;
    document.querySelectorAll(".artikl_input_cena")[0].value = parseInt(cena);
    document.querySelectorAll(".artikl_input_popust")[0].value = parseInt(popust);
    document.querySelectorAll(".artikl_input_opis")[0].value = opis;
    document.querySelectorAll(".artikl_input_kategorija")[0].value = kategorija;

    otvoriPopup();
}

// za brisanje
function onClickDugmeZaBrisanje(element) {
    let nastavitiProvera = confirm("Jel ste sigurni da želite da obrišete ovaj artikal?");
    //console.log(nastavitiProvera); // OK = true, Cancel = false
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
    ajax.open("GET", "./APIs/delete.php?id=" + id, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            /*if (data.contains("deleted")) {
                elementos.remove();
            } else { alert("Došlo je do greške! Molim Vas pokušajte ponovo."); }*/
            elementos.remove();
        }
    };

    //setCookie(elementos.textContent);
    //console.log(elementos.textContent);

    elementos.remove()

}

const dugme = document.getElementById("dugfilter");
const dropdown = document.getElementById("myDropdown");
dugme.addEventListener("click", () => {
  if (dropdown.classList.contains('show')) {
    dropdown.classList.remove("show");
    dropdown.classList.add("hide");
  } else {
    dropdown.classList.remove("hide");
    dropdown.classList.add("show");
  }
});

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

const kategorije = (element) => {
    const storeitems = document.getElementById("data");
    const product = document.querySelectorAll(".product");
    const productname = storeitems.getElementsByTagName("p");
    const cale = document.getElementsByClassName("kategorisani");
    const dropdown2 = document.getElementById("myDropdown");
  
    for (let i = 0; i < cale.length; i++) {
      if (cale[i].classList.contains("svi")) {
        cale[i].classList.remove("svi");
        dropdown2.classList.remove("show");
        dropdown2.classList.add("hide");
      }
  
      if (cale[i].innerHTML === element.innerHTML) {
        cale[i].classList.add("svi");
        dropdown2.classList.remove("show");
        dropdown2.classList.add("hide");
      }
    }
  
    if (element.innerHTML === 'Svi') {
      for (let i = 0; i < product.length; i++) {
        product[i].style.display = "";
      }
    } else {
      for (let i = 0; i < productname.length; i++) {
        let match = product[i].getElementsByTagName("p")[0];
        if (match) {
          let textvalue = match.textContent || match.innerHTML;
          if (element.innerHTML === textvalue) {
            product[i].style.display = "";
          } else {
            product[i].style.display = "none";
          }
        }
      }
    }
  };

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

document.querySelector("#rmv").addEventListener("click", function (event) {
    let kategorije = document.getElementById("kategorije");
    let kategorije2 = document.getElementById("kategorije2");
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/deleteKategorija.php?obrisiKategoriju=" + kategorije.getElementsByTagName("option")[kategorije.selectedIndex].innerHTML, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "deleted") {
                kategorije.remove(kategorije.selectedIndex);
            }
        }
    };

    let ajax2 = new XMLHttpRequest();
    ajax2.open("GET", "./APIs/deleteKategorija.php?obrisiKategoriju=" + kategorije2.getElementsByTagName("option")[kategorije2.selectedIndex].innerHTML, true);
    ajax2.send();
    ajax2.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "deleted") {
                kategorije2.remove(kategorije2.selectedIndex);
            }
        }
    };
});

document.querySelector("#dodajopciju").addEventListener("click", function (event) {
    event.preventDefault();
    //console.log("alo");
    let txt = document.getElementById("add-box");
    let kategorije = document.getElementById("kategorije");
    let kategorije2 = document.getElementById("kategorije2");
    let option = document.createElement("option");
    let option2 = document.createElement("option");
    let popupbox = document.getElementsByClassName("popup-box-container2")[0];
    option.text = txt.value;
    option2.text = txt.value;
    kategorije.add(option);
    kategorije2.add(option2);
    kategorije.selectedIndex = kategorije.length - 1;
    kategorije2.selectedIndex = kategorije2.length - 1;
    //console.log(kategorije.selectedIndex);
    let ajax = new XMLHttpRequest();
    ajax.open("GET", "./APIs/dodajKategoriju.php?addNewCategory=" + txt.value, true);
    ajax.send();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let data = this.responseText;
            if (data == "success") {

            }
        }
    };
    popupbox.classList.remove('aktivanpopup');
});

let add_artikl_pom = 0;

document.querySelector("#artikl_form").addEventListener("submit", function (event) {
    event.preventDefault();
    // console.log("alo");

    if (document.getElementById("popust").value == '') {
        document.getElementById("popust").value = 0;
    }

    var artikl_form = document.getElementById("artikl_form");

    var form_for_sending = new FormData(artikl_form);

    document.querySelectorAll(".artikl_input_id")[0].value = '';
    document.querySelectorAll(".artikl_input_ime")[0].value = '';
    document.querySelectorAll(".artikl_input_cena")[0].value = '';
    document.querySelectorAll(".artikl_input_popust")[0].value = '';
    document.querySelectorAll(".artikl_input_opis")[0].value = '';
    document.querySelectorAll(".artikl_input_kategorija")[0].value = '';

    let ajax = new XMLHttpRequest();
    ajax.open("POST", "./APIs/article_add.php", true);
    ajax.send(form_for_sending);
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.responseText;
            ispisArtikala()
        }

    };

});