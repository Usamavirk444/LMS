<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Partner</title>
    <!-- Tell the browser to be responsive to screen width -->
    <?php include('./includes/conn.php');?>
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

        $partner_sql="INSERT INTO `partner`(`partner_name`, `partner_email`, `partner_number`, `partner_gender`, `partner_method`, `partner_per`, `partner_fix`,`partner_image`, `partner_address`) VALUES ('$P_name','$P_email','$P_num','$P_gen','$P_type','$P_per','$P_fix','$P_image','$P_add')";
        move_uploaded_file($_FILES['pimage']['tmp_name'],"./img/".$P_image);
        $partner_run= mysqli_query($conn,$partner_sql);


        
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
            
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-bg box-primary">
                            <div class="box-header with-border">
                                <h3 class="text-center text-primary"><b class="text-center">Enter Course Details</b></h3>
                            </div>
                            <!-- /.box-header -->
                            <style>
                                .form-control{
                                    border: solid 2px;
                                    border-radius: 10px ;
                                    height:45px;
                                }
                                
                            </style>
                            <!-- form start -->
                            <form method="post" enctype='multipart/form-data'>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label  for="inputEmail4"><i>Name</i></label>
                                        <input type="text" name="pname" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4"><i>Email</i></label>
                                        <input type="email" name="pemail" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4"><i>Number</i></label>
                                        <input type="number" name="pnum" class="form-control" id="inputPassword4">
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4"><i>Gender</i></label>
                                        <select class="form-control" name="pgen" id="">
                                            <option value="">Select Gender</option>
                                            <option value="male">male</option>
                                            <option value="female">female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4"><i>Patrner Type</i></label>
                                        <select class="form-control" name="ptype" id="">
                                            <option value="">Select Type</option>
                                            <option value="per">percentage</option>
                                            <option value="fix">fixed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputEmail4"><i>Percentage</i></label>
                                        <input type="number" name="per" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4"><i>Fix</i></label>
                                        <input type="number" name="pfix" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6">
                                        <label for="inputPassword4"><i>Image</i></label>
                                        <input type="file" name="pimage" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-12">
                                        <label for="inputPassword4"><i>Address</i></label>
                                        <input type="text" name="padd" class="form-control" id="inputPassword4">
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <button type="submit"  name="submit" class="btn  btn-primary btn-lg btn-block">Submit</button>
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