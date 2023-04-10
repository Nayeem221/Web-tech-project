<?php

    session_start();
    unset($_SESSION['flag']);
    header('location: ../views/login_check.php');


?>