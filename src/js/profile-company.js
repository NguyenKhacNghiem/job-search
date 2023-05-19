// Delele row 
let deletedId;

function confirmDelete(stt, id) {
    // Hiển thị modal xác nhận xóa
    $("#confirm-modal").modal(); // dòng code sử dụng JQuery để show modal
    document.getElementById("content").innerHTML = "Xác nhận xóa bài tuyển dụng có <b> STT là " + stt + "</b>?";

    deletedId = id;
}

function deletion() {
    fetch('./api/delete-recruitmentnews.php', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({id: deletedId})
    })
    .then(response => response.json())
    .then(json => getRecruitmentnewsCompany())
}

document.getElementById("submit").addEventListener("click", function (e) {


})

// Validate input
let submit = document.getElementById("submit");
let fullname = document.getElementById("fullname");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let gender = document.getElementById("gender")
let company_name = document.getElementById("company-name")
let address = document.getElementById("address")
let website = document.getElementById("website")
let notification = document.getElementById("notification");
let focus; // kiem tra xem the input nao can duoc focus


submit.addEventListener("click", function (event) {
    event.preventDefault();

    let f = fullname.value;
    let e = email.value;
    let p = phone.value;
    let cn = company_name.value;
    let add = address.value;
    let web = website.value;
    let gd = gender.value;

    if (!(f !== "" && e !== "" && p !== "" && validateEmail(e) && validatePhone(p) && cn !== "" && add !== "" && web !== "" && validateWeb(web))) {
        if (f === "") {
            notification.innerHTML = "Vui lòng nhập họ tên của bạn";
            focus = "fullname";
        }
        else if (e === "") {
            notification.innerHTML = "Vui lòng nhập email";
            focus = "email";
        }
        else if (!validateEmail(e)) {
            notification.innerHTML = "Email không đúng định dạng";
            focus = "email";
        }
        else if (p === "") {
            notification.innerHTML = "Vui lòng nhập số điện thoại của bạn";
            focus = "phone";
        }
        else if (!validatePhone(p)) {
            notification.innerHTML = "Số điện thoại không đúng định dạng";
            focus = "phone";
        }
        else if (cn === "") {
            notification.innerHTML = "Vui lòng nhập tên của công ty";
            focus = "company-name";
        }
        else if (add === "") {
            notification.innerHTML = "Vui lòng nhập địa chỉ của công ty";
            focus = "address";
        }
        else if (web === "") {
            notification.innerHTML = "Vui lòng nhập đường link website";
            focus = "website";
        }
        else if (!validateWeb(web)) {
            notification.innerHTML = "Đường link website không hợp lệ";
            focus = "website";
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
    
        fetch('./api/update-company.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({email: e, companyName: cn, address: add, website: web})
        })
        
        notification.innerHTML = "Cập nhật thông tin thành công";
    }

    $("#modal").modal(); // dòng code sử dụng JQuery để show modal
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

function validateWeb(web) {
    let pattern = new RegExp('^(https?:\\/\\/)?' + 
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + 
        '((\\d{1,3}\\.){3}\\d{1,3}))' + 
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + 
        '(\\?[;&a-z\\d%_.~+=-]*)?' + 
        '(\\#[-a-z\\d_]*)?$', 'i'); 

    return pattern.test(web);
}

// Focus vao the input khi close modal
let closeModal = document.getElementById("closeModal");

closeModal.addEventListener("click", function () {
    if (focus === "fullname")
        setTimeout(function () { fullname.focus(); }, 100);
    else if (focus === "email")
        setTimeout(function () { email.focus(); }, 100);
    else if (focus === "phone")
        setTimeout(function () { phone.focus(); }, 100);
    else if (focus === "company-name")
        setTimeout(function () { company_name.focus(); }, 100);
    else if (focus === "address")
        setTimeout(function () { address.focus(); }, 100);
    else
        setTimeout(function () { website.focus(); }, 100);
})


window.onload = function () {
    getRecruitmentnewsCompany();
    getUser();
    getCompany();
}

function getRecruitmentnewsCompany() {
    fetch('./api/get-recruitmentnews-company.php')
    .then(response => response.json())
    .then(json => handleGetRecruitmentnews(json))
}

function handleGetRecruitmentnews(response)
{
    let tbody = document.getElementById('tbody') 
    let array = response.data  
    tbody.innerHTML = "";

    for(let i=0;i<array.length;i++) {
        let tr = document.createElement('tr') ;

        tr.innerHTML = 
        `
            <td>${i+1}</td>
            <td>${array[i]["title"]}</td>
            <td>${array[i]["position"]}</td>
            <td>${array[i]["date"]}</td>
            <td class="del"><i id="${array[i]["id"]}" class="fa-solid fa-circle-xmark text-danger fa-2x text-center"
              onclick="confirmDelete(${i+1}, ${array[i]["id"]})"></i></td>
        `

        if(array[i]["deleted"] - 0 === 2)
            tr.classList.add("bg-warning");
            
        tbody.append(tr) ;
    }

}

function getUser() {
    fetch('./api/get-user.php')
    .then(response => response.json())
    .then(json => handleGetUser(json))
}

function handleGetUser(response)
{
    let user = response.data 
    
    fullname.value = user["fullname"];
    document.getElementById("email").value = user["email"];
    phone.value = user["phone"];
    gender.value = user["gender"];     
    document.getElementById("profile-image").setAttribute("src", "./upload/" + user["imageName"]); 
}

function getCompany() {
    fetch('./api/get-company.php')
    .then(response => response.json())
    .then(json => handleGetCompany(json))
}

function handleGetCompany(response)
{
    let company = response.data 
    
    company_name.value = company["companyName"];
    address.value = company["address"];
    website.value = company["website"];           
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