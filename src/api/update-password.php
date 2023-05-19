<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/user-db.php");

    if($_SERVER['REQUEST_METHOD']!= 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;

    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;

    $email = $json->email ;
    $oldPassword = $json->oldPassword ;
    $newPassword = $json->newPassword ;

    $result = updatePassword($email, $oldPassword, $newPassword) ;

    if(!$result)
        die(json_encode(array('code' => 2, 'message' => 'Mật khẩu cũ không chính xác'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Đổi mật khẩu thành công. Mời bạn đăng nhập lại.'))) ;
?>