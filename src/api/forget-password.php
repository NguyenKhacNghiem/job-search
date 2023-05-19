<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/user-db.php");

    if($_SERVER['REQUEST_METHOD']!= 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;

    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;

    $email = $json->email ;
    $password = $json->password ;

    $result = forgetPassword($email, $password) ;

    if(!$result)
        die(json_encode(array('code' => 2, 'message' => 'Đặt lại mật khẩu thất bại'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Đặt lại mật khẩu thành công.'))) ;
?>