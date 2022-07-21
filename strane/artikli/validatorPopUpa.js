
const ime = document.querySelector('#ime');
const cena = document.querySelector('#cena');
const popust = document.querySelector('#popust');

const form = document.querySelector('#artikalPopup');


const proveriIme = () => {

    let valid = false;

    const min = 3,
        max = 25;

    const username = ime.value.trim();

    if (!isRequired(username)) {
        showError(ime, 'Ime ne sme biti prazno.');
    } else if (!isBetween(username.length, min, max)) {
        showError(ime, `Ime mora biti izmedju ${min} i ${max} karaktera.`)
    } else {
        showSuccess(ime);
        valid = true;
    }
    return valid;
};

const proveriCenu = () => {
    let valid = false;
    const cena = cena.value.trim();

    if (!isRequired(cena)) {
        showError(cenaEl, 'Cena ne sme biti prazna.');
    } else if (!iscenaSecure(cena)) {
        showError(cenaEl, 'cena must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(cenaEl);
        valid = true;
    }

    return valid;
};


const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const iscenaSecure = (cena) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(cena);
};

const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;


const showError = (input, message) => {
    // get the form-field element
    const formField = input.parentElement;
    // add the error class
    formField.classList.remove('success');
    formField.classList.add('error');

    // show the error message
    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {
    // get the form-field element
    const formField = input.parentElement;

    // remove the error class
    formField.classList.remove('error');
    formField.classList.add('success');

    // hide the error message
    const error = formField.querySelector('small');
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let isUsernameValid = checkUsername(),
        isEmailValid = checkEmail(),
        iscenaValid = checkcena(),
        isConfirmcenaValid = checkConfirmPassword();

    let isFormValid = isUsernameValid &&
        isEmailValid &&
        isPasswordValid &&
        isConfirmPasswordValid;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
});


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'username':
            checkUsername();
            break;
        case 'email':
            checkEmail();
            break;
        case 'password':
            proveriCenu();
            break;
        case 'confirm-password':
            checkConfirmPassword();
            break;
    }
}));