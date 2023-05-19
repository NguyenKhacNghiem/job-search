// Xử lý sự kiện ẩn/ hiện password khi người dùng nhấn vào icon con mắt
let eyes = document.querySelectorAll(".eye"); // eyes này là mảng chứa 2 con mắt

eyes[0].addEventListener("click", function () {
    showAndHidePassword(this, "password")
})

eyes[1].addEventListener("click", function () {
    showAndHidePassword(this, "confirmPassword")
})

function showAndHidePassword(eye, id) {
    let input = document.getElementById(id);

    if (input.getAttribute("type") === "password") {
        input.setAttribute("type", "text");
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
    }
    else {
        input.setAttribute("type", "password");
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
    }
}

// Validate input
let submit = document.getElementById("submit");
let fullname = document.getElementById("name");
let email = document.getElementById("email");
let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirmPassword");
let notification = document.getElementById("notification");
let focus; // Kiểm tra xem thẻ input nào cần được focus
let emailVerifyCode;
let fn;
let e;
let p;
let cp;

submit.addEventListener("click", function (event) {
    event.preventDefault();

    fn = fullname.value;
    e = email.value;
    p = password.value;
    cp = confirmPassword.value;

    if (!(fn !== "" && e !== "" && p !== "" && p.length >= 6 && validateEmail(e) && p === cp)) {
        if (fn === "") {
            notification.innerHTML = "Vui lòng nhập họ và tên";
            focus = "fullname";
        }
        else if (e === "") {
            notification.innerHTML = "Vui lòng nhập email";
            focus = "email";
        }
        else if (p === "") {
            notification.innerHTML = "Vui lòng nhập mật khẩu";
            focus = "password";
        }
        else if (!validateEmail(e)) {
            notification.innerHTML = "Email không đúng định dạng";
            focus = "email";
        }
        else if (p.length < 6) {
            notification.innerHTML = "Mật khẩu phải chứa ít nhất 6 ký tự";
            focus = "password";
        }
        else if (p !== cp) {
            notification.innerHTML = "Phần nhập lại mật khẩu không chính xác";
            focus = "confirmPassword";
        }

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
    let input = document.getElementById("verify-email").value;

    if (input !== emailVerifyCode) {
        $("#alert").fadeIn(2000);
        $("#alert").fadeOut(2000);
    }
    else {
        let details = new URLSearchParams({
            'email': e,
            'password': p,
            'fullname': fn

        })

        fetch('./api/add-user-client.php', {
            method: 'POST',
            body: details
        })
        .then(response => response.json())
        .then(json => handleResult(json, details))

        function handleResult(response, details) {
            if (response.code === 0) {
                fetch('./api/add-client.php', {
                    method: 'POST',
                    body: details
                })

                let alert = document.getElementById("alert");
                alert.innerHTML = "Đăng ký tài khoản thành công. Mời bạn đăng nhập";
                alert.classList.remove("alert-danger");
                alert.classList.add("alert-success");

                $("#alert").fadeIn(2000);
                $("#alert").fadeOut(2000);
        
                setTimeout(function() {
                    window.location.href = 'login.php'
                }, 4000)        
            }
            else {
                $("#verify-email-modal").modal("hide");

                focus = "email";
                notification.innerHTML = "Email này đã tồn tại.";
                $("#modal").modal("show");
            }
        }
    }
}

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

// Focus vào thẻ input khi close modal
document.getElementById("closeModal").addEventListener("click", function () {
    if (focus === "fullname")
        setTimeout(function () { fullname.focus(); }, 100);
    else if (focus === "email")
        setTimeout(function () { email.focus(); }, 100);
    else if (focus === "password")
        setTimeout(function () { password.focus(); }, 100);
    else
        setTimeout(function () { confirmPassword.focus(); }, 100);
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