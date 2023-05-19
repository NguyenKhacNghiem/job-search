<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>
    
    <!-- Css -->
    <link rel="stylesheet" href="./css/forget-password.css">
</head>

<body>
    <div class="row">
        <div class="col-6">
            <img src="img/forget-password.gif" id="forget-password-img">
        </div>

        <div class="col-6">
            <a href="index.php"><img src="img/logo-white.png" id="logo"></a>

            <h2 class="blue-text">Quên mật khẩu</h2>

            <form action="#" method="POST" novalidate>
                <div class="form-group">
                    <label class="blue-text" for="email">Email:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control shadow-none" placeholder="Nhập email của bạn">
                    </div>
                </div>

                <button id="submit" class="btn btn-primary w-100" type="submit">Xác nhận</button>
            </form>

            <a href="login.php" >Quay lại đăng nhập</a>
        </div>

        <!-- Footer -->
        <?php require_once("footer.php");?>
    </div>

    <!-- Modal để hiển thị thông báo -->
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
                        <h4 class="modal-title">Đặt lại mật khẩu</h4>
                    </div>
                    <!-- Modal body -->
                    <div id="verify-email-modal-body" class="modal-body">
                        <div class="form-group">
                            <label class="blue-text" for="new-password">Mật khẩu mới</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                </div>
                                <input name="new-password" id="new-password" type="password" class="form-control shadow-none"
                                    placeholder="Nhập mật khẩu mới của bạn">
                                <i class="fa-solid fa-eye-slash" id="first_eye"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="blue-text" for="confirm-new-password">Xác nhận mật khẩu mới</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                </div>
                                <input name="confirm-new-password" id="confirm-new-password" type="password" class="form-control shadow-none"
                                    placeholder="Nhập lại mật khẩu mới của bạn">
                                <i class="fa-solid fa-eye-slash" id="second_eye"></i>
                            </div>
                        </div>

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

    <script src="./js/forget-password.js"></script>
</body>

</html>