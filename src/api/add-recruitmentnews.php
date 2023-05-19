<?php
    session_start();
    header('Content-Type: application/json') ;
    require_once("../dbs/recruitmentnews-db.php");

    if($_SERVER['REQUEST_METHOD'] != 'POST')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức POST')));

    $email = $_SESSION['email'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $requirement = $_POST['requirement'];
    $benefit = $_POST['benefit'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    
    $result = add($email, $title, $description, $requirement, $benefit, $position, $salary);

    if($result)
        die(json_encode(array('code' => 0, 'message' => 'Thêm bài đăng tuyển dụng thành công'))) ;
    
    die(json_encode(array('code' => 2, 'message' => 'Có lỗi xảy ra khi thêm bài đăng tuyển dụng'))) ;
?>