<?php
    session_start();

    if(!isset($_SESSION['flag'])){
        header('location: ../../controllers/login_check.php');

    }else{

        $user=$_SESSION['current_user'];
        $username=$user['username'];

        if(isset($_POST['submit_pic'])){

            $file_info = $_FILES['choose_file'];
            //echo $file_info['tmp_name'];

            $file = $file_info['name'];
            $path = '../../asset/upload/staff-photos'.$file;
            $filename = $file_info['tmp_name'];

            if(move_uploaded_file($filename, $path)){

    //                $insert=[
    //                    'username'=>$username,
    //                    'photos'=>$path
    //
    //                ];

                require_once('../../models/imageModel.php');

                $result = insertImage($path, $username);

                if($result){
                    ?>
                    <script type="text/javascript">
                        alert('Inserted image in database.');
                    </script>
                    <?php
                    header('location: view_staff_profile.php');

                }else{
                    ?>
                    <script type="text/javascript">
                        alert('Error database connection.');
                    </script>
                    <?php
                }

            }else{
                ?>
                <script type="text/javascript">
                    alert('Error upload image file.');
                </script>
                <?php
            }
        }
    }
?>

    <!-- ========================================================= -->

<?php
    $title= "Picture Change";
    include('../header.html');
?>
    <script type="text/javascript" src="../../js/imageScript.js"></script>
    </head>
    <body>

    <table border="1px" align="center" width="100%">
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td width="200px" height="80px"><img src="../../asset/company_logo.png" width="100%" height="100%"></td>
                        <td align="right" >
                            Logged in as
                            <a href="view_student_profile.php">
                                <?php
                                    echo $_SESSION['current_user']['full_name'];
                                ?>
                            </a> |
                            <a href="../../controllers/logout_check.php"> Logout </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table border="1px" align="center" width="100%">
        <tr>

            <?php
                require_once('../navigator/staff_side_bar.html');
            ?>

            <td>
                <form name="myform" method="post" action="staff_profile_pic.php" onsubmit="return imageValidation()" enctype="multipart/form-data">
                    <fieldset>
                        <legend>PROFILE</legend>
                        <table>
                            <tr>
                                <td>
                                    <img src="../../asset/user.png" width="100px" height="100px"><br>
                                    <input type="file" name="choose_file" value="">
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <input type="submit" name="submit_pic" value="Upload">
                    </fieldset>
                </form>
            </td>
        </tr>
<?php
    include('../footer.html');
?>