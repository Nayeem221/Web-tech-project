
<?php
    require_once('../../models/gradeSearchModel.php');

    $result = getAllGradeShow();

    echo "<table border=1 align=center>
            <tr>
                <th>Subject Name</th>
                <th>Marks</th>
            </tr>";

    foreach ($result as $key => $value) {
        echo "<tr>
                  <td>{$value['name']}</td>
                  <td>{$value['marks']}</td>
               </tr>";
    }
    echo "</table>";
?>