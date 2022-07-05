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
        user.createdAt = vreme();
        user.create();
    } else {
        alert('Polja nisu dobro popunjena');
    }
});

function proveriVreme(i) {
    if (i < 10) {
        i = "0" + i;
    }

    return i;
}
  
function vreme() {
    let date = new Date();
    let sati = date.getHours();
    let minuti = date.getMinutes();
    let sekunde = date.getSeconds();
    let dan = date.getDate();
    let mesec = date.getMonth();
    let godina = date.getFullYear();
    
    sati = proveriVreme(sati);
    minuti = proveriVreme(minuti);
    sekunde = proveriVreme(sekunde);
    dan = proveriVreme(dan);
    mesec = proveriVreme(mesec);
    godina = proveriVreme(godina);

    return (dan + "/" + mesec + "/" + godina + " " + sati + ":" + minuti + ':' + sekunde);
}