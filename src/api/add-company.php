<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/company-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'POST')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức POST')));
    
    if(!isset($_POST['email']) || !isset($_POST['companyName']) || !isset($_POST['address']))
        die(json_encode(array('code' => 2, 'message' => 'Vui lòng nhập đầy đủ thông tin')));

    $email = $_POST['email'];
    $companyName = $_POST['companyName'];
    $address = $_POST['address'];

    $result = add($email, $companyName, $address);

    if($result)
        die(json_encode(array('code' => 0, 'message' => 'Đăng ký tài khoản công ty thành công'))) ;
    
    die(json_encode(array('code' => 3, 'message' => 'Có lỗi xảy ra khi đăng ký tài khoản công ty'))) ;
?>