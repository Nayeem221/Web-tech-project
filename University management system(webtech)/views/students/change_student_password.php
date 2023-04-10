<?php

    session_start();
    require_once('../../models/UserModel.php');
    //require_once('../../models/db.php');

    if(!isset($_SESSION['flag'])){
        header('location: login_check.php');
    }

    //=============================================================================

    $username=$_SESSION['current_user'];
    $user = getUserById($username['username']);
    //print_r($user);

    if(isset($_POST['change_pass_btn'])){

        $curr_pass = $_POST['curr_pass'];
        $new_pass = $_POST['new_pass'];
        $re_pass = $_POST['re_pass'];

    //=========================================================================================

        if($user['password']==$curr_pass){
            if($new_pass==$re_pass){

                $conn=getConnection();
                $sql="update users set password='{$new_pass}' where username='{$user['username']}'";
                $result=mysqli_query($conn, $sql);

                if($result){
                    ?>
                    <script type="text/javascript">
                        alert('Successfully change password');
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Invalid change password');
                    </script>
                    <?php
                }
            }
        }else{
            ?>
            <script type="text/javascript">
                alert('Current password mismatch !');
            </script>
            <?php
        }
    }
?>

    <!-- ======================================================== -->

<?php
    $title= "Change Password";
    include('../header.html');
?>
    <script type="text/javascript" src="../../js/change_student_password.js"></script>
    </head>
    <body>

    <table border="1px" align="center" width="100%">
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td width="150px" height="50px">
                            <img src="../../asset/varsity.jpg" alt="main_logo" width="100%" height="100%">
                        </td>
                        <td align="right" >Logged in as
                            <a href="view_student_profile.php">
                                <?php
                                    require_once('../../models/UserModel.php');
                                    $id=$_SESSION['current_user']['username'];
                                    $data = getUserById($id);

                                    echo $data['full_name']
                                    ?>
                            </a> |
                            <a href="../../controllers/logout_check.php">Logout</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table  border="1px" align="center" width="100%">
        <tr>

            <?php
                require_once('../navigator/sideBar.html');
            ?>

            <td>
                <table align="center">
                    <tr>
                        <td>
                            <form method="post" action="change_student_password.php" onsubmit="return validation()">
                                <fieldset>
                                    <legend>CHANGE PASSWORD</legend>
                                    <table>
                                        <tr>
                                            <td>Current Password</td>
                                            <td>
                                                <input type="password" name="curr_pass" id="curr_pass" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <span id="cp" class="user-error" style="color: red"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>New Password</td>
                                            <td>
                                                <input type="password" name="new_pass" id="new_pass" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <span id="np" class="user-error" style="color: red"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Retype New Password</td>
                                            <td>
                                                <input type="password" name="re_pass" id="re_pass" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <span id="rp" class="user-error" style="color: red"></span>
                                            </td>
                                        </tr>

                                    </table>
                                    <hr>
                                    <input type="submit" name="change_pass_btn" value="Save">
                                </fieldset>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

<?php
    include('../footer.html');
?>