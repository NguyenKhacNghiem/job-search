<?php 
    require_once('../db.php') ;
    
    function getByClient($emailClient)
    {
        $connect = openConnection() ;

        $stm = $connect->prepare("select r.title, a.result, a.feedback
                                  from recruitmentnews r, applyhistory a
                                  where r.id = a.id and a.email = ?") ; 
        $stm->bind_param("s", $emailClient);
        $stm->execute();

        $result = $stm->get_result();
        $applyhistories = array() ;

        while($row = $result->fetch_assoc())
            $applyhistories[] = $row ;
        
        return $applyhistories ;
    }

    function getByCompany($emailCompany)
    {
        $connect = openConnection() ;

        $stm = $connect->prepare("select r.id, r.title, r.date, a.result, a.email
                                from recruitmentnews r, applyhistory a
                                where r.id = a.id and r.email = ?") ; 
        $stm->bind_param("s", $emailCompany);
        $stm->execute();

        $result = $stm->get_result();
        
        $applyhistories = array() ;

        while($row = $result->fetch_assoc())
            $applyhistories[] = $row ;
        
        return $applyhistories ;
    }

    function add($email, $id)
    {
        $connect = openConnection();

        $stm = $connect->prepare('insert into applyhistory values( ?, ?, 0, "")') ;
        $stm->bind_param('si', $email, $id) ;
        $stm->execute();

        if($stm->affected_rows == 1) 
            return true ; 

        return false ;
    }

    function update($email, $id, $result, $feedback)
    {
        $connect = openConnection();

        $stm = $connect->prepare('update applyhistory set result = ?, feedback = ? where email = ? and id = ?') ;
        $stm->bind_param('issi', $result, $feedback, $email, $id) ;
        $stm->execute();

        if($stm->affected_rows == 1) 
            return true ; 

        return false ;
    }
?>