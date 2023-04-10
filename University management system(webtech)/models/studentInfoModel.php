<?php

require_once('db.php');

//======================================================================================

function getStudentInfo($id){

    $conn = getConnection();
    $sql = "select * from students where user_id='{$id}'";
    $result = mysqli_query($conn, $sql);

    $users =[];

    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
    return $users;
}

//======================================================================================

function getStudentAttendance(){

    $conn = getConnection();
    $sql = "select * from attendance";
    $result = mysqli_query($conn, $sql);

    $users =[];

    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
//    var_dump($users);
    return $users;
}

//======================================================================================

function getStudentName($student_name){

    $conn = getConnection();
    $sql = "select * from students where id='{$student_name}'";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

//======================================================================================

function getGradeInfo($id){

    $conn = getConnection();
    $sql = "select * from grades where id={$id}";
    $result = mysqli_query($conn, $sql);

    $users =[];

    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
//    var_dump($users);
    return $users;
}

//======================================================================================

function getAllClassroomInfo(){

    $conn = getConnection();
    $sql = "select * from classrooms";
    $result = mysqli_query($conn, $sql);

    $users =[];

    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
//    var_dump($users);
    return $users;
}

//======================================================================================

function getTeacherInfo($id){

    $conn = getConnection();
    $sql = "select * from teachers where id={$id}";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

//======================================================================================

function getStudentClassroom($teacher_id){

    $conn = getConnection();
    $sql = "select * from classrooms where teacher_id={$teacher_id}";
    $result = mysqli_query($conn, $sql);

    $users =[];

    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }
//    var_dump($result);
    return $users;
}

//======================================================================================

function getStudentData($id){

    $conn = getConnection();
    $sql = "select * from students where id={$id}";
    $result = mysqli_query($conn, $sql);

    return mysqli_fetch_assoc($result);
}

?>