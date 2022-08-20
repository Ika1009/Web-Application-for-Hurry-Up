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
            if (na_stanju) {
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
            var option = document.createElement("option");
            option.text = kategorija;
            elementos.add(option);
          }   
        },
  
        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        } 
    });
  }
  ajaxCall2();