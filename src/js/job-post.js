// sự kiện dành cho input range
let range = document.getElementById("salary");
let rangeValue = document.getElementById("range-value");

function showSalary(range) {
    rangeValue.value = range.value;
}

function setSalary(number) {
    range.value = rangeValue.value;
}

// sự kiện khi submit form
// validate input
let submit = document.getElementById("submit");
let title = document.getElementById("title");
let description = document.getElementById("description");
let requirement = document.getElementById("requirement");
let benefit = document.getElementById("benefit");
let position = document.getElementById("position");
let salary = document.getElementById("salary");
let notification = document.getElementById("notification");
let focus; // kiểm tra xem thẻ input nào cần được focus

submit.addEventListener("click", function (event) {
    event.preventDefault();

    let t = title.value;
    let d = description.value;
    let r = requirement.value;
    let b = benefit.value;
    let p = position.value;
    let s = salary.value;

    if (!(t !== "" && d !== "" && r !== "" && b !== "")) {
        if (t === "") {
            notification.innerHTML = "Vui lòng nhập tiêu đề cho công việc";
            focus = "title";
        }
        else if (d === "") {
            notification.innerHTML = "Vui lòng nhập mô tả cho công việc";
            focus = "description";
        }
        else if (r === "") {
            notification.innerHTML = "Vui lòng nhập yêu cầu cho công việc";
            focus = "requirement";
        }
        else if (b === "") {
            notification.innerHTML = "Vui lòng nhập quyền lợi cho công việc";
            focus = "benefit";
        }
    }
    else{
        fetch("./api/add-recruitmentnews.php",{
            method: 'POST',
            body: new URLSearchParams({
                'title': t,
                'description': d,
                'requirement': r,
                'position': p,
                'salary': s,
                'benefit': b
            })
        })

        let resetBtn = document.querySelector('button[type="reset"]');
        resetBtn.click();
        
        notification.innerHTML = "Tin tuyển dụng của bạn đã được chuyển đến quản trị viên để xem xét.";
    }

    $("#modal").modal(); // dòng code dùng JQuery để show modal
})

// focus vào thẻ input khi close modal
let closeModal = document.getElementById("closeModal");

closeModal.addEventListener("click", function () {
    if (focus === "title")
        setTimeout(function () { title.focus(); }, 100);
    else if (focus === "description")
        setTimeout(function () { description.focus(); }, 100);
    else if (focus === "requirement")
        setTimeout(function () { requirement.focus(); }, 100);
    else
        setTimeout(function () { benefit.focus(); }, 100);
})

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