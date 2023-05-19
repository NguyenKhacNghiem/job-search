<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/recruitmentnews-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'GET')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    if(!isset($_GET["id"]))
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng nhập đầy đủ thông tin'))) ;

    $id = $_GET["id"] - 0;

    $result = find($id) ;

    if($result == null)
        die(json_encode(array('code' => 3, 'message' => 'id không tồn tại'))) ;

    die(json_encode(array('code' => 0, 'message' => 'Đã tìm thấy bài đăng tuyển dụng.', 'data' => $result))) ;
?>