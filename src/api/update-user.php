<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/user-db.php");
    
    if($_SERVER['REQUEST_METHOD'] != 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;

    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;

    $email = $json->email ;
    $fullname = $json->fullname ;
    $gender = $json->gender ;
    $phone = $json->phone ;

    $result = update($email, $fullname, $gender, $phone) ;

    if(!$result)
        die(json_encode(array('code' => 2, 'message' => 'Cập nhật user thất bại'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Cập nhật user thành công'))) ;
?>