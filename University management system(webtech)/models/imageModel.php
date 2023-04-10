<?php

require_once('db.php');



function getImageById($username){

    $conn = getConnection();
    $sql = "select * from users where username='{$username}'";
    $result = mysqli_query($conn, $sql);

    return $result;
}



function getAllImage(){

    $conn = getConnection();
    $sql = "select * from users";
    $result = mysqli_query($conn, $sql);
    $users =[];

    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
    return $users;
}



function insertImage($user,$username){

    $conn = getConnection();

    $sql = "update users set image='{$user}' where username='{$username}'";

    var_dump($sql);

    if(mysqli_query($conn, $sql)){
        return true;
    }else{
        return false;
    }
}


?>