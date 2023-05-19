<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài đăng tuyển dụng</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <link rel="stylesheet" href="./css/manage-recruitmentnews.css">
</head>

<body>
    <?php
        require_once("nav-admin.php");
    ?>

    <div class="container-fluid">
        <h4 style="color: #1A73E8;">Danh sách bài đăng tuyển dụng</h4>

        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>Công Việc</th>
                    <th>Email Công Ty</th>
                    <th>Ngày Đăng</th>
                    <th>Duyệt/ Không Duyệt</th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <?php require_once("footer.php");?>

    <script src="./js/manage-recruitmentnews.js"></script>
</body>

</html>