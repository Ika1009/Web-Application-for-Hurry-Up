<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Ponuda</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }


        .divdugmenaruci {
            position: fixed;
            right: 1rem;
            bottom: 20px;
        }

        .button-27 {
            appearance: none;
            background-color: #333;
            border: none;
            border-radius: 15px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: Roobert, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 20px;
            font-weight: 600;
            line-height: normal;
            margin: 0;
            height: 50px;
            min-width: 0;
            outline: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 100%;
            will-change: transform;
        }

        .button-27:disabled {
            pointer-events: none;
        }

        .button-27:hover {
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);
        }

        .button-27:active {
            box-shadow: none;
            transform: translateY(0);
        }

        @media (min-width: 768px) {
            .button-52 {
                padding: 13px 50px 13px;
            }
        }

        .search {
            display: flex;
            margin-top: 1rem;
            margin-right: auto;
            margin-left: auto;
            padding: 15px;
            height: 45px;
            min-width: 250px;
            width: 30%;
            border-radius: 15px;
            border-color: #ffb266;
            background-color: #333;
            font-size: 22px;
            font-style: italic;
            color: #FFB266;
        }




        .text {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(9rem, 8.5rem));
            gap: 1rem;
            font-family: Arial, Helvetica, sans-serif;
            margin: auto;
            width: 85%;
            margin-top: 2rem;
        }

        .product {
            position: relative;
            justify-content: center;
            text-align: center;
            max-height: 220px;
            width: 150px;
            background: #ffb266;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            outline: .2rem solid #ffb266;
            border-radius: 0.25em;
            height: 220px;
        }

        .product img {
            width: 100%;
            height: 115px;
            border-radius: 0.25rem;
        }

        .product:hover img {
            transform: scale(1.03);
        }

        .product:hover .dodajukolica {
            opacity: 1;
        }

        .imecenakat {
            padding: 2px;
            text-align: left;
        }


        .disc {
            text-align: center;
            font-size: 0.7rem;
            background: #ffb266;
            width: 15%;
            color: #333;
            border: .1rem solid #333;
            border-radius: 0.6rem;
            font-weight: bold;
            box-shadow: 0 .3rem 1rem rgba(0, 0, 0, .1);
        }

        .product h3 {
            font-size: 0.8rem;
            color: black;
        }

        .divcena {
            margin-top: 0.1rem;
            text-align: center;
            align-content: center;
            display: flex;
        }

        .price {
            font-size: 0.8rem;
            color: #333;
            font-weight: bold;
        }

        .priceprecrtano {
            font-size: 0.6rem;
            color: #6d6d6d;
            margin-left: 0.1rem;
            text-decoration: line-through;
        }

        .desc {
            margin-top: 0.1rem;
            font-size: 0.54rem;
        }

        .divdodajukolica {
            width: 150px;
            bottom: 0;
            position: absolute;
        }

        .dodajukolica {
            cursor: pointer;
            width: 100%;
            border-radius: 0.25rem;
            text-align: center;
            background: #333;
            color: #f9f9f9;
            height: 30px;
            font-size: 13px;
            border: none;
            outline: none;
            transition: all 0.3s ease-in-out;
        }





        .popuptext:hover {
            transform: scale(1.05);
        }

        .opis:hover {
            transform: scale(1.05);
        }

        .kategorija:hover {
            transform: scale(1.05);
        }

        .fajl:hover {
            transform: scale(1.05);
        }

        ul {
            list-style: none;
        }

        a {
            text-decoration: none;
        }








        .container {
            margin-right: 8%;
            margin-left: 10%;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        /*header*/
        .header {
            padding: 12px 0;
            line-height: normal;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header .logo,
        .header .nav {
            padding: 0 15px;
        }

        .header .logo a {
            font-size: 30px;
            color: #ffb266;
            text-transform: capitalize;
        }

        .header .nav ul li {
            display: inline-block;
            margin-left: 100px;
        }

        .header .nav ul li a {
            display: block;
            font-size: 20px;
            line-height: 1;
            text-transform: capitalize;
            color: #ebebeb;
            padding: 10px 0;
            transition: all 0.5s ease;
        }

        .header .nav ul li a.active,
        .header .nav ul li a:hover {
            color: #ffb266;
        }

        .nav-toggler {
            height: 34px;
            width: 44px;
            color: #ffb266;
            background-color: #ffb266;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            display: none;
            margin-right: 15px;
        }

        .nav-toggler:focus {
            outline: none;
            box-shadow: 0 0 15px black;
        }

        .nav-toggler span {
            height: 2px;
            width: 20px;
            background-color: #333;
            display: block;
            margin: auto;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-toggler.active span {
            background-color: transparent;
        }

        .nav-toggler span::before,
        .nav-toggler span::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #333;
            transition: all 0.3s ease;
        }

        .nav-toggler span::before {
            transform: translateY(-6px);
        }

        .nav-toggler.active span::before {
            transform: rotate(45deg);
        }

        .nav-toggler span::after {
            transform: translateY(6px);
        }

        .nav-toggler.active span::after {
            transform: rotate(135deg);
        }

        @media(max-width:991px) {
            .nav-toggler {
                display: block;
            }

            .header .nav {
                width: 100%;
                padding: 0;
                max-height: 0px;
                overflow: hidden;
                visibility: hidden;
                transition: all 0.5s ease;
            }

            .header .nav.open {
                visibility: visible;
            }

            .header .nav ul {
                padding: 12px 15px 0;
                margin-top: 12px;
                border-top: 1px solid rgba(255, 255, 255, 0.2);
            }

            .header .nav ul li {
                display: block;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="logo">
                    <a href="#">Hurry Up</a>
                </div>
                <button type="button" class="nav-toggler">
                    <span></span>
                </button>
                <nav class="nav">
                    <ul>
                        <li><a href="../narudzbine/narudzbine.php">Narudzbine</a></li>
                        <li><a href="../artikli/artikli.php">Artikli</a></li>
                        <li><a class="active" href="../ponuda/ponuda.php">Ponuda</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <form>
        <input class="search" type="text" id="search-item" placeholder="Pretraži" onkeyup="search()" />
    </form>

    <div class="kategorije">
        <!-- ovde treba kod da sa ubace sve kategorije -->
    </div>

    <div class="text" id="data">

    </div>
    <div class="divdugmenaruci">
        <button class="button-27" role="button">Naruči</button>
    </div>
    <script>
        // dupli kod zato sto cpanel smara
        let ajax = new XMLHttpRequest();
        ajax.open("GET", "../artikli/phpInteractionsDB/data.php", true);
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
                    let kategorija = data[i].kategorija;
                    html += "<div class=product>";
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<img src=../artikli/artikliSlike/" + id + "." + slika + ">";
                    html += "<div class=imecenakat>";
                    if (popust != '/') {
                        html += "<div class=disc>" + popust + "%</div>";
                    } else {
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
                    html += "<p class=desc>" + opis + "</p>";
                    html += "</div>";
                    html += "<div class=divdodajukolica>";
                    html += "<button class=dodajukolica onclick=dodaj_u_korpu(this)>Dodaj Artikal</button>";
                    html += "</div>";
                    html += "</div>";

                }
                document.getElementById("data").innerHTML += html;
            }
        };
    </script>
    <script>
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
    </script>
    <script>
        function dodaj_u_korpu(element) {
            let elementos = element.closest('.product');
            let ime = elementos.getElementsByTagName('h3')[0].innerHTML;
            let cena = parseInt(elementos.getElementsByClassName('price')[0].innerHTML);
            localStorage.setItem(ime, ime);
            console.log(ime);
            console.log(cena);
            
            let kolicina = localStorage.getItem('kolicina ' + ime);

            if (kolicina !== null) {
                kolicina = parseInt(kolicina);
                localStorage.setItem('kolicina ' + ime, kolicina + 1);
            } else {
                localStorage.setItem('kolicina ' + ime, 1);
            }

            let price = localStorage.getItem('cena ' + ime);

            if (price !== null) {
                price = parseInt(price);
                localStorage.setItem('cena ' + ime, cena + price);
            } else {
                localStorage.setItem('cena ' + ime, cena);
            }

            let ukupno = localStorage.getItem('ukupno');

            if (ukupno !== null) {
                ukupno = parseInt(ukupno);
                localStorage.setItem("ukupno", ukupno + cena);
            } else {
                localStorage.setItem("ukupno", cena);
            }  
        }
    </script>

    <script>
        let carts = document.querySelectorAll('.add-cart');

        let products = [{
                name: 'Iced Coffee',
                tag: 'iced_coffee',
                price: 340,
                inCart: 0
            },
            {
                name: 'Iced Mocha',
                tag: 'iced_mocha',
                price: 350,
                inCart: 0
            },
            {
                name: 'Frape Coffee',
                tag: 'frape_coffee',
                price: 360,
                inCart: 0
            },
            {
                name: 'Frape Mocha',
                tag: 'frape_mocha',
                price: 360,
                inCart: 0
            },
            {
                name: 'Flat white',
                tag: 'flat_white',
                price: 250,
                inCart: 0
            },
            {
                name: 'Crna kafa',
                tag: 'crna_kafa',
                price: 220,
                inCart: 0
            },
            {
                name: 'Coca Cola',
                tag: 'coca-cola',
                price: 230,
                inCart: 0
            },
            {
                name: 'Coca Cola Zero',
                tag: 'coca-cola-zero',
                price: 230,
                inCart: 0
            },
            {
                name: 'Fanta',
                tag: 'fanta',
                price: 230,
                inCart: 0
            },
            {
                name: 'Rauch crveno voće',
                tag: 'rauch_crveno_voce',
                price: 200,
                inCart: 0
            },
            {
                name: 'Rauch multivitamin',
                tag: 'rauch_multivitamin',
                price: 200,
                inCart: 0
            },
            {
                name: 'Rosa flašica',
                tag: 'rosa',
                price: 150,
                inCart: 0
            },
            {
                name: 'Muffin čoko',
                tag: 'muffin_coko',
                price: 270,
                inCart: 0
            },
            {
                name: 'Caesar salata',
                tag: 'caesar_salata',
                price: 610,
                inCart: 0
            },
            {
                name: 'Grilled Chicken salata',
                tag: 'grilled_chicken_salad',
                price: 610,
                inCart: 0
            }
        ]

        for (let i = 0; i < carts.length; i++) {
            carts[i].addEventListener('click', () => {
                cartNumbers(products[i]);
                totalCost(products[i]);
            })
        }

        function onLoadCartNumbers() {
            let productNumbers = localStorage.getItem('cartNumbers');

            if (productNumbers) {
                document.querySelector('.cart span').textContent = productNumbers;
            }
        }

        function cartNumbers(product) {
            let productNumbers = parseInt(localStorage.getItem('cartNumbers'));

            if (productNumbers) {
                localStorage.setItem('cartNumbers', productNumbers + 1);
                document.querySelector('.cart span').textContent = productNumbers + 1;
            } else {
                localStorage.setItem('cartNumbers', 1);
                document.querySelector('.cart span').textContent = 1;
            }

            setItems(product);
            setCookieCart(product);
        }

        function setItems(product) {
            let cartItems = JSON.parse(localStorage.getItem('productsInCart'));

            if (cartItems !== null) {
                if (cartItems[product.tag] === undefined) {
                    cartItems = {
                        ...cartItems,
                        [product.tag]: product
                    }
                }
                cartItems[product.tag].inCart += 1;
            } else {
                product.inCart = 1;
                cartItems = {
                    [product.tag]: product
                }
            }

            localStorage.setItem("productsInCart", JSON.stringify(cartItems));
        }

        function totalCost(product) {
            let cartCost = localStorage.getItem('totalCost');

            if (cartCost !== null) {
                cartCost = parseInt(cartCost);
                localStorage.setItem("totalCost", cartCost + product.price);
            } else {
                localStorage.setItem("totalCost", product.price);
            }
        }

        function displayCart() {
            let cartItems = JSON.parse(localStorage.getItem("productsInCart"));
            let cartCost = localStorage.getItem('totalCost');
            let productContainer = document.querySelector(".products");
            if (cartItems && productContainer) {
                Object.values(cartItems).map(item => {
                    productContainer.innerHTML += `
                <div class="product">
                    <ion-icon name="close-circle" onclick="removeItems()"></ion-icon>   
                    <img class="images" src="./img/${item.tag}.jpg" alt="${item.tag}">
                    <span>${item.name}</span>
                </div>
                <div class="price">${item.price} RSD</div>
                <div class="quantity">
                    <ion-icon name="caret-back-circle-outline"></ion-icon>
                    <span>${item.inCart}</span>
                    <ion-icon name="caret-forward-circle-outline"></ion-icon>
                </div>
                <div class="total">
                    ${item.inCart * item.price} RSD
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
                </div>
            `;
            }
        }

        function setCookieTotal() {
            let total = localStorage.getItem("totalCost");
            let d = new Date();
            d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = 'total' + "=" + total + ";" + expires + ";path=/";
        }

        let ime = [];
        let brojac = 0;

        function setCookieCart(product) {
            let cartItems = JSON.parse(localStorage.getItem("productsInCart"));

            ime[brojac] = cartItems[product.tag].name;
            brojac++;
            ime[brojac] = cartItems[product.tag].price;
            brojac++;
            ime[brojac] = cartItems[product.tag].inCart;
            brojac++;
            console.log(ime);
            let d = new Date();
            d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = product + "=" + ime + ";" + expires + ";path=/";
        }

        function order() {
            alert("Vasa narudzbina je primljena!");
            localStorage.clear();
            window.location = "index.html";
        }

        onLoadCartNumbers();
        displayCart();
        setCookieTotal();
    </script>
</body>

</html>