// Xu ly su kien an/ hien password khi nguoi dung nhan vao icon con mat
let eye = document.getElementById("first_eye");

eye.addEventListener("click", function () {
    let newPassword = document.getElementById("new-password");

    if (newPassword.getAttribute("type") === "password") {
        newPassword.setAttribute("type", "text");
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    }
    else {
        newPassword.setAttribute("type", "password");
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    }
    
})

let second_eye = document.getElementById("second_eye");

second_eye.addEventListener("click", function () {
    let confirmNewPassword = document.getElementById("confirm-new-password");
    
    if (confirmNewPassword.getAttribute("type") === "password") {
        confirmNewPassword.setAttribute("type", "text");
        second_eye.classList.remove("fa-eye-slash");
        second_eye.classList.add("fa-eye");
    }
    else {
        confirmNewPassword.setAttribute("type", "password");
        second_eye.classList.remove("fa-eye");
        second_eye.classList.add("fa-eye-slash");
    }
    
})

// Validate input
let submit = document.getElementById("submit");
let email = document.getElementById("email");
let notification = document.getElementById("notification");
let emailVerifyCode;

submit.addEventListener("click", function (event) {
    event.preventDefault();

    let e = email.value;

    if (!(e !== "" && validateEmail(e))) {
        if (e === "") 
            notification.innerHTML = "Vui lòng nhập email";
        else if (!validateEmail(e)) 
            notification.innerHTML = "Email không đúng định dạng";

        $("#modal").modal("show");
    }
    else {
        $("#verify-email-modal").modal("show");

        fetch('./api/send-verify-email.php', {
            method: 'POST',
            body: new URLSearchParams({
                'email': e
            })
        })
        .then(response => response.json())
        .then(json => getVerifyCode(json))
    }
})

function getVerifyCode(json) {
    emailVerifyCode = json.code + ""; // chuyển int sang string
}

function verifyEmail() {
    let code = document.getElementById("verify-email").value;
    let newPassword = document.getElementById("new-password").value;
    let confirmNewPassword = document.getElementById("confirm-new-password").value;
    let alert = document.getElementById("alert");

    if(newPassword.length < 6) {
        alert.innerHTML = "Mật khẩu phải chứa ít nhất 6 ký tự";
        $("#alert").fadeIn(2000);
        $("#alert").fadeOut(2000);
    }
    else if(newPassword !== confirmNewPassword) {
        alert.innerHTML = "Mật khẩu mới và phần xác nhận không khớp";
        $("#alert").fadeIn(2000);
        $("#alert").fadeOut(2000);
    }
    else if(code !== emailVerifyCode) {
        alert.innerHTML = "Mã xác nhận email không đúng";
        $("#alert").fadeIn(2000);
        $("#alert").fadeOut(2000);
    }
    else {
        fetch('./api/forget-password.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({email: email.value, password: newPassword})
        })

        alert.innerHTML = "Đặt lại mật khẩu thành công. Mời bạn đăng nhập";
        alert.classList.remove("alert-danger");
        alert.classList.add("alert-success");

        $("#alert").fadeIn(2000);
        $("#alert").fadeOut(2000);

        setTimeout(function() {
            window.location.href = 'login.php'
        }, 4000)   
    }
}

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

// Focus vao email <input>
document.getElementById("closeModal").addEventListener("click", function() {
    setTimeout(function() {email.focus();}, 100); 
})

// Tạo hiệu ứng cho các thẻ input khi nó được focus vào
let inputs = document.querySelectorAll(".form-control");
let icons = document.querySelectorAll(".input-group-text");

for(let i=0;i<inputs.length;i++) {
    inputs[i].addEventListener("focus", function() {
        inputs[i].style.border = "2px solid rgb(0, 123, 255)";
        inputs[i].style.borderLeft = "none";
        icons[i].style.border = "2px solid rgb(0, 123, 255)";
        icons[i].style.borderRight = "none";
    })

    inputs[i].addEventListener("focusout", function() {
        inputs[i].style.border = "";
        icons[i].style.border = "";
    })
}
