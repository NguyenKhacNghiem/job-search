<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/applyhistory-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;
    
    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;
    
    $email = $json->email ;
    $id = $json->id ;
    $result = $json->result ;
    $feedback = $json->feedback ;

    $result = update($email, $id, $result, $feedback) ;

    if(!$result)
        die(json_encode(array('code' => 0, 'message' => 'Phản hồi thất bại'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Phản hồi thành công'))) ;
?>