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
                <ion-icon name="close-circle"></ion-icon>   
                <img src="./img/${item.tag}.jpg" alt="${item.tag}">
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
        `;
    }
}

onLoadCartNumbers();
displayCart();