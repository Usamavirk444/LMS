<?php
include('./conn.php');
$id=$_GET['batchid'];
$b_sql="DELETE FROM badge WHERE badge_id='$id'";
$b_run= mysqli_query($conn,$b_sql);
if ($b_run) {
    ?>
    <script>alert('Row Has Been DELETED')</script>
    <?php
    header("Refresh:0, url=../view_badge.php");
}
?>