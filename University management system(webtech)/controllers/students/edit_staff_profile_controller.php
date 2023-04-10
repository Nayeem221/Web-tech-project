<?php
    session_start();

    require_once('../../models/UserModel.php');

    if(!isset($_SESSION['flag'])){
        header('location: ../login_check.php');
    }

    $data=$_SESSION['current_user'];

    //==============================================================

    if(isset($_POST['submit'])){

        $full_name=$_REQUEST['full_name'];
        $email=$_REQUEST['email'];
        $phone=$_REQUEST['phone'];
        $program=$_REQUEST['program'];
        $dob=$_REQUEST['dob'];

        $conn = getConnection();
        $sql = "update users set full_name='{$full_name}', email='{$email}', phone='{$phone}', program='{$program}', dob='{$dob}' where username='{$data['username']}'";
        $result=mysqli_query($conn, $sql);
        //        $status = updateUser($users, $username);
        //        var_dump($result);

        if($result){
            echo "success";
        }else{
            echo "fail !";
        }

    }else{
        $id=$_SESSION['current_user']['username'];
        $data = getUserById($id);

        $full_name=$data['full_name'];
        $email=$data['email'];
        $phone=$data['phone'];
        $program=$data['program'];
        $dob=$data['dob'];
    }
?>