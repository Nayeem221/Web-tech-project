<?php

    require_once('db.php');

//======================================================================================

    function getAllEmpId(){

        $conn = getConnection();
        $sql = "select * from employee";
        $result = mysqli_query($conn, $sql);

        $users =[];

        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        return $users;
    }

    //======================================================================================

    function getStaffSalaryStatement($id){

        $conn = getConnection();
        $sql = "select * from pay_rates where emp_id='{$id}'";
        $result = mysqli_query($conn, $sql);

        $users =[];

        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        return $users;
    }

    //======================================================================================

?>