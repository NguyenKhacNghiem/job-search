// load danh sách người dùng khi trang mới tải xong
loadUsers();

function loadUsers() {
    fetch("./api/get-user.php")
    .then(response => response.json())
    .then(json => showUsersOnTable(json))
}

function showUsersOnTable(json) {
    let tbody = document.getElementsByTagName("tbody")[0];

    tbody.innerHTML = ""; // xóa tất cả các dòng
    let trs = "";
    
    json.data.forEach(user => {
        trs += `
                <tr>
                    <td>${user["email"]}</td>
                    <td>${user["fullname"]}</td>
                    <td>${user["gender"]}</td>
                    <td>${user["phone"]}</td>
                    <td>${user["type"]}</td>
                    <td>
                `;
        
        if(user["blocked"] === "1")
            trs += `<button onclick="blockUnblock(this, '${user["email"]}')" class="btn btn-danger w-75">Đã bị khóa</button>`;
        else
            trs += `<button onclick="blockUnblock(this, '${user["email"]}')" class="btn btn-success w-75">Đang hoạt động</button>`;
        
        trs += `</td></tr>`;
    })

    tbody.innerHTML = trs;
}

// Khóa/ Mở khóa tài khoản người dùng
function blockUnblock(button, email) {
    // Cập nhật phía FE
    // Mở tài khoản
    if(button.innerHTML === "Đã bị khóa") {
        
        button.classList.remove("btn-danger");
        button.classList.add("btn-success");
        button.innerHTML = "Đang hoạt động";
    }
    // Khóa tài khoản
    else {
        button.classList.remove("btn-success");
        button.classList.add("btn-danger");
        button.innerHTML = "Đã bị khóa";
    }

    // Cập nhật phía BE
    fetch("./api/block-unblock.php", {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({email: email})
    })
}

