window.onload = function () {
    getApplihistoryClient();
}

function getApplihistoryClient() {
    fetch('./api/get-applyhistory-client.php')/* , {method: 'GET'} */
        .then(response => response.json())
        .then(json => handleGetApplihistoryClient(json))
}

function handleGetApplihistoryClient(response) {
    let tbody = document.getElementById('tbody')
    let array = response.data
    let id = 0
    tbody.innerHTML = "";

    array.forEach(x => {
        id += 1
        let tr = document.createElement('tr');

        tr.innerHTML =
        `
            <td>${id}</td>
            <td>${x.title}</td>
        `

        if (x.result === 0)
            tr.innerHTML += "<td>Chưa có</td>";
        else if (x.result === 1)
            tr.innerHTML += "<td>Được chấp nhận</td>";
        else
            tr.innerHTML += "<td>Bị từ chối</td>";
        
        if(x.feedback === "")
            tr.innerHTML += "<td>Không có</td>";
        else
            tr.innerHTML += `<td>${x.feedback}</td>`;

        if(x.result === 1)
            tr.style.backgroundColor = "rgb(128, 255, 128)";
        else if(x.result === 2)
            tr.style.backgroundColor = "rgb(255, 128, 128)";

        tbody.append(tr) ;
      })
  }