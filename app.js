function toggleSignup() {
    document.getElementById("login-toggle").style.backgroundColor = "#333";
    document.getElementById("login-toggle").style.color = "#ffb257";
    document.getElementById("signup-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("signup-toggle").style.color = "#333";
    document.getElementById("login-form").style.display = "none";
    document.getElementById("signup-form").style.display = "block";
}

function toggleLogin() {
    document.getElementById("login-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("login-toggle").style.color = "#333";
    document.getElementById("signup-toggle").style.backgroundColor = "#333";
    document.getElementById("signup-toggle").style.color = "#ffb257";
    document.getElementById("signup-form").style.display = "none";
    document.getElementById("login-form").style.display = "block";
}

let config = {
    'korisnicko_ime': {
        required: true,
        minlength: 5,
        maxlength: 50
    },

    'email': {
        required: true,
        email: true,
        minlength: 5,
        maxlength: 50
    },

    'lozinka': {
        required: true,
        minlength: 7,
        maxlength: 25,
    }
};

let validator = new Validator(config, '#signup-form');

document.querySelector('#signup-form').addEventListener('submit', e => {
    e.preventDefault();
    if (validator.validationPassed()) {
        let user = new User();
        user.username = document.querySelector('#korisnicko_ime').value;
        user.email = document.querySelector('#email').value;
        user.password = document.querySelector('#lozinka').value;
        user.create();
    } else {
        alert('Polja nisu dobro popunjena');
    }
});

document.getElementById("prijaviSeButton").onclick = function () //funkcija odlazi u index.html kad se klikne dugme login
{
    document.location.href = 'index.html'
    //treba da se doda provera da su podaci uneseni
}

document.getElementById("napraviNalogButton").onclick = function () //funkcija odlazi u index.html kad se klikne dugme signup
{
    document.location.href = 'index.html'
    //treba da se doda provera da su podaci uneseni
    //treba da se doda upisivanje u bazu podataka
}