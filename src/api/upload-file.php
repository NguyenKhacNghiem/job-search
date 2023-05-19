<?php
    session_start();
    require_once("../dbs/user-db.php");

    if(isset($_FILES["file"])) {
        $file = $_FILES["file"];

        $filename = $file['name'];        // lấy tên file
        $tmpLocation = $file['tmp_name']; // đường dẫn tạm thời đang chứa file

        $savedDirectory = '../upload/' . $filename; // đường dẫn lưu file
        move_uploaded_file($tmpLocation, $savedDirectory); // lưu file

        $email = $_SESSION["email"];
        $result = changeProfileImage($email, $filename);
    }

    // redirect lại trang mà đang upload file
    $page = $_POST["page"];
    Header("Location: ../$page");
?>