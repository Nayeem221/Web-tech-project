<?php

    require_once('db.php');

   
    function validateUser($username, $password){

        $conn = getConnection();
        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row!=0){
            return true;
        }else{
            return false;
        }
    }

    
    function studentData($data){
        $conn = getConnection();
        $sql = "insert into students values('', '{$data['user_id']}', '{$data['student_name']}', '{$data['student_phone']}', '{$data['student_program']}', '{$data['student_dob']}','', '', '')";
        $result = mysqli_query($conn, $sql);

        return $result;
    }
    

    
    function getUserById($username){

        $conn = getConnection();
        $sql = "select * from users where username='{$username}'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    

    function getAllUser(){

        $conn = getConnection();
        $sql = "select * from users";
        $result = mysqli_query($conn, $sql);
        $users =[];

        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        return $users;
    }

    

    function insertUser($user){

        $conn = getConnection();
        $sql = "insert into users values('', '{$user['username']}', '{$user['full_name']}', '{$user['password']}', '{$user['email']}', '{$user['phone']}', '{$user['program']}', '{$user['dob']}', '{$user['user_type']}', '')";

    
        if(mysqli_query($conn, $sql)){
            return true;
        }else{
            return false;
        }
    }
?>