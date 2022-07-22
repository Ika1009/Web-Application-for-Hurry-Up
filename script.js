function toggleSignup() {
    document.getElementById("login-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("login-toggle").style.color = "#333";
    document.getElementById("signup-toggle").style.backgroundColor = "#333";
    document.getElementById("signup-toggle").style.color = "#ffb266";
    document.getElementById("login-form").style.display = "none";
    document.getElementById("signup-form").style.display = "block";
}

function toggleLogin() {
    document.getElementById("login-toggle").style.backgroundColor = "#333";
    document.getElementById("login-toggle").style.color = "#ffb266";
    document.getElementById("signup-toggle").style.backgroundColor = "#f9f9f9";
    document.getElementById("signup-toggle").style.color = "#333";
    document.getElementById("signup-form").style.display = "none";
    document.getElementById("login-form").style.display = "block";
}

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");

});

// prevent form submit
const form = document.querySelector("form");

form.addEventListener('submit', function (e) {
    e.preventDefault();
});

const togglepassword = document.querySelector("#togglepassword");
const lozinka = document.querySelector("#lozinka");
    
togglepassword.addEventListener("click", function () {
    // toggle the type attribute
    const tip = lozinka.getAttribute("type") === "password" ? "text" : "password";
    lozinka.setAttribute("type", tip);
    
    // toggle the icon
    this.classList.toggle("bi-eye");
    
});

// prevent form submit
const forma = document.querySelector("form");
    
forma.addEventListener('submit', function (e) {
    e.preventDefault();
});
    
function setCookie() {
    let date = new Date();
    let vreme = date.toLocaleString();
    date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
    let expires = "expires=" + date.toUTCString();
    let cname = "createdAt";
    document.cookie = cname + "=" + vreme + ";" + expires;
}

function getCookie() {
    let cname = "createdAt";
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

let session = getCookie();

if (session !== "") {
    window.location = "http://www.hurryup.rs/dashboard";
}

let unosi = document.querySelectorAll('input');
    
let greske = {
    "password": [],
    "email": [],
    "lozinka": [],
    "pin": []
};
    
unosi.forEach(element => {
    element.addEventListener('change', e => {
        let trenutniUnos = e.target;
        let vrednostUnosa = trenutniUnos.value;
        let imeUnosa = trenutniUnos.getAttribute('name');
    
        greske[imeUnosa] = [];
    
        switch (imeUnosa) {
            case 'email':
                if (!proveraEmail(vrednostUnosa)) {
                    greske[imeUnosa].push('Neispravna email adresa');
                }
                break;
    
            case 'lozinka':
                if (vrednostUnosa.length < 8) {
                    greske[imeUnosa].push('Lozinka mora biti duža od 8 karaktera');
                }
                break;
                    
            case 'password':
                if (vrednostUnosa.length < 8) {
                    greske[imeUnosa].push('Lozinka mora biti duža od 8 karaktera');
                }
                break;
                
            case 'pin': 
                if (vrednostUnosa.length !== 4) {
                    greske[imeUnosa].push('Pin mora biti četvorocifren');
                }
                break;
        }
            
        ceste_greske();
    });
});
    
const ceste_greske = () => {
    for (let elem of document.querySelectorAll('ul')) {
        elem.remove();
    }
    
    for (let key of Object.keys(greske)) {
        let unos = document.querySelector(`input[name = "${key}"]`);
        let parentElement = unos.parentElement;
        let greskeElement = document.createElement('ul');
        parentElement.appendChild(greskeElement);
    
        greske[key].forEach(x => {
            let li = document.createElement('li');
            li.innerText = x;
            greskeElement.appendChild(li);
        });
    }
}
    
const proveraEmail = email => {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        return true;
    }
    
    return false;
}