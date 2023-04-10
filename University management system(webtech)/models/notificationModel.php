<?php

    require_once('db.php');

    

    function getStudentNotify(){

        $conn = getConnection();
        $sql = "select * from notices";
        $result = mysqli_query($conn, $sql);

        $users =[];

        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        return $users;
    }



    function getTeacherName($teacherId){

        $conn = getConnection();
        $sql = "select * from teachers where id=$teacherId";
        $result = mysqli_query($conn, $sql);


        return mysqli_fetch_assoc($result);
    }



    function getAllTeacherName($teacher_name){

        $conn = getConnection();
        $sql = "select * from teachers where full_name like '%{$teacher_name}%'";
        $result = mysqli_query($conn, $sql);

   
        return mysqli_fetch_assoc($result);
    }

?>