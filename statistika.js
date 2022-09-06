function toggleMenu() {
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    toggle.classList.toggle('active');
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

let email = localStorage.getItem("email");
let ime = "";
let ajax = new XMLHttpRequest();
ajax.open("GET", "statistika_db.php?email=" + email, true);
ajax.send();
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        ime = data[0].ime_firme;
        document.getElementById("broj_firmi").innerHTML += data.length;
    }
}; 

console.log(ime);