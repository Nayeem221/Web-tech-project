<?php
session_start();

if(!isset($_SESSION['flag'])){
    header('location: ../../controllers/login_check.php');
}
?>

    <!-- ================================================================ -->

<?php
    $title= "Grade Report";
    include('student_head.html');
?>

        <script>
            function SearchGradeReport() {

                var name = document.getElementById('name').value;

                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "getGradeSearch.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send('name='+name);

                xhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                }
            }
        </script>
        <script>
            function showAllGrade(){

                const xhttp = new XMLHttpRequest();

                xhttp.open('POST', 'getGrade.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send();

                xhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){

                        document.getElementById('txtHint').innerHTML = this.responseText;
                    }
                }
            }
        </script>

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
            <table align="center">
                <tr>
                    <td>
                        <fieldset>
                            <h2>Grade Report's</h2>
                            <hr><br>
                            <b>Search Grade</b>
                            <span>
                                    <input type="text" id="name" name="name" placeholder="subject name" value="">
                                </span>
                            <span>
                                <input type="submit" name="search_btn" value="Search" onclick="SearchGradeReport(this.value)">
                                <input type="submit" name="view_all_grade_btn" value="View All" onclick="showAllGrade(this.value)">
                            </span>
                        </fieldset>
                    </td>
                </tr>

            </table>

            <br>
            <div id="txtHint"></div>
        </td>
    </tr>
<?php
    include('../footer.html');
?>