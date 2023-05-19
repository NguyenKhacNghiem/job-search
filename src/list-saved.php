<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách các công việc đã lưu</title>

 <!-- Import các thư viện -->
 <?php require_once("libs.php"); ?>

  <link rel="stylesheet" href="./css/list-saved.css">
</head>

<body>
  <!-- Header -->
  <?php
    session_start(); 
    require_once("nav-client.php"); 
  ?>

  <div class="container-fluid">
    <h5 style="color:#1A73E8;">Danh sách các công việc đã lưu</h5>

    <table class="table table-hover text-center" id="table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Công Việc</th>
          <th>Mức Lương</th>
          <th>Liên Hệ</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody id="tbody">
      </tbody>
    </table>
  </div>

  <!-- Footer -->
  <?php require_once("footer.php");?>

  <!-- Modal xác nhận xóa -->
  <div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
          <h4 class="modal-title">Xác nhận</h4>
        </div>
        <!-- Modal body -->
        <div id="content" class="modal-body"></div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button onclick="deletion()" id="yes" type="button" class="btn btn-danger" data-dismiss="modal">Có</button>
          <button id="no" type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
        </div>
      </div>
    </div>
  </div>

  <script src="./js/list-saved.js"></script>
</body>

</html>