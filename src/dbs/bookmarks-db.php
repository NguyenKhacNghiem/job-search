<?php 
    require_once('../db.php') ;
    
    function get($emailClient)
    {
        $connect = openConnection() ;

        $selected = $connect->prepare('select r.id, r.title, r.salary, r.email from bookmarks b join recruitmentnews r on b.id = r.id where b.email = ? and b.deleted = 0') ; 
        $selected->bind_param('s', $emailClient);

        $selected->execute();
        $result = $selected->get_result();
        $apply = array() ;

        while($row = $result->fetch_assoc())
            $apply[] = $row ;
        
        return $apply ;
    }

    function add($email, $id)
    {
        $connect = openConnection() ;

        // Nếu bookmark không tồn tại trước đó thì ta thêm mới
        $stm = $connect->prepare('insert into bookmarks values(?, ?, 0)') ;
        $stm->bind_param('si', $email, $id) ;
        $stm->execute();

        if($stm->affected_rows == 1) 
            return true ; 
        
        // Nếu bookmark đã tồn tại trước đó nhưng đã bị xóa đi thì ta hiện nó lên lại
        $stm = $connect->prepare('update bookmarks set deleted = 0 where email = ? and id = ? and deleted = 1') ;
        $stm->bind_param('si', $email, $id) ;
        $stm->execute();

        if($stm->affected_rows == 1) 
            return true ; 

        return false ;
    }

    // Thay vì xóa sẽ làm ảnh hưởng đến các ràng buộc thì ta sẽ ẩn nó đi
    function delete($email, $id)
    {
        $connect = openConnection();
        $stm = $connect->prepare('update bookmarks set deleted = 1 where email = ? and id = ?');
        $stm->bind_param('si', $email, $id);
        $stm->execute();

        if($stm->affected_rows == 1)
            return true;
        
        return false;
    }
?>