<?php 
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'managestudent';

    function execute($sql){
        $connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($connect, 'UTF-8');
        mysqli_query($connect, $sql);
        mysqli_close($connect);
    }

    function executeResult($sql){
        $connect =  new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($connect, 'UTF-8');

        $data = array();
        $result = mysqli_query($connect, $sql);
        while($row = mysqli_fetch_array($result, 1)){
            $data[] = $row;
        }
        mysqli_close($connect); 
        return $data;
    }
?>