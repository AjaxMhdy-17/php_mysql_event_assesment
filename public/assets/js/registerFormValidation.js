

document.addEventListener('DOMContentLoaded', function () {
    const registrationForm = document.getElementById('registrationForm');

    if(registrationForm){
        registrationForm.addEventListener('submit', function (e) {
            e.preventDefault();
            document.querySelectorAll(".error").forEach(el => el.innerText = "");
            const checkName = checkUserName();
            const checkMail = checkEmail();
            const checkPass = checkPassword();
            if (checkName === true && checkMail === true && checkPass === true) {
                this.submit();
            }
            else {
                console.log('something went wrong');
    
            }
        });
    }
});


function checkUserName() {
    const username = document.getElementById('username').value.trim();
    if (username.length > 20 || username.length < 3) {
        const usernameError = document.getElementById('usernameError');
        usernameError.innerText = "Please enter a username between 3 and 20 characters.";
        return false;
    }
    return true;
}

function checkEmail() {
    const email = document.getElementById("email").value.trim();
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        const emailError = document.getElementById("emailError");
        emailError.innerText = "Please enter a valid email address.";
        return false;
    }
    return true;
}


function checkPassword() {
    const password = document.getElementById("password").value.trim();
    if (password.length < 6) {
        const passwordError = document.getElementById("passwordError");
        passwordError.innerText = "Password must be at least 6 characters.";
        return false;
    }
    return true;
}



