<?php

    require_once('../models/db.php');

    function UserNameQuery($username){

        $conn = getConnection();
        $sql = "select * from users where username='{$username}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        return $row;
    }
?>