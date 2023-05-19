// Xu ly su kien an/ hien password khi nguoi dung nhan vao icon con mat
let eye = document.getElementById("eye");

eye.addEventListener("click", function () {
    let password = document.getElementById("password");

    if (password.getAttribute("type") === "password") {
        password.setAttribute("type", "text");
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    }
    else {
        password.setAttribute("type", "password");
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    }
})

// Validate input
let submit = document.getElementById("submit");
let email = document.getElementById("email");
let password = document.getElementById("password");
let error = document.getElementById("error");
let focus; // kiem tra xem the input nao can duoc focus

submit.addEventListener("click", function (event) {
    
    event.preventDefault();

    let e = email.value;
    let p = password.value;

    fetch('./api/find-user.php', {
        method: 'POST',
        body: new URLSearchParams({ 
            'email': e,
            'password': p
        })
    })
    .then(response => response.json())
    .then(json => handleLogin(json, e, p))
})

function handleLogin(json, email, password) {
    // Đăng nhập thất bại
    if(json.code !== 0) {
        if (email === "") {
            error.innerHTML = "Vui lòng nhập email";
            focus = "email";
        }
        else if (password === "") {
            error.innerHTML = "Vui lòng nhập mật khẩu";
            focus = "password";
        }
        else {
            error.innerHTML = json.message;
            focus = "email";
        }

        $("#modal").modal("show");
    }
    // Đăng nhập thành công
    else {
        if(json.data.type === "Admin")
            window.location.href = "./admin.php";
        else if(json.data.type === "Công ty")
            window.location.href = "./profile-company.php";
        else
            window.location.href = "./index.php";
    }
}

// Focus vao the input khi close modal
document.getElementById("closeModal").addEventListener("click", function() {    
   
    if(focus === "email") 
        setTimeout(function() {email.focus();}, 100); 
    else 
        setTimeout(function() {password.focus();}, 100); 
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
