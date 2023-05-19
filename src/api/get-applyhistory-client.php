<?php
    session_start();
    
    header('Content-Type: application/json') ;
    require_once("../dbs/applyhistory-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'GET')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    $emailClient = $_SESSION["email"];

    $result = getByClient($emailClient) ;

    if($result == null)
        die(json_encode(array('code' => 3, 'message' => 'Danh sách công việc đã ứng tuyển đang trống.'))) ;

    die(json_encode(array('code' => 0, 'message' => 'Lấy danh sách công việc đã ứng tuyển thành công.', 'data' => $result))) ;
?>
