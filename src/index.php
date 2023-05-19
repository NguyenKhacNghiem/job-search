<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang cá nhân người tìm việc</title>

  <!-- Import các thư viện -->
  <?php require_once("libs.php"); ?>

  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <?php
    session_start();

    if(!isset($_SESSION["email"]) || empty($_SESSION["email"])) 
      require_once("nav-index.php");
    else {
      if($_SESSION["type"] === "Người tìm việc")
        require_once("nav-client.php");  
      else {
        session_destroy();
        require_once("nav-company.php");
      }
    }
  ?>

  <div class="container-fluid">
    <div class="text-center pb-4">
      <h1 class="blue-text" style="font-size: 80px;">VNJOBFIND</h1>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-12 px-5 my-3">
          <div class="box py-3 px-4">
            <h1 class="blue-text">Tuyển dụng công nghệ số</h1>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 px-5 my-3">
          <div class="box py-3 px-4">
            <h1 class="blue-text">Tìm việc thông minh</h1>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12 px-5 my-3">
          <div class="box py-3 px-4">
            <h1 class="blue-text">Tìm việc chất lượng cao</h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-4 px-5" style="background-color: #EAF2FC;">
    <h2 class="blue-text">VỀ CHÚNG TÔI</h2>
    <div class="text-center">
      <img src="./img/about-us.gif" style="width: 50%;">
    </div>
    <p>Kết nối đúng người đúng việc là một bài toán rất khó ở Việt Nam, là thách thức cho bất kỳ nền tảng tuyển dụng
      nào. Với mục tiêu ứng dụng công nghệ để thay đổi thị trường tuyển dụng, nhân sự ngày càng hiệu quả hơn, đầu năm
      2023, ý tưởng về VnJobFind ra đời.</p>
    <p>Tập trung vào trải nghiệm dành của ứng viên khi đi tìm việc, mục tiêu của VnJobFind là mang đến một nền tảng toàn
      diện, giúp ứng viên phát triển được các kỹ năng cá nhân, xây dựng hình ảnh chuyên nghiệp trong mắt nhà tuyển dụng
      và tiếp cận với các cơ hội việc làm phù hợp.</p>
  </div>

  <div>
    <h2 class="blue-text ml-4 mt-4">ĐỐI TÁC CỦA VNJOBFIND</h2>

    <div class="text-center">
      <img src="./img/manulife.png" style="width: 15%;">
      <img src="./img/flc-group.png" style="width: 15%;">
      <img src="./img/fpt-software.png" style="width: 15%;">
      <img src="./img/tiki.png" style="width: 15%;">
      <img src="./img/viettel.png" style="width: 15%;">
    </div>
  </div>

  <!-- Footer -->
  <?php require_once("footer.php");?>
</body>

</html>