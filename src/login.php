<?php 
    session_start();

    if(isset($_SESSION["email"]) && isset($_SESSION["fullname"]) && isset($_SESSION["type"]))
        session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <!-- Css -->
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <div class="row">
        <div class="col-6">
            <img src="img/login.gif" id="login-img">
        </div>

        <div class="col-6">
            <a href="index.php"><img src="img/logo-white.png" id="logo"></a>

            <h2 class="blue-text">Chào mừng bạn đã quay trở lại với VnJobFind</h2>

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

                <div class="form-group">
                    <label class="blue-text" for="password">Mật khẩu:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control shadow-none" placeholder="Nhập mật khẩu">
                        <i class="fa-solid fa-eye-slash" id="eye"></i>
                    </div>
                </div>

                <button id="submit" class="btn btn-primary w-100" type="submit">Đăng nhập</button>
            </form>

            Bạn chưa có tài khoản? <a href="register-client.php">Đăng ký</a> <br>
            <a href="forget-password.php">Quên mật khẩu</a>
        </div>

        <!-- Footer -->
        <?php require_once("footer.php"); ?>
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
                <div id="error" class="modal-body"></div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="closeModal" type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>

    <script src="./js/login.js"></script>
</body>

</html>