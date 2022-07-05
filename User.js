class User {
    user_id = '';
    ime = '';
    prezime = '';
    ime_firme = '';
    email = '';
    broj_telefona = '';
    lozinka = '';
    pin = '';
    createdAt = '';
    api_url = 'https://62c31dbcff594c65676e219d.mockapi.io';

    create() {
        let data = {
            ime: this.ime,
            prezime: this.prezime,
            ime_firme: this.ime_firme,
            email: this.email,
            broj_telefona: this.broj_telefona,
            lozinka: this.lozinka,
            pin: this.pin,
            createdAt: this.createdAt
        }

        data = JSON.stringify(data);

        fetch(this.api_url + '/korisnici', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: data
        })
            .then(response => response.json())
            .then(data => {
                console.log('Korinik kreiran!');
            })
    }
}