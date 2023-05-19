<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/recruitmentnews-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'DELETE')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức DELETE'))) ;
    
    $raw = file_get_contents('php://input') ;  
    $data = json_decode($raw) ; 

    if($data->id == null)
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng gửi id'))) ;
    
    $id = $data->id ;
    $result = delete($id) ;

    if(!$result)
        die(json_encode(array('code' => 3, 'message' => 'Id không tồn tại'))) ;
      
    die(json_encode(array('code' => 0, 'message' => 'Xóa bài đăng tuyển dụng thành công'))) ;
?>