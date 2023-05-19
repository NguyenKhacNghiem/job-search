<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang cá nhân người tìm việc</title>

  <!-- Import các thư viện -->
  <?php require_once("libs.php"); ?>

  <link rel="stylesheet" href="./css/profile-client.css">
</head>

<body>
  <!-- Header -->
  <?php 
    session_start();
    require_once("nav-client.php"); 
  ?>
    
  <div class="container-fluid">
    <h2 class="blue-text">Trang cá nhân</h2>

    <!-- Upload hình ảnh đại diện -->
    <div class="text-center">
      <img id="profile-image" onclick="openFileDialog()"> <!-- thuộc tính src sẽ được cập nhật tự động -->

      <form id="upload-form" action="./api/upload-file.php" method="post" enctype="multipart/form-data">
        <div class="custom-file d-none">
          <input onchange="upload()" accept="image/*" name="file" type="file" class="custom-file-input" id="file">
          <label class="custom-file-label" for="file">Choose file</label>
        </div>

        <!-- Thẻ input này chứa giá trị là trang hiện tại -->
        <input name="page" class="d-none" type="text" value="profile-client.php">
      </form>
    </div>

    <div class="row">
      <!-- Các thẻ input bên trái -->
      <div class="col-6">
        <form action="#" method="PUT" novalidate>

          <div class="form-group">
            <label class="blue-text" for="fullname">Họ và tên:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-signature"></i></span>
              </div>
              <input name="fullname" id="fullname" type="text" class="form-control shadow-none">
            </div>
          </div>

          <div class="form-group">
            <label class="blue-text" for="email">Email:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
              </div>
              <input name="email" id="email" type="email" class="form-control shadow-none" disabled style="background-color: white">
            </div>
          </div>

          <div class="form-group">
            <label class="blue-text" for="gender">Giới tính:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-venus-mars"></i></span>
              </div>
              <select name="gender" id="gender" class="custom-select shadow-none form-control">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
                <option value="Khác">Khác</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="blue-text" for="phone">Số điện thoại:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
              </div>
              <input name="phone" id="phone" type="text" class="form-control shadow-none">
            </div>
          </div>

          <div class="form-group">
            <label class="blue-text" for="level">Trình độ học vấn:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-user-graduate"></i></span>
              </div>
              <select name="level" id="level" class="custom-select shadow-none form-control">
                <option value="Đại học">Đại học</option>
                <option value="Cao đẳng">Cao đẳng</option>
                <option value="Trung học phổ thông">Trung học phổ thông</option>
                <option value="Thấp hơn">Thấp hơn</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="blue-text" for="date-of-birth">Ngày sinh:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
              </div>
              <input name="date-of-birth" id="date-of-birth" type="date" class="form-control shadow-none" value="2005-01-01">
            </div>
          </div>

          <button id="submit" class="btn btn-primary w-100" type="submit">Lưu</button>
        </form>

      </div>

      <!-- Right image -->
      <div class="col-6">
        <img style="width: 100%;height: 100%;" src="img/profile-client.gif">
      </div>

      <!-- Footer -->
      <?php require_once("footer.php");?>
    </div>
  </div>

  <!-- Modal để hiển thị lỗi -->
  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header">
          <h4 class="modal-title">Thông báo</h4>
        </div>
        <!-- Modal body -->
        <div id="notification" class="modal-body"></div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="closeModal" type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>

      </div>
    </div>
  </div>

  <script src="js/profile-client.js"></script>
</body>

</html>