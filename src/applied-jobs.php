<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Danh sách các công việc đã ứng tuyển</title>

  <!-- Import các thư viện -->
  <?php require_once("libs.php"); ?>

  <link rel="stylesheet" href="./css/applied-jobs.css" />
</head>

<body>
  <!-- Header -->
  <?php 
    session_start();
    require_once("nav-client.php"); 
  ?>

  <div class="container-fluid">
    <h5 style="color: #1a73e8">Danh sách các công việc đã ứng tuyển</h5>

    <table class="table table-hover text-center" id="table">
      <label for=""></label>
      <thead>
        <tr>
          <th>STT</th>
          <th>Công Việc</th>
          <th>Kết Quả</th>
          <th>Phản Hồi</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <!-- <tr>
          <td>1</td>
          <td>Lập trình web</td>
          <td>Đạt</td>
          <td>CV tốt, profile rõ ràng</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Lập trình di động</td>
          <td>Chưa có</td>
          <td>Chưa có</td>
        </tr> -->
        
      </tbody>
    </table>
  </div>

  <!-- Footer -->
  <?php require_once("footer.php");?>

  <script src="./js/applied-jobs.js"></script>
</body>

</html>