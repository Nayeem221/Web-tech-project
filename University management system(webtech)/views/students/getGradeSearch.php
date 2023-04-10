
<?php
    require_once('../../models/gradeSearchModel.php');
    

    echo "<table border=1 align=center>
                        <tr>
                            <th>Subject Name</th>
                            <th>Marks</th>
                        </tr>";

    $name=$_POST['name'];

    $result=getStudentGradeSearchById($name);


    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            echo "<tr>
                     <td>{$row['name']}</td>
                      <td>{$row['marks']}</td>
                    </tr>";

            echo "</table>";
        }
    }else{
            ?>
            <script type="text/javascript">
                alert('No data available.');
            </script>
        <?php
    }
?>