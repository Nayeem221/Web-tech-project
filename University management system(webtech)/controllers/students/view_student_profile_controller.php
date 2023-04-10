<?php

    require_once('../../models/UserModel.php');
    //    this file from controllers (view_profile_controllers.php)
    //    require_once('../../controllers/view_student_profile_controller.php');


    session_start();

    if (!isset($_SESSION['flag'])) {
        header('location: login_check.php');
    }


    $id = $_SESSION['current_user']['username'];
    $data = getUserById($id);

    $username = $data['username'];
    $full_name = $data['full_name'];
    $email = $data['email'];
    //    $gender=$data['gender'];
    $phone = $data['phone'];
    //    $address=$data['address'];
    $program = $data['program'];
    //    $blood=$data['blood'];
    $dob = $data['dob'];

    //==================================================

?>