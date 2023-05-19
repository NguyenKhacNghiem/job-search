// Validate input
let submit = document.getElementById("submit");
let fullname = document.getElementById("fullname");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let notification = document.getElementById("notification");
let gender = document.getElementById("gender");
let academicLevel = document.getElementById("level");
let dateOfBirth = document.getElementById("date-of-birth");
let focus; // kiem tra xem the input nao can duoc focus

submit.addEventListener("click", function (event) {
    event.preventDefault();

    let f = fullname.value;
    let e = email.value;
    let p = phone.value;
    let lv = academicLevel.value
    let dob = dateOfBirth.value
    let gd = gender.value

    if (!(f !== "" && e !== "" && p !== "" && validateEmail(e) && validatePhone(p))) {
        if (f === "") {
            notification.innerHTML = "Vui lòng nhập họ tên của bạn";
            focus = "fullname";
        }
        else if (e === "") {
            notification.innerHTML = "Vui lòng nhập email";
            focus = "email";
        }
        else if (p === "") {
            notification.innerHTML = "Vui lòng nhập số điện thoại của bạn";
            focus = "phone";
        }
        else if (!validateEmail(e)) {
            notification.innerHTML = "Email không đúng định dạng";
            focus = "email";
        }
        else if (!validatePhone(p)) {
            notification.innerHTML = "Số điện thoại không đúng định dạng";
            focus = "phone";
        }
    }
    else
    {
        fetch('./api/update-user.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({email: e, fullname: f, gender: gd, phone: p})     
        })

        fetch('./api/update-client.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({email: e, academicLevel: lv, dateOfBirth: dob})
        })

        notification.innerHTML = "Cập nhật thông tin thành công";
    }

    $("#modal").modal(); // dòng code dùng JQuery để show modal
})

const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

function validatePhone(phone) {
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if (phone.match(phoneno))
        return true;
    else
        return false;
}

// Focus vao the input khi close modal
let closeModal = document.getElementById("closeModal");

closeModal.addEventListener("click", function() {   
    if(focus === "fullname") 
        setTimeout(function() {fullname.focus();}, 100); 
    else if(focus === "email") 
        setTimeout(function() {email.focus();}, 100); 
    else 
        setTimeout(function() {phone.focus();}, 100); 
})

window.onload = function () {
    getUser();
    getClient();
}

function getUser() {
    fetch('./api/get-user.php')
    .then(response => response.json())
    .then(json => handleGetUser(json))
}

function handleGetUser(response)
{
    let user = response.data 
    
    document.getElementById("fullname").value = user["fullname"];
    document.getElementById("email").value = user["email"];
    document.getElementById("phone").value = user["phone"];
    document.getElementById("gender").value = user["gender"];
    document.getElementById("profile-image").setAttribute("src", "./upload/" + user["imageName"]);
}

function getClient() {
    fetch('./api/get-client.php')
    .then(response => response.json())
    .then(json => handleGetClient(json))
}

function handleGetClient(response)
{
    let client = response.data 
    
    academicLevel.value = client["academicLevel"];
    dateOfBirth.value = client["dateOfBirth"];
}

// Xử lý chức năng up load file ảnh (đổi profile image)
function openFileDialog() {
    document.getElementById("file").click();
}

function upload() {
    document.getElementById("upload-form").submit();
}

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