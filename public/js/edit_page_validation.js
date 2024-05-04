function validateEditForm(e) {
    let fname = document.getElementById("firstName").value.trim();
    let lname = document.getElementById("lastName").value.trim();
    let birth_date = document.getElementById("dob").value;

    let number = document.getElementById("number").value.trim();
    let img_path = document.getElementById("file");

    // errors variables
    let fnameErr = document.getElementById("fnameErr");
    let lnameErr = document.getElementById("lnameErr");
    let dateErr = document.getElementById("dateErr");

    let numberErr = document.getElementById("numberErr");
    let fileErr = document.getElementById("fileErr");

    let nameRegex = /^[a-zA-Z ]+$/;

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

        flag = 0;
    } else if (!nameRegex.test(lname)) {
        lnameErr.innerHTML = "Only contain letters.";

        flag = 0;
    } else {
        lnameErr.innerHTML = "";

    }



 // birth date validation
 if (birth_date === "") {
    dateErr.innerHTML = "Please select birth date";

    flag = 0;
} else {
    dateErr.innerHTML = "";

}
  // gender validation


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
    fileErr.innerHTML ="";
    
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
