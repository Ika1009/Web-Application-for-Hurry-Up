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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            min-height: 8vh;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .linkovi {
            display: flex;
            justify-content: space-around;
            width: 30%;
        }
            .linkovi a {
                color:#ffb266;
                text-decoration: none;
                letter-spacing: 3px;
                font-weight: bold;
                font-size: 14px;
                padding: 14px 16px;
            }
            
            .linkovi li {
                list-style: none;
            }
            
                .linkovi li a.hover:not(.aktivan) {
                    background-color: #ffb266;
                }
            
                .linkovi li a.aktivan {
                    background-color: #f9f9f9;
                    color: #333;
                    font-weight: bolder;
                }
        
        .header {
            color: #ffb266;
            letter-spacing: 5px;
            font-size: 20px;
        }
        
        
        img {
            height: 70px;
        }
        
        .pocetna {
            float: right;
            padding-top: 30px;
        }
        
        .overlay {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
            height: 100%;
            right: 0;
            bottom: 0;
            padding: 0 !important;
            margin: 0 !important;
            background-color: rgba(10, 10, 10, 0.3);
        }
        
        
        .cart ion-icon {
            vertical-align: bottom;
            font-size: 20px;
            padding-right: 3.42px;
        }
        
        .cart a {
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }
        
        .container,
        .products-container {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 50px;
            padding-bottom: 100px;
        }
        
        .image {
            height: 200px;
            margin-right: 20px;
            margin-left: 20px;
            position: relative;
            overflow: hidden;
        }
        
        .search {
            display: block;
            margin-top: 10px;
            margin-right: auto;
            margin-left: auto;
            padding: 15px;
            height: 50px;
            width: 300px;
            border-color: black;
        }
        
        .add-cart {
            position: absolute;
            width: 100%;
            color: white;
            background-color: darkblue;
            transition: all 0.3s ease-in-out;
            opacity: 0;
            cursor: pointer;
            text-align: center;
        }
        
        .image:hover .cart {
            bottom: 50px;
            opacity: 1;
            padding: 10px;
            text-decoration: none;
        }
        
        /*----------------Cart page*------------------*/
        
        .order {
            background: #5E5DF0;
            border-radius: 999px;
            box-shadow: #5E5DF0 0 10px 20px -10px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            font-family: Inter,Helvetica,"Apple Color Emoji","Segoe UI Emoji",NotoColorEmoji,"Noto Color Emoji","Segoe UI Symbol","Android Emoji",EmojiSymbols,-apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue","Noto Sans",sans-serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 24px;
            opacity: 1;
            outline: 0 solid transparent;
            padding: 8px 18px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: fit-content;
            word-break: break-word;
            border: 0;
        }
        
        .images {
            height: 150px;
        }
        
        .products-container {
            max-width: 650px;
            justify-content: space-around;
            margin: 0 auto;
            margin-top: 50px;
        }
        
        .products-container ion-icon {
            font-size: 25px;
            color: darkblue;
            margin-left: 10px;
            margin-right: 10px;
            cursor: pointer;
        }
        
        .product-header {
            width: 100%;
            max-width: 650px;
            display: flex;
            justify-content: flex-start;
            border-bottom: 4px solid lightgrey;
            margin: 0 auto;
        }
        
        .product-title {
            width: 45%;
        }
        
        .price {
            width: 15%;
            border-bottom: 1px solid lightgrey;
            display: flex;
            align-items: center;
        }
        
        .quantity {
            width: 30%;
            border-bottom: 1px solid lightgrey;
            display: flex;
            align-items: center;
        }
        
        .total {
            width: 10%;
            border-bottom: 1px solid lightgrey;
            display: flex;
            align-items: center;
        }
        
        .product {
            width: 45%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid lightgrey;
        }
        
        .product ion-icon {
            cursor: pointer;
        }
        
        .products {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }
        
        .basketTotalContainer {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            padding: 10px 0;
        }
        
        .basketTotalTitle {
            width: 30%;
        }
        
        .basketTotal {
            width: 10%;
        }
    </style>
</head>
<body>
    <nav>
        <div class="header">
            <a href="../../index.html"><img src="../../slike/hurryup_logo2.jpg" alt="Logo firme"></a>
            <h4 class="pocetna">HurryUp</h4>
        </div>
        <ul class="linkovi">
            <li><a href="../narudzbine/narudzbine.html">Narudzbine</a></li>
            <li><a href="../artikli/artikli.php">Artikli</a></li>
            <li><a class="aktivan" href="../ponuda/ponuda.html">Ponuda</a></li>
            <li class="cart">
                <a href="korpa.php">
                    <ion-icon name="basket"></ion-icon>Korpa <span>0</span>
                </a>
            </li>
        </ul>
    </nav>
    <form>
        <input class="search" type="text" id="search-item" placeholder="Pretraži" onkeyup="search()" />
    </form>
    <div id="data">
    </div>
    <script>
        // dupli kod zato sto cpanel smara
        let ajax = new XMLHttpRequest();
        ajax.open("GET", "../artikli/data.php", true);
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
                    html += "<ion-icon class=dugizlaz name=close-outline onclick=onClickDugmeZaBrisanje(this)>Edit</ion-icon>"
                    html += "<ion-icon class=dugizlaz name=pencil onclick=dugmeZaMenjanje(this)></ion-icon><br><br>"
                    html += "<input class=\"id_artikla\" data-id=\"" + id + "\" type=\"hidden\">";
                    html += "<img src=artikliSlike/" + id + "." + slika + ">";
                    html += "<div class=imecenakat>"
                    html += "<div class=disc>" + popust + "</div>";
                    html += "<h3>" + ime + "</h3>";
                    html += "<p class=cat>" + kategorija + "</p>";
                    if (cena != '/') {
                        html += "<div class=price>" + (cena.slice(0, -3) * (100 - parseInt(popust.slice(0, -1)))) / 100 + " RSD</div>";
                    }
                    html += "<div class=price>" + cena + "</div>"; // precrtaj
                    html += "<p class=desc>" + opis + "</p>";
                    html += "</div>"
                    html += "</div>";
                }
                document.getElementById("data").innerHTML += html;
            }
        };
    </script>
    <script>
    const search = () => {
        const searchbox = document.getElementById("search-item").value.toUpperCase();
        const storeitems = document.getElementById("product-list");
        const product = document.querySelectorAll(".image");
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

    let carts = document.querySelectorAll('.add-cart');

    let products = [
        {
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