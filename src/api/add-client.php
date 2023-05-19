<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/client-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'POST')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức POST')));
    
    if(!isset($_POST['email']))
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng nhập email')));

    $email = $_POST['email'];
    $result = add($email);

    if($result)
        die(json_encode(array('code' => 0, 'message' => 'Đăng ký tài khoản ứng viên thành công')));
    
    die(json_encode(array('code' => 3, 'message' => 'Có lỗi xảy ra khi đăng ký tài khoản ứng viên'))) ;
?>