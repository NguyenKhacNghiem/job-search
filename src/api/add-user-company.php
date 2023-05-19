<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/user-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'POST')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức POST')));

    if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['phone']))
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng nhập đầy đủ thông tin')));

    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $result = addByCompany($email, $password, $phone);

    if($result)
        die(json_encode(array('code' => 0, 'message' => 'Thêm user thành công'))) ;
    
    die(json_encode(array('code' => 3, 'message' => 'Có lỗi xảy ra khi thêm user'))) ;
?>