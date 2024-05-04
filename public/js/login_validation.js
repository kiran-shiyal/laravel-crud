function validateLogin(e) {
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    let emailErr = document.getElementById("emailErr");
    let passwordErr = document.getElementById("passwordErr");
    let emailRegex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    let passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*()\-+.]).{6,14}$/;

     // email validation
     if (email === "") {
        emailErr.innerHTML = "Please enter email address.";

        flag = 0;
    } else if (!emailRegex.test(email)) {
        emailErr.innerHTML = "Invalid email address.";

        flag = 0;
    } else {
        emailErr.innerHTML = "";

    }
       // password validation
       if (password === "") {
        passwordErr.innerHTML = "Please enter password please!";

        flag = 0;
    } else if (!passRegex.test(password)) {
        passwordErr.innerHTML = "Invalid password.";

        flag = 0;
    } else {
        passwordErr.innerHTML = "";

    }
    if (flag === 0) {
        e.preventDefault();
        return false;
    } else {

        return true;
    }
}
