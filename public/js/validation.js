function validateForm(e) {
    let fname = document.getElementById("firstName").value.trim();
    let lname = document.getElementById("lastName").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let birth_date = document.getElementById("dob").value;
    let gender = document.querySelector('input[name="gender"]:checked');
    let number = document.getElementById("contactNumber").value.trim();
    let img_path = document.getElementById("file");

    // errors variables
    let fnameErr = document.getElementById("fnameErr");
    let lnameErr = document.getElementById("lnameErr");
    let emailErr = document.getElementById("emailErr");
    let passwordErr = document.getElementById("passwordErr");
    let dateErr = document.getElementById("dateErr");
    let genderErr = document.getElementById("genderErr");
    let numberErr = document.getElementById("numberErr");
    let fileErr = document.getElementById("fileErr");

    let nameRegex = /^[a-zA-Z ]+$/;
    let emailRegex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    let passRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[!@#$%^&*()\-+.]).{6,14}$/;
    let numberRegex = /^\d{10}$/;

    let flag = 1;

    // firstName validation
    if (fname === "") {
        fnameErr.innerHTML = "First name is required";
        flag = 0;
    } else if (!nameRegex.test(fname)) {
        fnameErr.innerHTML = "Only contain letters";
        flag = 0;
    } else {
        fnameErr.innerHTML = "";

    }

       // lastName validation
       if (lname === "") {
        lnameErr.innerHTML = "Last name is required.";
        lnameErr.style.padding = "0px";
        flag = 0;
    } else if (!nameRegex.test(lname)) {
        lnameErr.innerHTML = "Only contain letters.";
        flag = 0;
    } else {
        lnameErr.innerHTML = "";

    }

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

 // birth date validation
 if (birth_date === "") {
    dateErr.innerHTML = "Please select birth date";

    flag = 0;
} else {
    dateErr.innerHTML = "";

}
  // gender validation
  if (!gender) {
    genderErr.innerHTML = "Please select gender";

    flag = 0;
} else {
    genderErr.innerHTML = "";

}

 // number validation
 if (number === "") {
    numberErr.innerHTML = "Please enter phone number.";

    flag = 0;
} else if (!numberRegex.test(number)) {
    numberErr.innerHTML = "Please enter a valid 10-digit phone number.";

    flag = 0;
} else {
    numberErr.innerHTML = "";

}


if (img_path.value == "") {
    fileErr.innerHTML = "Please select an image file.";
    flag = 0;
} else {

    let img = img_path.files[0].size;
    let img_size = img / 1024;
    if (img_size > (1024 * 2)) {
        fileErr.innerHTML = "File must be smaller than 2MB";
        flag = 0;
    } else {
        // Check file extension
        let allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        let img_name = img_path.files[0].name;
        if (!allowedExtensions.exec(img_name)) {
            fileErr.innerHTML = "Allowed file types are .jpg, .jpeg, and .png";

            flag = 0;
        } else {
            fileErr.innerHTML = "";

        }
    }

}
    if (flag === 0) {
        e.preventDefault();
        return false;
    } else {

        return true;
    }
}
