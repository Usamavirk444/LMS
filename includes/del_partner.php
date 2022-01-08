<?php
include('./conn.php');
$id=$_GET['partnerid'];
$partner_sql="DELETE FROM `partner` WHERE `partner_id`='$id'";
$partner_run= mysqli_query($conn,$partner_sql);
if ($partner_run) {
    ?>
    <script>alert('Row Has Been Delete')</script>
    <?php
    header("Refresh:0, url=../view_partner.php");
}
?>