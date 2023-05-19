<nav class="navbar navbar-expand-sm">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php"><img src="img/logo-white.png"></a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
        <li class="nav-item"><a class="nav-link" href="job-list.php">Việc Làm</a></li>
        <li class="nav-item"><a class="nav-link" href="https://drive.google.com/drive/folders/1tP5UCooaLBBeDsTCLepnCjDMfmuV5XUK">CV Mẫu</a></li>
    </ul>

    <!-- Dropdown -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: white;">
                <?php echo '<i class="fa-solid fa-user"></i> ' . $_SESSION["email"]; ?>
            </a>
            <div class="dropdown-menu" style="padding: 15px 15px;box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2)">
                <a class="dropdown-item" href="profile-client.php">Thông tin cá nhân</a>
                <a class="dropdown-item" href="applied-jobs.php">Danh sách công việc đã ứng tuyển</a>
                <a class="dropdown-item" href="list-saved.php">Danh sách công việc đã lưu</a>
                <a class="dropdown-item" href="change-password.php">Đổi mật khẩu</a>
                <a class="dropdown-item" href="login.php" style="color: red;">Đăng xuất</a>
            </div>
        </li>
    </ul>
</nav>