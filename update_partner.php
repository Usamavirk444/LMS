<?php 
 include('./includes/conn.php');
 
 if (empty($_SESSION['email'])) {
     header('Location:./index.php');
 }
 
        $p_id=$_GET['updateid'];
        $p_sql="SELECT * FROM `partner` WHERE `partner_id`='$p_id'";
        $p_run= mysqli_query($conn,$p_sql);
        $p_fet= mysqli_fetch_array($p_run);
    if (isset($_POST['submit'])) {
        $P_name=mysqli_real_escape_string($conn,$_POST['pname']);
        $P_email=mysqli_real_escape_string($conn,$_POST['pemail']);
        $P_num=mysqli_real_escape_string($conn,$_POST['pnum']);
        $P_gen=mysqli_real_escape_string($conn,$_POST['pgen']);
        $P_type=mysqli_real_escape_string($conn,$_POST['ptype']);
        $P_per=mysqli_real_escape_string($conn,$_POST['per']);
        $P_fix=mysqli_real_escape_string($conn,$_POST['pfix']);
        $P_image=$_FILES['pimage']['name'];
        $P_add=mysqli_real_escape_string($conn,$_POST['padd']);

        $partner_sql="UPDATE `partner` SET `partner_name`='$P_name',`partner_email`='$P_email',`partner_number`='$P_num',`partner_gender`='$P_gen',`partner_method`='$P_type',`partner_per`='$P_per',`partner_fix`='$P_fix',`partner_address`='$P_add',`partner_image`='$P_image' WHERE `partner_id`='$p_id'";
        move_uploaded_file($_FILES['pimage']['tmp_name'],"./img/".$P_image);
        $partner_run= mysqli_query($conn,$partner_sql);

        if ($partner_run) {
            ?>
            <!-- <script>alert('Data Has Been Updated')</script> -->
            <?php
            header("Location:./view_partner.php");
        }


        
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    
   


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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Quick Example</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form method="post" enctype='multipart/form-data'>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputEmail4">Name</label>
                                        <input type="text" value="<?php echo $p_fet['partner_name']?>" name="pname" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4">email</label>
                                        <input type="email"  value="<?php echo $p_fet['partner_email']?>" name="pemail" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4">number</label>
                                        <input type="number"  value="<?php echo $p_fet['partner_number']?>" name="pnum" class="form-control" id="inputPassword4">
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4">Gender</label>
                                        <select class="form-control" name="pgen" id="">
                                            <option value="">Select Gender</option>
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4">Patrner Type</label>
                                        <select class="form-control" name="ptype" id="">
                                            <option value="">Select Type</option>
                                            <option value="per">percentage</option>
                                            <option value="fix">fixed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputEmail4">Percentage</label>
                                        <input type="number"  value="<?php echo $p_fet['partner_per']?>" name="per" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4">fix</label>
                                        <input type="number"  value="<?php echo $p_fet['partner_fix']?>" name="pfix" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4">image</label>
                                        <input type="file" name="pimage" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-12">
                                        <label for="inputPassword4">address</label>
                                        <input type="text" name="padd"  value="<?php echo $p_fet['partner_address']?>" class="form-control" id="inputPassword4">
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