<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản người dùng</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <link rel="stylesheet" href="./css/admin.css">
</head>

<body>
    <?php
        require_once("nav-admin.php");
    ?>

    <div class="container-fluid">
        <h4 style="color: #1A73E8;">Danh sách tài khoản người dùng</h4>

        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Số Điện Thoại</th>
                    <th>Loại Người Dùng</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>

            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <?php require_once("footer.php");?>

    <script src="./js/admin.js"></script>
</body>

</html>