const validPass = str => /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(str);

const validEmail = str => /^[a-zA-Z][A-Za-z0-9-_.]+@(gmail|outlook|yahoo).(com|fr|net)/.test(str);


function valid(str, op) {
    if (op > 1 || op < 0) return null;
    switch (op) {
        case 0:
            return validEmail(str);
        case 1:
            return validPass(str);
    }

}
const button = document.querySelector('#submit');
const alert = document.querySelector('#alert');
const form = document.querySelector('.form-container');
const mname = document.querySelector('#name');
const email = document.querySelector('#email');
const pass = document.querySelector('#pass');
const cpass = document.querySelector('#cpass');
$("#alert").addClass("invisible");
button.addEventListener('click', e => {


    let errors = [];
    if (pass.value !== cpass.value) {
        errors.push('password doesnt match');
        console.log('password doesnt match');
    }
    if (mname.value == '') {
        errors.push("name field's empty");
        console.log("name field's empty");
    }
    if (email.value == '') {
        errors.push("email's empty");
    } else if (!valid(email.value, 0)) {
        errors.push("email format wrongs");
    }
    if (pass.value == '') {
        errors.push("password's empty");
    } else if (!valid(pass.value, 1)) {
        errors.push("password format wrongs");
    }
    if (errors.length > 0) {
        e.preventDefault();
        alert.innerText = errors.join("\n ")
    }
})