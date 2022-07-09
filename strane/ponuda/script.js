let sveUkupno = 0;

function addToCart(element) {
	let mainEl = element.closest('.single-item');
	let price = mainEl.querySelector('.price').innerText;
	let name = mainEl.querySelector('h3').innerText;
	let kolicina = 1;
	let cartItems = document.querySelector('.cart-items');

	if(cartItems.textContent.includes(name)) // ovo je dobar if ali ne znam kod unutra kako treba da bude!
	{
		price = price.substring();
		kolicina += 1;
		let ukupno = parseInt(price) * parseInt(kolicina);
		sveUkupno += ukupno;
		cartItems.innerHTML +=  `<div class="cart-single-item">
									<h3>${name}</h3>
									<p id="name">${price} * ${kolicina} = <span>${ukupno} RSD</span></p>
									<button onclick="removeFromCart(this)" class="remove-item">-</button>
								 </div>`;
		document.querySelector('.ispis').style.visibility = 'hidden';
		document.querySelector('.total').style.visibility = 'visible';
		document.querySelector('.total').innerText = `Naruči za: ${sveUkupno} RSD`;	
	}

	else if (parseInt(kolicina) > 0) {
		price = price.substring(); 
		let ukupno = parseInt(price) * parseInt(kolicina);
		sveUkupno += ukupno;
		cartItems.innerHTML +=  `<div class="cart-single-item">
									<h3>${name}</h3>
									<p id="name">${price} * ${kolicina} = <span>${ukupno} RSD</span></p>
									<button onclick="removeFromCart(this)" class="remove-item">-</button>
								 </div>`;
		document.querySelector('.ispis').style.visibility = 'hidden';
		document.querySelector('.total').style.visibility = 'visible';
		document.querySelector('.total').innerText = `Naruči za: ${sveUkupno} RSD`;	
	} else {
		alert("Odaberi kolicinu");
	}
}

function removeFromCart(element) {
	let mainEl = element.closest('.cart-single-item');
	let price = parseInt(mainEl.querySelector('p span').innerText);
	let name = mainEl.querySelector('h3').innerText;
	let proizvodi = document.querySelectorAll('.single-item');
	sveUkupno -= price;
	if (sveUkupno === 0) {
		document.querySelector('.ispis').style.visibility = 'visible';
		document.querySelector('.total').style.visibility = 'hidden';
	} else {
		document.querySelector('.total').innerText = `Naruči za: ${sveUkupno} RSD`;	
    }
	mainEl.remove();
}
