class User {
    user_id = '';
    username = '';
    email = '';
    password = '';
    api_url = 'https://62c31dbcff594c65676e219d.mockapi.io';

    create() {
        let data = {
            username: this.username,
            email: this.email,
            password: this.password
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