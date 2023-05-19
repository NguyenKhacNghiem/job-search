<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/company-db.php");

    if($_SERVER['REQUEST_METHOD']!= 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;

    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;

    $email = $json->email ;
    $companyName = $json->companyName ;
    $address = $json->address ;
    $website = $json->website ;

    $result = update($email, $companyName, $address, $website) ;

    if(!$result)
        die(json_encode(array('code' => 2, 'message' => 'Cập nhật thông tin công ty thất bại'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Cập nhật thông tin công ty thành công'))) ;
?>