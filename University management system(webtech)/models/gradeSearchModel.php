<?php

    require_once('db.php');

    

    function getUserJobVacancyById($id){

        $conn = getConnection();
        $sql = "select * from job_vacancy where id='{$id}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    

    function getAllGradeShow(){

        $conn = getConnection();

        $sql = "select * from grades";
        $result = mysqli_query($conn, $sql);
        $users =[];

        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        return $users;
    }
    
    function getStudentGradeSearchById($name){

        $conn = getConnection();
        $sql = "select * from grades where name='{$name}'";
        $result = mysqli_query($conn, $sql);

        return $result;
    }

   

?>