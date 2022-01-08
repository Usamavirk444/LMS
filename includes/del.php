<?php
include('./conn.php');
$id=$_GET['delid'];
$del_sql= "DELETE FROM `student` WHERE `student`.`student_id` = '$id'";
$del_run= mysqli_query($conn,$del_sql);
if ($del_run) {
echo "done";
header('Location:../data.php');
}else {
    echo $conn->error;
}
?>