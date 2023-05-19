<?php 
    require_once('../db.php') ;

    // Lấy tổng số trang
    function getTotalPage($filterCondition, $searchContent) {
        $connect = openConnection() ;
        
        // Tìm tổng số records
        $sql = "select count(r.id) as total
                from recruitmentnews r, company c, user u 
                where r.email = c.email and c.email = u.email and r.deleted = 0" . $filterCondition . 
                " and (r.title like ?
                  or r.description like ?
                  or r.requirement like ?
                  or r.benefit like ?
                  or r.position like ?
                  or r.date like ?
                  or cast(r.salary as varchar(20)) like ?
                  or c.companyName like ? 
                  or c.address like ? 
                  or c.area like ?)";

        $stm = $connect->prepare($sql);
        $stm->bind_param("ssssssssss", $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent);
        $stm->execute();

        $result = $stm->get_result();
        $r = $result->fetch_assoc();
        $totalRecord = $r['total'];

        $limit = 10; // mỗi trang chứa 10 records
        $totalPage = ceil($totalRecord / $limit); // tính tổng số trang

        return $totalPage;
    }

    function getByClient($page, $totalPage, $filterCondition, $searchContent)
    {
        $connect = openConnection() ;

        // Xử lý phân trang
        // Giới hạn page trong khoảng 1 đến totalPage
        if ($page > $totalPage)
            $page = $totalPage;

        if ($page < 1)
            $page = 1;

        $limit = 10; // mỗi trang chứa 10 records

        $start = ($page - 1) * $limit; // vị trí bắt đầu lấy record trong table (vị trí này bắt đầu từ 0)

        $sql = "select r.id, r.title, c.companyName, u.imageName, r.salary
                from recruitmentnews r, company c, user u 
                where r.email = c.email and c.email = u.email and r.deleted = 0" . $filterCondition . 
                " and (r.title like ?
                  or r.description like ?
                  or r.requirement like ?
                  or r.benefit like ?
                  or r.position like ?
                  or r.date like ?
                  or cast(r.salary as varchar(20)) like ?
                  or c.companyName like ? 
                  or c.address like ? 
                  or c.area like ?)" . 
                " limit " . $start . ', ' . $limit;

        $stm = $connect->prepare($sql);
        $stm->bind_param("ssssssssss", $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent, $searchContent);
        $stm->execute();

        $result = $stm->get_result();
        
        $recruitmentnews = array() ;

        while($row = $result->fetch_assoc())
            $recruitmentnews[] = $row ;
        
        return $recruitmentnews ;
    }

    function getFilterCondition($career, $area, $position, $salary) {
        // lọc theo ngành nghề
        if($career === "Ngành nghề")
            $career = "";
        else
            $career = " and r.title like '%$career%'";
        
        // lọc theo địa điểm
        if($area === "Địa điểm")
            $area = "";
        else
            $area = " and c.area = '$area'";

        // lọc theo vị trí
        if($position === "Vị trí")
            $position = "";
        else
            $position = " and r.position = '$position'";

        // lọc theo mức lương
        if($salary === "Mức lương")
            $salary = "";
        else if($salary === "Trên 50 triệu")
            $salary = " and r.salary > 50000000";
        else if($salary === "Trên 40 triệu")
            $salary = " and r.salary > 40000000";
        else if($salary === "Trên 30 triệu")
            $salary = " and r.salary > 30000000";
        else if($salary === "Trên 20 triệu")
            $salary = " and r.salary > 20000000";
        else if($salary === "Trên 10 triệu")
            $salary = " and r.salary > 10000000";
        else
            $salary = " and r.salary <= 10000000";

        return $career . $area . $position . $salary;
    }

    function getByCompany($emailCompany)
    {
        $connect = openConnection() ;
                                   
        $stm = $connect->prepare('select id, title, position, date, deleted from recruitmentnews where email = ? and deleted != 1');
        $stm->bind_param("s", $emailCompany);
        $stm->execute();

        $result = $stm->get_result();
        
        $recruitmentnews = array() ;

        while($row = $result->fetch_assoc())
            $recruitmentnews[] = $row ;
        
        return $recruitmentnews ;
    }

    function getByAdmin()
    {
        $connect = openConnection() ;
        
        $result = $connect->query("select id, email, title, date, deleted from recruitmentnews where deleted != 1");
        
        $recruitmentnews = array() ;

        while($row = $result->fetch_assoc())
            $recruitmentnews[] = $row ;
        
        return $recruitmentnews ;
    }

    function add($email, $title, $description, $requirement, $benefit, $position, $salary)
    {
        $date = date('d/m/Y'); // Lấy ngày hiện tại theo định dạng dd/MM/yyyy

        $connect = openConnection();
        $stm = $connect->prepare('insert into recruitmentnews(email, title, description, requirement, benefit, position, date, salary, deleted) values(?, ?, ?, ?, ?, ?, ?, ?, 2)');
        $stm->bind_param('sssssssi',$email, $title, $description, $requirement, $benefit, $position, $date, $salary);
        $stm->execute();

        if($stm->affected_rows == 1)
            return true;
        
        return false;
    }

    // Thay vì xóa sẽ làm ảnh hưởng đến các ràng buộc thì ta sẽ ẩn nó đi
    function delete($id)
    {
        $connect = openConnection();
        $stm = $connect->prepare('update recruitmentnews set deleted = 1 where id = ?');
        $stm->bind_param('i', $id);
        $stm->execute();

        if($stm->affected_rows == 1)
            return true;
        
        return false;
    }

    function find($id)
    {
        $connect = openConnection() ;

        $sql = "select r.id, r.title, c.companyName, u.imageName, r.date, r.salary, r.position, c.email, r.description, r.requirement, r.benefit
                from recruitmentnews r, company c, user u
                where r.email = c.email and c.email = u.email and r.id = ? and r.deleted = 0";
        $stm = $connect->prepare($sql) ;

        $stm->bind_param("i", $id);
        $stm->execute();
        
        $result = $stm->get_result();

        return $result->fetch_assoc() ;
    }

    function activateAndUnactivate($id)
    {
        $connect = openConnection() ;

        $stm = $connect->prepare('select deleted from recruitmentnews where id = ?') ; 
        $stm->bind_param("i", $id);
        $stm->execute();
        
        $result = $stm->get_result();
        $deleted = ($result->fetch_assoc())["deleted"] ;
        
        if($deleted === 2) // activate
            $stm = $connect->prepare('update recruitmentnews set deleted = 0 where id = ?') ; 
        else // unactivate
            $stm = $connect->prepare('update recruitmentnews set deleted = 2 where id = ?') ;  
        
        $stm->bind_param("i", $id);
        $stm->execute();

        return $connect->affected_rows;
    }
?>  