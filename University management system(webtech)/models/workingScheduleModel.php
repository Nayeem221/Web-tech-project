<?php

    require_once('db.php');

    //======================================================================================

    function getStaffSWorkingSchedule($id){

        $conn = getConnection();
        $sql = "select * from times where emp_id='{$id}'";
        $result = mysqli_query($conn, $sql);

        $users =[];

        while($row = mysqli_fetch_assoc($result)){
            array_push($users, $row);
        }
        return $users;
    }

    //======================================================================================

?>