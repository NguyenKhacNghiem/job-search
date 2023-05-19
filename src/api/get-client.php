<?php
    session_start();
    header('Content-Type: application/json') ;
    require_once("../dbs/client-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'GET')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    $emailClient = $_SESSION["email"];
    $result = get($emailClient) ;

    if($result == null)
        die(json_encode(array('code' => 2, 'message' => 'Thông tin user đang trống'))) ;

    die(json_encode(array('code' => 0, 'message' => 'Lấy thông tin user thành công.', 'data' => $result))) ;
?>