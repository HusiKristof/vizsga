const container = document.getElementById('container');
const registerButton = document.getElementById('register');
const loginButton = document.getElementById('login');

registerButton.addEventListener('click', ()=>{
    container.classList.add("active");
    document.title = 'Regisztráció';
});

loginButton.addEventListener('click', ()=>{
    container.classList.remove("active");
    document.title = 'Bejelentkezés';
});

const phoneInput = document.getElementById('phone');

phoneInput.addEventListener('focus', () => {
    if (phoneInput.value === '') {
        phoneInput.value = '+36 ';
    }
});

phoneInput.addEventListener('blur', () => {
    if (phoneInput.value === '+36 ') {
        phoneInput.value = '';
    }
});

phoneInput.addEventListener('input', (e) => {
    let value = phoneInput.value;

    // Remove any non-digit or non-hyphen characters (except the +36 prefix)
    if (!value.startsWith('+36 ')) {
        value = '+36 ' + value.replace(/[^0-9]/g, '');
    } else {
        value = '+36 ' + value.slice(4).replace(/[^0-9]/g, '');
    }

    // Automatically add hyphens
    const digits = value.replace(/[^0-9]/g, '').slice(2); // Only digits after +36
    if (digits.length > 2 && digits.length <= 5) {
        value = `+36 ${digits.slice(0, 2)}-${digits.slice(2)}`;
    } else if (digits.length > 5) {
        value = `+36 ${digits.slice(0, 2)}-${digits.slice(2, 5)}-${digits.slice(5, 9)}`;
    }

    phoneInput.value = value;
});