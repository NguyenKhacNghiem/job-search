<?php
    session_start();

    header('Content-Type: application/json') ;
    require_once("../dbs/applyhistory-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'POST')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức POST'))) ;
    
    // Nếu người tìm việc chưa đăng nhập -> redirect họ đến trang đăng nhập
    if(!isset($_SESSION['email']))
        die(json_encode(array('code' => 3, 'message' => 'Bạn cần đăng nhập để có thể ứng tuyển.'))) ;

    $email = $_SESSION['email'] ;
    $id = $_POST['id'] ;
    
    $result = add($email, $id) ;

    if($result)
        die(json_encode(array('code' => 0, 'message' => 'Ứng tuyển thành công. Hãy chờ phản hồi từ nhà tuyển dụng nhé.'))) ;

    die(json_encode(array('code' => 2, 'message' => 'Bạn đã ứng tuyển vào công việc này rồi. Hãy chọn một công việc khác nhé.'))) ;
?>