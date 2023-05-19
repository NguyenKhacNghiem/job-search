// load danh sách bài đăng tuyển dụng khi trang mới tải xong
loadRequirements();

function loadRequirements() {
    fetch("./api/get-recruitmentnews-admin.php")
    .then(response => response.json())
    .then(json => showRequirementsOnTable(json))
}

function showRequirementsOnTable(json) {
    let tbody = document.getElementsByTagName("tbody")[0];

    tbody.innerHTML = ""; // xóa tất cả các dòng
    let trs = "";
    
    json.data.forEach(requirement => {
        trs += `
                <tr>
                    <td>${requirement["title"]}</td>
                    <td>${requirement["email"]}</td>
                    <td>${requirement["date"]}</td>
                    <td>
                `;
        
        if(requirement["deleted"] === "0")
            trs += `<button onclick="activateUnactivate(this, '${requirement["id"]}')" class="btn btn-outline-success"><i class="fa-solid fa-lock-open"></i></button>`;
        else // deleted = 2 -> chưa được duyệt và đang trong hàng chờ
            trs += `<button onclick="activateUnactivate(this, '${requirement["id"]}')" class="btn btn-outline-danger"><i class="fa-solid fa-lock"></i></button>`;
        
        trs += `</td></tr>`;
    })

    tbody.innerHTML = trs;
}

// Duyệt/ Không duyệt bài đăng tuyển dụng
function activateUnactivate(button, id) {
    // Cập nhật phía FE
    // Duyệt bài đăng tuyển dụng
    if(button.innerHTML === '<i class="fa-solid fa-lock"></i>') {
        
        button.classList.remove("btn-outline-danger");
        button.classList.add("btn-outline-success");
        button.innerHTML = '<i class="fa-solid fa-lock-open"></i>'; 
    }
    // Không duyệt bài đăng tuyển dụng
    else {
        button.classList.remove("btn-outline-success");
        button.classList.add("btn-outline-danger");
        button.innerHTML = '<i class="fa-solid fa-lock"></i>';
    }

    // Cập nhật phía BE
    fetch("./api/activate-unactivate.php", {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({id: id})
    })
}

