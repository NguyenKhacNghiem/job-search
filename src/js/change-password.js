// Xu ly su kien an/ hien password khi nguoi dung nhan vao icon con mat
let eye = document.getElementById("first_eye");

eye.addEventListener("click", function () {
    let old_pwd = document.getElementById("old-pwd");

    if (old_pwd.getAttribute("type") === "password") {
        old_pwd.setAttribute("type", "text");
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    }
    else {
        old_pwd.setAttribute("type", "password");
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    }
    
})

let second_eye = document.getElementById("second_eye");

second_eye.addEventListener("click", function () {
    let new_pwd = document.getElementById("new-pwd");
    

    if (new_pwd.getAttribute("type") === "password") {
        new_pwd.setAttribute("type", "text");
        second_eye.classList.remove("fa-eye-slash");
        second_eye.classList.add("fa-eye");
    }
    else {
        new_pwd.setAttribute("type", "password");
        second_eye.classList.remove("fa-eye");
        second_eye.classList.add("fa-eye-slash");
    }
    
})

let third_eye = document.getElementById("third_eye");

third_eye.addEventListener("click", function () {
    let confirm_pwd = document.getElementById("confirm-pwd");

    if (confirm_pwd.getAttribute("type") === "password") {
        confirm_pwd.setAttribute("type", "text");
        third_eye.classList.remove("fa-eye-slash");
        third_eye.classList.add("fa-eye");
    }
    else {
        confirm_pwd.setAttribute("type", "password");
        third_eye.classList.remove("fa-eye");
        third_eye.classList.add("fa-eye-slash");
    }
    
})

// Validate input
let submit = document.getElementById("submit");
let email = document.getElementById("email");
let old_pwd = document.getElementById("old-pwd");
let new_pwd = document.getElementById("new-pwd");
let confirm_pwd = document.getElementById("confirm-pwd");
let notification = document.getElementById("notification");
let focus; // kiem tra xem the input nao can duoc focus

submit.addEventListener("click", function (event) {
    event.preventDefault();

    let e = email.value;
    let op = old_pwd.value;
    let np = new_pwd.value;
    let cp = confirm_pwd.value;

    // Nhớ kiểm tra mật khẩu cũ có đúng không nữa
    if (!(op !== "" && np !== "" && cp !== "" && np.length >= 6 && np === cp)) {
        if (op === "") {
            notification.innerHTML = "Vui lòng nhập mật khẩu cũ";
            focus = "old-pwd";
        }
        else if (np === "") {
            notification.innerHTML = "Vui lòng nhập mật khẩu mới";
            focus = "new-pwd";
        }
        else if (cp === "") {
            notification.innerHTML = "Vui lòng xác nhận nhập mật khẩu";
            focus = "confirm-pwd";
        }
        else if (np.length < 6) {
            notification.innerHTML = "Mật khẩu phải chứa ít nhất 6 ký tự";
            focus = "new-pwd";
        }
        else if(np != cp){
            notification.innerHTML = "Mật khẩu và phần xác nhận mật khẩu không khớp";
            focus = "confirm-pwd";
        }
    }
    else
    {
        fetch('./api/update-password.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({email: e, oldPassword: op, newPassword: np})
        })
        .then(response => response.json())
        .then(handleResult)
    }

    $("#modal").modal(); // dòng code JQuery để hiện thị modal
})

function handleResult(response)
{            
    notification.innerHTML = response.message;

    if(response.code === 0) {
        setTimeout(function() {
            window.location.href = "login.php";
        }, 1500)
    } 
}

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

// Focus vao the input khi close modal
let closeModal = document.getElementById("closeModal");

closeModal.addEventListener("click", function() {    
    if(focus === "email") 
        setTimeout(function() {email.focus();}, 100); 
    else if(focus === "old-pwd")
        setTimeout(function() {old_pwd.focus();}, 100); 
    else if(focus === "new-pwd")
        setTimeout(function() {new_pwd.focus();}, 100); 
    else
        setTimeout(function() {confirm_pwd.focus();}, 100); 
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