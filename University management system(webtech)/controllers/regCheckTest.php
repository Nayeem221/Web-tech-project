<?php
    session_start();

    require_once('../models/UserModel.php');
    require_once('../models/usernameModel.php');

    
    if(isset($_POST['submit'])){

        $username = $_REQUEST['username'];
        $full_name = $_REQUEST['full_name'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];

        $program = $_REQUEST['program'];


        $dob = $_REQUEST['dob'];
    

    

        $count = UserNameQuery($username);

        

        if($count>0){
            echo "User Id Already Exits";
        }else{
            if($username==""||$password==""||$email==""||$phone==""||$program==""||$dob==""){
                echo "Please check your required field ?";

            }else{
                $users = [
                    'username'=>$username,
                    'full_name'=>$full_name,
                    'password'=> $password,
                    'email'=>$email,
                    'phone'=> $phone,
                    'program'=> $program,
                    'dob'=>$dob,
                    'user_type'=>'student',
                ];

                $status = insertUser($users);


                if($status){

                    $user_data = getUserById($username);
                    $users_data = [
                        'user_id'=>$user_data['id'],
                        'student_name'=>$user_data['full_name'],
                        'student_phone'=> $user_data['phone'],
                        'student_program'=>$user_data['program'],
                        'student_dob'=> $user_data['dob'],
                    ];
                    studentData($users_data);

                    echo "success";
                }else{
                    echo "Please check your required field ?";
                }

            }
        }
    }
?>