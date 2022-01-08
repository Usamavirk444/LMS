<?php
include('./conn.php');
$id=$_GET['courseid'];
$co_sql="DELETE FROM `all_course` WHERE `course_id`='$id'";
$co_run = mysqli_query($conn,$co_sql);
if ($co_run) {
    ?>
    <script>alert('Row hass been Delted');</script>

    <?php
    header("Refresh:0, url=../view_course.php");
}
?>