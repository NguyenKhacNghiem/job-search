let deletedId;

// Lấy danh sách bookmarks khi trang được load
getBookmarks();

function getBookmarks() {
    fetch('./api/get-bookmarks.php')
    .then(response => response.json())
    .then(json => handleGetBookmarks(json))
}

function handleGetBookmarks(response) {
    let tbody = document.getElementById('tbody')
    tbody.innerHTML = "";

    let array = response.data;

    for (let i = 0; i < array.length; i++) {
        let tr = document.createElement('tr');
        
        // Format lại định dạng của salary. Vd: 15000000 -> 15.000.000
        let formatedSalary = (array[i]["salary"]).toLocaleString('en-US');
        formatedSalary = formatedSalary.replaceAll(",", ".");

        tr.innerHTML =
            `
                <td>${i + 1}</td>
                <td>${array[i]["title"]}</td>
                <td>${formatedSalary} VNĐ</td>
                <td>${array[i]["email"]}</td>
                <td class="del"><i id="${array[i]["id"]}" class="fa-solid fa-circle-xmark text-danger fa-2x text-center"
                onclick="confirmDelete(${i + 1}, ${array[i]["id"]})"></i></td>
            `
        tbody.append(tr);
    }

}

// Xóa bookmarks
function confirmDelete(stt, id) {
    // Hiển thị modal xác nhận xóa
    $("#confirm-modal").modal(); // dòng code sử dụng JQuery để show modal
    document.getElementById("content").innerHTML = "Xác nhận xóa công việc đã lưu có <b> STT là " + stt + "</b>?";

    deletedId = id;
}

function deletion() {
    fetch('./api/delete-bookmarks.php', {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({id: deletedId})
    })

    getBookmarks();
}