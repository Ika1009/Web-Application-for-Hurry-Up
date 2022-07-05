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
    'ime': {
        required: true,
        minlength: 5,
        maxlength: 50
    },

    'prezime': {
        required: true,
        minlength: 5,
        maxlength: 50
    },

    'ime_firme': {
        required: true,
        minlength: 5,
        maxlength: 50
    },

    'broj_telefona': {
        required: false,
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
        user.ime = document.querySelector('#ime').value;
        user.prezime = document.querySelector('#prezime').value;
        user.ime_firme = document.querySelector('#ime_firme').value;
        user.email = document.querySelector('#email').value;
        user.broj_telefona = document.querySelector('#broj_telefona').value;
        user.lozinka = document.querySelector('#lozinka').value;
        user.pin = document.querySelector('#pin').value;
        user.create();
    } else {
        alert('Polja nisu dobro popunjena');
    }
});

document.getElementById("prijaviSeButton").onclick = function () //funkcija odlazi u index.html kad se klikne dugme login
{
    document.location.href = 'index.html';
    
    // vreme(); // !!! ----> odkomentiraj kad dodas upisivanje u bazu podataka u funkciju vreme()

    //treba da se doda provera da su podaci uneseni
}

document.getElementById("napraviNalogButton").onclick = function () //funkcija odlazi u index.html kad se klikne dugme signup
{
    document.location.href = 'index.html';

    // vreme(); // !!! ----> odkomentiraj kad dodas upisivanje u bazu podataka u funkciju vreme()

    //treba da se doda provera da su podaci uneseni
}

function proveriVreme(i) { //dodaje 0 za jednocifreno vreme
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }
  
  function vreme() {
    var date = new Date();
    var sati = date.getHours();
    var minuti = date.getMinutes();
    var sekunde = date.getSeconds();
    
    sati = proveriVreme(sati);
    minuti = proveriVreme(minuti);
    sekunde = proveriVreme(sekunde);
    
    //dodati ovde upisivanje podataka u bazu !!!
  }