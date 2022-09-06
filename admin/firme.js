function toggleMenu() {
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    toggle.classList.toggle('active');
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

function firme(element) {
    let ime_firme = element.getElementsByTagName("h4")[0].innerHTML;
    let ime = "";
    for (let i = 0; i < ime_firme.length; i++) {
        if (ime_firme[i] !== "<") {
            ime += ime_firme[i];
        } else {
            break;
        }
    }
    localStorage.setItem("ime_firme", ime);
    window.location.href = "statistika/statistika.php";
}

let ajax = new XMLHttpRequest();
ajax.open("GET", "firme_db.php", true);
ajax.send();
ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText);
        let html = "";
        for (let i = 0; i < data.length; i++) {
            let ime_firme = data[i].ime_firme;
            let email = data[i].email;
            if (ime_firme !== 'Hurry Up') {
                html += "<tr onclick=firme(this)>";
                html += "<td>";
                html += "<h4>";
                html += ime_firme;
                html += "<br>";
                html += "<span>";
                html += email;
                html += "</span>";
                html += "</h4>";
                html += "</td>";
                html += "</tr>";
            }
        }
        document.getElementById("firme").innerHTML += html;
    }
}; 