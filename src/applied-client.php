<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người tìm việc đã ứng tuyển</title>

    <!-- Import các thư viện -->
    <?php require_once "libs.php";?>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/applied-client.css">
</head>

<body>
    <!-- Header -->
    <?php
        session_start(); 
        require_once "nav-company.php"
    ?>

    <div class="container-fluid">
        <h5 class="blue-text">Danh sách người tìm việc đã ứng tuyển</h5>
        <table class="table table-hover text-center" id="table">
            <thead>
                <tr>
                    <th>Công Việc</th>
                    <th>Ngày Đăng</th>
                    <th>Người Ứng Tuyển</th>
                    <th>Phản Hồi</th>
                </tr>
            </thead>
            <tbody id = "tbody">
                
            </tbody>
        </table>
    </div>

    <!-- Modal để phản hồi -->
    <div class="modal fade" id="feedback-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">
                            <h5 class="text-primary">Email</h5>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <span class="input-group-text bg-white text-dark"><i
                                    class="fa-solid fa-envelope"></i></span>
                            </div>
                            <input value="Email này sẽ được tự động điền khi người dùng chọn" type="email" class="form-control bg-white shadow-none" id="email" name="email" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="feedback">
                            <h5 class="text-primary">Phản hồi</h5>
                        </label>
                        <textarea class="form-control shadow-none" id="feedback" name="feedback" placeholder="Hãy viết gì đó cho ứng viên của bạn..." rows="8"></textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="spinner-border text-secondary mr-auto d-none" id="waiting"></div>
                    <button type="button" class="btn btn-primary" id="submit">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id = "close">Đóng</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once "footer.php";?>

    <script src="./js/applied-client.js"></script>
</body>

</html>