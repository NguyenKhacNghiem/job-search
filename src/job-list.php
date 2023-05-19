<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách việc làm</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <link rel="stylesheet" href="./css/job-list.css">
</head>

<body>
    <?php
        session_start();

        if(!isset($_SESSION["email"]) || empty($_SESSION["email"])) 
        require_once("nav-index.php");
        else 
        require_once("nav-client.php");    
    ?>

    <h3 class="ml-3" style="color: #1A73E8;">Tìm việc làm nhanh 24h, việc làm mới nhất trên toàn quốc</h3>

    <!-- Slider -->
    <div id="slider" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ul class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-targ et="#slider" data-slide-to="2"></li>
            <li data-target="#slider" data-slide-to="3"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/slide1.png" width="100%" height="500">
            </div>
            <div class="carousel-item">
                <img src="./img/slide2.png" width="100%" height="500">
            </div>
            <div class="carousel-item">
                <img src="./img/slide3.png" width="100%" height="500">
            </div>
            <div class="carousel-item">
                <img src="./img/slide4.png" width="100%" height="500">
            </div>
        </div>

        <a class="carousel-control-prev" href="#slider" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#slider" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="container-fluid pt-3" style="background-color: #EAF2FC;">
        <div class="row">
            <div class="position-relative col-12 mb-2">
                <i class="fa-solid fa-search ml-3"></i>
                <input type="text" class="form-control shadow-none py-4 px-5" placeholder="Tên công việc, vị trí muốn ứng tuyển..."
                    style="border-radius: 32px;" name="searchContent" id="searchContent">
                <button id="search" class="btn btn-primary shadow-lg" onclick="search()">Tìm kiếm</button>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-2">
                <select onchange="filter()" name="career" class="custom-select form-control shadow-none" id="career">
                    <option class="font-weight-bold" value="Ngành nghề">Ngành nghề</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Kế toán">Kế toán</option>
                    <option value="Lập trình">Lập trình</option>
                    <option value="Du lịch">Du lịch</option>
                    <option value="Xây dựng">Xây dựng</option>
                </select>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-2">
                <select onchange="filter()" name="area" class="custom-select form-control shadow-none" id="area">
                    <option class="font-weight-bold" value="Địa điểm">Địa điểm</option>
                    <option value="Miền nam">Miền nam</option>
                    <option value="Miền trung">Miền trung</option>
                    <option value="Miền bắc">Miền bắc</option>
                </select>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-2">
                <select onchange="filter()" name="position" class="custom-select form-control shadow-none" id="position">
                    <option class="font-weight-bold" value="Vị trí">Vị trí</option>
                    <option value="Trưởng phòng">Trưởng phòng</option>
                    <option value="Quản lý">Quản lý</option>
                    <option value="Nhân viên">Nhân viên</option>
                    <option value="Thực tập">Thực tập</option>
                </select>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-2">
                <select onchange="filter()" name="salary" class="custom-select form-control shadow-none" id="salary">
                    <option class="font-weight-bold" value="Mức lương">Mức lương</option>
                    <option value="Từ 10 triệu trở xuống">Từ 10 triệu trở xuống</option>
                    <option value="Trên 10 triệu">Trên 10 triệu</option>
                    <option value="Trên 20 triệu">Trên 20 triệu</option>
                    <option value="Trên 30 triệu">Trên 30 triệu</option>
                    <option value="Trên 40 triệu">Trên 40 triệu</option>
                    <option value="Trên 50 triệu">Trên 50 triệu</option>
                </select>
            </div>

            <!-- Hiệu ứng waiting -->
            <div class="waiting d-none"></div>

            <div class="row" id="job-list">
               <!-- Chỗ này sẽ được load tự động -->
            </div>

            <div style="margin: auto" class="mb-3" id="page-navigation">
                <button class="btn btn-secondary" onclick="previousPage()" id="previous"><i class="fa-solid fa-arrow-left"></i></button>

                <span id="page" class="text-primary">1</span>/<span id="total-page">1</span>

                <button class="btn btn-secondary" onclick="nextPage()" id="next"><i class="fa-solid fa-arrow-right"></i></button>
            </div>

            
        </div>
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

    <script src="./js/job-list.js"></script>
</body>

</html>