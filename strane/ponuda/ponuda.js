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

        ready();

        function ready() {
            let removeCartButtons = document.getElementsByClassName('cart-remove');
    
            for (let i = 0; i < removeCartButtons.length; i++) {
                let button = removeCartButtons[i];
                button.addEventListener('click', removeCartItem);
            }

            let quantityInputs = document.getElementsByClassName('cart-quantity');

            for (let i = 0; i < quantityInputs.length; i++) {
                let input = quantityInputs[i];
                input.addEventListener('change', quantityChanged);
            }

            let addCart = document.getElementsByClassName('dodajukolica');

            for (let i = 0; i < addCart.length; i++) {
                let button = addCart[i];
                button.addEventListener('click', addCartClicked);
            }

            document.getElementsByClassName('ok-btn')[0].addEventListener('click', buyButtonClicked);
        }

        function buyButtonClicked() {
            alert('Vasa narudžbina je primljena');
            let cartContent = document.getElementsByClassName("cart-content")[0];

            while (cartContent.hasChildNodes()) {
                cartContent.removeChild(cartContent.firstChild);
            }

            updateTotal();
        }

        function addCartClicked(element) {
            let button = element.target;
            let shopProduct = button.parentElement.parentElement;
            let title = shopProduct.getElementsByTagName('h3')[0].innerHTML;
            let price = shopProduct.getElementsByClassName('price')[0].innerHTML;
            let productImg = shopProduct.getElementsByTagName('img')[0].getAttribute("src");
            addProductToCart(title, price, productImg);
            updateTotal();
        }

        function addProductToCart(title, price, productImg) {
            let cartShopBox = document.createElement('div');
            cartShopBox.classList.add('cart-box');
            let cartItems = document.getElementsByClassName('cart-content')[0];

            let cartBoxContent = `
                                <img src="${productImg}" alt="Naravno da nije povezano" class="cart-img">

                                <div class="detail-box">
                                    <div class="cart-product-title">${title}</div>
                                    <div class="cart-price">${price}</div>
                                    <input type="number" value="1" class="cart-quantity">
                                </div>

                                <ion-icon name="trash-outline" class="cart-remove"></ion-icon>`;

            cartShopBox.innerHTML = cartBoxContent;
            cartItems.append(cartShopBox);
            cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click', removeCartItem);
            cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change', quantityChanged);
        }

        

        function removeCartItem(element) {
            let buttonClicked = element.target;
            buttonClicked.parentElement.remove();
            updateTotal();
        }

        function quantityChanged(element) {
            let input = element.target;

            if (isNaN(input.value) || input.value <= 0) {
                input.value = 1;
            }

            updateTotal();
        }

        function updateTotal() {
            let cartContent = document.getElementsByClassName('cart-content')[0];
            let cartBoxes = cartContent.getElementsByClassName('cart-box');
            let total = 0;

            for (let i = 0; i < cartBoxes.length; i++) {
                let cartBox = cartBoxes[i];
                let priceElement = cartBox.getElementsByClassName('cart-price')[0].innerHTML;
                let quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
                let price = parseFloat(priceElement);
                let quantity = quantityElement.value;
                total = total + (price * quantity);
            }

            total = Math.round(total * 100) / 100;
            document.getElementsByClassName('total-price')[0].innerText = total + "RSD";
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