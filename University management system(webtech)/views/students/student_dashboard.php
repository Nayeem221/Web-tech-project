<?php
    session_start();

    if(!isset($_SESSION['flag'])){
        header('location: ../../controllers/login_check.php');
    }

    $data=$_SESSION['current_user'];
    //var_dump($data);
?>

    <!-- ============================================================ -->

<?php
    $title= "Dashboard";
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
                            <a href="view_student_profile.php">
                                <?php
                                    echo $data['full_name'];
                                ?>
                            </a> |
                            <a href="../../controllers/logout_check.php">Logout</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
<table  border="1px" align="cen" width="100%">
    <tr>

        <?php
            require_once('../navigator/sideBar.html');
        ?>

        <td colspan="2" align="center">
            <h1>Welcome to our student, <?php echo $data['full_name'];?>
            </h1>
        </td>
    </tr>
<?php
    include('../footer.html');
?>