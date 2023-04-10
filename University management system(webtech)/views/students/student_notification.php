<?php
        session_start();

        if(!isset($_SESSION['flag'])){
            header('location: ../../controllers/login_check.php');
        }
    ?>

        <!-- ================================================================ -->

    <?php
        $title= "Notification";
        include('student_head.html');
    ?>
    <script type="text/javascript" src="../../js/student_notify_search.js"></script>

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
                        <h2>Grade Report's</h2>
                    </td>
                </tr>
                <tr>
                    <th>Notice Title</th>
                    <th>Description</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Teacher Name</th>
                </tr>

                <?php
                require_once('../../models/notificationModel.php');

                $result = getStudentNotify();

                if(count($result)>0){
                    foreach ($result as $key => $value) {
                        echo "
                                    <tr>
                                        <td>{$value['notice_title']}</td>
                                        <td>{$value['notice_desc']}</td>
                                        <td>{$value['time']}</td>
                                        <td>{$value['date']}</td>
                              
                                ";

                                $teacher_info = getTeacherName($value['teacher_id']);
        
                                echo "
                                        <td>{$teacher_info['full_name']}</td>
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