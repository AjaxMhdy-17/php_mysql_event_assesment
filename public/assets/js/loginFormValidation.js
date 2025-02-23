

document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault();
            document.querySelectorAll(".error").forEach(el => el.innerText = "");
            const checkMail = checkEmail();
            const checkPass = checkPassword();
            if (checkMail === true && checkPass === true) {
                console.log('hey');
            }
            else {
                console.log('something went wrong');

            }
        });
    }

});

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



