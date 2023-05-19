<?php
    header('Content-Type: application/json') ;
    require_once("../dbs/recruitmentnews-db.php");
    
    if($_SERVER['REQUEST_METHOD'] != 'GET')
        die(json_encode(array('code' => 1, 'message' => 'API này chỉ chấp nhận phương thức GET.'))) ;

    $page = $_GET['page'] + 0; // chuyển string sang int
    $career = $_GET["career"];
    $area = $_GET["area"];
    $position = $_GET["position"];
    $salary = $_GET["salary"];
    $searchContent = "%" . $_GET["searchContent"] . "%"; // vì thao tác search sẽ sử dụng toán tử "LIKE" trong SQL nên cần bao đóng bởi dấu "%"

    $filterCondition = getFilterCondition($career, $area, $position, $salary); // lấy các tiêu chí lọc
    $totalPage = getTotalPage($filterCondition, $searchContent); // tổng số trang được trả về từ truy vấn -> dùng cho phân trang
    $result = getByClient($page, $totalPage, $filterCondition, $searchContent) ;

    if($result == null)
        die(json_encode(array('code' => 2, 'message' => 'Danh sách bài đăng tuyển dụng đang trống.'))) ;

    die(json_encode(array('code' => 0, 'message' => 'Lấy danh sách bài đăng tuyển dụng thành công.', 'data' => $result, 'totalPage' => $totalPage))) ;
?>