<nav class="navbar navbar-expand-sm">
    <!-- Brand -->
    <img src="./img/logo-white.png">

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: white;">
                <?php echo '<i class="fa-solid fa-user"></i> ' . $_SESSION["email"]; ?>
            </a>
            <div class="dropdown-menu" style="padding: 15px 15px;box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2)">
                <a class="dropdown-item" href="profile-company.php">Thông tin cá nhân</a>
                <a class="dropdown-item" href="job-post.php">Đăng tin tuyển dụng</a>
                <a class="dropdown-item" href="applied-client.php">Xem yêu cầu ứng tuyển</a>
                <a class="dropdown-item" href="change-password.php">Đổi mật khẩu</a>
                <a class="dropdown-item" href="login.php" style="color: red;">Đăng xuất</a>
            </div>
        </li>
    </ul>
</nav>