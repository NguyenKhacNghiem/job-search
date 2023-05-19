// Load danh sách các bài đăng tuyển dụng, lọc bài đăng tuyển dụng,...
// Biến toàn cục
let page = 1; 
let totalPage = document.getElementById("total-page");

// Load danh sách các bài đăng tuyển dụng khi trang tải lần đầu
loadJobs(page);

function loadJobs(page) {
    let career = document.getElementById("career").value;
    let area = document.getElementById("area").value;
    let position = document.getElementById("position").value;
    let salary = document.getElementById("salary").value;
    let searchContent = document.getElementById("searchContent").value;

    // Gọi API để lấy kết quả
    let queryParams = "page=" + page + "&career=" + career + "&area=" + area + "&position=" + position + "&salary=" + salary + "&searchContent=" + searchContent;

    fetch("./api/get-recruitmentnews-client.php?" + queryParams)
    .then(response => response.json())
    .then(json => reload(json))
}

function previousPage() {
    page--;

    if(page < 1)
        page = 1;

    loadJobs(page);
}

function nextPage() {
    page++;

    if(page > totalPage.innerHTML - 0)
        page = totalPage.innerHTML - 0; // chuyển string sang int

    loadJobs(page);
}

function reload(json) {
    let pageNavigation = document.getElementById("page-navigation");
    let jobList = document.getElementById("job-list");

    // Khi không tìm thấy bài tuyển dụng nào thỏa yêu cầu của người dùng
    if(json.code !== 0) {
        jobList.innerHTML = "<span class='mr-4'></span> Không tìm thấy bài tuyển dụng nào thỏa yêu cầu của bạn.";
        pageNavigation.classList.add("d-none"); // ẩn khu vực lùi/ chuyển trang

        return;
    }

    let jobs = json.data;
    let allJobs = "";

    jobs.forEach(job => {
        // Kiểm tra xem tiêu đề của công việc có quá dài không, nếu có chúng ta thay thế phần còn lại bằng dấu "..."
        let jobTitle = job["title"];
        if(jobTitle.length > 32)
            jobTitle = jobTitle.substring(0, 32) + "...";

        // Kiểm tra xem tên của công ty có quá dài không, nếu có chúng ta thay thế phần còn lại bằng dấu "..."
        let companyName = job["companyName"];
        if(companyName.length > 35)
            companyName = companyName.substring(0, 35) + "...";

        // Format lại định dạng của salary. Vd: 15000000 -> 15.000.000
        let formatedSalary = (job["salary"]).toLocaleString('en-US');
        formatedSalary = formatedSalary.replaceAll(",", ".");

        allJobs += `
                    <div class="px-5 col-lg-6 col-12 mb-3">
                        <div class="job">
                            <div class="row">
                                <div class="col-lg-4 col-3">
                                    <img class="job-image ml-2 mt-2" src="./upload/${job["imageName"]}">
                                </div>

                                <div class="col-lg-8 col-9 mt-3">
                                    <h6>${jobTitle}</h6>
                                    <p class="text-secondary">${companyName}</p>
                                    <p>${formatedSalary} VNĐ</p>
                                </div>

                                <div class="ml-4 my-2">
                                    <button onclick="viewDetailJob('${job["id"]}')" class="btn btn-primary mr-2">Xem chi tiết</button>
                                    <button class="btn btn-outline-primary" onclick="addBookmark('${job["id"]}')">Lưu lại</button>
                                </div>
                            </div>
                        </div>
                    </div>            
                    `
    });

    jobList.innerHTML = allJobs;

    // Hiện khu vực lùi/ chuyển trang + trang hiện tại + tổng số trang
    pageNavigation.classList.remove("d-none"); 
    totalPage.innerHTML = json.totalPage;
    document.getElementById("page").innerHTML = page; 
}

// Tìm kiếm các bài đăng tuyển dụng
function search() {
    // Tạo hiệu ứng waiting
    let waiting = document.getElementsByClassName("waiting")[0];

    waiting.classList.remove("d-none");
    waiting.classList.add("d-block");

     // Ẩn hiệu ứng waiting và show kết quả tìm kiếm
    setTimeout(function() {
        waiting.classList.remove("d-block");
        waiting.classList.add("d-none");
    }, 1000);

    // Hiển thị kết quả tìm kiếm
    page = 1; // reset page (biến toàn cục) về 1
    loadJobs(page);
}

// Lọc danh sách các bài đăng tuyển dụng
function filter() {
    page = 1; // reset page (biến toàn cục) về 1
    loadJobs(page);
}

function viewDetailJob(id) {
    window.location.href = "./detail-job.php?id=" + id;
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

function showModal(json) {
    // Nếu người tìm việc chưa đăng nhập -> redirect họ đến trang đăng nhập
    if(json.code === 3) {
        window.location.href = "./login.php";
        return;
    }
    
    document.getElementById("content").innerHTML = json.message;
    $("#modal").modal("show");
}

// Tạo hiệu ứng cho các thẻ input khi nó được focus vào
let inputs = document.querySelectorAll(".form-control");

for(let i=0;i<inputs.length;i++) {
    inputs[i].addEventListener("focus", function() {
        inputs[i].style.border = "2px solid rgb(0, 123, 255)";
    })

    inputs[i].addEventListener("focusout", function() {
        inputs[i].style.border = "";
    })
}