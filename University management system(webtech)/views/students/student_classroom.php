<?php
session_start();

if(!isset($_SESSION['flag'])){
    header('location: ../../controllers/login_check.php');
}
?>

    <!-- ================================================================ -->

<?php
    $title= "Classroom";
    include('student_head.html');
?>
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
                            <a href="../../controllers/students/view_student_profile_controller.php">
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
    <!-- new table creating -->
<table  border="1px" align="cen" width="100%">
    <tr>

        <?php
            require_once('../navigator/sideBar.html');
        ?>

        <td colspan="2" align="center">
            <table border="1px" align="center">
                <tr>
                    <td align="center" colspan="11">
                        <h2>Classroom Information</h2>
                    </td>
                </tr>
                <tr>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Student</th>
                </tr>

                <?php
                require_once('../../models/studentInfoModel.php');

                $get_all_classroom_data = getAllClassroomInfo();


                   foreach ($get_all_classroom_data as $value) {
                       $teacher_id = getTeacherInfo($value['teacher_id']);
                       $classroom_id = getStudentClassroom($teacher_id['id']);
                       $student_id = getStudentData($value['student_id']);
                   }

                if(count($classroom_id)>0){
                    foreach ($classroom_id as $key => $value) {
                        echo "
                                    <tr>
                                        <td>{$value['year']}</td>
                                        <td>{$value['section']}</td>
                                        <td>{$value['status']}</td>
                    
                                ";
                        echo "
                                <td>{$student_id['student_name']}</td>
                            </tr>
                        ";
                    }
                }
                ?>

            </table>
        </td>
    </tr>
<?php
    include('../footer.html');
?>