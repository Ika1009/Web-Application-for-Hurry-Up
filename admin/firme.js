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

function izmeni(element) {
    let ime_firme = element.parentElement.parentElement.getElementsByTagName("td")[0].getElementsByTagName("h4")[0].innerHTML;
    let ime = "";
    for (let i = 0; i < ime_firme.length; i++) {
        if (ime_firme[i] !== "<") {
            ime += ime_firme[i];
        } else {
            break;
        }
    }
    localStorage.setItem("ime_firme", ime);
    setCookie();
    window.location.href = "informacije/informacije.php";
}

function setCookie() {
    let date = new Date();
    date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
    let expires = "expires=" + date.toUTCString();
    let cname = "ime_firme";
    let ime = localStorage.getItem("ime_firme");
    document.cookie = cname + "=" + ime + ";" + expires;
}

function ajaxCall() {
    $.ajax({
  
        // Our sample url to make request 
        url: 'firme_db.php',
  
        // Type of Request
        type: "GET",
  
        async: false,
  
        // Function to call when to
        // request is ok 
        success: function (data) {
          data = JSON.parse(data);
          let html = "";
          for (let i = 0; i < data.length; i++) {
            let ime_firme = data[i].ime_firme;
            let email = data[i].email;
            if (ime_firme !== 'Hurry Up') {
                html += "<tr>";
                html += "<td onclick=firme(this)>";
                html += "<h4>";
                html += ime_firme;
                html += "<br>";
                html += "<span>";
                html += email;
                html += "</span>";
                html += "</h4>";
                html += "</td>";
                html += "<td>"
                html += "<i class=fa aria-hidden=true onclick=izmeni(this)></i>";
                html += "</td>";
                html += "</tr>";
            }
          }
          document.getElementById("firme").innerHTML += html;
        },
  
        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        } 
    });
  }
  ajaxCall();

let editDugme = document.getElementsByTagName('i');

for (let i = 5; i < editDugme.length; i++) {
    editDugme[i].classList.add('fa-pencil');
    editDugme[i].classList.add('pozicija');
}