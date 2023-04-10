<?php

    require_once('../../models/UserModel.php');


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

    <!-- ========================================================= -->

<?php
    $title= "View Profile";
    include('../header.html');
?>
    <script type="text/javascript" src="../../js/view_student_profile.js"></script>
    </head>
    <body>

    <table border="1px" align="center" width="100%">
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td width="200px" height="80px">
                            <img src="../../asset/varsity.jpg" width="100%" height="100%">
                        </td>
                        <td align="right" >
                            Logged in as
                            <a href="view_student_profile.php">
                                <?php
                                    require_once('../../models/UserModel.php');
                                    $id=$_SESSION['current_user']['username'];
                                    $data = getUserById($id);

                                    echo $data['full_name']
                                ?>
                            </a> |
                            <a href="../../controllers/logout_check.php"> Logout </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- creating new table -->
    <table border="1px" align="center" width="100%">
        <tr>
            <?php
                require_once('../navigator/sideBar.html');
            ?>

            <!-- ==================================================================================================-->
            <td align="center">
                <table>
                    <tr>
                        <td>
                            <form onsubmit="return viewProfileValidation()">
                                <fieldset>
                                    <legend>PROFILE</legend>
                                    <table align="center">
                                        <tr>
                                            <td>Username:</td>
                                            <td>
                                                <?php
                                                echo $username;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Full Name:</td>
                                            <td>
                                                <?php
                                                    echo $full_name;
                                                ?>
                                            </td>

                                            <form method="post" action="student_profile_pic.php" enctype="multipart/form-data">
                                                <td rowspan="4" align="center">
                                                    <?php
                                                        //require_once('../model/db.php');
                                                        require_once('../../models/imageModel.php');

                                                        /*$conn = getConnection();
                                                        $sql = "select * from user_image where user";
                                                        $result = mysqli_query($conn, $sql);
                                                        $row = mysqli_fetch_assoc($result);*/

                                                        $result = getImageById($username);
                                                        $row = mysqli_fetch_assoc($result);
    //                                                    var_dump($row);

                                                        if($row['image'] != ""){
                                                            ?>
                                                                <img src="<?php echo "{$row['image']}"; ?>" width="200px" height="200px"><br>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <img src="../../asset/user.png" width="100px" height="100px"><br>
                                                            <?php
                                                        }
                                                    ?>
                                                    <a href="student_profile_pic.php">Change</a>
                                                </td>
                                            </form>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>
                                                <?php
                                                echo $email;
                                                ?>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Mobile Phone:</td>
                                            <td>
                                                <?php
                                                echo $phone;
                                                ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Program:</td>
                                            <td>
                                                <?php
                                                echo $program;
                                                ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Date of Birth:</td>
                                            <td>
                                                <?php
                                                echo $dob;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="edit_student_profile.php">Edit Profile</a></td>
                                        </tr>
                                    </table>
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