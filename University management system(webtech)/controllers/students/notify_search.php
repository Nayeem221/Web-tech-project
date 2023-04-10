<?php

    session_start();

    require_once('../../models/UserModel.php');

    if(!isset($_SESSION['flag'])){
        header('location: ../login_check.php');
    }

    $data=$_SESSION['current_user'];

    require_once ('../../models/notificationModel.php');
    $result = getStudentNotify();
//    var_dump($result);

    if(count($result)>0){
        foreach ($result as $key => $value) {
            $teacher_info = getTeacherName($value['teacher_id']);
//            var_dump($result);

            //====================================

            $teacher_name = getAllTeacherName($teacher_info['full_name']);
//            var_dump($teacher_name);

            $q = $_REQUEST["q"];
            $hint = "";

            if ($q !== "") {
                $q = strtolower($q);
                $len = strlen($q);

//                $hint = "
//                            <table border=2>
//                                <tr>
//                                    <td>Notice Title</td>
//                                    <td>Description</td>
//                                    <td>Time</td>
//                                    <td>Date</td>
//
//                                </tr>
//
//                          ";
//
//                while ($teacher_info) {
//                    $hint .= "
//                                    <tr>
//                                        <td>{$teacher_info['notice_title']}</td>
//                                        <td>{$teacher_info['notice_desc']}</td>
//                                        <td>{$teacher_info['time']}</td>
//                                        <td>{$teacher_info['date']}</td>
//                                    </tr>
//                                ";
//                }
//                $hint .="</table>";

                foreach($teacher_info as $name) {

                    if (stristr($q, substr($name, 0, $len))) {
                        if ($hint === "") {
//                            $hint = $name;
                            $hint = "
                                        <table border=2>
                                            <tr>
                                                <td>Notice Title</td>
                                                <td>Description</td>
                                                <td>Time</td>
                                                <td>Date</td>

                                            </tr>

                                      ";

                                $hint .= "
                                    <tr>
                                        <td>{$name['notice_title']}</td>
                                        <td>{$name['notice_desc']}</td>
                                        <td>{$name['time']}</td>
                                        <td>{$name['date']}</td>

                                    </tr>
                                  </table>
                                ";

                        }else {
                            $hint .= ", $name";
                        }
                    }
                }
            }
            echo $hint === "" ? "Please enter a valid teacher name" : $hint;
        }
    }

?>