<?php
    header('Content-Type: application/json') ;
    require_once('../dbs/user-db.php') ;

    if($_SERVER['REQUEST_METHOD'] != 'PUT')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức PUT'))) ;
    
    $raw = file_get_contents('php://input') ;
    $json = json_decode($raw) ;

    if($json->email == null)
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng gửi đầy đủ thông tin !'))) ;
    
    $email = $json->email ;

    $result = blockAndUnblock($email) ;
    
    if($result <= 0)
        die(json_encode(array('code' => 3, 'message' => 'Không tìm thấy email !'))) ;
    
    die(json_encode(array('code' => 0, 'message' => 'Cập nhật trạng thái khóa/ mở khóa thành công'))) ;
?>