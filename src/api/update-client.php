<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/client-db.php");

    if($_SERVER['REQUEST_METHOD']!= 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;

    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;

    $email = $json->email ;
    $academicLevel = $json->academicLevel ;
    $dateOfBirth = $json->dateOfBirth ;

    $result = update($email,$academicLevel, $dateOfBirth) ;

    if(!$result)
        die(json_encode(array('code' => 2, 'message' => 'Cập nhật thông tin ứng viên thất bại'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Cập nhật thông tin ứng viên thành công'))) ;
?>