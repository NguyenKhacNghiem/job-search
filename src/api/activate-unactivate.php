<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/recruitmentnews-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;
    
    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;

    if($json->id == null)
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng gửi đầy đủ thông tin !'))) ;
    
    $id = $json->id - 0 ; // chuyển string sang int

    $result = activateAndUnactivate($id) ;
    
    if($result <= 0)
        die(json_encode(array('code' => 3, 'message' => 'Không tìm thấy bài đăng tuyển dụng !'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Duyệt/ Không duyệt bài đăng tuyển dụng thành công'))) ;
?>