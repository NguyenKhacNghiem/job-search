<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <link rel="stylesheet" href="./css/change-password.css">
</head>

<body>
    <div>
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <img src="./img/change-password.gif" alt="" class="w-100 ">
            </div>
            <div class="col-lg-6 col-md-4 col-sm-12">
                <a href="index.php"><img src="./img/logo-white.png" id="logo"></a>
                <h3 class="blue-text">Đổi mật khẩu</h3>
                <form action="#" method="PUT" novalidate>

                    <div class="form-group mb-3">
                        <label class="blue-text " for="email">Email:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            </div>
                            
                            <?php
                                session_start();

                                if(!isset($_SESSION["email"]))
                                    Header("Location: login.php");
                                else {
                                    $email = $_SESSION["email"];
                                    echo "<input style='background-color: white' disabled name='email' id='email' type='email' class='form-control shadow-none' value='$email'>";
                                }
                            ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="blue-text" for="old-pwd">Mật khẩu cũ</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></i></span>
                            </div>
                            <input name="old-pwd" id="old-pwd" type="password" class="form-control shadow-none"
                                placeholder="Nhập mật khẩu cũ của bạn">
                            <i class="fa-solid fa-eye-slash" id="first_eye"></i>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="blue-text" for="new-pwd">Mật khẩu mới</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            </div>
                            <input name="new-pwd" id="new-pwd" type="password" class="form-control shadow-none"
                                placeholder="Nhập mật khẩu mới của bạn">
                            <i class="fa-solid fa-eye-slash" id="second_eye"></i>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="blue-text" for="confirm-pwd">Xác nhận mật khẩu mới</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            </div>
                            <input name="confirm-pwd" id="confirm-pwd" type="password" class="form-control shadow-none"
                                placeholder="Nhập lại mật khẩu mới của bạn">
                            <i class="fa-solid fa-eye-slash" id="third_eye"></i>
                        </div>
                    </div>

                    <button id="submit" class="btn btn-primary w-100" type="submit">Đổi mật khẩu</button>

                </form>
            </div>
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


        <script src="./js/change-password.js"></script>
</body>

</html>