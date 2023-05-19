// Hiển thị thông tin chi tiết của việc làm khi trang được load lần đầu
// Lấy id của bài đăng tuyển dụng dựa vào query parameters trên url
let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let id = urlParams.get('id')

fetch("./api/find-recruitmentnews.php?id=" + id)
.then(response => response.json())
.then(json => showJob(json))

function showJob(json) {
    if(json.code !== 0) {
        window.location.href = "./error.php";
        return ;
    }

    let job = json.data;
    let detailJobHeader = document.getElementById("detail-job-header");
    let description = document.getElementById("description");
    let requirement = document.getElementById("requirement");
    let benefit = document.getElementById("benefit");

    // Format lại định dạng của salary. Vd: 15000000 -> 15.000.000
    let formatedSalary = (job["salary"]).toLocaleString('en-US');
    formatedSalary = formatedSalary.replaceAll(",", ".");

    detailJobHeader.innerHTML = `
                                    <table>
                                        <tr>
                                            <td><img src="./upload/${job["imageName"]}" style="width: 100%;"></td>
                                            <td>
                                                <h2 style="color: #1A73E8;">${job["title"]}</h2>
                                                <p style="text-transform: uppercase;">${job["companyName"]}</p>
                                                <p><i class="fa-regular fa-clock"></i> Đăng ngày: ${job["date"]}</p>
                                            </td>
                                        </tr>
                                    </table>

                                    <h3 class="blue-text">Thông tin tuyển dụng</h3>
                                    <p>Mức lương: ${formatedSalary} VNĐ</p>
                                    <p>Vị trí: ${job["position"]}</p>
                                    <p>Chi tiết liên hệ: ${job["email"]}</p>

                                    <button class="btn btn-primary mr-1" onclick="apply('${job["id"]}')">Ứng tuyển</button>
                                    <button class="btn btn-outline-primary" onclick="addBookmark('${job["id"]}')">Lưu lại</button>
                                `;
    description.innerText = job["description"];
    requirement.innerText = job["requirement"];
    benefit.innerText = job["benefit"];
}

function addBookmark(id) {
    fetch("./api/add-bookmarks.php", {
        method: 'POST',
        body: new URLSearchParams({
            'id': id
        })
    })
    .then(response => response.json())
    .then(json => showModal(json))
}

function apply(id) {
    fetch("./api/add-applyhistory.php", {
        method: 'POST',
        body: new URLSearchParams({
            'id': id
        })
    })
    .then(response => response.json())
    .then(json => showModal(json))  
}

function showModal(json) {
    // Nếu người tìm việc chưa đăng nhập -> redirect họ đến trang đăng nhập
    if(json.code === 3) {
        window.location.href = "./login.php";
        return;
    }

    document.getElementById("content").innerHTML = json.message;
    $("#modal").modal("show");
}