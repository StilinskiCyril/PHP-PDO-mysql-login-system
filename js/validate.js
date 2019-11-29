function Validate_form() {
    var username = document.getElementById("username");
    var email = document.getElementById("email");
    var phone = document.getElementById("phone");
    var password = document.getElementById("password");
    var repeatPass = document.getElementById("repeatPass");
    removeMessage();
    var valid = true;
    if (username.value.length==0){
        username.className="wrong-input form-control";
        username.nextElementSibling.innerHTML="Please fill in the username";
        valid = false;
    }
    if (email.value.length==0){
        email.className="wrong-input form-control";
        email.nextElementSibling.innerHTML="Please fill in the email address";
        valid = false;
    }
    if (phone.value.length==0){
        phone.className="wrong-input form-control";
        phone.nextElementSibling.innerHTML="Please fill in the phone number";
        valid = false;
    }
    if (phone.value.length>13){
        phone.className="wrong-input form-control";
        phone.nextElementSibling.innerHTML="Phone number can not be more than 13 characters characters long";
        valid = false;
    }
    if (password.value.length<=8){
        password.className="wrong-input form-control";
        password.nextElementSibling.innerHTML="Password should not be less than 8 characters long";
        valid = false;
    }
    if (password.value !== repeatPass.value){
        repeatPass.className="wrong-input form-control";
        repeatPass.nextElementSibling.innerHTML="Password mismatch";
        valid = false;
    }
    return valid;
}
function removeMessage() {
    var errorinput = document.querySelectorAll(".wrong-input");
    [].forEach.call(errorinput, function (el) {
        el.classList.remove("wrong-input");
    });

    var errorpar = document.querySelectorAll(".error");
    [].forEach.call(errorpar, function (el) {
        el.innerHTML="";
    });
}

function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}