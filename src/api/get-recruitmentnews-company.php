<?php
    session_start();
    header('Content-Type: application/json') ;
    require_once("../dbs/recruitmentnews-db.php");
    
    if($_SERVER['REQUEST_METHOD'] != 'GET')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    $emailCompany = $_SESSION["email"];
    $result = getByCompany($emailCompany) ;

    if($result == null)
        die(json_encode(array('code' => 2, 'message' => 'Danh sách bài đăng tuyển dụng đang trống.'))) ;

    die(json_encode(array('code' => 0, 'message' => 'Lấy danh sách bài đăng tuyển dụng thành công.', 'data' => $result))) ;
?>