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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

    <?php include('includes/header.php');?>

        <!-- Left side column. contains the logo and sidebar -->
        <?php include('includes/sidebar.php');?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Data Tables
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        
                          
                            <!-- /.box-header -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data Table With Full Features</h3>
                                    <a href="./student.php" class="btn btn-success" style="float:right">add student</a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>University</th>
                                                <th>Semster</th>
                                                <th>Area</th>
                                                <th>Station</th>
                                                <th>Refrence</th>
                                                <th>Course Applied</th>
                                                <th>Fee</th>
                                                <th>Discount</th>
                                                <th>Gender</th>
                                                <th>Contact1</th>
                                                <th>Contact2</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                          $view_sql= "SELECT * FROM `student`";
                                          $view_run = mysqli_query($conn,$view_sql);
                                          while ($fetch=mysqli_fetch_array($view_run)) {
                                            ?>
                                             <tbody>
                                            <tr>
                                                <td><?php echo $fetch['student_name'];?></td>
                                                <td><?php echo $fetch['student_uni'];?></td>
                                                <td><?php echo $fetch['student_sem'];?></td>
                                                <td><?php echo $fetch['student_area'];?></td>
                                                <td><?php echo $fetch['student_station'];?></td>
                                                <td><?php echo $fetch['student_reference'];?></td>
                                                <td><?php echo $fetch['student_course'];?></td>
                                                <td><?php echo $fetch['student_fee'];?></td>
                                                <td><?php echo $fetch['student_discount'];?></td>
                                                <td><?php echo $fetch['student_gender'];?></td>
                                                <td><?php echo $fetch['student_con1'];?></td>
                                                <td><?php echo $fetch['student_con2'];?></td>
                                                <td><a href="./includes/del.php?delid=<?php echo $fetch['student_id'];?>" class="btn btn-danger">Delete</a></td>
                                               
                                            </tr>
                                         
                                        </tbody>
                                            <?php
                                          }
                                        ?>
                                       
                                        <tfoot>
                                        <tr>
                                                <th>Name</th>
                                                <th>University</th>
                                                <th>Semster</th>
                                                <th>Area</th>
                                                <th>Station</th>
                                                <th>Refrence</th>
                                                <th>Course Applied</th>
                                                <th>Fee</th>
                                                <th>Discount</th>
                                                <th>Gender</th>
                                                <th>Contact1</th>
                                                <th>Contact2</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box-body -->
                       
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
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