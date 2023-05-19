let modalHeader = document.getElementsByClassName("modal-title")[0];
let selectedIcon;

getAppliedClient();

function getAppliedClient() {
    fetch('./api/get-applyhistory-company.php')
        .then(response => response.json())
        .then(json => handleGet(json))
}

function handleGet(response) {
    let tbody = document.getElementById('tbody')
    let array = response.data
    tbody.innerHTML = "";

    array.forEach(x => {
        let tr = document.createElement('tr');

        tr.innerHTML =
            `
            <td>${x.title}</td>
            <td>${x.date}</td>
            <td>${x.email}</td>

            <td>
                <i class="fa-solid fa-circle-check text-success fa-2x text-center action" onclick="markAccept(this, '${x.email}', '${x.id}')"></i>
                <i class="fa-solid fa-circle-xmark text-danger fa-2x text-center action" onclick="markReject(this, '${x.email}', '${x.id}')"></i>
            </td>
        `
        if (x.result == 1) {
            tr.style.backgroundColor = "rgb(128, 255, 128)";
        }
        else if (x.result == 2) {
            tr.style.backgroundColor = "rgb(255, 128, 128)";
        }
        tbody.append(tr);
    })
}

function markAccept(icon, emailClient, id) {
    selectedIcon = icon;
    let email = document.getElementById("email");
    let f = document.getElementById("feedback");
    f.value = "";
    email.value = emailClient;
    modalHeader.innerHTML = "Bạn chọn chấp nhận người tìm việc đã ứng tuyển";
    modalHeader.style.color = "rgb(40, 167, 69)";
    $('#feedback-modal').modal('show');

    function doAccept() {
        fetch('./api/update-applyhistory.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ result: 1, feedback: f.value, email: emailClient, id: id })
        })        
    }

    document.getElementById('submit').onclick = function (Event) {
        Event.preventDefault();
        
        let waiting = document.getElementById("waiting");
        waiting.classList.remove("d-none");

        setTimeout(function() {
            waiting.classList.add("d-none");

            $('#feedback-modal').modal('hide');

            selectedIcon.parentNode.parentNode.style.backgroundColor = "rgb(128, 255, 128)";

            doAccept()
        }, 1000)
    }
}

function markReject(icon, emailClient, id) {
    selectedIcon = icon;
    let email = document.getElementById("email");
    let f = document.getElementById("feedback");
    f.value = "";
    email.value = emailClient;
    modalHeader.innerHTML = "Bạn chọn từ chối người tìm việc đã ứng tuyển";
    modalHeader.style.color = "rgb(230, 111, 123)";

    $('#feedback-modal').modal('show');

    function doReject() {
        fetch('./api/update-applyhistory.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ result: 2, feedback: f.value, email: emailClient, id: id })
        })
    }

    document.getElementById('submit').onclick = function (Event) {
        Event.preventDefault();
        
        let waiting = document.getElementById("waiting");
        waiting.classList.remove("d-none");

        setTimeout(function() {
            waiting.classList.add("d-none");

            $('#feedback-modal').modal('hide');

            selectedIcon.parentNode.parentNode.style.backgroundColor = "rgb(255, 128, 128)";

            doReject()
        }, 1000)
    }
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