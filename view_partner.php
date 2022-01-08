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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    All COURSE
                    <small>advanced Course</small>
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
                                <h3 class="box-title">All Partner</h3>
                                <a href="./partner.php" class="btn btn-success" style="float:right">Add partner</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Number</th>
                                            <th>Gender</th>
                                            <th>Method</th>
                                            <th>Percentage</th>
                                            <th>Fix</th>
                                            <th>Address</th>
                                            <th>image</th>

                                        </tr>
                                    </thead>
                                    <?php 
                                          $partner_sql= "SELECT * FROM `partner`";
                                          $partner_run = mysqli_query($conn,$partner_sql);
                                          while ($fetch=mysqli_fetch_array($partner_run)) {
                                            ?>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <button id="btnGroupDrop1" type="button"
                                                        class="btn btn-primary dropdown-toggle fa fa-angle-down" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                        <a class="dropdown-item btn btn-danger"
                                                        style="width:150px; margin-top:15px" href="./includes/del_partner.php?partnerid=<?php echo $fetch['partner_id']?>">Delete</a>
                                                        <a class="dropdown-item btn btn-success "
                                                        style="width:150px; margin-top:15px" href="./update_partner.php?updateid=<?php echo $fetch['partner_id']?>">Update</a>
                                                       
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $fetch['partner_name'];?></td>
                                            <td><?php echo $fetch['partner_email'];?></td>
                                            <td><?php echo $fetch['partner_number'];?></td>
                                            <td><?php echo $fetch['partner_gender'];?></td>
                                            <td><?php echo $fetch['partner_method'];?></td>
                                            <td><?php echo $fetch['partner_per'];?></td>
                                            <td><?php echo $fetch['partner_fix'];?></td>
                                            <td><?php echo $fetch['partner_address'];?></td>
                                            <td><img src="<?php echo './img/'.$fetch['partner_image'];?>" alt="" width="100" height="80"></td>


                                        </tr>

                                    </tbody>
                                    <?php
                                          }
                                        ?>

                                    <tfoot>
                                        <tr>
                                            <th>Action</th>
                                            <th>Course</th>
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