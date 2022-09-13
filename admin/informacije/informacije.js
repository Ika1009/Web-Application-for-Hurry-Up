function toggleMenu() {
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    toggle.classList.toggle('active');
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

const izlaz = document.querySelector('.exit');
izlaz.addEventListener('click', exit);

function exit() {
    window.location.href = '../firme.php';
}
          
const btn = document.getElementById("submit-btn");
const ime = document.getElementById("ime");      
const prezime = document.getElementById("prezime");           
const broj_telefona = document.getElementById("broj_telefona");    
const email = document.getElementById("email");            
const pin = document.getElementById("pin");

function activate() {
    btn.disabled = false;            
}

function deactivate() {               
    btn.disabled = true;           
}
            
function check() {             
    if (ime.value != '' && email.value != '' && prezime.value != '' && broj_telefona.value != '' && pin.value != '' && pin.value.length === 4) {                  
        activate()          
    } else {                   
        deactivate()             
    }            
}

ime.addEventListener('input', check)           
email.addEventListener('input', check)           
prezime.addEventListener('input', check)          
broj_telefona.addEventListener('input', check)           
pin.addEventListener('input', check)