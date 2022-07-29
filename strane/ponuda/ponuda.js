let ajax = new XMLHttpRequest();
ajax.open("GET", "../artikli/APIs/data.php", true);
ajax.send();
ajax.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        console.log(data);
        let html = "";
        for (let i = 0; i < data.length; i++) {
            let id = data[i].id;
            let ime = data[i].ime;
            let cena = data[i].cena;
            let slika = data[i].slika;
            let opis = data[i].opis;
            let popust = data[i].popust;
            html += '<div title="' + opis + '" class=product>';
            html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
            html += "<img src=../artikli/artikliSlike/" + id + "." + slika + ">";
            html += "<div class=imecenakat>";
            if (popust != '0') {
                html += "<div class=disc>" + popust + "%</div>";
            }
            html += "<h3>" + ime + "</h3>";
            if (popust != '0') {
                html += "<div class=divcena>"
                html += "<div class=price>" + cena * (100 - parseInt(popust)) / 100 + " RSD</div>";
                html += "<div class=priceprecrtano>" + cena + "RSD</div>"; // precrtaj
                html += "</div>"
            } else {
                html += "<div class=price>" + cena + "RSD</div>";
            }
            html += "</div>";
            html += "<div class=divdodajukolica>";
            html += "<button class=dodajukolica>Dodaj Artikal</button>";
            html += "</div>";
            html += "</div>";

        }

        document.getElementById("data").innerHTML += html;

        let carts = document.querySelectorAll('.dodajukolica');

        for (let i = 0; i < carts.length; i++) {
            carts[i].addEventListener('click', () => {
                cartNumbers(data[i]);
                totalCost(data[i]);
            })
        }

        function cartNumbers(product) {
            let productNumbers = parseInt(localStorage.getItem('cartNumbers'));

            if (productNumbers) {
                localStorage.setItem('cartNumbers', productNumbers + 1);
            } else {
                localStorage.setItem('cartNumbers', 1);
            } 

            setItems(product);
        }

        function setItems(product) {
            let cartItems = JSON.parse(localStorage.getItem('productsInCart'));
            if (cartItems !== null) {
                if (cartItems[product.ime] === undefined) {
                    cartItems = {
                        ...cartItems,
                        [product.ime]: product
                    }
                }
                cartItems[product.ime].kolicina += 1;
            } else {
                product.kolicina = 1;
                cartItems = {
                    [product.ime]: product
                }
            }

            localStorage.setItem("productsInCart", JSON.stringify(cartItems));
        }

        function totalCost(product) {
            let cartCost = localStorage.getItem('totalCost');

            if (cartCost !== null) {
                cartCost = parseInt(cartCost);
                localStorage.setItem("totalCost", cartCost + product.cena * (100 - parseInt(product.popust)) / 100);
            } else {
                localStorage.setItem("totalCost", product.cena * (100 - parseInt(product.popust)) / 100);
            }   
        }

        function displayItems() {
            let cartItems = JSON.parse(localStorage.getItem("productsInCart"));
            let cartCost = localStorage.getItem('totalCost');
            let productContainer = document.querySelector(".wrapper");

            if (cartItems && productContainer) {
                Object.values(cartItems).map(item => {
                    productContainer.innerHTML += `
                    <div class="proizvodi">
                            <span id="proizvod">${item.ime}</span>
                            ${item.cena * (100 - parseInt(item.popust)) / 100} RSD
                            <ion-icon name="caret-back-circle-outline" class="smanji"></ion-icon>
                            <span>${item.kolicina}</span>
                            <ion-icon name="caret-forward-circle-outline" class="povecaj"></ion-icon>
                            ${item.kolicina * item.cena * (100 - parseInt(item.popust)) / 100} RSD
                    </div>
                    `;
                });

                productContainer.innerHTML += `
                    <div class="basketTotalContainer">
                        <h4 class="basketTotalTitle">
                            Korpa ukupno
                        </h4>
                        <h4 class="basketTotal">
                            ${cartCost} RSD
                        </h4>
                    <div>
                `;
            }
        }

        displayItems();

        document.querySelectorAll(".smanji").forEach(item => {
            item.addEventListener("click", smanji);
        })

        document.querySelectorAll(".povecaj").forEach(item => {
            item.addEventListener("click", povecaj);
        })

        function pronadji_u_mapi(element, ime) {
            if (element.ime === ime) {
                return element;
            }
        }

        function smanji() { 
            let cartItems = JSON.parse(localStorage.getItem("productsInCart"));
            let elementos = this.closest('.proizvodi');
            let ime = elementos.getElementsByTagName('span')[0].innerHTML;
            let brojac;

            Object.values(cartItems).map(item => {
                let x = pronadji_u_mapi(item, ime);
                if (x !== undefined) {
                    x.kolicina--;
                    brojac = x.kolicina;
                    let cartCost = localStorage.getItem('totalCost');
                    localStorage.setItem("totalCost", cartCost - x.cena * (100 - parseInt(x.popust)) / 100);
                }
            });

            if (brojac === 0) {
                console.log("kada je ovde onda treba da se obrise proizvod");
            } else {
                let productNumbers = parseInt(localStorage.getItem('cartNumbers'));
                localStorage.setItem("cartNumbers", productNumbers - 1);
                localStorage.setItem("productsInCart", JSON.stringify(cartItems));
            }
        }

        function povecaj() {
            let cartItems = JSON.parse(localStorage.getItem("productsInCart"));
            let elementos = this.closest('.proizvodi');
            let ime = elementos.getElementsByTagName('span')[0].innerHTML;
            let brojac;
            
            Object.values(cartItems).map(item => {
                let x = pronadji_u_mapi(item, ime);
                if (x !== undefined) {
                    x.kolicina++;
                    brojac = x.kolicina;
                    let cartCost = parseInt(localStorage.getItem('totalCost'));
                    localStorage.setItem("totalCost", cartCost + x.cena * (100 - parseInt(x.popust)) / 100);
                }
            });

            let productNumbers = parseInt(localStorage.getItem('cartNumbers'));
            localStorage.setItem("cartNumbers", productNumbers + 1);
            localStorage.setItem("productsInCart", JSON.stringify(cartItems));
        }
    }
};

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

naruci.addEventListener ('click',() => {
    popupbox.classList.add('aktivanpopup');
})

okbtn.addEventListener ('click',() => {
    popupbox.classList.remove('aktivanpopup');
})