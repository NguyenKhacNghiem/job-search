<?php 
    require_once('../db.php') ;

    function add($email)
    {
        $connect = openConnection();
        $stm = $connect->prepare("insert into client values(?, 'Đại học', '')");
        $stm->bind_param('s', $email);
        $stm->execute();

        if($stm->affected_rows == 1)
            return true;
        
        return false;
    }

    function update($email, $academicLevel, $dateOfBirth)
    {
        $connect = openConnection();

        $stm = $connect->prepare('update client set academicLevel = ?, dateOfBirth = ? where email = ?');
        $stm->bind_param('sss', $academicLevel, $dateOfBirth, $email);
        $stm->execute();

        return $stm->affected_rows == 1 ;
    }

    function get($emailClient)
    {
        $connect = openConnection() ;

        $selected = $connect->prepare('select academicLevel, dateOfBirth from client where email = ?') ; 
        $selected->bind_param('s', $emailClient);

        $selected->execute();
        $result = $selected->get_result();
        $client = $result->fetch_assoc();
        
        return $client ;
    }
?>