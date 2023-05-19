<?php
    function openConnection() {
        $host = '127.0.0.1' ;
        $user = 'root' ;
        $pass = '' ;
        $database = 'vnjobfind' ;

        $connect = new mysqli($host, $user, $pass, $database) ;

        if($connect->error)
            die('Cannot connect: ' . $connect->error) ;
        
        return $connect ;
    }
?>