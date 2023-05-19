<?php   
    session_start();
    header('Content-Type: application/json') ;
    require_once("../dbs/bookmarks-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'GET')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    $emailClient = $_SESSION["email"];
    $result = get($emailClient) ;

    if($result == null)
        die(json_encode(array('code' => 2, 'message' => 'Danh sách công việc đã lưu hiện đang trống'))) ;

    die(json_encode(array('code' => 0, 'message' => 'Lấy danh sách công việc đã lưu thành công.', 'data' => $result))) ;
?>