<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản dành cho Nhà tuyển dụng</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <!-- css -->
    <link rel="stylesheet" href="./css/register-company.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-12 text-center" style="background-color: #EAF2FC;">
                <img class="img-fluid mt-5 h-75" src="./img/register-company.gif" alt="img">
            </div>

            <div class="col-md-5 col-12 pl-5 pl-md-2">
                <a href="index.php"><img class="img-fluid" src="./img/logo-white.png"></a>
                <h2 class="blue-text">Chào mừng bạn đến với VnJobFind</h2>
                <h5>Đăng ký ngay để tìm kiếm thêm nhiều ứng viên tài năng</h5>
                <form action="#" method="POST" novalidate>
                    <div class="form-group">
                        <label for="email" class="blue-text">
                            <h5>Email</h5>
                        </label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-dark"><i
                                    class="fa-solid fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control shadow-none" id="email" placeholder="Nhập email của bạn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="blue-text">
                            <h5>Mật khẩu</h5>
                        </label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-dark"><i
                                    class="fa-solid fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control shadow-none" id="password" placeholder="Nhập mật khẩu">
                            <i class="fa-solid fa-eye-slash eye"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword" class="blue-text">
                            <h5>Xác nhận mật khẩu</h5>
                        </label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-dark"><i
                                    class="fa-solid fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control shadow-none" id="confirmPassword"
                                placeholder="Nhập lại mật khẩu">
                            <i class="fa-solid fa-eye-slash eye"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company-name" class="blue-text">
                            <h5>Tên công ty</h5>
                        </label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-dark"><i
                                    class="fa-solid fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control shadow-none" id="company-name" placeholder="Nhập tên công ty của bạn">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="blue-text">
                            <h5>Địa chỉ</h5>
                        </label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-dark"><i
                                    class="fa-solid fa-location-dot"></i></span>
                            </div>
                            <input type="text" class="form-control shadow-none" id="address" placeholder="Nhập địa chỉ công ty">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="blue-text">
                            <h5>Số điện thoại</h5>
                        </label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-dark"><i class="fa-solid fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control shadow-none" id="phone" placeholder="Nhập số điện thoại">
                        </div>
                    </div>
                    <button type="submit" class="btn w-100 text-white " id="submit"
                        style="background-color:#1A73E8">Đăng ký</button>
                    <p class="mt-3">Bạn đã có tài khoản? <a href="login.php" class="blue-text">Đăng nhập</a></p>
                    <p>Bạn là người tìm việc? <a href="register-client.php" class="blue-text">Đăng ký tại đây</a></p>
                </form>
            </div>

            <!-- Footer -->
            <?php require_once("footer.php");?>
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

        <!-- Modal để nhập mã code xác nhận email -->
        <div class="modal fade" id="verify-email-modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Xác nhận địa chỉ email</h4>
                    </div>
                    <!-- Modal body -->
                    <div id="verify-email-modal-body" class="modal-body">
                        <div class="form-group">
                            <label for="verify-email" class="blue-text">
                                <h5>Nhập mã số được gửi đến địa chỉ email của bạn</h5>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-dark"><i class="fa-solid fa-list-ol"></i></span>
                                </div>
                                <input type="text" class="form-control shadow-none" id="verify-email">
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div id="alert" class="alert alert-danger mr-auto" style="display: none">Mã xác nhận không đúng</div>
                        <button onclick="verifyEmail()" type="button" class="btn btn-primary">Xác nhận</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="./js/register-company.js"></script>
</body>

</html>