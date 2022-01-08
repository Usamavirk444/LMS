<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <?php include('./includes/conn.php')?>
    <?php 
if (empty($_SESSION['email'])) {
    header('Location:./index.php');
}
?>


   

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include('includes/header.php');?>

        <!-- Left side column. contains the logo and sidebar -->
        <?php include('includes/sidebar.php');?>
        <?php 
        $update_id=$_GET['updateid'];
        $que="SELECT * FROM `badge` WHERE `badge_id`='$update_id'";
        $que_run= mysqli_query($conn,$que);
        $que_fet= mysqli_fetch_array($que_run);
    if (isset($_POST['submit'])) {
        $badge=mysqli_real_escape_string($conn,$_POST['badge']);
        $c_name=mysqli_real_escape_string($conn,$_POST['value1']);
        $course_sql="UPDATE `badge` SET `badge_name`='$badge',`c_id`='$c_name' WHERE `badge_id`='$update_id'";
        if ($course="") {
            ?>
        <script>
        alert("Please Fill All Field")
        </script>
        <?php
        }else {
            $course_rub=mysqli_query($conn,$course_sql);
            if ($course_rub) {
             ?>
                <script>
                alert('Data has been submited');
                </script>
        <?php   
             header("Refresh:0, url=./view_badge.php");
            }
        }
    }

?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    All Course
                    <small>Course</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Course</a></li>
                    <li class="active">All course</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row ">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Enter badge</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form method="post">
                                <div class="form-group col-md-6 col-lg-6">
                                    <select class="form-control " name="value1" id="t_name">
                                        <option value="">Select Course</option>
                                        <?php
                                        $c_sql = "SELECT * FROM `all_course`";
                                        $c_run = mysqli_query($conn,$c_sql);
                                        while ($c_all = mysqli_fetch_array($c_run)) {
                                ?>
                                        <option value=" <?php echo $c_all['course_id'];?>">
                                            <?php echo $c_all['course_name'];?> </option>

                                        <?php
                            }
                   ?>

                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6">

                                        <input value="<?php echo  $que_fet['badge_name'];?>" type="text"placeholder="Enter Badge" name="badge" class="form-control" id="inputEmail4">
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2018 <a href="https://templatespoint.net">TemplatesPoint</a>.</strong> All
            rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <?php include('includes/sidebar.php');?>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <!-- page script -->
    <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    </script>
</body>

</html>







