function toggleMenu() {
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    toggle.classList.toggle('active');
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

let ime_firme = localStorage.getItem("ime_firme");
let ukupno = 0;

function ajaxCall() {
    $.ajax({
  
        // Our sample url to make request 
        url: 'statistika_db.php?ime_firme=' + ime_firme,
  
        // Type of Request
        type: "GET",
  
        async: false,
  
        // Function to call when to
        // request is ok 
        success: function (data) {
          data = JSON.parse(data);
          document.getElementById("broj_artikala").innerHTML += data.length;
        },
  
        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        } 
    });
  }
  ajaxCall();

  function ajaxCall2() {
    $.ajax({
  
        // Our sample url to make request 
        url: 'izvrsene_narudzbine_db.php?ime_firme=' + ime_firme,
  
        // Type of Request
        type: "GET",
  
        async: false,
  
        // Function to call when to
        // request is ok 
        success: function (data) {
          data = JSON.parse(data);
          document.getElementById("broj_izvrsenih").innerHTML += data.length;
          for (let i = 0; i < data.length; i++) {
            let ukupna_cena = data[i].ukupna_cena;
            cena = parseInt(ukupna_cena.slice(0, -3));
            ukupno += cena;
          }
          document.getElementById("ukupan_profit").innerHTML += ukupno + " RSD";
        },
  
        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        } 
    });
  }
  ajaxCall2();

  function ajaxCall3() {
    $.ajax({
  
        // Our sample url to make request 
        url: 'narudzbine_db.php?ime_firme=' + ime_firme,
  
        // Type of Request
        type: "GET",
  
        async: false,
  
        // Function to call when to
        // request is ok 
        success: function (data) {
          data = JSON.parse(data);
          document.getElementById("broj_narudzbina").innerHTML += data.length;
        },
  
        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        } 
    });
  }
  ajaxCall3();

  function ajaxCall4() {
    $.ajax({
  
        // Our sample url to make request 
        url: 'odbijene_narudzbine_db.php?ime_firme=' + ime_firme,
  
        // Type of Request
        type: "GET",
  
        async: false,
  
        // Function to call when to
        // request is ok 
        success: function (data) {
          data = JSON.parse(data);
          document.getElementById("broj_odbijenih").innerHTML += data.length;
        },
  
        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        } 
    });
  }
  ajaxCall4();

  function ajaxCall5() {
    $.ajax({
  
        // Our sample url to make request 
        url: 'kategorije_db.php?ime_firme=' + ime_firme,
  
        // Type of Request
        type: "GET",
  
        async: false,
  
        // Function to call when to
        // request is ok 
        success: function (data) {
          data = JSON.parse(data);
          document.getElementById("broj_kategorija").innerHTML += data.length;
        },
  
        // Error handling 
        error: function (error) {
            console.log(`Error ${error}`);
        } 
    });
  }
  ajaxCall5();