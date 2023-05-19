<?php
    session_start();

    header('Content-Type: application/json') ;
    require_once("../dbs/user-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'POST')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = find($email, $password) ;

    if($result == null)
        die(json_encode(array('code' => 2, 'message' => 'Tài khoản hoặc mật khẩu không chính xác'))) ;

    if($result["blocked"] === 1)
        die(json_encode(array('code' => 3, 'message' => 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ quản trị viên để biết thêm thông tin chi tiết.'))) ;

    $_SESSION["email"] = $email;
    $_SESSION["fullname"] = $result["fullname"];
    $_SESSION["type"] = $result["type"];
    
    die(json_encode(array('code' => 0, 'message' => 'Đăng nhập thành công.', 'data' => $result))) ;
?>