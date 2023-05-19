<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang cá nhân công ty</title>

  <!-- Import các thư viện -->
  <?php require_once("libs.php"); ?>

  <link rel="stylesheet" href="./css/profile-company.css">

</head>

<body>
  <!-- Header -->
  <?php 
    session_start();
    require_once("nav-company.php") 
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
              <select name="gender" id="gender" class="custom-select form-control shadow-none">
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
            <label class="blue-text" for="level">Tên công ty</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
              </div>
              <input name="company-name" id="company-name" type="text" class="form-control shadow-none">
            </div>
          </div>

          <div class="form-group">
            <label class="blue-text" for="level">Địa chỉ</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
              </div>
              <input name="address" id="address" type="text" class="form-control shadow-none">
            </div>
          </div>

          <div class="form-group">
            <label class="blue-text" for="level">Website:</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
              </div>
              <input name="website" id="website" type="text" class="form-control shadow-none">
            </div>
          </div>

          <button id="submit" class="btn btn-primary w-100" type="submit">Lưu</button>
        </form>
      </div>

      <!-- Right image -->
      <div class="col-6">
        <img style="width: 100%;height: 100%;" src="./img/profile-company.gif">
      </div>

    </div>
  </div>

  <div class="bg-table mt-3 pt-3 p-sm-2">
    <table class="table table-hover text-center" id="table">
      <label for="" style="color:#1A73E8; font-weight: bold;">
        <h5>Danh sách các bài tuyển dụng đã đăng</h5>
      </label>
      <thead>
        <tr>
          <th>STT</th>
          <th>Công Việc</th>
          <th>Vị Trí</th>
          <th>Ngày Đăng</th>
          <th>Xóa</th>
        </tr>
      </thead>
      <tbody id="tbody">
      </tbody>
    </table>
  </div>
  <!-- Footer -->
  <?php require_once("footer.php");?>

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

  <!-- Modal xác nhận xóa -->
  <div class="modal fade" id="confirm-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal header -->
        <div class="modal-header" id="modal-header">
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

  <script src="./js/profile-company.js"></script>
</body>

</html>