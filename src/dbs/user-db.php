<?php 
    require_once('../db.php') ;
    
    function get()
    {
        $connect = openConnection() ;

        $result = $connect->query("select email, fullname, gender, phone, blocked, type from user where type != 'Admin'") ; 
        
        $users = array() ;

        while($row = $result->fetch_assoc())
            $users[] = $row ;
        
        return $users ;
    }

    function getProfileUser($email) {
        $connect = openConnection() ;

        $stm = $connect->prepare("select email, fullname, gender, phone, imageName from user where email = ?") ; 
        $stm->bind_param("s", $email);
        $stm->execute();

        $result = $stm->get_result();

        $user = $result->fetch_assoc() ;

        return $user ;
    }

    function addByClient($email, $password, $fullname)
    {
        // Mã hóa mật khẩu trước khi lưu vào database
        $password = hash('sha256', $password);

        $connect = openConnection();
        $stm = $connect->prepare("insert into user values(?, ?, ?, 'Nam', '', 'defaultImage.png', 0, 'Người tìm việc')");
        $stm -> bind_param('sss', $email, $password, $fullname);
        $stm ->execute();

        if($stm->affected_rows == 1)
            return true;
        
        return false;
    }

    function addByCompany($email, $password, $phone)
    {
        // Mã hóa mật khẩu trước khi lưu vào database
        $password = hash('sha256', $password);

        $connect = openConnection();
        $stm = $connect->prepare("insert into user values(?, ?, '', 'Nam', ?, 'defaultImage.png', 0, 'Công ty')");
        $stm -> bind_param('sss', $email, $password, $phone);
        $stm ->execute();

        if($stm->affected_rows == 1)
            return true;
        
        return false;
    }

    function update($email, $fullname, $gender, $phone)
    {
        $connect = openConnection();

        $stm = $connect->prepare('update user set fullname = ?, gender = ?, phone = ? where email = ?');
        $stm->bind_param('ssss', $fullname, $gender, $phone, $email);
        $stm->execute();

        return $stm->affected_rows == 1 ;
    }

    function changeProfileImage($email, $imageName) {
        $connect = openConnection();

        $stm = $connect->prepare('update user set imageName = ? where email = ?');
        $stm->bind_param('ss', $imageName, $email);
        $stm->execute();

        return $stm->affected_rows == 1 ;
    }

    function find($email, $password) 
    {   
        // Mã hóa mật khẩu mà người dùng nhập để đối chiếu với nó trong database
        $password = hash('sha256', $password);

        $connect = openConnection() ;

        $stm = $connect->prepare('select * from user where email = ? and password = ?') ; 
        $stm->bind_param("ss", $email, $password);
        $stm->execute();

        $result = $stm->get_result();
        
        return $result->fetch_assoc() ;
    }

    function blockAndUnblock($email)
    {
        $connect = openConnection() ;

        $stm = $connect->prepare('select blocked from user where email = ?') ; 
        $stm->bind_param("s", $email);
        $stm->execute();
        
        $result = $stm->get_result();
        $blocked = ($result->fetch_assoc())["blocked"] ;
        
        if($blocked === 1) // unblock
            $stm = $connect->prepare('update user set blocked = 0 where email = ?') ; 
        else // block
            $stm = $connect->prepare('update user set blocked = 1 where email = ?') ; 
        
        $stm->bind_param("s", $email);
        $stm->execute();

        return $connect->affected_rows;
    }
    
    function updatePassword($email, $oldPassword, $newPassword)
    {
        // Mã hóa mật khẩu mà người dùng nhập để đối chiếu với nó trong database
        $oldPassword = hash('sha256', $oldPassword);

        // Mã hóa mật khẩu trước khi lưu vào database
        $newPassword = hash('sha256', $newPassword);

        $connect = openConnection();

        $stm = $connect->prepare('update user set password = ? where email = ? and password = ?');
        $stm->bind_param('sss', $newPassword, $email, $oldPassword);
        $stm->execute();

        return $stm->affected_rows == 1 ;
    }

    function forgetPassword($email, $password) {
        // Mã hóa mật khẩu trước khi lưu vào database
        $password = hash('sha256', $password);

        $connect = openConnection() ;

        $stm = $connect->prepare('update user set password = ? where email = ?') ; 
        $stm->bind_param("ss", $password, $email);
        $stm->execute();

        return $stm->affected_rows == 1 ;
    }
?>