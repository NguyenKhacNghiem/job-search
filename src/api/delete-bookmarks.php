<?php
    session_start();
    header('Content-Type: application/json') ;
    require_once("../dbs/bookmarks-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'DELETE')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức DELETE'))) ;
    
    $raw = file_get_contents('php://input') ;  
    $data = json_decode($raw) ; 

    if($data->id == null)
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng gửi đầy đủ thông tin'))) ;
    
    $email = $_SESSION["email"] ;
    $id = $data->id ;
    $result = delete($email, $id) ;

    if(!$result)
        die(json_encode(array('code' => 3, 'message' => 'Xóa công việc đã lưu thất bại'))) ;
      
    die(json_encode(array('code' => 0, 'message' => 'Xóa công việc đã lưu thành công'))) ;
?>