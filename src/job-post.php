<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng tin tuyển dụng</title>

    <!-- Import các thư viện -->
    <?php require_once("libs.php"); ?>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/job-post.css">
</head>

<body>
    <!-- Header -->
    <?php
        session_start(); 
        require_once("nav-company.php") 
    ?>

    <div class="container-fluid pb-3">
        <h5 class="blue-text">Đăng tin tuyển dụng</h5>

        <form action="#" method="POST">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input name="title" type="text" class="form-control shadow-none" id="title"
                    placeholder="Ví dụ: Tuyển dụng lập trình web...">
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label for="position">Vị trí</label>
                    <select id="position" name="position" class="custom-select form-control shadow-none">
                        <option value="Thực tập">Thực tập</option>
                        <option value="Nhân viên">Nhân viên</option>
                        <option value="Quản lý">Quản lý</option>
                        <option value="Trưởng phòng">Trưởng phòng</option>
                    </select>
                </div>

                <div class="form-group col-md-6 col-12">
                    <label for="salary">Mức lương</label>

                    <div class="row">
                        <div class="col-sm-8 col-12 pt-2">
                            <input oninput="showSalary(this)" type="range" class="custom-range" id="salary"
                                name="salary" min="0" max="500000000" step="1000000" value="0">
                        </div>

                        <div class="col-sm-4 col-12">
                            <input onchange="setSalary(this)" type="number" class="form-control shadow-none" id="range-value" value="0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Mô tả công việc</label>
                <textarea placeholder="Ví dụ: Lập trình front end..." class="form-control shadow-none" rows="10" id="description"
                    name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="requirement">Yêu cầu</label>
                <textarea placeholder="Ví dụ: Thành thạo HTML5, CSS3,..." class="form-control shadow-none" rows="10"
                    id="requirement" name="requirement"></textarea>
            </div>

            <div class="form-group">
                <label for="benefit">Quyền lợi</label>
                <textarea placeholder="Ví dụ: Được trợ cấp BHXH, thưởng lương tháng 13,..." class="form-control shadow-none"
                    rows="10" id="benefit" name="benefit"></textarea>
            </div>

            <button id="submit" type="submit" class="btn btn-primary px-4 mr-2">Đăng</button>
            <button type="reset" class="btn btn-danger px-4">Xóa</button>
        </form>
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

    <!-- Link file javascript -->
    <script src="./js/job-post.js"></script>
</body>

</html>