<?php
    session_start();
    header('Content-Type: application/json') ;
    require_once("../dbs/user-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'GET')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    $result;

    if($_SESSION["type"] !== "Admin")
        $result = getProfileUser($_SESSION["email"]);
    else
        $result = get() ;

    if($result == null)
        die(json_encode(array('code' => 2, 'message' => 'Danh sách người dùng đang trống.'))) ;

    die(json_encode(array('code' => 0, 'message' => 'Lấy danh sách người dùng thành công.', 'data' => $result))) ;
?>