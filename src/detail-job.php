<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết việc làm</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <link rel="stylesheet" href="./css/detail-job.css">
</head>

<body>
    <?php
        session_start();

        if(!isset($_SESSION["email"]) || empty($_SESSION["email"])) 
            require_once("nav-index.php");
        else 
            require_once("nav-client.php");    
    ?>

    <div id="detail-job-header" class="container-fluid py-2" style="background-color: #EAF2FC;">
        <!-- Dữ liệu tại đây sẽ được load tự động -->
    </div>

    <div class="container-fluid py-2">
        <h3 class="blue-text">Mô tả công việc</h3>
        <p id="description">
            <!-- Dữ liệu tại đây sẽ được load tự động -->
        </p>
    </div>

    <div class="container-fluid py-2" style="background-color: #EAF2FC;">
        <h3 class="blue-text">Yêu cầu ứng viên</h3>
        <p id="requirement">
            <!-- Dữ liệu tại đây sẽ được load tự động -->
        </p>
    </div>

    <div class="container-fluid py-2">
        <h3 class="blue-text">Quyền lợi</h3>
        <p id="benefit" style="text-align: justify;text-justify: inter-word;">
            <!-- Dữ liệu tại đây sẽ được load tự động -->
        </p>
    </div>

    <!-- Footer -->
    <?php require_once("footer.php");?>

    <!-- Modal hiển thị thông báo lưu bookmark thành công/ thất bại -->
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thông báo</h4>
                </div>
                <!-- Modal body -->
                <div id="content" class="modal-body"></div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="closeModal" type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>

    <script src="./js/detail-job.js"></script>
</body>

</html>