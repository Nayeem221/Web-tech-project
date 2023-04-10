<?php
    session_start();

    if(!isset($_SESSION['flag'])){
        header('location: ../../controllers/login_check.php');
    }
?>

    <!-- ================================================================ -->

<?php
    $title= "Salary Statement";
    include('staff_head.html');
?>
    </head>
    <body>

    <table border="1px" align="center" width="100%">
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td width="150px" height="50px">
                            <img src="../../asset/company_logo.png" alt="main_logo" width="100%" height="100%">
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
            require_once('../navigator/staff_side_bar.html');
        ?>

        <td colspan="2" align="center">
            <table border="1px" align="center">
                <tr>
                    <td align="center" colspan="11">
                        <h2>Salary Information</h2>
                    </td>
                </tr>
                <tr>
                    <th>Hourly Rate</th>
                    <th>Salary</th>
                    <th>Effective Date</th>
                </tr>

                <?php
                    include('../../models/salaryStatementModel.php');

                    $result = getAllEmpId();
    //                print_r($result);

                    foreach ($result as $key => $value) {
                        $salary_id = getStaffSalaryStatement($value['id']);
                    }

                    if(count($salary_id)>0){
                        foreach ($salary_id as $key => $value) {
                            echo "
                                            <tr>
                                                <td>{$value['hourly_rate']}</td>
                                                <td>{$value['salary']}</td>
                                                <td>{$value['effective_date']}</td>
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